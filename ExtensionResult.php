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
if(isset($_POST['issueid'])) {
$issueid = $_POST['issueid'];
$_SESSION['issueid'] = $issueid;
$today = date("Y-m-d");
$today_copy = new DateTime($today);
$plus = strtotime("+14 day", time());
$estimate = date('Y-m-d', $plus);
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT ExtenDate, IssueDate, ReturnDate, IsChecked, FuRequester, NumExten FROM issue AS I, book AS B, bookcopy AS BC
	WHERE I.IssueID = '$issueid' AND I.ISBN = B.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID";
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
$row = mysqli_fetch_array($result);
$ischecked = $row['IsChecked'];

$sql_query = "SELECT IsFaculty FROM student_faculty AS SF WHERE SF.Username = '$username'";
    $result1 = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
$row1 = mysqli_fetch_array($result1);
$isfaculty = $row1['IsFaculty'];

$furequester = $row['FuRequester'];
$ori_extendate = $row['ExtenDate'];
$ori_issuedate = $row['IssueDate'];
$ori_issuedate_copy = new DateTime($ori_issuedate);
$ori_returndate = $row['ReturnDate'];
$numexten = $row['NumExten'];
if($isfaculty == 0) {
	date_modify($ori_issuedate_copy, '+28 day');
	$max_allowedreturndate = date_format($ori_issuedate_copy, 'Y-m-d');
	$new_extendate = null;
	$new_returndate = null;
	if($ischecked == 1) {
		if($furequester == null){
			if($numexten < 2) {
				$new_extendate = $today;
				date_modify($today_copy, '+14 day');
				$new_returndate = date_format($today_copy, 'Y-m-d');
				if($new_returndate > $max_allowedreturndate){
					$new_returndate = $max_allowedreturndate;
				}
				$numexten = $numexten + 1;
			} else {
				echo 'You are not allowed to extend because you are only allowed to extend maximum two times.';
			}	
		} else {
			echo 'You are not allowed to extend because someone has made a future hold request.';
		}
	} else {
		echo 'This book has not been checked out yet.';
	}
} else {
	date_modify($ori_issuedate_copy, '+70 day');
	$max_allowedreturndate = date_format($ori_issuedate_copy, 'Y-m-d');
	$new_extendate = null;
	$new_returndate = null;
	if($ischecked == 1) {
		if($furequester == null){
			if($numexten < 5) {
				$new_extendate = $today;
				date_modify($today_copy, '+14 day');
				$new_returndate = date_format($today_copy, 'Y-m-d');
				if($new_returndate > $max_allowedreturndate){
					$new_returndate = $max_allowedreturndate;
				}
				$numexten = $numexten + 1;
			} else {
				echo 'You are not allowed to extend because you are only allowed to extend maximum five times.';
			}	
		} else {
			echo 'You are not allowed to extend because someone has made a future hold request.';
		}
	} else {
		echo 'This book has not been checked out yet.';
	}
}
$_SESSION['issuedate'] = $ori_issuedate;
$_SESSION['extendate'] = $new_extendate;
$_SESSION['returndate'] = $new_returndate;
$_SESSION['numexten'] = $numexten;
}
?> 

<body>
<h1>Request Extension On a Book</h1>
<table>
<tr>
    <td>Original Checkout Date</td>
    <td><?php echo $ori_issuedate; ?></td>
</tr>

<tr>
    <td>Current Extension Date</td>
    <td><?php echo $ori_extendate; ?></td>
</tr>

<tr>
    <td>New Extension Date</td>
    <td><?php echo $new_extendate; ?></td>
</tr>

<tr>
    <td>Current Return Date</td>
    <td><?php echo $ori_returndate; ?></td>
</tr>

<tr>
    <td>New Estimated Return Date</td>
    <td><?php echo $new_returndate; ?></td>
</tr>
</table>
<form action="ConfirmExten.php" method="post">
<input type="submit" value="Submit"/>
</form>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
</body>
</html>