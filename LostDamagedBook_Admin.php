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
$isbn = null;
$copyid = null;
$username = $_SESSION['username'];
$currentime = date("Y-m-d H:i");
$Name = null;
$_SESSION['target'] = "AdminSummary.php";
if(isset($_POST['isbn']) and isset($_POST['copynumber'])){
	$isbn = $_POST['isbn'];
	$copyid = $_POST['copynumber'];
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query = "SELECT MAX(IssueID) AS last_issueid FROM issue AS I WHERE I.ISBN = '$isbn' AND I.CopyID = '$copyid'";
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	if($result == false){
		echo 'The query failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$last_issueid = $row['last_issueid'];
	mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query = "SELECT SF.Username, Name FROM issue AS I, student_faculty AS SF WHERE I.IssueID = '$last_issueid' AND I.Username = SF.Username";
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	if($result == false){
		echo 'The query failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$Name = $row['Name'];
	$chargename = $row['Username'];
	$_SESSION['chargename'] = $chargename;
}
?>

<body>
<h1>Lost Damaged Book</h1>

<form action="" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" value="<?php echo $isbn; ?>" required/></td>
</tr>
<tr>
    <td>Copy Number</td>
    <td><input type="text" name="copynumber" value="<?php echo $copyid; ?>" required/></td>
</tr>

<tr>
    <td>Current Time</td>
    <td><?php echo $currentime; ?></td>
</tr>
</table>
<input type="submit" value="Look for the last user"/>
</form>

<form action="ConfirmDamage.php" method="post">
<table>
<tr>
    <td>Last User of Book</td>
    <td><?php echo $Name; ?></td>
</tr>

<tr>
    <td>Amount to be charged</td>
    <td><input type="text" name="charge" required/></td>
</tr>

</table>
<input type="submit" value="Submit"/>
</form>

<form action="AdminSummary.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>