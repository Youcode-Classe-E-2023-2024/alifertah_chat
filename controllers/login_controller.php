<?php
    if(isset($_POST['login'])){
        User::getUser($_POST["email"], $_POST["password"]);
    } 