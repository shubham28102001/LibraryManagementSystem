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
$today = date("Y-m-d");
$plus = strtotime("+14 day", time());
$estimate = date('Y-m-d', $plus);
if(isset($_POST['isbn']) and isset($_POST['copyid']) and isset($_POST['issueid']))  {
	$isbn = $_POST['isbn'];
	$copyid = $_POST['copyid'];
	$issueid = $_POST['issueid'];
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query = "SELECT MAX(IssueID) AS givenissueid, IsChecked FROM issue AS I, bookcopy AS BC Where I.ISBN = '$isbn' AND I.CopyID = '$copyid' AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID";
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$givenissueid = $row['givenissueid'];
	$ischecked = $row['IsChecked'];
	if($ischecked == 1) {
		echo 'Error: This book is checked out.';
	} 
	elseif($issueid == $givenissueid) {
		$sql_query = "CALL checkoutbook ('$isbn', '$copyid', '$issueid', '$today', '$estimate')";
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
		if($result == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
		header('Location: ConfirmCheckout.php');		
	} else {
		echo 'Wrong IssueID';
	}
}
?> 

<body>
<h1>Book Checkout</h1>

<form action="" method="post">
<table>
<tr>
    <td>Issue ID</td>
    <td><input type="text" name="issueid" required/></td>
</tr>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
<tr>
    <td>Copy Number</td>
    <td><input type="text" name="copyid" required/></td>
</tr>

<tr>
    <td>Username</td>
    <td><?php echo $username; ?></td>
</tr>

<tr>
    <td>Check Out Date</td>
    <td><?php echo $today; ?></td>
</tr>

<tr>
    <td>Estimated Return Date</td>
    <td><?php echo $estimate; ?></td>
</tr>

</table>
<input type="submit" value="Confirm"/>
</form>
<form action="UserSummary.php" method="post">
<input type="submit" value="Cancel"/>
</form>
</body>
</html>