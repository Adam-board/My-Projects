<?php

require_once('connect.php');
 
    $username = strip($_POST['un']);
    $email = strip($_POST['email']);
    $password = validatePassword(strip($_POST['pwd']));
    $confirm = strip($_POST['confirm']);


    function strip($x)
	{
		// done to avoid XSS and SQLi
		$x = trim($x); // removes extra space, tab, newline, etc
		$x = stripslashes($x); // removes slashes
		
		return $x;
	}

    function validatePassword($x) {
		
		 if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $x)) {
			die ("<p style='color: red'>Password not strong enough</p>");
		
		}
		return $x;
	}

    if ($password != $confirm) {
        die('Passwords don`t match');
        
    }


    $sql = "SELECT Email FROM TheUsers WHERE Email = ?";
    $stmtm = $conn->prepare($sql);
    $stmtm->bind_param("s", $_POST['email']); 
    $stmtm->execute();
    $result = $stmtm->get_result();

    $stmt = $conn -> prepare("INSERT INTO TheUsers (username,Email,Password) VALUES (?,?,?)");
    $stmt -> bind_param("sss",$username,$email, $password);
    $email = $_POST['email'];

    if ($result->num_rows > 0) {
        die('<p style="color:red">Email address already exists!</p>');
       
        
    }
    $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    $stmt->execute();
    header("Location: ../signin.php");
	?>