<?php
    $username = $_GET['username'];
    $res = $db->query("SELECT users_email FROM users WHERE users_username= '$username'");
    $userEmail = $res->fetch_assoc();

    if(isset($_POST['add'])){
        $receiver = $_SESSION['username'];
        $db->query("INSERT INTO friend_requests (sender_id, receiver_id)
        VALUES (
            (SELECT users_id FROM users WHERE users_username = '$username'),
            (SELECT users_id FROM users WHERE users_username = '$receiver')
        );
        ");
    
}
if($username == $_SESSION['username']){
    $res = $db->query("SELECT * FROM friend_requests WHERE receiver_id = (
        SELECT users_id FROM users WHERE users_username = '$_SESSION[username]'
    )");
}