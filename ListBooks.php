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
$sql_query = "CALL listbooks()";
$result_sqlquery = mysqli_query($link, $sql_query) or die(mysqli_error($link));
if($result_sqlquery == false) {
    echo 'The query by ISBN failed.';
	exit();
}
?>

<body>
<h1>Books in the Library</h1>
<form action="UserSummary.php" method="post">
<table border="1" style="width:100%">
  <tr>
    <th>ISBN</th>
    <th>Title</th>
    <th>Edition</th>
    <th>Publication Year</th>
    <th>Is Reserved</th>
    <th>Publisher</th>
    <th>Publication Place</th>
  </tr>
 <?php while($row = mysqli_fetch_array($result_sqlquery)){ 
	  
    $ISBN = $row['ISBN']; 
	$Title = $row['Title'];
    $Edition = $row['Edition']; 
	$PublicationYear = $row['CopyYr'];
    $IsReserved = $row['IsReserved']; 
	$Publisher = $row['Publisher'];
    $PublicationPlace = $row['PubliPlace']; 
  ?>
    <tr></tr>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Title; ?></td>
    <td><?php echo $Edition; ?></td>
    <td><?php echo $PublicationYear; ?></td>
    <td><?php echo $IsReserved; ?></td>
    <td><?php echo $Publisher; ?></td>
    <td><?php echo $PublicationPlace; ?></td>
<?php
}
?>
</table>
<input type="submit" value="Back"/>
</form>

</body>
</html>