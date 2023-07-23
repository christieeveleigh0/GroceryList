<?php

require_once 'core/conn.php';

if (count($_POST) > 0) { // TODO: && $_POST['fresh_session_check'] == $_SESSION['fresh']
    if ($connection->validate_item($_POST['list_item'])) {
        $add_new_item = $connection->add_new_item($_POST['list_item']);
    }
}