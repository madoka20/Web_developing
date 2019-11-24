<?php
function loggedIn(){
	global $_COOKIE;
	if(isset($_COOKIE['username'])){
		$username=$_COOKIE['username'];
		setcookie("username",$username,time()+1440);
	}else{
		header("Location:login.php");
	}
	return $username;

}
function createUser($username,$password,$manager=0){
$conn=db_connect();
if(!$stmt=$conn->prepare("INSERT INTO users (username,pw,manager) VALUES (?,?,?) ")){
	die( "error:".$conn->error);
}
if(!$stmt->bind_param("ssi",$username,$password,$manager)){
	die( "error:".$conn->error);
}
$password=password_hash($password,PASSWORD_BCRYPT);


if(!$stmt->execute()){
		die( "error:".$conn->error);
}
}
function getAssignments($servicetag)
{
	// connect to db
	$conn = db_connect();
	// create prepared statement
	$stmt = $conn->prepare("SELECT assignmentID, servicetag, assignedUser, assignmentStart, assignmentEnd FROM assignments where servicetag = ? order by assignmentStart desc") or die ($conn->error);
	// bind parameter
	$stmt->bind_param("s", $st);
	// insert value in to parameter
	$st = $servicetag;
	// execute query
	$stmt->execute();
	// bind result tells it where to put the values it retrieves for the row
	$stmt->bind_result($assignmentID, $servicetag, $assignedUser,
					   $assignmentStart, $assignmentEnd);
	$i=0;
	// putting this fetch in a while loop tells it to keep going as long 
	// as there are records
	$r=array();
	while ($stmt->fetch())
	{
		// put the values in a multi-dimensional array
		$r[$i]['assignmentID'] = $assignmentID;
		$r[$i]['servicetag'] = $servicetag;
		$r[$i]['assignedUser'] = $assignedUser;
		$r[$i]['assignmentStart'] = $assignmentStart;
		$r[$i]['assignmentEnd'] = $assignmentEnd;
		$i++;
	}
	$stmt->close();
	// return array
	return $r;
}
/*------------------------------------
// Get a device's current assignement
------------------------------------*/
function getCurrentAssignment ($servicetag)
{
	// connect to db
	$conn = db_connect();
	// create prepared statement
	$stmt = $conn->prepare("SELECT assignmentID, servicetag, assignedUser, assignmentStart FROM assignments where servicetag = ? and assignmentEnd IS NULL");
	// bind parameter
	$stmt->bind_param("s", $st);
	// insert value in to parameter
	$st = $servicetag;
	// execute query
	$stmt->execute();
	// bind result tells it where to put the values it retrieves for the row
	$stmt->bind_result($assignmentID, $servicetag, $assignedUser, $assignmentStart);
	if ($stmt->fetch())
	{
		return $assignmentID;
	} else {
		return 0;
	}
}
function getCurrentUser ($servicetag)
{
	// connect to db
	$conn = db_connect();
	// create prepared statement
	$stmt = $conn->prepare("SELECT assignmentID, servicetag, assignedUser, assignmentStart FROM assignments where servicetag = ? and assignmentEnd IS NULL");
	// bind parameter
	$stmt->bind_param("s", $st);
	// insert value in to parameter
	$st = $servicetag;
	// execute query
	$stmt->execute();
	// bind result tells it where to put the values it retrieves for the row
	$stmt->bind_result($assignmentID, $servicetag, $assignedUser, $assignmentStart);
	if ($stmt->fetch())
	{
		return $assignedUser;
	} else {
		return 'unassigned';
	}
}
/*------------------------------------
// This function assigns a device to a user
------------------------------------*/
function assignDevice($servicetag, $assignedUser, $assignmentStart)
{
	$conn = db_connect();
	// Check to see if it's currently assigned to someone
	$assignmentID = getCurrentAssignment($servicetag);
	if ($assignmentID != 0)
	{
		// it is, so end that assignement before doing a new one.
		endAssignment($assignmentID, $assignmentStart);
	}

	// create prepared statement
	if (!$stmt = $conn->prepare("INSERT INTO assignments(servicetag, assignedUser, assignmentStart) values (?, ?, ?)"))
	{
		die("Error preparing Statement: ".$conn->error);
	}
	// bind parameter
	$stmt->bind_param("sss", $st, $au, $as);
	// insert value in to parameter
	$st = $servicetag;
	$au = $assignedUser;
	$as = $assignmentStart;
	// execute query
	if(!$stmt->execute()){
		die("Error execute: " .$conn->error);
	}
	
}

/*------------------------------------
// End an assignment to a user
------------------------------------*/
function endAssignment($assignmentID, $assignmentEnd = 0)
{
	// if no end date provided, use today
	if ($assignmentEnd == 0)
	{
		$assignmentEnd = date("Y-n-j");
	}
	
	$conn = db_connect();
	// create prepared statement
	if (!$stmt = $conn->prepare("update assignments set assignmentEnd = ?
					where assignmentID = ?"))
	{
		die("Error preparing Statement: ".$conn->error);
	}
	// bind parameter
	$stmt->bind_param("si", $ae, $id);
	// insert value in to parameter
	$ae = $assignmentEnd;
	$id = $assignmentID;
	// execute query
	if(!$stmt->execute()){
		die("Error execute: " .$conn->error);
	}
}

function db_connect(){
$servername="localhost";
$username="fumx17";
$password="1173790";
$db="fumx17";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed：".$conn->connect_error);
} 
// echo "connect successfully";
return $conn;
}
function db_disconnect($conn){
   $conn->close(); 
}


?>