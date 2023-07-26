<?php include 'header.php'; ?>



// Check if the session variables are set before displaying user-related information
<?php if(isset($_SESSION['currentUser'])) { ?>
    <li><?php echo $_SESSION['currentUser']; ?></li>

<?php } else { ?>
    <li><a href="#login" class="btnLogin-popup">Login</a></li>
<?php } ?>
