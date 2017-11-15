<!DOCTYPE html>
<html>
<head>
  <title>COR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="bootstrap.js"></script>
  <script src="angular.min.js"></script>
  <script>
    $(document).ready(function(){
	
		$("#d1").click(function(){
			window.location.href='lr1.php';
		});
		$("#d2").click(function(){
			window.location.href='lr2.php';
		});
		$("#d3").click(function(){
			
			window.location.href='lr3.php';
		});
		$("#logout").click(function(){
			
			window.location.href='LOGOUT3.php';
		});
		});
  </script>
</head>
<body>
<?php
error_reporting(0);
	session_start();
	$user_id=$_SESSION['username3'];
	if(!isset($_SESSION['name3']))
	{
		echo "<script>alert('PLEASE LOGIN FIRST');</script>";
        //echo "window.location='MAIN_PAGE.php'";
		header("Location: HOME_PAGE.php");
	}
$server="localhost";
$username="root"; 
$password="";
$dbname="cor";
$conn=mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
{
	die('could not connect'.mysql_error());
}
else
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
			if (empty($_POST["userid"]))
			{
				echo "<script>alert('Every Field Required!!!!');</script>";
				//$pc_error = "Required";
			}
			else if(!preg_match("/^[0-9]*$/",($_POST["userid"])))
			{
			echo "<script>alert('Enter only Digits!!!!');</script>";
			}
			else
			{
			$userid = test_input($_POST['userid']);
			$subject = test_input($_POST['subject']);
			$message = test_input($_POST['message']);
			$sql="INSERT INTO request values('".$userid."','".$subject."','".$message."')";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				echo "<script>alert('Request Generated Successfully!!!!');</script>";
			}
			else
			{
			
			}
			}
		}
	}
}

function test_input($data)
{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
?>
 <nav class="navbar navbar-inverse" style="background-color:#E84478">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div>
      <ul class="nav navbar-nav" style="font-color:white">
        <li><a href="R2_MANAGER.php" style="color:white;font-size:20px">Orders Received</a></li>
        <li><a href="TABLE_BOOK2.php" style="color:white;font-size:20px">Table Booking</a></li>
        <li><a href="MENU2.php" style="color:white;font-size:20px">Change Menu</a></li>
		<li><a href="NOTIFICATION2.php" style="color:white;font-size:20px">Notification</a></li>
		<li><a href="EMPLOYEE2.php" style="color:white;font-size:20px">Employees</a></li>
		<li><a href="MANAGER_REQ2.php" style="color:white;font-size:20px">Requests</a></li>
		<li><a href="MMAIL2.php" style="color:white;font-size:20px">Mail</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="LOGOUT.php" style="color:white;font-size:20px"  data-toggle="modal" data-target="#myModal" id="logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<center>
<div class="container">

<div ng-app="myapp" ng-controller="bookController">
</br></br>
<form class="well form-search" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h4>REQUEST GENERATION TO ADMIN</h4>	
	<table class="table table-bordered">
		<tr>
			<td>User Id:</td><td><input type="text" placeholder="Enter User Id"  style="width:200px" name="userid"/></td>
			<td>Subject:</td><td><input type="text" placeholder="Enter Subject"  style="width:350px" name="subject"/></td>
		</tr>
	</table>
	<textarea class="input-medium search-query" name="message" placeholder="You can type any kind of Request here which will be received by the  Admin" cols="80" rows="5"></textarea>
	</br>
	</br>
	<input type="submit" class="btn btn-primary" name="submit" value="GENRERATE"/>		
</form>

</div>

</div>

</center>
</body>
</html>