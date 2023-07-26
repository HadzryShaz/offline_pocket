<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_name'])) {
    $gameName = $_POST['game_name'];

    // Retrieve the edited form fields and perform any necessary validation or sanitization
    $gameType = $_POST['game_type'] ?? "";
    $currencyName = $_POST['currency_name'] ?? "";
    $currencyPrice1 = $_POST['currency_price1'] ?? "";
    $realPrice1 = $_POST['real_price1'] ?? "";
    $currencyPrice2 = $_POST['currency_price2'] ?? "";
    $realPrice2 = $_POST['real_price2'] ?? "";
    $currencyPrice3 = $_POST['currency_price3'] ?? "";
    $realPrice3 = $_POST['real_price3'] ?? "";

    // Perform the database update queries to update the game data
    // ... Your code to update the game data in the database ...

    // Redirect back to the admin page after updating
    header('Location: admin.php');
    exit();
}
?>
