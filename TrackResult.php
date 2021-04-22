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
if(isset($_POST['isbn'])) {
$isbn = $_POST['isbn'];
$_SESSION['isbn'] = $isbn;
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query1 = "SELECT S.ShelfID AS shelfid, S.AisleID AS aisleid, F.FloorID AS floorid, SU.SubName AS subname FROM book AS B, shelf AS S, floor AS F,subject AS SU
	WHERE B.ISBN = '$isbn' AND B.ShelfID = S.ShelfID AND B.SubName = SU.SubName AND S.FloorID = F.FloorID";
	$result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	if(mysqli_num_rows($result1) == 0){ 
		echo 'Book under provided ISBN does not exists';
		exit();
	}
	else{
	$sql_query2 = "CALL trackbook ('$isbn')";
    $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
	if($result2 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result2);
	$shelfid = $row['shelfid'];
	$aisleid = $row['aisleid'];
	$floorid = $row['floorid'];
	$subname = $row['subname'];
	}
}
?>

<body>
<h1>Track Book Location</h1>
<table>
<tr>
    <td>ISBN</td>
    <td><?php echo $isbn; ?></td>
</tr>
<tr>
    <td>Floor Number</td>
    <td><?php echo $floorid; ?></td>
</tr>
<tr>
    <td>Aisle Number</td>
    <td><?php echo $aisleid; ?></td>
</tr>
<tr>
    <td>Shelf Number</td>
    <td><?php echo $shelfid; ?></td>
</tr>
<tr>
    <td>Subject</td>
    <td><?php echo $subname; ?></td>
</tr>
</table>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
<form action="Login.php" method="post">
<input type="submit" value="Logout"/>
</form>
</body>
</html>