<?php
	session_start();
	if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
?>
<!DOCTYPE html>
<html lang="en">
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
			<li><a href="./signup.php">Sign-in/Sign-Up</a></li>
			<li  class="active"><a href="./home.php"><?php echo ($_SESSION["username"]); ?></a></li>
		</ul>
	</nav>

	<header class="jumbotron">
		<h1>Sports Team</h1>
		<h2>Your Personal Space</h2>
	</header>

	<br />
	<div class="header">


		<div class="page-header"><h1>Home away from home</h1></div>
	</div>

	<div class="container">
	<div class="blackText">
	<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#details">View details</a></li>
  <li><a data-toggle="tab" href="#changedetails">Change details</a></li>
  <li><a data-toggle="tab" href="#logout">Log Out</a></li>
</ul>

<div class="tab-content">
  <div id="details" class="tab-pane fade in active">
    <h3>Here is some of the info you entered</h3>
    <p>Name: <?php echo ($_SESSION["username"]); ?> <br>
	ID:  <?php echo ($_SESSION["id"]); ?> <br>
	</p>
	<form action="./PHP/Delete.php" method="post">
	<label for="user">Input Username to Confirm you want to delete the account</label> <br>
	<input type="text" id="user" name="user" required placeholder="<?php echo ($_SESSION["username"]); ?>"><br><br>
  <input type="submit" value="Delete account"> <br>
  <sub>this is a forever-lasting decision</sub>
  </form>
  </div>


  <div id="changedetails" class="tab-pane fade">
    <h3>Change Password</h3>
    <form action="./PHP/PasswordReset.php" method="post">
	<label for="newpass">New Password:</label>
	<input type="password" id="newpass" name="newpass" required placeholder="Password"><br>
	<small>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character</small><br>
  <input type="submit" value="Change Password">
  </form>
   <h3>Change Username</h3>
    <form action="./PHP/UsernameChange.php" method="post">
	<label for="newuser">New Username:</label>
	<input type="text" id="newuser" name="newuser" required placeholder="username"><br>
  <input type="submit" value="Change Username">
  </form>
   <h3>Change Email</h3>
    <form action="./PHP/EmailChange.php" method="post">
	<label for="newemail">New Email:</label>
	<input type="email" id="newemail" name="newemail" required placeholder="user@email.com"><br>
  <input type="submit" value="Change Email">
  </form>
  </div>

<div id="logout" class="tab-pane fade">
   <h3>Click the button to logout</h3>
    <br>
	<form action="./PHP/Logout.php" method="post">
	 <input type="submit" value="Log Out">
	</form>
	 </div>

  </div>
</div>


	</div>



	<footer>

		<a href="./JavaScript/cookies.html">Cookies</a>
		<br>
		<a href="./req.html">Requirements for Webpage</a>

	</footer>


	<script src="./JavaScript/scripts.js"></script>

	<script src="./JavaScript/jquery_functions.js"></script>
</body>
</html>


<?php } else {
		die("Access denied");
	}
	?>