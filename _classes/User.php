<?php

class User
{
    public $id;
    public $email;
    public $username;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->setPassword($password);
    }

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function insertUser(){
        global $db;
        $db->query("INSERT INTO users (users_username, users_email, users_password) VALUES 
        ('$this->username', '$this->email', '$this->password')");
    }

    function edit()
    {
        global $db;
        return $db->query("UPDATE users SET users_email = '$this->email', users_username = '$this->username' WHERE users_id = '$this->id'");
    }

    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }
}