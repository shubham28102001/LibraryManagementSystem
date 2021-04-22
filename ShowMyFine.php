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
$sql_query = "CALL showmyfine('$username')";
$result_sqlquery = mysqli_query($link, $sql_query) or die(mysqli_error($link));
if($result_sqlquery == false) {
    echo 'The query failed.';
	exit();
}
$row = mysqli_fetch_array($result_sqlquery);
$name = $row['name'];
$penalty = $row['penalty'];

?>

<body>
<h1>Pay Fine</h1>
<br>
<tr>
    <td>Username: </td>
    <td><?php echo $username; ?></td>
</tr>
</table>
<table>
<tr>
	<td>Name: </td>
    <td><?php echo $name; ?></td>
</tr>
</table>
<table>
<tr>
	<td>Current Fine: </td>
    <td><?php echo $penalty; ?></td>
</tr>
</table>

<form action="" method="post">
<tr>
    <td>Enter amount to pay</td>
    <td><input type="text" name="amount"/></td>
</tr>
<input type="submit" value="Pay Fine"/>
</form>

<?php
    /*function clearStoredResults(){
        global $mysqli;
        do{
            if($res = $mysqli->store_result()){
                $res->free();
            }
        } while($mysqli->more_results() && $mysqli->next_result());
    }
    clearStoredResults();*/

    //mysql_free_result($result_sqlquery);
    if(isset($_POST['amount'])){
        $amount = $_POST['amount'];
        if($amount>$penalty){
            echo 'Pay amount less than equal to your Penalty';
        }
        else{
            //$sql_query1 = "CALL payfine('$username', '$amount')";
            $newpenalty = $penalty - $amount;
            $sql_query1 = "UPDATE student_faculty SET Penalty = '$newpenalty' WHERE Username = '$username'";
            $result_sqlquery1 = mysqli_query($link, $sql_query1) or die(mysqli_error($link));
            if($result_sqlquery1 == false) {
                echo 'The query failed.';
                exit();
            }
            echo 'Amount paid successfully';
        }
    }
?>

<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>