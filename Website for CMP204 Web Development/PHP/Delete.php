<?php

require_once('connect.php');

$username =  strip($_POST['user']);

 function strip($x)
	{
		// done to avoid XSS and SQLi
		$x = trim($x); // removes extra space, tab, newline, etc
		$x = stripslashes($x); // removes slashes
		
		return $x;
	}



if($_SERVER["REQUEST_METHOD"] === "POST"){
session_start();
	
if ($username == $_SESSION['username']) {

	$sql = "DELETE FROM TheUsers WHERE id = ?";
	
	$id = $_SESSION['id'];

	if ( $stmt = $conn->prepare($sql)) {
		 $stmt->bind_param("s", $id);

		if ($stmt->execute()) {
		$_SESSION = array();
		session_destroy();
			echo("User Account has been deleted!");
			header("location: ../signin.php");
		}
		else {
			echo("<p style='color: red'> There was an error </p>");

		}
}
}
else {
 echo("Please enter the username of the account to delete it!");
}
 $conn->close();
 }
?>