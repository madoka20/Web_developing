<?php
include "function.php";
$conn=db_connect();
$stmt3=$conn->prepare("update devices set model=?,type=?,purchasedate=?,warrantyprovider=?,warrantyexp=?,retired=? where servicetag=?");
$value1=$_POST['servicetag'];
$value2=$_POST['model'];
$value3=$_POST['type'];
$value4=strtotime($_POST['pdate']);
$value5=$_POST['wpro'];
$value6=strtotime($_POST['wdate']);
$value7=(isset($_POST['retired'])) ? 1 : 0;
$stmt3->bind_param("ssisiis",$value2,$value3,$value4,$value5,$value6,$value7,$value1);
$stmt3->execute();
$stmt3->close();
header("Location: list.php");
?>