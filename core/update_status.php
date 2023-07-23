<?php

require_once 'conn.php';
$connection = new Connection();
if ($connection->update_item_status($_POST['id'], $_POST['checked'])) {
    echo "success";
}