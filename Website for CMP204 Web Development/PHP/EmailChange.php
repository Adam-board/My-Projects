<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

 
 session_start();

require_once('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

$newemail = strip($_POST['newemail']);



 function strip($x)
	{
		// done to avoid XSS and SQLi
		$x = trim($x); // removes extra space, tab, newline, etc
		$x = stripslashes($x); // removes slashes
		
		return $x;
	}



$sql = "UPDATE TheUsers SET email = ? WHERE id = ?";

  if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("si", $email, $id);

   
    $id = $_SESSION["id"];
    $email = $newemail;

    if($stmt->execute()){
    
                session_destroy();
                header("location: ../signin.php");
                exit();

}
else{
                echo ("Oops! Something went wrong. Please try again later.");
            }
}
  $stmt->close();

   $conn->close();
   }
?>