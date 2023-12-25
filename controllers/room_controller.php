<?php
$pageId = isset($_GET['id']) ? $_GET['id'] : 0;
$pageName = $_GET['name'];

if(isset($_POST['send'])){
    $message = $_POST['message'];
    insertMessage($message, $_SESSION['id'], $pageId);
}