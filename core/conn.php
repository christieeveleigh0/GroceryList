<?php

include('config.php');

class Connection {

    public static function connect() {

        $servername = servername;
        $db_user = db_user;
        $db_password = db_password;
        $db_name = db_name;

        $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_user, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public function return_shopping_list_items() {
        $conn = $this->connect();
        $shopping_items = array();
        
        $get_open_shopping_items = $conn->prepare("SELECT * FROM shopping_list WHERE status = 0 ORDER BY created DESC"); 
        $get_open_shopping_items->execute();
        $result = $get_open_shopping_items->fetchAll(PDO::FETCH_ASSOC);
        array_push($shopping_items, $result);

        $get_closed_shopping_items = $conn->prepare("SELECT * FROM shopping_list WHERE status = 1 ORDER BY created DESC"); 
        $get_closed_shopping_items->execute();
        $closed_result = $get_closed_shopping_items->fetchAll(PDO::FETCH_ASSOC);
        array_push($shopping_items, $closed_result);

        return $shopping_items;
    }

    public function validate_item($item) {
        if (!empty($item)) {return true;}
        return false;
    }

    public function add_new_item($item) {
        $conn = $this->connect();

        $insert_new_item = $conn->prepare("INSERT INTO `shopping_list` (`item`, `status`, `created`) VALUES (?, ?, NOW())");
        $insert_new_item->execute([$item, 0]);
        $insert_new_item = null;
    }

    public function remove_item($id) {
        $conn = $this->connect();

        $delete_item = $conn->prepare("DELETE FROM shopping_list WHERE id = ?");
        $delete_item->execute([$id]);
        $delete_item = null;
    }

    public function update_item($id, $content) {
        $conn = $this->connect();

        $update_item = "UPDATE `shopping_list` SET item = ? WHERE id = ?";
        $update_item = $conn->prepare($update_item);
        $update_item->execute([$content, $id]);
        $update_item = null;
    }

    public function update_item_status($id, $checked) {
        $conn = $this->connect();

        $update_item_status = "UPDATE `shopping_list` SET status = 0 WHERE id = ?";
        if ($checked == "true") {
            $update_item_status = "UPDATE `shopping_list` SET status = 1 WHERE id = ?";
        }

        $update_item_status = $conn->prepare($update_item_status);
        return $update_item_status->execute([$id]);
    }
}