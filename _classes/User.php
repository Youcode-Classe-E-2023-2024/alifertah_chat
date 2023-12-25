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

    static function getUser($email, $password)
    {
        global $db;
        $stmt = $db->prepare("SELECT users_id, users_password FROM users WHERE users_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId, $hashedPass);
        $stmt->fetch();
        $stmt->close();
    
        if (!$hashedPass) {
            echo "Invalid email or password.";
        } else {
            if (password_verify($password, $hashedPass)) {
                session_start();
                $_SESSION["id"] = $userId; 
                header("Location: index.php?page=rooms");
            } else {
                echo "Invalid email or password.";
            }
        }
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