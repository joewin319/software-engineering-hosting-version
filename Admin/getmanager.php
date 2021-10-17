<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
	$query ="SELECT * FROM manager_clinic WHERE CID =".$_POST["cid"];
	$results = $conn->query($query);
?>
	<option value="">Select Manager</option>
<?php
	while($rs=$results->fetch_assoc()) {
		$query1="Select Name from manager where MID=".$rs["MID"];
		$result1=$conn->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["MID"]; ?>"><?php echo "(MID=".$rs["MID"].")".$rs1["Name"]; ?></option>
<?php
		}
}
?>
</body>
</html>