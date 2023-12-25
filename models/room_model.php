<?php
    function insertMessage($message, $senderId, $roomId){
        global $db;
        $query = "INSERT INTO Messages (room_id, sender_id, content) VALUES ('$roomId', '$senderId', '$message')";
        $db->query($query);
    }