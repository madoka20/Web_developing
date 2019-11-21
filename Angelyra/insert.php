<?php
    $connectionInfo = array("UID" => "madoka", "pwd" => "Clare923%", "Database" => "Angelyra", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:madoka.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
echo 'connect successfully';
    $picture=$_POST['picture'];
    $productid=intval($_POST['productid']);
    $title=$_POST['title'];
    $price=floatval($_POST['price']);
    $minimumsize=intval($_POST['minimumsize']);
    $maximumsize=intval($_POST['maximumsize']);
    $category=$_POST['category'];
    $color=$_POST['color'];
    $pattern=$_POST['pattern'];
    $textile=$_POST['textile'];
    $brand=$_POST['brand'];

    $tsql= "insert into fashion (picturelink,productId,title,price,minimumsize,maximumsize,category,color,pattern,textile,brand) values ('$picture','$productid','$title','$price','$minimumsize','$maximumsize','$category','$color','$pattern','$textile','$brand')";
    sqlsrv_query($conn, $tsql);
   
    sqlsrv_close($conn);
    
?>