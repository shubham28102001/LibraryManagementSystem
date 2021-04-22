


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
?>
<body>
<h1>Add or Update Books</h1>

<form action="AddNewBook.php" method="post">
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"/></td>
</tr>
<br>
<tr>
    <td>Title</td>
    <td><input type="text" name="title"/></td>
</tr>
<br>
<tr>
    <td>Author 1</td>
    <td><input type="text" name="author1"/></td>
</tr>
<br>
<tr>
    <td>Author 2</td>
    <td><input type="text" name="author2"/></td>
</tr>
<br>
<tr>
    <td>Quantity</td>
    <td><input type="text" name="quantity"/></td>
</tr>
<br>
<tr>
    <td>Edition</td>
    <td><input type="text" name="edition"/></td>
</tr>
<br>
<tr>
    <td>Cost</td>
    <td><input type="text" name="cost"/></td>
</tr>
<br>
<tr>
    <td>Publisher</td>
    <td><input type="text" name="publisher"/></td>
</tr>
<br>
<tr>
    <td>Publihing Place</td>
    <td><input type="text" name="publiplace"/></td>
</tr>
<br>
<tr>
    <td>Year</td>
    <td><input type="text" name="copyyr"/></td>
</tr>
<br>
<tr>
    <td>Subject</td>
    <td><input type="text" name="subname"/></td>
</tr>
<br>
<tr>
    <td>Is Reserved</td>
    <td><input type="text" name="isreserved"/></td>
</tr>
<br>
<tr>
    <td>Floor</td>
    <td><input type="text" name="floorid"/></td>
</tr>
<br>
<tr>
    <td>Shelf</td>
    <td><input type="text" name="shelfid"/></td>
</tr>
<br>
<tr>
    <td>Aisle</td>
    <td><input type="text" name="aisleid"/></td>
</tr>
<br>
<br>
</table>
<input type="submit" value="Add or Update Book"/>

</form>

<form action="AdminSummary.php" method="post">
<input type="submit" value="Back"/>
</form>

<form action="Login.php" method="post">
<input type="submit" value="Logout"/>
</form>

</body>
</html>
