<?php 
include "function.php";
$conn=db_connect();
$query1="select username,pw,last,manager from users";
$result=$conn->query($query1) or die($conn->error);

//if this user is not manager, kick them out!
$username=loggedIn();
$query2="select manager from users where username='$username'";
$result2=$conn->query($query2) or die($conn->error);
$row2=$result2->fetch_assoc();
if($row2['manager']==0){
	header('Location:list.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Manage users</title>
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
	  <?php 
    echo "Welcome, ".$username."! ";
     
  

echo " | ";
echo "<a href='ch_pw_user.php'>Change password</a>";
echo " | ";
echo "<a href='list.php'>Back to list</a>";
echo " | ";
echo "<a href='login.php'>Log out</a>";

    ?>
	<h2 style="text-align: center;">Manage Users</h2>
	<table class="table table-light table-hover table-bordered">
		<tr>
			<th>Username</th>
			<th>Password</th>		
			<th>Manager Level</th>
			
			
			
		</tr>
		<?php
		  if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                	?>
		<tr>

			<td><?php echo $row["username"]; ?></td>

			<td><?php echo $row["pw"]; ?></td>		
			<td><?php echo $row["manager"]; ?></td>

		</tr>
	<?php }} ?>
	</table>

	<div class="col-lg-3">
	<form action="adduser.php" method="post">
		<p class="subtitle">Add User</p>
		Username:<input class="form-control" type="text" name="username"><br>
		password:<input class="form-control" type="text" name="pw"><br>
		Manager Level:<input class="form-control" type="text" name="manager"><br>
		<input class="btn btn-primary" type="submit" value="add user">
	</form>
	
	<hr>
	<form action="ch_access.php" method="post">
		<p class="subtitle">Change Manage Level (1:Manager 0:staff)</p>
		
		Username:<input class="form-control" type="text" name="username"><br>
		New Manager Level:<input class="form-control" type="text" name="manager"><br>
		<input class="btn btn-primary" type="submit" value="change">
	</form>
	
	<hr>
	<form action="ch_pw.php" method="post">
		<p class="subtitle">Change Password</p>

		Username:<input class="form-control" type="text" name="username"><br>
		New Password<input class="form-control" type="text" name="pw"><br>
		<input class="btn btn-primary" type="submit" value="change">
	</form>
	</div>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>