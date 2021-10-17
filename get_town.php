<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
$conn=mysqli_connect("sql202.epizy.com","epiz_30089770","0ApFzY0pcMj5","epiz_30089770_wt1_database"); 
	$query ="SELECT * FROM clinic WHERE City = '" . $_POST["countryid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Town</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["town"];?>"><?php echo $rs["town"]; ?></option>
<?php

}
?>
</body>
</html>