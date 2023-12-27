<?php
    $roomId = $_GET['room'];
    $allUsers = $db->query("SELECT * FROM users");
    if(isset($_POST['kick'])){
        $kicked = $_POST['kicked'];
        $db->query("DELETE FROM room_user WHERE room_id = '$roomId' AND user_id = '$kicked'");
    }