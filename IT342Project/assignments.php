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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <style>
      	.subtitle{
			font-size: 20px;
			margin-top: 10px;
		}
      </style>
</head>

<body>
	<nav class="navbar navbar-light bg-light navbar-expand-sm">
        <div class="container">
            <div class="navbar-brand" href="#">CTS Computer Inventory</div>
            <div class="navbar-nav">
                <div class="dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="devices" aria-haspopup="true" aira-expanded="false">Devices</a>
                    <div class="dropdown-menu" aria-labelledby="devices">
                        <a href="list.php" class="dropdown-item">List</a>
                        <a href="form.php" class="dropdown-item">Add Device</a>
                        <a href="list_retired.php" class="dropdown-item">Retired Devices</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="reports" aria-haspopup="true" aira-expanded="false">Reports</a>
                    <div class="dropdown-menu" aria-labelledby="reports">
                        <a href="#" class="dropdown-item">Report 1</a>
                        <a href="#" class="dropdown-item">Report 2</a>
                        <a href="#" class="dropdown-item">Report 3</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
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
	<h2 style="text-align: center;">Assignment History for <?php echo $_GET['servicetag']; ?></h2>
	<table  class="table table-light table-hover table-bordered">
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
	<div class="col-lg-3">
	<p class="subtitle">Assign to New User</p>
	
	<form action="process_assign.php" method="post">
	<div>
		<label for="assignedUser">New User:</label>
		<input class="form-control" type="text" name="assignedUser" />
	</div>	
	<div>
		<label for="assignmentStart">Assignment Date:</label>
		<input class="form-control" type="text" name="assignmentStart" />
	</div>
		
	<input type="hidden" name="servicetag" value="<?php echo $_GET['servicetag'];?>" />
	<input class="btn btn-primary" style="margin-top:10px;" type="submit" name="submitAssignment" value="Assign" />
	</form>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>