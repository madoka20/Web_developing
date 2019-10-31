<?php

function db_connect(){
$servername="localhost";
$username="fumx17";
$password="1173790";
$db="fumx17";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed：".$conn->connect_error);
} 
echo "connect successfully";
}
function db_disconnect($conn){
   $conn-close(); 
}


?>