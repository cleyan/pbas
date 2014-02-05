<?php
	session_start();
	include('DBConnect.php');
	$user = $_SESSION['username'];
	
	//Condition or checking if year is submitted
	if(isset($_POST['yearButton'])){
		$pbasYear = $_POST['pbasYear'];
		$_SESSION['pbasYear'] = $pbasYear;
		header('location: Home.php');
	}
	
	$result = mysqli_query($con,"Select * from gen_info where User_Id ='".$user."'") or die("Error : ".mysqli_error($con));
	$rw = mysqli_fetch_array($result);
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>PBAS | HOME</title>
        <?php
			include('cssLinks.php');
		?>


</head>

<body>
<?php 
	if(isset($_SESSION['username'])){
	    echo '<div id="wrap">';
		include('header.php');
		include('yearModal.php');
?>
	<!-- condition for showing modal window only when year is not set. -->
	<?php if(!isset($_SESSION['pbasYear'])){ ?>
		
	<?php }?>
	 
    <div class="container" style="background-color:#FFFFFF;">
   	   <div class="row">
		
	       <div class="col-sm-3">
		   		<img class="img-responsive" src="images/default/default.gif"><br>
				<div style="box-shadow:5px 5px 5px #888888; padding:3px 3px 3px 3px">
					<span class="pull-right"><a class="icon-edit" href="#">Edit</a> </span><br><br>
					Name :<span class="pull-right"> <?php echo $rw[1]; ?></span><br><br>
					Designation :<span class="pull-right"> <?php echo $rw[5]; ?></span><br><br>
					Add. <span class="pull-right"> <?php echo $rw[8]; ?></span><br><br>
					Mobile No <span class="pull-right"> <?php echo $rw[10]; ?></span><br><br>
					E-Mail <span class="pull-right"> <?php echo $rw[11]; ?></span><br><br>
					
				</div>
		   </div>
			
		   <div class="col-sm-5">
		  			<br><br><br><br>
					<center><b> <br><br>Manage Your PBAS Account<br><br></b>
						PBAS Year - <?php if(isset($_SESSION['pbasYear'])){ echo $_SESSION['pbasYear']; } ?> &nbsp <a data-toggle="modal" href="#yearModal">Change</a><br>
							
						<br><a class="icon-download-alt" href="dompdf/pdf1.php"> Click Here To See The Report</a>
						
					</center>

			</div>
		    
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
					  <h3 class="panel-title">Part-A : General Information</h3>
					</div>
					<div class="panel-body">
					  <a class="btn btn-default btn-md" style="color:#428bca" href="general_Information.php">1. General Category</a>
					   <a class="btn btn-default btn-md" style="color:#428bca" href="academicActivity.php">2. Academic Activity</a></br>
					</div>
				  </div>
					
				<div class="panel panel-primary">
					<div class="panel-heading">
					  <h3 class="panel-title">Part-B : Academic Performance Indicator</h3>
					</div>
					<div class="panel-body">
					 <a class="btn btn-default btn-md" style="color:#428bca; width:100%;" href="teachingLearningActivities.php">1. Teaching Learning & <br>Evalution Related Activities</a></br></br>
					<a class="btn btn-default btn-md" style="color:#428bca; width:100%;" href="professionalDevelopmentActivity.php">2. Co-Curricular, Extension,Professional <br>Development Related Activity</a></br></br>
					<a class="btn btn-default btn-md" style="color:#428bca; width:100%;" href="ppij.php">3. Research Publiaction & <br>Academic Contribution</a> </br></br>
					<a class="btn btn-default btn-md" style="color:#428bca; width:100%;" href="API_Summary.php">4. Summary Of API Score</a></br>
				</div> 
				
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
				  <h3 class="panel-title">Other Activitis</h3>
				</div>
				<div class="panel-body">
				  		<a href="otherInfo.php" class="btn btn-default btn-md" style="color:#428bca; width:100%;" >1. Other Relevent Information<br> And Closures</a></br>
				</div>
			 </div>
		</div>
	  </div><!--End of Super Row Class -->
   </div><!--End of container class -->
 </div><!--end of wrap id -->
 <?php
 	include('footer.php');
 	include('jsLinks.php');
 ?>
  <script src="js/knockout-2.3.0.js"></script>
  <script>
	var viewModel = {
		year: ko.observable(),
		reportEnabled : ko.observable(false),
		yearEnabled : ko.observable(true),
		isClicked : function(){
			self = this;
			self.yearEnabled(false);
			self.reportEnabled(true);
		},
		changeYear : function(){
			self = this;
			self.yearEnabled(true);
			self.reportEnabled(false);
		}
		
	}
	ko.applyBindings(viewModel);
  </script>
<?php
	}
	else{
		header('location: index.php');
	}
?>
</body>
</html>
