<?php
    function insertMessage($message, $senderId, $roomId){
        // dd($_POST);
        $usr = $_SESSION['username'];
        global $db;
        $query = "INSERT INTO Messages (room_id, sender_id, content, creator)
                 VALUES 
                ('$roomId', '$senderId', '$message', '$usr')";
        $db->query($query);
    }

    function allMessages(){
        global $db;
        $cmd = "SELECT * FROM messages";
        $m = $db->query($cmd);
        while($msg = $m->fetch_assoc()){

            if($msg['sender_id'] === $_SESSION['id']){
                echo("
                <div><span class='px-4 py-2 rounded-lg inline-block bg-blue-600 text-white'>
                    $msg[content]
                </span></div>
                ");
            } else {
                echo("
                <div class='my-2'><span class='px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600'>
                    $msg[content]
                </span></div>");
            }
        }
    }