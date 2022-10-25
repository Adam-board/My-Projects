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

	
	<div class="header">


		<div class="page-header"><h1>Input details below to signup for exclusives</h1></div>




	</div>


	<div class="container">


		<form class="form-horizontal" action="./PHP/SignupScript.php" method="post">
			<fieldset>
				<legend>Sign up Below and make sure you have read the cookies</legend>
				 <div class="form-group">
				<label for="un">Username:</label>
				<input type="text" id="un" name="un" required placeholder="john Doe"><br><br>
				</div>
				 <div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" id="email" name="email" required placeholder="johnDoe@gmail.com"><br><br>
				</div>
				 <div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" id="pwd" name="pwd" required placeholder="Password"><br>
				<small>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character</small><br>
				</div>
				 <div class="form-group">
				<label for="confirm">Re-Enter Password:</label>
				<input type="password" id="confirm" name="confirm" required placeholder="Password"><br>
				</div>
				 <div class="form-group">
				<input type="submit" value="Submit">
				</div>
				<p>Already have an account? <a href="./signin.php">Sign-in</a></p>
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