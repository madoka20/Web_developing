<?php
include("function.php");

if (isset($_POST['submitAssignment']))
{
	// user is assigning the machine to a new person
	assignDevice($_POST['servicetag'], $_POST['assignedUser'], $_POST['assignmentStart']);
	
	echo "<script>location.replace('assignments.php?servicetag=".$_POST['servicetag']."');</script>";
}
?>
