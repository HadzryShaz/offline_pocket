<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approved'])) {
        // Perform any actions needed for approval (if required)
        // ...
    } elseif (isset($_POST['cancel'])) {
        // Perform any actions needed for cancellation (if required)
        // ...
    }

    // Redirect to receipt.php after 5 seconds
    header("refresh:5;url=receipt.php");
    echo 'You will be redirected to receipt.php in 5 seconds. If not, click <a href="receipt.php">here</a>.';
    exit();
}

?>