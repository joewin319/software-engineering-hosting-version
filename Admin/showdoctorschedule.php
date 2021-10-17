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
<center><h1>SHOW DOCTOR SCHEDULE</h1><hr>
<?php
session_start();
$con = mysqli_connect('sql202.epizy.com','epiz_30089770','0ApFzY0pcMj5','epiz_30089770_wt1_database');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM doctor_availability order by DID,CID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>TOTAL CLINICS IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>CID</th>
<th>Clinic Name</th>
<th>DID</th>
<th>Doctor Name</th>
<th>Day</th>
<th>Time</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
	$sql1="SELECT * from doctor where DID=".$row["did"];
	$result1= mysqli_query($con,$sql1);
	while($row1= mysqli_fetch_array($result1))
	{
	$sql2="SELECT * from clinic where CID=".$row["cid"];
	$result2= mysqli_query($con,$sql2);
	while($row2= mysqli_fetch_array($result2))
	{
    echo "<tr>";
	echo "<td>" . $row['cid'] . "</td>";
    echo "<td>" . $row2['name']."-".$row2['town'] . "</td>";
	echo "<td>" . $row['did'] . "</td>";
    echo "<td>" . $row1['name'] . "</td>";
	echo "<td>" . $row['day'] . "</td>";
    echo "<td>" . $row['starttime']."-".$row['endtime']. "</td>";
    echo "</tr>";
	}
	}
}
echo "</table>";
mysqli_close($con);
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=http://alphadevx.infinityfreeapp.com/Admin/alogin.php"); 
	}
?>
</body>
</html>