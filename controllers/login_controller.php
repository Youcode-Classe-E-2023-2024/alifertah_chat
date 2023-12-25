<?php
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
    }
    
    if(isset($_POST['login'])){
        User::getUser($_POST["email"], $_POST["password"]);
    } 