<?php
if(isset($_POST['register'])){
    echo "yes";
    $u = new User($_POST['username'], $_POST["email"], $_POST["password"]);
    $u->insertUser();
}