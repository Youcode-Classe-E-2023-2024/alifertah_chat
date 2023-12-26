<?php
// header('Content-Type: application/json');
// $data = array("message" => "hero");
// $cmd = "SELECT content FROM messages";
// header('Content-Type: application/json');
$result = $db->query("SELECT * FROM messages");
if ($result) {
    $message;
    while ($msg = $result->fetch_assoc()){
        $message[] = $msg;
    }
    // dd($message);
    // echo json_encode($message);

// } else {
//     echo json_encode(array('error' => 'Error fetching messages'));
}

?>

<?= json_encode($message); exit();?>