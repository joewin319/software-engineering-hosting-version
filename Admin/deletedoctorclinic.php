<html>
<head>
<script src="jquerypart.js" type="text/javascript"></script>
<link rel="stylesheet" href="adminmain.css"> 
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "http://alphadevx.infinityfreeapp.com/Admin/getclinic.php",
	data:'city='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorday(val) {
	$.ajax({
	type: "POST",
	url: "http://alphadevx.infinityfreeapp.com/Admin/getdoctorday.php",
	data:'cid='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}

</script>
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
<center><h1>REMOVE DOCTOR FROM A CLINIC</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label style="font-size:20px" >City:</label>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);">
		<option value="">Select City</option>
		<?php
		$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
		$sql1="SELECT distinct City FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["City"]; ?>"><?php echo $rs["City"]; ?></option>
		<?php
		}
		?>
		</select>
        
	
		<label style="font-size:20px" >Clinic:</label>
		<select id="clinic-list" name="clinic" onchange="getDoctorday(this.value);" >
		<option value="">Select Clinic</option>
		</select>
		
		<label style="font-size:20px" >Doctor & Time:</label>
		<select name="doctor" id="doctor-list" >
		<option value="">Select Day & Time</option>
		</select>
		
		
		<button name="Submit" type="submit">Submit</button>
	</form>
<?php
session_start();
$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
if(isset($_POST['Submit']))
{
	$cid=$_POST['clinic'];
	$rest=$_POST['doctor'];
	$sql = "DELETE FROM doctor_availability WHERE CID= $cid AND DID= $rest";

	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.Refreshing....";
		header( "Refresh:2; url=http://alphadevx.infinityfreeapp.com/Admin/deletedoctorclinic.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}

}

if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=http://alphadevx.infinityfreeapp.com/Admin/alogin.php"); 
	}
?>			

</body>
</html>