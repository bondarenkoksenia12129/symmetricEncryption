<?php

$servername = "db4free.net";
$username = "juhosi";
$password = "juhosi123";
$database = "juhosi";

$conn = mysqli_connect($servername, $username, $password, $database);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mobileNumber = $_POST['mobile_number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        
        $query = "SELECT * FROM User WHERE phone_number = '$mobileNumber'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userId = $row['id'];

            $updateQuery = "UPDATE User SET password = '$password' WHERE id = $userId AND phone_number = $mobileNumber";
            mysqli_query($conn, $updateQuery);

            echo "<script>alert('Password updated successfully!'); window.location.href = 'login.html';</script>";
        } else {
            echo "<script>alert('Invalid mobile number!'); window.location.href = 'changepassword.html'; </script>";
        }
    }

    mysqli_close($conn);
}


?>