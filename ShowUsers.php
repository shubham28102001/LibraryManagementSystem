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
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$username = $_SESSION['username'];
$sql_query = "CALL listusers()";
$result_sqlquery = mysqli_query($link, $sql_query) or die(mysqli_error($link));
if($result_sqlquery == false) {
    echo 'The query by ISBN failed.';
	exit();
}
?>

<body>
<h1>Users of the Library</h1>
<form action="AdminSummary.php" method="post">
<table border="1" style="width:100%">
  <tr>
    <th>Username</th>
    <th>Name</th>
    <th>DOB</th>
    <th>Email</th>
    <th>Gender</th>
    <th>IsFaculty</th>
    <th>Penalty</th>
    <th>Department</th>
    <th>Address</th>
  </tr>
 <?php while($row = mysqli_fetch_array($result_sqlquery)){ 
	  
    $username = $row['Username']; 
    $name = $row['Name']; 
    $dob = $row['DOB']; 
    $email = $row['Email']; 
    $gender = $row['Gender']; 
    $isfaculty = $row['IsFaculty']; 
	$penalty = $row['Penalty'];
    $department = $row['Dept']; 
	$address = $row['Address'];
  ?>
    <tr></tr>
    <td><?php echo $username; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $dob; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $gender; ?></td>
    <td><?php echo $isfaculty; ?></td>
    <td><?php echo $penalty; ?></td>
    <td><?php echo $department; ?></td>
    <td><?php echo $address; ?></td>
<?php
}
?>
</table>
<input type="submit" value="Back"/>
</form>

</body>
</html>