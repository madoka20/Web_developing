<?php
include("functions.php");

if (isset($_POST['submitAssignment']))
{
	// user is assigning the machine to a new person
	assignDevice($_POST['serviceTag'], $_POST['assignedUser'], $_POST['assignmentStart']);
	
	echo "<script>location.replace('assignments.php?serviceTag=".$_POST['serviceTag']."');</script>";
}
?>
