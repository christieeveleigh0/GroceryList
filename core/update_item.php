<?php

require_once 'conn.php';
$connection = new Connection();

if ($connection->validate_item($_POST['item'])) {
    $connection->update_item($_POST['id'], $_POST['item']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);