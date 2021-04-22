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
  	<style type="text/css">
  		#side_bar{
  			background-color: antiquewhite;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
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
	<span><marquee>Welcome to Curio Libary. Library opens at 6:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>Library Timing</h5>
			<ul>
				<li>Opening Timing: 6:00 AM</li>
				<li>Closing Timing: 8:00 PM</li>
				<li>(Sunday and Saturday off)</li>
			</ul>
			<h5>What we provide ?</h5>
			<ul>
				<li>All types of Books</li>
				<li>Free Wi-fi</li>
				<li>News Papers</li>
				<li>Group Discussion Room</li>
				<li>RO Water</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>	
		<div class="col-md-8" id="main_content">	
<center><h1>User Login<h1></center>


<?php
session_start(); 

if(isset($_POST['username']) and isset($_POST['password']))  { 
	$username = $_POST['username'];
	$password = $_POST['password'];
	
$_SESSION['username']=$username;

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

           $sql_query = "SELECT U.Username FROM user AS U, staff AS S WHERE U.Username = '$username' AND U.Password = '$password' AND U.Username = S.Username";  
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
				header('Location: AdminSummary.php');
			}
			else{
				$sql_query = "SELECT Username FROM user WHERE Username = '$username' AND Password = '$password'";  
           		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
				if($result == false){
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
				$sql_query = "INSERT INTO curruser (Username, Password) VALUES ('$username', '$password')";
				header('Location: UserSummary.php');
			   
			}else{ 
			$err = 'Incorrect username or password' ; 
			} 
			echo "$err";
			}
    } 
	
?>	

<form action="" method="post">
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="text" name="password" required/></td>
</tr>
</table>

<input type="Submit" value="Login"/>
</form>
<form action="NewUserRegistration.php" method="post">
<input type="Submit" value="Create Account"/>
</form>
</form>
<form action="ForgotPassword.php" method="post">
<input type="Submit" value="Forgot Password"/>
</form>


</body>
</html>