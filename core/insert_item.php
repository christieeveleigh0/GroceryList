<?php

require_once 'conn.php';
$connection = new Connection();

if ($connection->validate_item($_POST['list_item'])) {
    $add_new_item = $connection->add_new_item($_POST['list_item']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);