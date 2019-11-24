<?php
include('function.php');
if (isset($_GET['servicetag']))
{
	$records = getAssignments($_GET['servicetag']);

} else {
	die("No Service Tag Provided");
}
?>
<?php 
$username=loggedIn();
$conn=db_connect();
$getmnglevel="select manager from users where username='$username'";
$result=$conn->query($getmnglevel) or die($conn->error);
$row=$result->fetch_assoc();

$mnglevel= $row['manager'];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>assignments</title>
</head>

<body>
	
	  <?php echo "Welcome, ".$username."! ";
        echo " | ";
        if($mnglevel==0){
    echo "you are not a manager.";
}
	if($mnglevel==1){
    echo "<a href='manage.php'>Manage users</a>";
}
echo " | ";
echo "<a href='ch_pw_user.php'>Change password</a>";
echo " | ";
echo "<a href='list.php'>Back to list</a>";
echo " | ";
echo "<a href='login.php'>Log out</a>";

         ?>
	<h2>Assignment History for <?php echo $_GET['servicetag']; ?></h2>
	<table border="1">
		<tr>
			<th>Assigned User</th>
			<th>Date Assigned</th>
			<th>Date Returned</th>
		</tr>	
			
	<?php
	foreach ((array)$records as $assignment)
	{
		echo "		<tr>\n";
		echo "			<td>".$assignment['assignedUser']."</td>\n";
		echo "			<td>".$assignment['assignmentStart']."</td>\n";
		echo "			<td>".$assignment['assignmentEnd']."</td>\n";
		echo "		</tr>\n";
	}
	?>
	</table>
	
	<h3>Assign to New User</h3>
	<form action="process_assign.php" method="post">
	<div>
		<label for="assignedUser">New User:</label>
		<input type="text" name="assignedUser" />
	</div>	
	<div>
		<label for="assignmentStart">Assignment Date:</label>
		<input type="text" name="assignmentStart" />
	</div>
		
	<input type="hidden" name="servicetag" value="<?php echo $_GET['servicetag'];?>" />
	<input type="submit" name="submitAssignment" value="Assign" />
	</form>
</body>
</html>