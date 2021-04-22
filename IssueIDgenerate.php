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
$isbn = $_POST['ISBN'];
$_SESSION['isbn'] = $isbn;
$username = $_SESSION['username'];
$today = date("Y-m-d");
$plus = strtotime("+14 day", time());
$estimate = date('Y-m-d', $plus);
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query = "SELECT MAX(IssueID) AS issueid FROM issue";
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
$row = mysqli_fetch_array($result);
$issueid = $row['issueid'];
$newisssueid = $issueid + 1;
	$mincopyidstatement = "SELECT MIN(CopyId) AS copyid FROM bookcopy AS BC WHERE BC.ISBN = '$isbn' AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
    $result = mysqli_query ($link, $mincopyidstatement)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
$row = mysqli_fetch_array($result);
$copyid = $row['copyid'];
	$insertissue = "CALL issuebook ('$username', '$isbn', '$copyid', '$newisssueid', '$today', '$estimate')";
	$result = mysqli_query ($link, $insertissue)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
?>

<body>
<table>
<tr>
    <td>YOUR Issue ID</td>
    <td><?php echo $newisssueid; ?></td>
</tr>
</table>
<table>
<tr>
	<td>YOUR Copy ID</td>
    <td><?php echo $copyid; ?></td>
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