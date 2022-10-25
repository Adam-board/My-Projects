<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

 
 session_start();


  function validatePassword($x) {
		
		 if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $x)) {
			die ("<p style='color: red'>Password not strong enough</p>");
		
		}
		return $x;
	}

    function strip($x)
	{
		// done to avoid XSS and SQLi
		$x = trim($x); // removes extra space, tab, newline, etc
		$x = stripslashes($x); // removes slashes
		
		return $x;
	}


require_once('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

 $newPassword = validatePassword(strip($_POST['newpass']));

 


 


$sql = "UPDATE TheUsers SET password = ? WHERE id = ?";

  if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("si", $password, $id);

    
    $password = password_hash($newPassword, PASSWORD_DEFAULT);
    $id = $_SESSION["id"];


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