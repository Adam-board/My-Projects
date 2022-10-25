
<?php
	session_start();
	if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
	header("location: ./home.php");
	}
	else {
?>

<!doctype html>

<html lang="en">
<?php
include_once('header.php');
?>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
		<ul class="nav navbar-nav">
			<li><a href="./index.php">Home</a></li>
			<li><a href="./meetband.php">Meet The Band</a></li>
			<li class="active"><a href="./signup.php">Sign-in/Sign-Up</a></li>
		</ul>
	</nav>

	<header class="jumbotron">
		<h1>Sports Team</h1>
		<h2>Sign-Up</h2>
	</header>

	<br />
	<div class="header">


		<div class="page-header"><h1>Input login details to access the exclusive content</h1></div>
	</div>

	<div class="container">


		<form action="./PHP/SigninScript.php" method="post">
			<fieldset>
				<legend>Sign In</legend>
				<label for="un">Username:</label>
				<input type="text" id="un" name="un" required placeholder="JohnDoe"><br><br>
				<label for="pwd">Password:</label>
				<input type="password" id="pwd" name="pwd" required placeholder="Password"><br>
				<input type="submit" value="Submit">

				<p>Don't have an account? <a href="./signup.php">Sign-up</a></p>
			</fieldset>
		</form>
	</div>

	<br>
	<br>


	<footer>

		<a href="./JavaScript/cookies.html">Cookies</a>
		<br>
		<a href="./req.html">Requirements for Webpage</a>

	</footer>


	<script src="./JavaScript/scripts.js"></script>

	<script src="./JavaScript/jquery_functions.js"></script>
</body>
</html>


<?php } ?>




