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
<body background= "doctordesk.jpg">
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
<center><h1>SHOW DOCTOR</h1><hr>
<?php
session_start();
$con = mysqli_connect('sql202.epizy.com','epiz_30089770','0ApFzY0pcMj5','epiz_30089770_wt1_database');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM doctor order by DID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL DOCTORS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>DID</th>
<th>Doctor Name</th>
<th>DOB</th>
<th>Experience</th>
<th>Specialization</th>
<th>Address</th>
<th>Contact (+60/0)</th>
<th>Region</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['did'] . "</td>";
    echo "<td>Dr. " . $row['name'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['experience'] . "</td>";
    echo "<td>" . $row['specialization'] . "</td>";
	echo "<td>" . $row['address'] . "</td>";
	echo "<td>" . $row['contact'] . "</td>";
	echo "<td>" . $row['region'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
?>
</body>
</html>