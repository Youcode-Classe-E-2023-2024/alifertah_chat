<?php
    $username = $_GET['username'];
    $res = $db->query("SELECT users_email FROM users WHERE users_username= '$username'");
    $userEmail = $res->fetch_assoc();