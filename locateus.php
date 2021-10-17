<html>
<head>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php $conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database");  ?>
<script>
function getTown(val) {
	$.ajax({
	type: "POST",
	url: "http://alphadevx.infinityfreeapp.com/get_town.php",
	data:'countryid='+val,
	success: function(data){
		$("#town-list").html(data);
	}
	});
}
function getClinic(val) {
	$.ajax({
	type: "POST",
	url: "http://alphadevx.infinityfreeapp.com/getclinic.php",
	data:'townid='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorday(val) {
	$.ajax({
	type: "POST",
	url: "http://alphadevx.infinityfreeapp.com/getdoctordaybooking.php",
	data:'cid='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}
</script>
<body style="background-image:url(images/yellowpage.jpg)">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="http://alphadevx.infinityfreeapp.com/ulogin.php" class="logo"><img src="images/cal.png" width="30px" height="30px"><strong> Mediviron </strong>Appointment Booking System</a></li>
			<li><a href="http://alphadevx.infinityfreeapp.com/cover.php">Home</a></li>
		</ul>
	</div>
	<form action="locateus.php" method="post">
	<div class="sucontainer" style="background-image:url(images/yellowpage.jpg)">
		<ul style="background-image:url(images/yellowpage.jpg)">			
			
		</ul>
		<label style="font-size:20px; color:black;" >City:</label><br>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getTown(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select City</option>
		<?php
		$sql1="SELECT distinct(city) FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
	
		<label style="font-size:20px; color:black;" >Town:</label><br>
		<select id="town-list" name="Town" onChange="getClinic(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Town</option>
		</select><br>
		
		<label style="font-size:20px; color:black;" >Clinic:</label><br>
		<select id="clinic-list" name="Clinic" onChange="getDoctorday(this.value);" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Clinic</option>
		</select><br>
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
<?php
session_start();
if(isset($_POST['subd']))
{
		$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
		if(!empty($_POST['doctorname']))
		{
			$doctor=$_POST['doctorname'];
			$sql1 = "Select * from Doctor where UPPER(name) like UPPER('%".$doctor."%')";
			$result1=mysqli_query($conn, $sql1);  
			while($row1 = mysqli_fetch_array($result1))
			{
			echo "<hr>";
			echo "<label><b><br>".$row1['name']."<br><b>Gender:<b>".$row1['gender']."<br><b>Specialization:<b>".$row1['specialization']."<br></b>"."</label>";
			$sql2="select * from doctor_availability where did=".$row1["did"];
			//$sql2 = "Select name,address,contact from clinic where cid in (select cid from doctor_availability where did in(Select did from doctor where did=".$row1['did']."));";
			$result2=mysqli_query($conn, $sql2);  
			while($row2 = mysqli_fetch_array($result2))
			{
			//echo "<b>Clinic Name:".$row2['name']."</b><br><b>Address:<b>".$row2['address']."<br><b>Contact:<b>".$row2['contact'];
			echo "<label><br><b>Day:".$row2["day"]."</b><br><b>Timings:<b>".$row2["starttime"]." to ".$row2["endtime"]."</label>";
			$sql3="Select * from clinic where cid = ".$row2["cid"];
			$result3 = mysqli_query($conn , $sql3);
			while($row3 = mysqli_fetch_array($result3))
			{
				echo"<label><br><b>Clinic Name:".$row3["name"]." Town:".$row3["town"]." City:".$row3["city"]."</label>";
			}
			
			}
			}
		}
		else
		{
				echo"Enter a valid name.";
		}
}
if(isset($_POST['submit']))
{
		$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
		$cid=$_POST['Clinic'];
		$sql1 = "Select * from Clinic where cid=$cid";
		$result1=mysqli_query($conn, $sql1);  
		$row1 = mysqli_fetch_array($result1);
		$sql2 = "Select name,gender,specialization,contact from doctor where did in (select did from doctor_availability where cid=$cid);";
		$result2=mysqli_query($conn, $sql2);  
		$row2 = mysqli_fetch_array($result2);
		echo "<label style='color:black'><b>Clinic Name:".$row1['name']."</b><br><b>Address:<b>".$row1['address']."<br><b>Clinic Contact (+60):".$row1['contact']."</b><br></label>"; 
}
?>
	</form>
</body>
</html>