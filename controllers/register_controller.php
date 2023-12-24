<?php
if(isset($_POST['register'])){
    $newUser = new User($_POST['username'], $_POST["email"], $_POST["password"]);
    $newUser->insertUser();
}