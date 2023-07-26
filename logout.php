<?php
    session_start();
    session_destroy();

    header('Location: homeScreen.php');
?>