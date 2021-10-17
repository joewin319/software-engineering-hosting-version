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
	$query ="SELECT * FROM clinic WHERE City = '" . $_POST["city"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Clinic</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["cid"]; ?>"><?php echo $rs["name"]."-".$rs["town"]."(CID-".$rs["cid"].")"; ?></option>
<?php

}
?>
</body>
</html>