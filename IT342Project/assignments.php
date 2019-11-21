<?php
include('function.php');
if (isset($_GET['serviceTag']))
{
	$records = getAssignments($_GET['serviceTag']);
//	print_r($records);
} else {
	die("No Service Tag Provided");
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	<h2>Assignment History for <?php echo $_GET['serviceTag']; ?></h2>
	<table border="1">
		<tr>
			<th>Assigned User</th>
			<th>Date Assigned</th>
			<th>Date Returned</th>
		</tr>	
			
	<?php
	foreach ($records as $assignment)
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
	<form action="process.php" method="post">
	<div>
		<label for="assignedUser">New User:</label>
		<input type="text" name="assignedUser" />
	</div>	
	<div>
		<label for="assignmentStart">Assignment Date:</label>
		<input type="date" name="assignmentStart" />
	</div>
		
	<input type="hidden" name="serviceTag" value="<?php echo $_GET['serviceTag'];?>" />
	<input type="submit" name="submitAssignment" value="Assign" />
	</form>
</body>
</html>