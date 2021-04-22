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
if(isset($_POST['isbn'])) {
$availdate = null;
$copyid = null;
$isbn = $_POST['isbn'];
$_SESSION['isbn'] = $isbn;
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$copynum = $row['copynum'];
	if($copynum == 0) {
		$today = date("Y-m-d");
		$sql_query = "SELECT MIN(ReturnDate) AS availdate FROM book AS B, bookcopy AS BC, issue AS I WHERE B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND BC.ISBN = I.ISBN AND IsReserved = 0 AND IsDamaged = 0 AND BC.CopyID = I.CopyID AND (IsHold = 1 OR IsChecked = 1) AND ReturnDate > '$today'";
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
		if($result == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
		$numrow = mysqli_num_rows($result);
		if($numrow != 0) {
			$row = mysqli_fetch_array($result);
			$availdate = $row['availdate'];
			$sql_query = "SELECT BC.CopyID AS copyid FROM book AS B, bookcopy AS BC, issue AS I WHERE B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND BC.ISBN = I.ISBN AND IsReserved = 0 AND BC.CopyID = I.CopyID AND (IsHold = 1 OR IsChecked = 1) AND ReturnDate > '$today' AND ReturnDate = '$availdate'";
			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'The query by ISBN failed.';
				exit();
			}
			$row = mysqli_fetch_array($result);
			if(isset($row['copyid'])){
				$copyid = $row['copyid'];
				$sql_query = "SELECT BC.FuRequester AS furequester FROM bookcopy AS BC WHERE BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";
				$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
				if($result == false)
				{
					echo 'The query by ISBN failed.';
					exit();
				}
			}
			$row = mysqli_fetch_array($result);
			if(isset($row['furequester'])){
				$furequester = $row['furequester'];
				if($furequester == null) {
					$sql_query = "UPDATE bookcopy AS BC SET FuRequester = '$username' WHERE BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";
					$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
					if($result == false)
					{
						echo 'The query by ISBN failed.';
						exit();
					}
					echo 'Future Hold Success';
				} else {
					echo 'Someone have already made future hold request, sorry.';
				}
			}
		} else {
			echo 'This book is on reserve or damaged.';
		}
	} else {
		echo 'There are available copies right now, please go back and make a hold request.';
	}
}
?>
<html>
<body>
<h1>Future Hold Request for a Book</h1>
<table>
<tr>
    <td>Copy number</td>
    <td><?php echo $copyid; ?></td>
</tr>

<tr>
    <td>Expected Available Date</td>
    <td><?php echo $availdate; ?></td>
</tr>
</table>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
<form action="Login.php" method="post">
<input type="submit" value="Close"/>
</form>
</body>
</html>