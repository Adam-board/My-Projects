<?php

require_once('connect.php');


$username =  strip($_POST['un']);
$password = strip($_POST['pwd']);
 




 function strip($x)
	{
		// done to avoid XSS and SQLi
		$x = trim($x); // removes extra space, tab, newline, etc
		$x = stripslashes($x); // removes slashes
		
		return $x;
	}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    // Validate credentials
   
       
        $sql = "SELECT ID, username, password FROM TheUsers WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
        
           
            $stmt->bind_param("s", $username);
            
           
            if($stmt->execute()){
               
                $stmt->store_result();
                
                
                if($stmt->num_rows == 1){                    
                   
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                          
                            session_start();
                            
                           
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            
                            header("Location: ../home.php");
                        } else{
                            echo("username or password is not valid or does not exist");
                           header("Location: ../signin.php");
                        }
                    }
                } else{
                    echo("username or password is not valid or does not exist");
                    header("Location: ../signin.php");
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            $stmt->close();
    }
    
  
    $conn->close();
}
?>