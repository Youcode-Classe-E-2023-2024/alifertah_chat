<?php
$pageId = isset($_GET['id']) ? $_GET['id'] : 0;
$pageName = $_GET['name'];

if(isset($_POST['send'])){
    echo($_POST['message']);
}