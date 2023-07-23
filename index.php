<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('core/table.php');
$table = new Table();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="title" content="Moonstone Shopping List">
        <meta name="description" content="Welcome to Moonstone Shopping List! Add, edit and remove items on your shopping list. You'll never forget something at the shops again.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    </head>
<body>

    <div class="body-container welcome-container" id="onboarding-container">
        <div class="welcome-container-inner fade" id="onboarding-1">
            <div><img src="img/onboarding-1.png" class="onboarding"></div>
            <div class="welcome-description">
                <h3>Add an Item</h3>
                <p>Type your item into the text box, and simple click the "Enter" button on your keyboard</p>
                <button onclick="onboardingNavigation(1)">Next</button>
                <div class="navigation">
                    <div class="selected"></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="welcome-container-inner" id="onboarding-2">
            <div><img src="img/onboarding-2.png" class="onboarding"></div>
            <div class="welcome-description">
                <h3>Check an item off</h3>
                <p>Select the checkbox next to the corresponding item. You can also "uncheck" an item anytime</p>
                <button onclick="onboardingNavigation(2)">Next</button>
                <div class="navigation">
                    <div></div>
                    <div class="selected"></div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="welcome-container-inner" id="onboarding-3">
            <div><img src="img/onboarding-3.png" class="onboarding"></div>
            <div class="welcome-description">
                <h3>Edit an Item</h3>
                <p>Click on an item, edit the text to your liking and then click the "Enter" key on your keyboard</p>
                <button onclick="onboardingNavigation(3)">Start</button>
                <div class="navigation">
                    <div></div>
                    <div></div>
                    <div class="selected"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-container">
        <div class="page-heading">
            <div><img src="img/logo.png" class="logo"></div>
            <div><p><div id="item-count"></div></p></div>
        </div>
        <div class="table-container">
            <div class="add-new-container">
                <form name="add_item" class="add-item" action="core/insert_item.php" method="post">
                    <i class="fa-solid fa-plus"></i>
                    <input type="text" placeholder="Add Item" name="list_item" autofocus>
                </form>
            </div>
            <table>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?= $table->generateTableContent(); ?>
            </table>
        </div>
    </div>

<script src="js/onboarding.js"></script>
<script src="js/list.js"></script>
</body>
</html>