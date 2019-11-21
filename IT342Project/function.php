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

function getAssignments($serviceTag)
{
	// connect to db
	$conn = connect_db();
	// create prepared statement
	$stmt = $conn->prepare("SELECT assignmentID, serviceTag, assignedUser, assignmentStart, assignmentEnd FROM assignments where serviceTag = ? order by assignmentStart desc");
	// bind parameter
	$stmt->bind_param("s", $st);
	// insert value in to parameter
	$st = $serviceTag;
	// execute query
	$stmt->execute();
	// bind result tells it where to put the values it retrieves for the row
	$stmt->bind_result($assignmentID, $serviceTag, $assignedUser,
					   $assignmentStart, $assignmentEnd);
	$i=0;
	// putting this fetch in a while loop tells it to keep going as long 
	// as there are records
	while ($stmt->fetch())
	{
		// put the values in a multi-dimensional array
		$r[$i]['assignmentID'] = $assignmentID;
		$r[$i]['serviceTag'] = $serviceTag;
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
function getCurrentAssignment ($serviceTag)
{
	// connect to db
	$conn = connect_db();
	// create prepared statement
	$stmt = $conn->prepare("SELECT assignmentID, serviceTag, assignedUser, assignmentStart FROM assignments where serviceTag = ? and assignmentEnd IS NULL");
	// bind parameter
	$stmt->bind_param("s", $st);
	// insert value in to parameter
	$st = $serviceTag;
	// execute query
	$stmt->execute();
	// bind result tells it where to put the values it retrieves for the row
	$stmt->bind_result($assignmentID, $serviceTag, $assignedUser, $assignmentStart);
	if ($stmt->fetch())
	{
		return $assignmentID;
	} else {
		return 0;
	}
}

/*------------------------------------
// This function assigns a device to a user
------------------------------------*/
function assignDevice($serviceTag, $assignedUser, $assignmentStart)
{
	$conn = connect_db();
	// Check to see if it's currently assigned to someone
	$assignmentID = getCurrentAssignment($serviceTag);
	if ($assignmentID != 0)
	{
		// it is, so end that assignement before doing a new one.
		endAssignment($assignmentID, $assignmentStart);
	}

	// create prepared statement
	if (!$stmt = $conn->prepare("INSERT INTO assignments(serviceTag, assignedUser, assignmentStart) values (?, ?, ?)"))
	{
		die("Error preparing Statement: ".$conn->error);
	}
	// bind parameter
	$stmt->bind_param("sss", $st, $au, $as);
	// insert value in to parameter
	$st = $serviceTag;
	$au = $assignedUser;
	$as = $assignmentStart;
	// execute query
	$stmt->execute();
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
	
	$conn = connect_db();
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
	$stmt->execute();
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