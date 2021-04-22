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
	$sql_query1 = "SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	//$sql_query1 = "CALL searchbookisbn ('$isbn')";
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));
	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$sql_query_copy = "SELECT COUNT(CopyId) AS copyavail FROM book AS B, bookcopy AS BC WHERE B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	$result_copy = mysqli_query ($link, $sql_query_copy)  or die(mysqli_error($link));
	$row = mysqli_fetch_array($result_copy);
	$copyavail = $row['copyavail'];
	if($copyavail == 0){
		echo 'There are no available copies right now, please go back and make a future hold request.';
	}	
	$sql_query2 = "SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	//$sql_query2 = "CALL reservebookisbn ('$isbn')";
   $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
	if($result2 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}						
} elseif ($_POST['title'] != null) {
	$title = $_POST['title'];  
	$_SESSION['title']=$title;
	$sql_query1 = "SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE Title = '$title' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN";
	 //$sql_query1 = "CALL searchbooktitle ('$title')";
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Title failed.';
			exit();
		}	
	$sql_query2 = "SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE Title = '$title' AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN";
	//$sql_query2 = "CALL reservebooktitle ('$title')";
   $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
	if($result2 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}		
} elseif ($_POST['author'] != null) {
	$author = $_POST['author'];  
	$_SESSION['author']=$author;
	$sql_query1 = "SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC, author AS A WHERE A.Author = '$author' AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN";
	 //$sql_query1 = "CALL searchbookauthor ('$author')";
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Author failed.';
			exit();
		}	
	$sql_query2 = "SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC, author AS A WHERE A.Author = '$author' AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN";
	 //$sql_query2 = "CALL reservebookauthor ('$author')";
	   $result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Author failed.';
			exit();
		}			
} else {
	header('Location: UserSummary.php');
}
$numrow = mysqli_num_rows($result1);
if($numrow == 0){
	//echo 'There are no available copies right now, please go back and make a future hold request.';
	echo 'There are no available copies right now.';
}
?>

<body>
<h1>Hold Request for a Book</h1>
<form action="IssueIDgenerate.php" method="post">

<table border="1" style="width:100%">
  <tr>
	<th>Select</th>
    <th>ISBN</th>
    <th>Title of the book</th>
    <th>Edition</th>
    <th># copies available</th>

  </tr>
  <?php while($row = mysqli_fetch_array($result1)){ 
	  
	$ISBN = $row['ISBN'];
	$Title = $row['Title'];
	$Edition = $row['Edition'];
	$copynum = $row['copynum'];
  ?>
  <tr>
    <td><input type="radio" name="ISBN" value="<?php echo $ISBN; ?>" required></td>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Title; ?></td>
    <td><?php echo $Edition; ?></td>
    <td><?php echo $copynum; ?></td>
  </tr>
<?php
}
?>
</table>
<input type="Submit" value="submit"/>
</form>
<h2>Books on Reserve</h2>
<table border="1" style="width:100%">
  <tr>
    <th>ISBN</th>
    <th>Title of the book</th>
    <th>Edition</th>
    <th># copies available</th>

  </tr>
  <?php while($row = mysqli_fetch_array($result2)){ 
    
	$ISBN = $row['ISBN'];
	$Title = $row['Title'];
	$Edition = $row['Edition'];
	$copynum = $row['copynum'];
	
  ?>
  <tr>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Title; ?></td>
    <td><?php echo $Edition; ?></td>
    <td><?php echo $copynum; ?></td>
  </tr>
<?php
}
?>
</table>
</form>

<form action="SearchBooks.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>