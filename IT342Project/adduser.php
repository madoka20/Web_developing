<?php 
include "function.php";

$username=$_POST['username'];
$pw=$_POST['pw'];
$manager=$_POST['manager'];
createUser($username,$pw,$manager);
header('Location:manage.php');



?>