<?php 
if(isset($_POST['submit'])){
    $us = $_SESSION['username'];
    global $db;
    $db->query("INSERT INTO rooms (room_name, creator) VALUES ('$_POST[name]', '$us')");
}