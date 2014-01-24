<?php
	$sql="SELECT * FROM gen_info WHERE User_Id = '".$_SESSION['username']."'";
	$result = mysqli_query($con,$sql) or die('Error'.mysqli_error($con));
	$row = mysqli_fetch_array($result);
 	$uname = $row['Gen_Info_Name'];
	$fatherName = $row['Gen_Info_Fname'];
	$motherName = $row['Gen_Info_Mname'];
	$department = $row['Gen_Info_Department'];
	$designation = $row['Gen_Info_CD'];
	$gradePay = $row['Gen_Info_GP'];
	$promotionDate = $row['Gen_Info_DLP'];
	$correspAddress = $row['Gen_Info_AFC'];
	$permnantAddress = $row['Gen_Info_PA'];
	$telephone = $row['Gen_Info_TNO'];
	$email = $row['Gen_Info_Email'];
?>
