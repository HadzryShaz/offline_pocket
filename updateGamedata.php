<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    // Check if the form is submitted for editing

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Offline_Pocket";

    $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("Connection failed.");

    $id = $_POST["edit1"];
    $gameName = $_POST['game_name'];
    $gameType = $_POST['game_type'];
    $currencyName = $_POST['currency_name'];
    $currencyPrice1 = $_POST['currency_price1'];
    $currencyPrice2 = $_POST['currency_price2'];
    $currencyPrice3 = $_POST['currency_price3'];
    $currencyPrice4 = $_POST['currency_price4'];
    $currencyPrice5 = $_POST['currency_price5'];
    $realPrice1 = $_POST['real_price1'];
    $realPrice2 = $_POST['real_price2'];
    $realPrice3 = $_POST['real_price3'];
    $realPrice4 = $_POST['real_price4'];
    $realPrice5 = $_POST['real_price5'];

    // Update the corresponding record in the database
    $sql = "UPDATE gameData SET
        gameName = '$gameName',
        gameType = '$gameType',
        nameIngameCurrency = '$currencyName',
        ingameCurrency1 = '$currencyPrice1',
        realCurrency1 = '$realPrice1',
        ingameCurrency2 = '$currencyPrice2',
        realCurrency2 = '$realPrice2',
        ingameCurrency3 = '$currencyPrice3',
        realCurrency3 = '$realPrice3',
        ingameCurrency4 = '$currencyPrice4',
        realCurrency4 = '$realPrice4',
        ingameCurrency5 = '$currencyPrice5',
        realCurrency5 = '$realPrice5'
        WHERE id = '$id'";

    if (mysqli_query($connect, $sql)) {
        // Redirect back to the admin page after successful update
        header("Location: admin.php");
        exit;
    } else {
        echo "<p>Error updating record: " . mysqli_error($connect) . "</p>";
    }

    // Close the database connection
    mysqli_close($connect);
}
?>
