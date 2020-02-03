<?php

class Person
{
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $mobilephone;
    private $account;
    private $conn;

    public function __construct($db)
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

    public function transfer()
    {
        
    }

}