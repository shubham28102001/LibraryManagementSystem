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
<h1>Lost Damaged Book</h1>

<form action="CreateProfile.php" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"/></td>
</tr>
<tr>
    <td>Copy Number</td>
    <td><input type="text" name="copynumber"/></td>
</tr>

<tr>
    <td>Last User of Book</td>
    <td><input type="text" name="lastuserofbook"/></td>
</tr>

<tr>
    <td>Amount to be charged</td>
    <td><input type="text" name="charge"/></td>
</tr>

</table>

<tr>
    <td>Return in Damaged Condition</td>

</tr>

<table>
<select>
  <option value="yes">Yes</option>
  <option value="no">no</option>
</select>
</table>

<input type="submit" value="Look for the last user"/>
<input type="submit" value="Submit"/>
<input type="submit" value="cancel"/>


</form>



</body>
</html>