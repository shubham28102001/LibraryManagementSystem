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
  color: white;
  
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
					<a class="nav-link" href="CreateProfile.php">Register</a>
				</li>
			</ul>
		</div>
		</nav><br>
<div class="col-md-8" id="main_content">	
<center><h1> <h1></center>
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
//Our SQL Query
$sql_query1 = "Select SubName, checkoutnum From (Select Month(IssueDate) AS month, SubName, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND (Month(IssueDate) = 2 OR Month(IssueDate) = 1) AND ExtenDate IS NOT NULL
	Group by month, SubName) AS V Where month = 1 Order by checkoutnum DESC LIMIT 3";
//Run our sql query
$result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
if($result1 == false)
{
	echo 'The query by ISBN failed.';
	exit();
}
//Our SQL Query
$sql_query2 = "Select SubName, checkoutnum From (Select Month(IssueDate) AS month, SubName, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND (Month(IssueDate) = 2 OR Month(IssueDate) = 1) AND ExtenDate IS NOT NULL
	Group by month, SubName) AS V Where month = 2 Order by checkoutnum DESC LIMIT 3";
//Run our sql query
$result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));	
if($result2 == false)
{
	echo 'The query by ISBN failed.';
	exit();
}
?>

<body>
<h1>Popular Subject Report</h1>
<form action="AdminSummary.php" method="post">
<table border="1" style="width:100%">
  <tr>
    <th>Month</th>
    <th>Top Subject</th>
    <th>#chechouts</th>
  </tr>
 <?php while($row1 = mysqli_fetch_array($result1)){ 
	  
	$SubName = $row1['SubName'];
	$checkoutnum = $row1['checkoutnum'];
  ?>
  <tr>
    <td>January</td>
    <td><?php echo $SubName; ?></td>
    <td><?php echo $checkoutnum; ?></td>
  </tr>
<?php
}
?>
<?php while($row2 = mysqli_fetch_array($result2)){ 
	  
	$SubName = $row2['SubName'];
	$checkoutnum = $row2['checkoutnum'];
  ?>
  <tr>
    <td>February</td>
    <td><?php echo $SubName; ?></td>
    <td><?php echo $checkoutnum; ?></td>
  </tr>
<?php
}
?>
</table>
<input type="submit" value="Back"/>
</form>

</body>
</html>