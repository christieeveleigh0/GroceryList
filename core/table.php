<?php

include('conn.php');

class Table {

    function generateTableContent() {

        $connection = new Connection();
        $shopping_list_items = $connection->return_shopping_list_items(); 

        //print_r($shopping_list_items);

        $table_html = "";

        if (count($shopping_list_items) > 0) {
            foreach ($shopping_list_items as $key => $value) {
                foreach ($value as $item) {
                    
                    $table_class = "incomplete";
                    $checkbox_checked = "";
                    $table_html .= "<tr>";

                                    if ($item['status'] == 1) {
                                        $checkbox_checked = "checked";
                                        $table_class = "complete";
                                    }

                    $table_html .= "<td class='checkbox-td-container'>
                                        <label class='checkbox-container'>
                                            <input type='checkbox' id='update_status_" . $item['id'] . "' name='update_status' " . $checkbox_checked . ">
                                            <span class='checkmark'></span>
                                        </label>
                                    </td>
                                    <td>
                                        <form name='update_item' action='core/update_item.php' method='post'>
                                            <input type='text' value='" . $item['item'] . "' name='item' id=" . $item['id'] . " class=" . $table_class . ">
                                            <input type='hidden' value=" . $item['id'] . " name='id'>
                                        </form>
                                        <div id='confirm'></div>
                                    </td>
                                    <td>
                                        <a href='core/delete_item.php?id=" . $item['id'] . "'>
                                            <i class='fa-solid fa-trash-can'></i>
                                        </a>
                                    </td>
                                    </tr>";
                }
            }
        } else {
            $table_html .= "<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>";
        }

        return $table_html;
    }
}