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
    
        // Basic query with no protection (vulnerable to SQL injection)
        $query = "SELECT users_id, users_password FROM users WHERE users_email = '$email'";
        $result = $db->query($query);
    
        // Check if the query was successful
        if ($result) {
            // Fetch the user data
            $user = $result->fetch_assoc();
    
            // Check if a user was found
            if ($user) {
                // Compare the provided password with the hashed password
                if (password_verify($password, $user['users_password'])) {
                    session_start();
                    $_SESSION["id"] = $user['users_id'];
                    header("Location: index.php?page=rooms");
                } else {
                    echo "Invalid email or password.";
                }
            } else {
                echo "Invalid email or password.";
            }
        } else {
            echo "Error executing the query.";
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