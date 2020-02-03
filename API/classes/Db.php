<?php

// namespace classes;

/* use \PDO;
use \PDOException;
 */
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
}
