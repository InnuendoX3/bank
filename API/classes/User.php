<?php

class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $mobilephone;
    private $account;
    private $conn;

    public function __construct(Database $db)
    {
        $this->conn = $db;
    }

    public function getData($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetch();
        return $results;
    }

    public function getAllUsers()
    {
        $db = $this->conn->connect();
        
        $sql = ("SELECT id, firstName, lastName, password FROM users");
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $nrRows = $stmt->rowCount();

        if ($nrRows > 0) {
            $users_arr = array();
            $users_arr["records"] = array();
            $users_arr["number rows"] = $nrRows;
            $users_arr["response"] = 0;

            while ($row = $stmt->fetch()) {
                // extract row
                // this will make $row['something'] to
                // just $something only
                extract($row);

                // This part not really needed.
                // Works fine just with extract($row).
                // But usint it in case I need it
                // as example for future functions
                $user_item = array(
                    "id"=>$id,
                    "firstName"=>$firstName,
                    "lastName"=>$lastName
                );
                //print_r($user_item);
                array_push($users_arr["records"], $row);
            }

            $users_arr["response"] = 200;

            return $users_arr;
        } else {
            $users_arr["response"] = 404;
            $users_arr["records"] = array("message"=>"No users found");
        }
        
        return $users_arr;
    }

}