<html>
    <head>
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "offline_pocket";
     
        $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

        $user_id= $_GET["user_id"];
     
        $sql = "SELECT * 
        FROM (status INNER JOIN gametransaction ON status.transactionID = gametransaction.transactionID)
        WHERE status.user_id = '$user_id'";
     
        $sendsql = mysqli_query($connect, $sql);
    
        if(isset($_GET["submit"])){
            $status_admin = $_GET["status_admin"];
            $user_id = $_GET["user_id"];
            $transactionID = $_GET["transactionID"];

            $sql2 = "UPDATE status SET status_admin='$status_admin' \n"
            . "            WHERE user_id = $user_id AND transactionID = $transactionID;";

            $sendsql2 = mysqli_query($connect, $sql2);

            if ($sendsql2) {
                mysqli_close($connect); //close connection
                header("location:transactionList.php"); //redirect to student list page
                exit;
            }else {
                echo mysqli_error($connect);
            }
        }
        ?>

    </head>
    <body>
        
    </body>
</html>