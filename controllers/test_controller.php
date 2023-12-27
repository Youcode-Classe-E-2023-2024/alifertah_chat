<?php
$result = $db->query("SELECT * FROM messages");
$roomId = $_GET['room'];
if ($result) {
    $message;
    while ($msg = $result->fetch_assoc()){
        if($msg['room_id'] == $roomId){
            $message[] = $msg;
        }
    }
}

?>

<?= json_encode($message); exit();?>