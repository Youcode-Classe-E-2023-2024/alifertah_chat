<?php
    $username = $_GET['username'];
    $res = $db->query("SELECT users_email FROM users WHERE users_username= '$username'");
    $userEmail = $res->fetch_assoc();

    if(isset($_POST['add'])){
        $receiver = $_SESSION['username'];
        $db->query("INSERT INTO friend_requests (sender_id, receiver_id)
        VALUES (
            (SELECT users_id FROM users WHERE users_username = '$receiver'),
            (SELECT users_id FROM users WHERE users_username = '$username')
        );
        ");
    
}
if($username == $_SESSION['username']){
    $res = $db->query("SELECT * FROM friend_requests WHERE receiver_id = (
        SELECT users_id FROM users WHERE users_username = '$_SESSION[username]'
    )");
}
if(isset($_POST['accept'])){
    $db->query("UPDATE `friend_requests` SET `status` = 'accepted' WHERE `friend_requests`.`request_id` = '$_SESSION[friendRequestId]';");
}
if(isset($_POST['decline'])){
    $db->query("UPDATE `friend_requests` SET `status` = 'rejected' WHERE `friend_requests`.`request_id` = '$_SESSION[friendRequestId]';");
}

if(isset($_POST['block'])){
    $db->query("INSERT INTO blocks (blocker_id, blocked_id) VALUES (
        (SELECT users_id FROM users WHERE users_username = '$_SESSION[username]'),
        (SELECT users_id FROM users WHERE users_username = '$username')
    )");
}