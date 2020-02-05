<?php

class User
{
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $mobilephone;
    private $account_id;
    private $currency;
    private $balance;
    // private $Account;
    private $conn;

    public function __construct(Database $db)
    {
        $this->conn = $db;
    }

    public function constructUser($id)
    {
        $db = $this->conn->connect();

        $sql = "SELECT * FROM vw_users WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetch();

        $this->id = $results["id"];
        $this->first_name = $results["firstName"];
        $this->last_name = $results["lastName"];
        $this->username = $results["username"];
        $this->password = $results["password"];
        $this->mobilephone = $results["mobilephone"];
        $this->account_id = $results["account_id"];
        $this->currency = $results["currency"];
        $this->balance = $results["balance"];

        return $results["id"];
    }

    public function getId()
    {
        return $this->id;
    }
    public function getAccountId()
    {
        return $this->account_id;
    }
    public function getBalance()
    {
        return $this->balance;
    }
    public function getCurrency()
    {
        return $this->currency;
    }

    public function getUser($id)
    {
        $db = $this->conn->connect();

        $sql = "SELECT * FROM vw_users WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetch();
        return $results;
    }

    /**
     * Gets everything from all users
     * Except password
     */
    public function getAllUsersEver()
    {
        $db = $this->conn->connect();

        $sql = "SELECT id, firstName, lastName, username,
            mobilephone, account_id, currency, balance FROM vw_users";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $nrRows = $stmt->rowCount();
        // echo $nrRows;

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
                    "lastName"=>$lastName,
                    "username"=>$username,
                    "mobilephone"=>$mobilephone,
                    "account_id"=>$account_id,
                    "currency"=>$currency,
                    "balance"=>$balance
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

    //public function getAccount()

}




/*     public function getData($id)
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
    } */