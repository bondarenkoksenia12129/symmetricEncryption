<?php

session_start();

$servername = "db4free.net";
$username = "juhosi";
$password = "juhosi123";
$database = "juhosi";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idd = $_POST["idd"];
    $password = $_POST["password"];

    $query = "SELECT * FROM User WHERE id = '$idd' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    if ($row) {
        
        if ($idd == $row['id'] && $password == $row['password']) {
            $_SESSION['idd'] = $idd;
            $_SESSION['password'] = $password;
            
            header("Location: fillform.php");
            exit();
        }else {
            echo "Invalid user credentials. Please click on Change Password if forgotten!";
        }
    } else {
        echo "<script>alert('Invalid user credentials!'); window.location.href = 'login.html'; </script>";
    }
}
?>
