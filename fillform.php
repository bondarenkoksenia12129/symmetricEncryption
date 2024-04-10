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

        $name = $row['name'];
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>

*{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

 body,html{
    height:100vh;
    background-color: rgb(7, 7, 41);
    background-size: cover;
    font-family:'Poppins', sans-serif;
    
}
.login-block{
    display:flex ;
    flex-direction: column;
    margin-right: 120px;
    margin-left: 120px;
    margin-top: 30px;
   
}

.login-block input{
    width: 100%;
    height: 30px;
    background-color: rgba(255, 255, 255, 0.346);
    border: 1px solid lightgray;
    border-radius: 3px;
    font-size: 15px;
    color: white;
}



.login-block label{
    margin-top: 15px;
    margin-bottom: 3px;
    font-weight: bold;
    color: white;
    font-size: 17px;
}

.logo{
    text-align: center;
    font-weight: bold;
    font-size: 48px;
    color: white;
    margin-top:40px;
}

button{
    color: rgb(255, 255, 255);
    background-color: blue;
    margin-top: 40px;
    width: 100%;
    border: none;
    padding: 10px;
    border-radius: 10px;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
}

button:hover{
    color: rgb(255, 255, 255);
    background-color: rgb(7, 7, 114);
}

@media screen and (max-width: 680px) {
    .logo{
        font-size: 30px;
    }

    .login-block{
        margin-right: 20px;
        margin-left: 20px;
    }

}
    </style>

</head>
<body>

        <div class="logo">Order Details</div>
        <form method="POST" action="fillform2.php" class="login-block">

                <label for="order_date">Order Date:</label>
                <input type="date" id="order_date" name="order_date" required>
                
                <label for="company">Company:</label>
                <input type="text" id="company" name="company" value="<?php echo $idd; ?>" readonly>
                
                <label for="ownerr">Order Owner:</label>
                <input type="text" id="ownerr" name="ownerr" value="<?php echo $name; ?>" readonly>
                
                <label for="item">Item/Product:</label>
                <input type="text" id="item" name="item" required>
                
                <label for="count">EA/count:</label>
                <input type="number" id="count" name="count" required>
                
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" required>
                    
                <label for="requests">Requests:</label>
                <input type="text" id="requests" name="requests" required>
                
                <button type="submit">Submit</button>
            </form>
        

</body>
</html>