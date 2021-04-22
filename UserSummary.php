<?php
include 'dbinfo.php'; 
?>  
<html>
<head>
	<title>
	 Curio Library
	</title>
		<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style>
body {
  color: black;
  
  background-image: url('images/yale library.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="login.php"><img class="navbar-brand brand-name"       
       src="images/logo.png" alt="logo" width="160" height="160">Curio Library Mangement System</a>
				</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="Login.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Login.php">User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="NewUserRegistration.php">Register</a>
				</li>
			</ul>
		</div>
		</nav><br>
<div class="col-md-8" id="main_content">	
<center><h1> <h1></center>
<?php
session_start(); 
$username = $_SESSION['username'];
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);	
?> 

<body>


<form action="ListBooks.php" method="post">
<input type="submit" value="List Books"/>
</form>

<form action="SearchBooks.php" method="post">
<input type="submit" value="Check Avaibility and Issue Book"/>
</form>

<form action="TrackBookLocation.php" method="post">
<input type="submit" value="Track Book Location"/>
</form>

<form action="BookCheckout.php" method="post">
<input type="submit" value="Checkout Book"/>
</form>

<form action="FutureHoldRequestforaBook.php" method="post">
<input type="submit" value="Future Hold Request"/>
</form>

<form action="RequestExtensionOnaBook.php" method="post">
<input type="submit" value="Extension Request"/>
</form>

<form action="ReturnBook.php" method="post">
<input type="submit" value="Return Book"/>
</form>

<form action="ShowMyFine.php" method="post">
<input type="submit" value="Show My Fine"/>
</form>

<form action="Login.php" method="post">
<input type="submit" value="Logout"/>
</form>

</body>
</html>