<!-- Script for showing data for "Academic Activity" -->

<?php
	echo "hello";
	session_start();
	ob_start();

	$name = $_GET['name'];
	#Database Connection
	$con = mysqli_connect('localhost','root','','pbas_db');
	if (!$con)
  	{
		die('Could not connect: ' . mysqli_error($con));
 	}
	
	if($name == 'infoEdit'){
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
 
        <label>Name(in Block Letters)</label> 
				    		<input type="text" class="form-control required" name="name"  value="<?php echo $uname; ?>">
                  		<br><label>Father's Name</label>
				    		<input type="text" class="form-control required" name="fatherName" title="Please Enter Your Father's Name " value="<?php echo $fatherName; ?>"/>
		          		<br><label>Mother's Name</label>
				   		   <input type="text" class="form-control required" name="motherName" title="Please Enter Your Mother's Name" value="<?php echo $motherName; ?>"/>
		   		  		<br><label>Department</label>
				    		<input type="text" class="form-control required" name="department" title="Please Enter Department's Name" value="<?php echo $department; ?>"/>
		      	  		<br><label>Current Designation</label>
				    		<input type="text" class="form-control required" name="designation" title="Please Enter Your Current Designation" value="<?php echo $designation; ?>"/>
						<br><label>Grade Pay</label>
				    	    <input type="text" class="form-control required" name="gradePay" title="Please Enter You Grade Pay<br>" value="<?php echo $gradePay; ?>"/>
		          		<br><label>Date Of Last Promotion</label>
				    	    <input type="text" class="form-control required" name="lastPromotion" title="Please Enter the Date in the - yyyy-mm-dd format" value="<?php echo $promotionDate; ?>"/>
						<br><label>Address For Correspondence</label> 
				    		<input type="text" class="form-control required" name="addressCorrespondece" title="Please Enter Your Address" value="<?php echo $correspAddress; ?>">
                  		<br><label>Permanent Address</label>
				    		<input type="text" class="form-control required" name="addressPermanant" title="Please Enter Your Permanant Address" value="<?php echo $permnantAddress; ?>"/>
		          		<br><label>Telephone No.</label>
				   		   <input type="text" class="form-control required" name="telePhone" title="Please Enter Your Telephone No." value="<?php echo $telephone; ?>"/>
		   		  		<br><label>Email</label>
				    		<input type="email" class="form-control required" name="email" title="Please Enter Your Email" value="<?php echo $email; ?>"/>
								<?php   }
							?>

<!-- End of if($name == 'activity') condition-->
