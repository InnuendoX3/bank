<?php


// namespace classes;

// use PDO;

class DataBase
{

    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function connect()
    {
        $this->host = '127.0.0.1';
        $this->port = '3307';
        $this->db = 'bank';
        $this->user = 'root';
        $this->pass = '';
        $this->charset = 'utf8mb4';

        try {
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";
            $conn = new PDO($dsn, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
            //Om det blir error så kan felmeddelandet visas på sidan
        } catch (PDOException $e) {
            echo "Unable to connect: ". $e->getMessage();
        }
    }

    public function getAllUsers()
    {
        $db = $this->connect();
        
        $sql = ("SELECT id, firstName, lastName FROM users");
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


/*  $this->host = $_ENV["DB_HOST"];
    $this->port = $_ENV["DB_PORT"];
    $this->db = $_ENV["DB_DATABASE"];
    $this->user = $_ENV["DB_USER"];
    $this->pass = $_ENV["DB_PASS"];
    $this->charset = 'utf8mb4'; 
*/
