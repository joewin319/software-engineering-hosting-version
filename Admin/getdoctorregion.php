<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
	$query1 ="SELECT * FROM doctor where UPPER(region) like UPPER('%".$_POST["city"]."%')";
	$results1 = $conn->query($query1);
?>
	<option value="">Select Doctor</option>
<?php
	while($rs1=$results1->fetch_assoc()) {
?>
	<option value="<?php echo $rs1["did"]; ?>"><?php echo $rs1["name"]."-(Region: ".$rs1["region"].")"; ?></option>
<?php

}
?>
</body>
</html>