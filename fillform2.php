<?php

        session_start();

        $servername = "db4free.net";
        $username = "juhosi";
        $password = "juhosi123";
        $database = "juhosi";

        $conn = mysqli_connect($servername, $username, $password, $database);

        $idd = $_SESSION['idd'];
        $password = $_SESSION['password'];  



        $query = "SELECT * FROM User WHERE id = '$idd' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);


        $userId = $row['id'];


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $order_date = $_POST['order_date'];
            $item = $_POST['item'];
            $count = $_POST['count'];
            $weight = $_POST['weight'];
            $requests = $_POST['requests'];
            
            $update = "UPDATE Orderitem SET order_date='$order_date', item='$item', count='$count', weight='$weight', requests='$requests' WHERE user_id = $userId";


            mysqli_query($conn,$update);
            header("Location: view.php");
            
        }


?>