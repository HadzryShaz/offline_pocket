<html>
    <head>
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "offline_pocket";
     
        $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

        $user_id= $_GET["user_id"];
        $sql2 = "DELETE from users WHERE user_id = '$user_id'";
            
        $sendsql2 = mysqli_query($connect, $sql2);

        if ($sendsql2) {
            mysqli_close($connect); //close connection
            //header("location:adminEditUser.php"); //redirect to student list page
           // exit;
        }else {
            echo mysqli_error($connect);
        }
        ?>

    </head>
    <body>
        <?php
            echo "<p>The selected user has been deleted.</p>";
            echo "<p>To go back to user list, <a href='adminEditUser.php'>CLICK HERE</a>.</p>";
        ?>
    </body>
</html>