<?php
    $serverName = "madoka.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "Angelyra", // update me
        "Uid" => "madoka", // update me
        "PWD" => "Clare923%" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $picture=$_POST("picture");
    $productid=$_POST("productid");
    $title=$_POST("title");
    $price=$_POST("price");
    $minimumsize=$_POST("minimumsize");
    $maximumsize=$_POST("maximumsize");
    $category=$_POST("category");
    $color=$_POST("color");
    $pattern=$_POST("pattern");
    $textile=$_POST("textile");
    $brand=$_POST("brand");

    $tsql= "insert into fashion (picture,productid,title,price,minimumsize,maximumsize,category,color,pattern,textile,brand) values ('$picture','$productid','$title','$price','$minimumsize','$maximumsize','$category','$color','$pattern','$textile','$brand')";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    // while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    //  echo ($row['CategoryName'] . " " . $row['ProductName'] . PHP_EOL);
    // }
    sqlsrv_free_stmt($getResults);
?>