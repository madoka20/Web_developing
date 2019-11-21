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
echo "Welcome, ".$username."! ";
echo "<a href='list.php'>Back to list</a>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Manage users</title>
	<style>
		table{
			border-collapse: collapse;
		}
		table th{
			border:1px solid #000;
			
		}
		table td{
			border:1px solid #000;
			
		}
	</style>
</head>
<body>
	<h3>Manage Users</h3>
	<table>
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


	<form action="adduser.php" method="post">
		<p>Add User</p>
		Username:<input type="text" name="username"><br>
		password:<input type="text" name="pw"><br>
		Manager Level:<input type="text" name="manager"><br>
		<input type="submit" value="add user">
	</form>
	

	<form action="ch_access.php" method="post">
		<p>Change Manage Level (1:Manager 0:staff)</p>
		
		Username:<input type="text" name="username"><br>
		New Manager Level:<input type="text" name="manager"><br>
		<input type="submit" value="change">
	</form>

	<form action="ch_pw.php" method="post">
		<p>Change Password</p>

		Username:<input type="text" name="username"><br>
		New Password<input type="text" name="pw"><br>
		<input type="submit" value="change">
	</form>

</body>
</html>