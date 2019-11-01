<?php 
include "function.php";
$conn=db_connect();

$stmt=$conn->prepare("insert into devices(servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired) values(?,?,?,?,?,?,?)");


// if(isset($_POST['radio'])){
// 	for($i=0;$i<$_POST['servicetags'].length;$i++){
// 		$value1=$_POST['servicetags'][$i];
// 		$value2=$_POST['model'];
// 		$value3=$_POST['type'];
// 		$value4=$_POST['pdate'];
// 		$value5=$_POST['wpro'];
// 		$value6=$_POST['wdate'];
// 		$value7=(isset($_POST['retired'])) ? 1 : 0;
// 		$stmt->bind_param("sssisii",$value1,$value2,$value3,$value4,$value5,$value6,$value7);
// 		$stmt->execute();
// 	}
// }

if(isset($_POST['servicetag'])){$value1=$_POST['servicetag'];}
if(isset($_POST['model'])){$value2=$_POST['model'];}
if(isset($_POST['type'])){$value3=$_POST['type'];}
if(isset($_POST['pdate'])){$value4=strtotime($_POST['pdate']);}
if(isset($_POST['wpro'])){$value5=$_POST['wpro'];}
if(isset($_POST['wdate'])){$value6=strtotime($_POST['wdate']);}
$value7=(isset($_POST['retired'])) ? 1 : 0;


// if(isset($_POST['retired'])){$value7=$_POST['retired'];}


// $value1='A20191031';
// $value2='Mac';
// $value3='laptop';
// $value4=strtotime('10/31/2019');
// $value5='Apple';
// $value6=strtotime('2/25/2023');
// $value7=0;

// $stmt="insert into devices(servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired) values($value1,$value2,$value3,$value4,$value5,$value6,$value7)";
// $conn->query($stmt);
$stmt->bind_param("sssisii",$value1,$value2,$value3,$value4,$value5,$value6,$value7);
$stmt->execute();
$stmt->close();

// $sql="select servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired from devices";
// $result=$conn->query($sql);
// if($result->num_rows>0){
// 	while($row=$result->fetch_assoc()){

//                     echo "<tr>
//                         <td>.$row["servicetag"].</td>
//                         <td>.$row["model"].</td>
//                         <td>.$row["type"].</td>
//                         <td>.$row["purchasedate"].</td>
//                         <td>.$row["warrantyprovider"].</td>
//                         <td>.$row["warrantyexp"].</td>
//                         <td>.$row["retired"].</td>
//                     </tr>";
    
               
// 	}
		
// }else{
// 	echo "0 results";
// }
?>