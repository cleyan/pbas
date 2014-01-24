<?php
	session_start();
	ob_start();
	include('DBConnect.php');
	include('form_process/genInfoProcess.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>General Information</title>
   <?php
			include('cssLinks.php');
   ?>
</head>
<body>
   <?php 
	  if(isset($_SESSION['username'])){
	  include('header.php');
	?>
	<div class="container" style="background-color:#FFFFFF;">
	    <?php
			if(isset($_SESSION['infoUpdated'])){
				echo $_SESSION['infoUpdated'];
			}

		?>
	  	<h3 align="center"> General Information </h3>
		<div class="row">	
			<div class="col-sm-1">
			
			</div>
			<div class="col-sm-7">
				<form id="genInfo" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
					<div id="userInfo">
					
		          		<label>Name(in Block Letters)</label> 
				    		<input type="text" class="form-control required" name="name" title="Please Enter Your Name<br>">
                  		<br><label>Father's Name</label>
				    		<input type="text" class="form-control required" name="fatherName" title="Please Enter Your Father's Name "/>
		          		<br><label>Mother's Name</label>
				   		   <input type="text" class="form-control required" name="motherName" title="Please Enter Your Mother's Name<br>"/>
		   		  		<br><label>Department</label>
				    		<input type="text" class="form-control required" name="department" title="Please Enter Department's Name"/>
		      	  		<br><label>Current Designation</label>
				    		<input type="text" class="form-control required" name="designation" title="Please Enter Your Current Designation"/>
						<br><label>Grade Pay</label>
				    	    <input type="text" class="form-control required" name="gradePay" title="Please Enter You Grade Pay<br>"/>
		          		<br><label>Date Of Last Promotion</label>
				    	    <input type="text" class="form-control required" placeholder="yyyy-mm-dd" name="lastPromotion" title="Please Enter the Date in the - yyyy-mm-dd format<br>"/>
						<br><label>Address For Correspondence</label> 
				    		<input type="text" class="form-control required" name="addressCorrespondece" title="Please Enter Your Address<br>">
                  		<br><label>Permanent Address</label>
				    		<input type="text" class="form-control required" name="addressPermanant" title="Please Enter Your Permanant Address"/>
		          		<br><label>Telephone No.</label>
				   		   <input type="text" class="form-control required" name="telePhone" title="Please Enter Your Telephone No.>"/>
		   		  		<br><label>Email</label>
				    		<input type="email" class="form-control required" name="email" title="Please Enter Your Email"/><br>
					</div><!--End of id userInfo for ajax -->	
						<button class="btn btn-md btn-primary" type="submit" name="infoSave">Save</button>
						<button  class="btn btn-md btn-primary" name="infoEdit">Edit</button>
						<button class="btn btn-md btn-primary" type="reset" name="infoReset">Reset</button><br><br>
					
			 </div><!--End of col-sm-7 class -->
			 
			 <div class="col-sm-3">
			 		<div class="panel panel-primary">
      		 			<div class="panel-heading">
         					<h3 class="panel-title">QuickLinks</h3>
 	  			 		</div>
 	   					<div class="panel-body">
						 	<a href="academicActivity.php">Academic Activity </a><br><br>		 
							<a href="teachingLearning.php">Teaching Learning and Evalution Related Activities</a> <br><br>
							<a href="curricularActivities.php">Co-Curricular, Extension,Professional Development Related Activity</a><br><br>
							<a href="researchPublication.php">Research, publication And Academic Contribution</a><br><br>
   			 				<a href="API_Summary.php">API Summary</a><br><br>
							<a href="otherInfo.php">Other Relevent Information<br> And Closures</a><br><br>
  	  					</div>	
   		 			</div>
			 </div>
			 <div class="col-sm-1">
			 </div>
		</div> <!--End of container row class -->
	</div><!--End of container class -->
	
	<?php
		include('footer.php');
 		include('jsLinks.php');
 		
    ?>
	<script>
		$(document).ready(function() {
 			$('#genInfo').validate();
 		}); // end ready()
	</script>
	<script><!--Ajax script for showing information on the basis of combobox value -->
		function showInfo(name)
		{

			if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
  			}
			else
  			{// code for IE6, IE5
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
			xmlhttp.onreadystatechange=function()
  			{
 				 if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{  
        			document.getElementById("userInfo").innerHTML=xmlhttp.responseText;	
    			}
  			}
			xmlhttp.open("GET","form_process/genInfoShow.php?name="+name,true);
			xmlhttp.send();
		}
  </script>
    <?php
	  }
	  else{
		header('location: index.php');
	  }
    ?>
</body>
</html>
