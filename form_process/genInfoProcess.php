<?php
	if(isset($_POST['info_save'])){
		$user_id = $_SESSION['username'];
		$Name = $_POST['name'];
		$fatherName = $_POST['fatherName'];
		$motherName = $_POST['motherName'];
		$department = $_POST['department'];
		$designation = $_POST['designation'];
		$gradePay = $_POST['gradePay'];
		$lastPromotion = $_POST['lastPromotion'];
		$addressCorrespondece = $_POST['addressCorrespondece'];
		$addressPermanant = $_POST['addressPermanant'];
		$telePhone = $_POST['telePhone'];
		$email = $_POST['email'];
		//Query for Updateing general inforamtion
		$updateQuery = $sql = "UPDATE Gen_Info SET Gen_Info_Name='$Name', Gen_Info_Fname='$fatherName' , Gen_Info_Mname='$motherName', Gen_Info_Department='$department', Gen_Info_CD='$designation', Gen_Info_GP='$gradePay', Gen_Info_DLP='$lastPromotion', Gen_Info_AFC='$addressCorrespondece', Gen_Info_PA='$addressPermanant', Gen_Info_TNO='$telePhone', Gen_Info_Email='$email' WHERE User_Id='$user_id' " ;
		$result = mysqli_query($con,$updateQuery); 
		if($result){
			unset($_POST['info_save']);
			$_SESSION['infoUpdated'] = "<h5 align='center' class='alert alert-success'>Information Updated Successfully ! ";
			header('location:general_Information.php');
		}
		else{
			die("error : ".mysqli_error($con));
		}
	}
?>
