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
$isbn = null;
$copyid = null;
if(isset($_POST['issueid']) and isset($_POST['isdamaged'])){
	$issueid = $_POST['issueid'];
	$isdamaged = $_POST['isdamaged'];
	$_SESSION['issueid']=$issueid;
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query = "SELECT I.ISBN AS isbn, I.CopyID AS copyid, I.ReturnDate AS returndate FROM issue AS I WHERE I.IssueID = '$issueid'";
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	if($result == false){
		echo 'The query failed.';
		exit();
	}
	$numrow = mysqli_num_rows($result);
	if($numrow == 0){
		echo 'Wrong issue ID';
	} else {
		$row = mysqli_fetch_array($result);
		$isbn = $row['isbn'];
		$copyid = $row['copyid'];
		$_SESSION['isbn']=$isbn;
		$_SESSION['copyid']=$copyid;
		$returndate = $row['returndate'];
		$returndate_copy = new DateTime($returndate);	
		$today = date("Y-m-d");
		$today_copy = new DateTime($today);
		$interval = $today_copy->diff($returndate_copy)->days; // returndate_copy - today_copy
		$invert = $today_copy->diff($returndate_copy)->invert;
		if($invert == 1) {
			$this_penalty = $interval * 2;
			$sql_query = "CALL returnbook ('$username', '$this_penalty')";
			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));	
			if($result == false)
			{
				echo 'The query failed.';
				exit();
			}
		}			
		$sql_query = "UPDATE bookcopy AS BC SET IsChecked = 0 WHERE BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));	
		if($result == false)
		{
			echo 'The query failed.';
			exit();
		}
		echo 'Return Success';
		if($isdamaged == 1){
			header('Location: LostDamagedBook_User.php');
		}
	}
}
?> 

<body>
<h1>Return Book</h1>

<form action="" method="post">
<table>
<tr>
    <td>Enter your issue ID</td>
    <td><input type="text" name="issueid" required/></td>
</tr>
<tr>
    <td>ISBN</td>
    <td><?php echo $isbn; ?></td>
</tr>
<tr>
    <td>Copy Number</td>
    <td><?php echo $copyid; ?></td>
</tr>

<tr>
    <td>Username</td>
    <td><?php echo $username; ?></td>
</tr>

</table>

<tr>
    <td>Return in Damaged Condition</td>
</tr>

<table>
<select name="isdamaged">
  <option value="0">No</option>
  <option value="1">Yes</option>
</select>
</table>
<input type="submit" value="Return"/>
</form>

<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>


</body>
</html>