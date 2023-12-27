<?php
$result = $db->query("SELECT * FROM messages");
$roomId = $_GET['room'];


$users = $db->query("SELECT u.users_id, u.users_username
                    FROM room_user ru
                    JOIN users u ON ru.user_id = u.users_id
                    WHERE ru.room_id = '$roomId'");
if ($result) {
    $message;
    while ($msg = $result->fetch_assoc()){
        if($msg['room_id'] == $roomId){
            $message[] = $msg;
        }
    }
}
while ($usr = $users->fetch_assoc()){
        $message[] = $usr;
}


?>

<?= json_encode($message); exit();?>