<?php

require_once 'conn.php';
$connection = new Connection();
$connection->remove_item($_GET['id']);
header('Location: ' . $_SERVER['HTTP_REFERER']);