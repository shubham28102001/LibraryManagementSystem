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

if($_POST['isbn'] != null)  {
	$isbn = $_POST['isbn'];  
    $quantity = $_POST['quantity'];
    $sql_query_temp = "SELECT ISBN FROM book WHERE ISBN = '$isbn'";
    $result_temp = mysqli_query ($link, $sql_query_temp)  or die(mysqli_error($link));
    if($result_temp == false)
	{
		echo 'The query failed.';
			exit();
	}
    if(mysqli_num_rows($result_temp) == 1)
    {
        $title = $_POST['title'];
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $edition = $_POST['edition'];
        $cost = $_POST['cost'];
        $publiplace = $_POST['publiplace'];
        $publisher = $_POST['publisher'];
        $copyyr = $_POST['copyyr'];
        $shelfid = $_POST['shelfid'];
        $floorid = $_POST['floorid'];
        $aisleid = $_POST['aisleid'];
        $subname = $_POST['subname'];
        if($author2 == null){
            $author2 = 'NILL';
        }
        $txt = "CALL addbook ('$isbn', '$quantity', '$author1', '$author2', '$title', '$cost', 0, '$edition', '$publiplace', '$publisher', '$copyyr', '$shelfid', '$subname')";
        $result_txt = mysqli_query($link, $txt) or die(mysqli_error($link));
        if($result_txt == false){
            ?>
            <p>"Book record not updated</p>
            <?php
            echo 'Query falied';
            exit();
        }
        echo 'The provided ISBN number already exists. Hence updated the book details and added the new provided quantity';
    }
    else
    {
        $title = $_POST['title'];
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $edition = $_POST['edition'];
        $cost = $_POST['cost'];
        $publiplace = $_POST['publiplace'];
        $publisher = $_POST['publisher'];
        $copyyr = $_POST['copyyr'];
        $shelfid = $_POST['shelfid'];
        $floorid = $_POST['floorid'];
        $aisleid = $_POST['aisleid'];
        $subname = $_POST['subname'];
        $isreserved = $_POST['isreserved'];
        if($author2 == null){
            $author2 = 'NILL';
        }
        $sql_query = "CALL addbook ('$isbn', '$quantity', '$author1', '$author2', '$title', '$cost', '$isreserved', '$edition', '$publiplace', '$publisher', '$copyyr', '$shelfid', '$subname')";
        $result_sqlquery = mysqli_query($link, $sql_query) or die(mysqli_error($link));
        if($result_sqlquery == false){
            ?>
            <p>"Book record not updated</p>
            <?php
            echo 'Query falied';
            exit();
        }
        else{
            ?>
            <p>Book record updated successfully</p>
            <?php
        }
        
    }
}    	
else{
	header('Location: UserSummary.php');
}
?>
<form action="AdminSummary.php" method="post">
<input type="submit" value="Back"/>
</form>

<form action="Login.php" method="post">
<input type="submit" value="Logout"/>
</form>
</body>
</html>

