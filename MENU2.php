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
  <style>
  #t1
  {
	  width:100px;
  }
  </style>
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
	$sql="SELECT * FROM restaurants WHERE id=2";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0)
	{
		// output data of each row
		while($row = mysqli_fetch_assoc($result))
		{
			$id = 2;
			$item1 = $row["item1"];
			$item2 = $row["item2"];
			$item3 = $row["item3"];
			$item4 = $row["item4"];
			$item5 = $row["item5"];
			$item6 = $row["item6"];
			$item7 = $row["item7"];
			$item8 = $row["item8"];
			$item9 = $row["item9"];
			$item10 = $row["item10"];
			$item11 = $row["item11"];
			$item12 = $row["item12"];
			$item13 = $row["item13"];
			$item14 = $row["item14"];
			$item15 = $row["item15"];
		}
	}
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
		$item1=test_input($_POST['item1']);$item6=test_input($_POST['item6']);$item11=test_input($_POST['item11']);
		$item2=test_input($_POST['item2']);$item7=test_input($_POST['item7']);$item12=test_input($_POST['item12']);
		$item3=test_input($_POST['item3']);$item8=test_input($_POST['item8']);$item13=test_input($_POST['item13']);
		$item4=test_input($_POST['item4']);$item9=test_input($_POST['item9']);$item14=test_input($_POST['item14']);
		$item5=test_input($_POST['item5']);$item10=test_input($_POST['item10']);$item15=test_input($_POST['item15']);
	
		/*$sql2="INSERT INTO restaurants VALUES('".$id."','".$item1."','".$item2."','".$item3."','".$item4."','".$item5."','".$item6."','".$item7."',
												'".$item8."','".$item9."','".$item10."','".$item11."','".$item12."','".$item13."','".$item14."',
												'".$item15."') WHERE ";*/
												
		$sql2="UPDATE restaurants SET id='".$id."',item1='".$item1."',item2='".$item2."',item3='".$item3."',item4='".$item4."',
		item5='".$item5."',item6='".$item6."',item7='".$item7."',item8='".$item8."',item9='".$item9."',item10='".$item10."',
		item11='".$item11."',item12='".$item12."',item13='".$item13."',item14='".$item14."',item15='".$item15."' WHERE id = 2";
			
		$result2=mysqli_query($conn,$sql2);
		if($result2)
		{
			echo "<script>alert('Amounts Updated Successfully!!!!');</script>";
		}
		else
		{
			echo "<script>alert('Error in Updating !!!!');</script>";
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
</br></br></br>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="container">  
<center> 
	<h4>Smally's resto cafe</h4>
	<table class="table table-bordered">  
    <tr> 
		<th>Recommended</th><th>AMOUNTs</th>
		<th>Shake</th><th>AMOUNTs</th>
		<th>Froyos</th><th>AMOUNTs</th>
    </tr>
	<tr>
		<td>Kitty Kat</td><td><input type="text" id="t1" value="<?php echo $item1 ?>" name="item1"/></td>
		<td>Vanila Sky</td><td><input type="text" id="t1" value="<?php echo $item6 ?>" name="item6"/></td>
		<td>Go Berry</td><td><input type="text" id="t1" value="<?php echo $item12 ?>" name="item12"/></td>
	</tr>
	<tr>
		<td>Guardian's of the Galaxy</td><td><input type="text" id="t1" value="<?php echo $item2 ?>" name="item2"/></td>
		<td>Pink Floyd</td><td><input type="text" id="t1" value="<?php echo $item7 ?>" name="item7"/></td>
		<td>Kiwi Banana</td><td><input type="text" id="t1" value="<?php echo $item13 ?>" name="item13"/></td>
	</tr>
	<tr>
		<td>Chocoholic</td><td><input type="text" id="t1" value="<?php echo $item3 ?>" name="item3"/></td>
		<td>Nutorious Big</td><td><input type="text" id="t1" value="<?php echo $item8 ?>" name="item8"/></td>
		<td>La Healthy</td><td><input type="text" id="t1" value="<?php echo $item14 ?>" name="item14"/></td>
	</tr>
	<tr>
		<td>Sinful Red</td><td><input type="text" id="t1" value="<?php echo $item4 ?>" name="item4"/></td>
		<td>The Mentic</td><td><input type="text" id="t1" value="<?php echo $item9 ?>" name="item9"/></td>
		<td>Rejuvenator</td><td><input type="text" id="t1" value="<?php echo $item15 ?>" name="item15"/></td>
	</tr>
	<tr>
		<td>Respberry CheeseCake</td><td><input type="text" id="t1" value="<?php echo $item5 ?>" name="item5"/></td>
		<td>Snicka Snicka</td><td><input type="text" id="t1" value="<?php echo $item10 ?>" name="item10"/></td>
		<td></td><td></td>
		<!--<td colspan="6" align="right"><input type="submit" class="btn btn-primary" value="UPDATE" name="submit"/></td>-->
	</tr>
	<tr>
	<td></td><td></td>
	<td>Orio</td><td><input type="text" id="t1" value="<?php echo $item11 ?>" name="item3"/></td>
	<td colspan="2" align="right"><input type="submit" class="btn btn-primary" value="UPDATE" name="submit"/></td>
	</tr>
	
	</table>
</center>
</div>


<form>

</body>  
</html>
