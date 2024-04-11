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
    
    $data="
    <table border='1'>
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
           $data.="
                <tr>
                    <td>$row[order_date]</td>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[item]</td>
                    <td>$row[count]</td>
                    <td>$row[weight]</td>
                    <td>$row[requests]</td>
                </tr>
            ";
        }
       

        $data.="
        </tbody>
        </table>
        ";

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=juhosi.xls");

        echo $data;
        
 
 
 
 
 
 ?>