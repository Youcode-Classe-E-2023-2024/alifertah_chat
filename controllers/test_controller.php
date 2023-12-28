<?php
$result = $db->query("SELECT * FROM messages");
$roomId = $_GET['room'];
$userId = $_SESSION['username'];

$users = $db->query("SELECT u.users_id, u.users_username
                    FROM room_user ru
                    JOIN users u ON ru.user_id = u.users_id
                    WHERE ru.room_id = '$roomId'");
if ($result) {
    $message;
    while ($msg = $result->fetch_assoc()){
        if($msg['room_id'] == $roomId){
        $checkBlock = $db->query("SELECT block_id FROM blocks WHERE 
        blocker_id = (SELECT users_id FROM users WHERE users_username = '$userId') and
        blocked_id = (SELECT users_id FROM users WHERE users_username = '$msg[creator]')
        ");
        $block = $checkBlock->num_rows;
            if(!$block){
                $message[] = $msg;
            }
        }
    }
}
while ($usr = $users->fetch_assoc()){
        $message[] = $usr;
}


?>

<?= json_encode($message); exit();?>