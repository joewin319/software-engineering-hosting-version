<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
<style>
table{
    width: 75%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 25px;
}

th{
border: 4px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>

</head>
<body background= "clinicview.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN MODE</font></li>
<br>
<h2>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Doctor</a>
    <div class="dropdown-content">
      <a href="http://alphadevx.infinityfreeapp.com/Admin/adddoctor.php">Add Doctor</a>
      <a href="http://alphadevx.infinityfreeapp.com/Admin/deletedoctor.php">Delete Doctor</a>
      <a href="http://alphadevx.infinityfreeapp.com/Admin/showdoctor.php">Show Doctor</a>
	  <a href="http://alphadevx.infinityfreeapp.com/Admin/showdoctorschedule.php">Show Doctor Schedule</a>
    </div>
  </li>
  
  <li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">Clinic</a>
    <div class="dropdown-content">
      <a href="http://alphadevx.infinityfreeapp.com/Admin/addclinic.php">Add Clinic</a>
      <a href="http://alphadevx.infinityfreeapp.com/Admin/deleteclinic.php">Delete Clinic</a>
      <a href="http://alphadevx.infinityfreeapp.com/Admin/adddoctorclinic.php">Assign Doctor to Clinic</a>
	  <a href="http://alphadevx.infinityfreeapp.com/Admin/addmanagerclinic.php">Assign Manager to Clinic</a>
	  <a href="http://alphadevx.infinityfreeapp.com/Admin/deletedoctorclinic.php">Delete Doctor from Clinic</a>
	  <a href="http://alphadevx.infinityfreeapp.com/Admin/deletemanagerclinic.php">Delete Manager from Clinic</a>
	  <a href="http://alphadevx.infinityfreeapp.com/Admin/showclinic.php">Show Clinic</a>
    </div>
  </li>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Manager</a>
    <div class="dropdown-content">
      <a href="http://alphadevx.infinityfreeapp.com/Admin/addmanager.php">Add Manager</a>
      <a href="http://alphadevx.infinityfreeapp.com/Admin/deletemanager.php">Delete Manager</a>
	  <a href="http://alphadevx.infinityfreeapp.com/Admin/showmanager.php">Show Manager</a>
    </div>
  </li>
   <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>SHOW CLINIC</h1><hr>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=http://alphadevx.infinityfreeapp.com/Admin/alogin.php"); 
	}
$con = mysqli_connect('sql202.epizy.com','epiz_30089770','0ApFzY0pcMj5','epiz_30089770_wt1_database');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM clinic order by City,Town,CID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL CLINICS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>CID</th>
<th>Name</th>
<th>Address</th>
<th>Town</th>
<th>City</th>
<th>Contact (+60/+0)</th>
<th>MID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['cid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['town'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
	echo "<td>" . $row['contact'] . "</td>";
	echo "<td>" . $row['mid'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>