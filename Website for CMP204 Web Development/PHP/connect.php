<?php
    //DB Connection
    $servername = "lochnagar.abertay.ac.uk";
    $username = "sql2005335";
    $password = "BYMJSp6FY9KA";
    $dbname = "sql2005335";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo"Database Connection Failed";
    }
    else{
        return $conn;
    }
?>