<html>
<head>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image:url(images/userback.jpg)">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong><?php session_start(); echo $_SESSION['user']; ?></strong></li>
					<!--<li><a href="http://alphadevx.infinityfreeapp.com/ulocateus.php">Locate Us</a></li>-->
				</ul>
</div>
<div class="container" style="width:100%">
	<div class="container" style="background-image:url(images/userback.jpg)">
	<form method="post">
      <button type="button" onclick="window.location.href='http://alphadevx.infinityfreeapp.com/book.php'" style="background-color:#2B4F76">Book Appointment</button>
	  <button type="button" onclick="window.location.href='http://alphadevx.infinityfreeapp.com/viewpatientappointments.php'" style="background-color:#2B4F76">Show Appointments</button>
	  <button type="submit" name="cancel" style="float:center;background-color:#2B4F76">Cancel Booking</button>
	  <button type="submit" name="logout" style="float:right;background-color:#2B4F76">Log Out</button>
	</form>
    </div>
</div>
<?php
if(isset($_POST['check']))
{
		$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
		$name=$_SESSION['user'];
		$sql = "Select * from book where name='$name'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($rows = mysqli_fetch_assoc($result)) 
			{
				echo "Username:".$rows["username"]."Name:".$rows["name"]."Date of Visit:".$rows["dov"]."Town:".$rows["town"]."<br>";
			}
		} 
		else 
		{
			echo "0 results";
		}
}
if(isset($_POST['cancel']))
{
	header( "Refresh:1; url=http://alphadevx.infinityfreeapp.com/cancelbookingpatient.php"); 
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:1; url=http://alphadevx.infinityfreeapp.com/cover.php"); 
}
?>
</body>
</html>