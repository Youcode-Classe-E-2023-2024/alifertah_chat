<?php 
$invitationLink = $_GET['code'];
$roomId = $_GET['room'];
$sql = "SELECT room_id FROM invitation WHERE invitation_link = '$invitationLink'";
$result = $db->query($sql);

if ($result->num_rows > 0){
    $usr = $_SESSION['id'];
    // $db->query("DELETE FROM invitation WHERE invitation_link = '$invitationLink'");
    $db->query("INSERT INTO room_user (room_id, user_id) VALUES ($roomId, $usr)");
    echo $usr;
}