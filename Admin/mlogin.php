<!DOCTYPE html>
<html>
<body style="background-image:url(doctordesk.jpg)">
<link rel="stylesheet" href="main.css">
	<form action="mlogin.php" method="post">
	<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong> Manager Login</strong></li>
					<li><a href="cover.php">Home</a></li>
				</ul>
	</div>
	<div class="sucontainer">
		<label><b>Username:</b></label><br>
		<input type="text" placeholder="Enter Username" name="uname" required><br>
	
		<label><b>Password:</b></label><br>
		<input type="password" placeholder="Enter Password" name="pass" required><br><br>
		
		<div class="container" style="background-color:grey">
			<button type="submit" name="submit" style="float:right">Log In</button>
		</div>
<?php 
function SignIn() 
{ 
$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); ;

session_start();
if(!empty($_POST['uname']))  
{ 
	$query = mysqli_query($conn,"SELECT * FROM manager where username = '$_POST[uname]' AND password = '$_POST[pass]'");
	$row = mysqli_fetch_array($query);
	if(!empty($row['username']) AND !empty($row['password'])) 
	{ 
		$_SESSION['username'] = $row['username'];
		$_SESSION['mgrname']=$row['name'];
		$_SESSION['mgrid']=$row['mid'];
		echo "Logging you in..";
		header( "Refresh:3; url=http://alphadevx.infinityfreeapp.com/Admin/mgrmenu.php");
	} 
	else 
	{ 
		echo "Wrong Credentials!"; 
	} 
	}
} 
	if(isset($_POST['submit'])) 
	{ 
		SignIn(); 
	} 
?>
</body>
</html>