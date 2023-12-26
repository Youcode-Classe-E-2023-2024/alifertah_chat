<?php
$pageId = isset($_GET['id']) ? $_GET['id'] : 0;
$pageName = $_GET['name'];


if(isset($_POST['message'])){
    $message = $_POST['message'];
    insertMessage($message, $_SESSION['id'], $pageId);
}

if(isset($_POST['generate'])){
    $invitationLink = uniqid();
    $sql = "INSERT INTO Invitation (room_id,invitation_link) VALUES ('$pageId', '$invitationLink')";
    $db->query($sql);
    echo "Invitation link created successfully: http://localhost/alifertah_chat/index.php?page=accept_inv&code=$invitationLink&room=$pageId";
}
