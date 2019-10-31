<?php 
$servername="localhost";
$username="fumx17";
$password="1173790";
$db="fumx17";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed：".$conn->connect_error);
} 
echo "connect successfully";

$stmt=$conn->prepare("insert into devices(servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired) values(?,?,?,?,?,?,?)");


// if($_POST['radio']=='YES'){
// 	for($i=0;$i<$_POST['servicetags'].length;$i++){
// 		$value1=$_POST['servicetags'][$i];
// 		$value2=$_POST['model'];
// 		$value3=$_POST['type'];
// 		$value4=$_POST['pdate'];
// 		$value5=$_POST['wpro'];
// 		$value6=$_POST['wdate'];
// 		$value7=$_POST['retired'];
// 		$stmt->bind_param("sssisii",$value1,$value2,$value3,$value4,$value5,$value6,$value7);
// 		$stmt->execute();
// 	}
// }

if(isset($_POST['servicetag'])){$value1=$_POST['servicetag'];}
if(isset($_POST['model'])){$value2=$_POST['model'];}
if(isset($_POST['type'])){$value3=$_POST['type'];}
if(isset($_POST['pdate'])){$value4=$_POST['pdate'];}
if(isset($_POST['wpro'])){$value5=$_POST['wpro'];}
if(isset($_POST['wdate'])){$value6=$_POST['wdate'];}
if(isset($_POST['retired'])){$value7=$_POST['retired'];}


// $value1='A20191031';
// $value2='Mac';
// $value3='laptop';
// $value4=strtotime('10/31/2019');
// $value5='Apple';
// $value6=strtotime('2/25/2023');
// $value7=false;



$stmt->bind_param("sssisii",$value1,$value2,$value3,$value4,$value5,$value6,$value7);
$stmt->execute();
$stmt->close();

$sql="select servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired from devices";
$result=$conn->query($sql);
if($result->num_rows>0){
	$row=$result->fetch_assoc();
		
}else{
	echo "0 results";
}
?>