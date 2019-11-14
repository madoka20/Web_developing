<?php 
include "function.php";
$conn=db_connect();

$stmt=$conn->prepare("insert into devices(servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired) values(?,?,?,?,?,?,?)");

$radio_value=$_POST['radio'];
if($radio_value=="1"){
	$tags=$_POST['servicetags'];
	$value1_array=explode(",", $tags);
	$len=count($value1_array);
	for($i=0;$i<$len;$i++){
		$value1=$value1_array[$i];
		$value2=$_POST['model'];
		$value3=$_POST['type'];
		$value4=strtotime($_POST['pdate']);
		$value5=$_POST['wpro'];
		$value6=strtotime($_POST['wdate']);
		$value7=(isset($_POST['retired'])) ? 1 : 0;
		$stmt->bind_param("sssisii",$value1,$value2,$value3,$value4,$value5,$value6,$value7);
		$stmt->execute();
	}
}
if($radio_value=="0"){

$value1=$_POST['servicetag'];
$value2=$_POST['model'];
$value3=$_POST['type'];
$value4=strtotime($_POST['pdate']);
$value5=$_POST['wpro'];
$value6=strtotime($_POST['wdate']);
$value7=(isset($_POST['retired'])) ? 1 : 0;
$stmt->bind_param("sssisii",$value1,$value2,$value3,$value4,$value5,$value6,$value7);
$stmt->execute();
$stmt->close();
}
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
header("Location: list.php");
?>