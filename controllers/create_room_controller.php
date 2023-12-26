<?php 
if(isset($_POST['submit'])){
    $us = $_SESSION['username'];
    $usId = $_SESSION['id'];
    global $db;
    $db->query("INSERT INTO rooms (room_name, creator) VALUES ('$_POST[name]', '$us')");
    $newRoomId = mysqli_insert_id($db);
    echo($newRoomId . $usId);
    $db->query("INSERT INTO room_user (room_id, user_id) VALUES ('$newRoomId', '$usId')");
}