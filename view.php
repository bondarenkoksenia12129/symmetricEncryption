<?php
session_start();
    

        $servername = "db4free.net";
        $username = "juhosi";
        $password = "juhosi123";
        $database = "juhosi";

        $conn = mysqli_connect($servername, $username, $password, $database);

        $idd = $_SESSION['idd'];
        $password = $_SESSION['password'];  

        $query = "SELECT User.*, Orderitem.* FROM User
        JOIN Orderitem ON User.id = Orderitem.user_id
        WHERE User.id = '$idd' AND User.password = '$password'";
        $result = mysqli_query($conn, $query);
    
    echo"
    <h1>HQ's page: \"Order List\"</h1>
    <table> 
    <thead>
    <tr>
                        <th>Order Date</th>
                        <th>Company</th>
                        <th>Order Owner</th>
                        <th>Item, product</th>
                        <th>EA, count</th>
                        <th>Weight</th>
                        <th>Requests for shipment</th>
                        <th>field box: EA</th>
                        <th>field box: Size</th>
                        <th>office box check</th>
                        <th>Specifications Quantity</th>
    </tr>
    </thead>
    <tbody>
    
    
    
    ";
        while($row=mysqli_fetch_assoc($result))
        {
           echo"
                <tr>
                    <td>$row[order_date]</td>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[item]</td>
                    <td>$row[count]</td>
                    <td>$row[weight]</td>
                    <td>$row[requests]</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
            ";
        }
       

        echo"
        </tbody>
        <table>
        ";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       *{
        font-family:"Poppins", sans-serif;

       }

       body{
        background-color: rgb(7, 7, 41);
        padding: 0 20px;
       }
       h1{
        color:white;
        font-size:48px;
        text-align:center;
       }
       table, th, td{
        border:2px solid black;
        border-collapse: collapse;
        padding: 10px 25px;
       }
       td{
        background: white;
       }

       thead{
        background-color:darkslateblue;
        color:white;
       }

       a{
        display:inline-block;
        margin-top:25px;
        padding:15px 20px;
        background-color: darkslateblue;
        color:white;
        font-weight:bold;
        font-size:18px;
        border:2px solid black;
        border-radius: 3px;
        text-decoration: none;
       }

       a:hover{
        background-color: #2B2453;
        color:white;
        transition: all 0.2s ease-in-out;
       }

       @media (max-width: 767px) {
        table {
            display: block;
            width: 100%;
            overflow-x: auto;
        }

        th,
        td {
            white-space: nowrap;
        }

        table, th, td{
        border:none;
        
       }
      
}

    </style> 
</head>
<body>
    <a href="excel.php">Export to Excel</a>
</body>
</html>