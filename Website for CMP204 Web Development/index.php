<!doctype html>

<html lang="en">
<?php
include_once('header.php');
include_once('navbar.php');

?>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
		<ul class="nav navbar-nav">
			<li class="active"><a href="./index.php">Home</a></li>
			<li><a href="./meetband.php">Meet The Band</a></li>
			<li><a href="./signup.php">Sign-in/Sign-Up</a></li>
		</ul>
	</nav>

	<header class="jumbotron">
		<h1>Sports Team</h1>
		<h2>"Too pretty to fight"</h2>
	</header>

	<br />

	<div class="header">


		<div class="page-header"><h1>Welcome</h1></div>

	</div>

	<button id="Spotify">Don't like youtube, click here for spotify</button>
	<div class="iframe-wrapper">
		<iframe width="1274" height="726" src="https://www.youtube.com/embed/watch?v=uYVsEMPwmA8&list=PLkvF9vd8a1C0ikWL5ql6i_q9867AyoyZn&ab_channel=SportsTeamVEVO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

	<div class="container">
		<div class="header">
			<h2><b>Click button below to read an interview on the lead singer</b></h2>

			<button id="interview">Interview</button>


			<section class="item"></section>
		</div>

	</div>




	<footer>

		<a href="./JavaScript/cookies.html">Cookies</a>
		<br>
		<a href="./req.html">Requirements for Webpage</a>
	</footer>

	<script src="./JavaScript/scripts.js"></script>
	<script src="./JavaScript/scriptsforajax.js"></script>
	<script src="./JavaScript/jquery_functions.js"></script>
</body>
</html>



