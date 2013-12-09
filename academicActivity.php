<?php
	session_start();
	ob_start();
	include('DBConnect.php');
	include('form_process/academicProcess.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Academic Activity</title>
        <?php
			include('cssLinks.php');
		?>
</head>

<body>
	<?php 
		if(isset($_SESSION['username'])){
		echo '<div id="wrap">';
		include('header.php');
	?>
		<div class="container" style="background-color:#FFFFFF;">
			<h3 align="center"> Academic Activity </h3>
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-7">
					<form role="form" name="academic" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="acadActivity">
			    		<div class="form-group" >
						   <div id="academic">
		          			<label>Whether acquired any degree or fresh academic
 qualification during the year : </label> 
				    			Yes<input type="radio" name="degree" id="optionsRadios1" value="yes">
								No<input type="radio" name="degree" id="optionsRadios2" value="no"><br>
                  			<br /><label>Name Of Course</label>
				    			<input type="text" class="form-control required" name="nameOfCourse" title="Please Enter Course Name"/>
		          			<br /><label>Place</label>
				   		   		<input type="text" class="form-control required" name="Place" title="Please Enter Place"/>
		      	  			<br /><label>Duration</label>
				    			<input type="text" class="form-control required" name="duration" title="Please Enter Duration"/>
							<br /><label>Sponsoring Agency</label>
				    	    	<input type="text" class="form-control required" name="sponsor" title="Please Enter Name of Sponsoring Agency"/>
		          			<br /><label>Year</label>
				    	    	<input type="text" class="form-control required date" name="Year" title="Please Enter The Date"/>
							<br /><label>Academic Staff College Orientation / Refresher
Course Attended During The Year : </label> 
				    			Yes<input type="radio" name="course" id="optionsRadios1" value="yes">
								No<input type="radio" name="course" id="optionsRadios2" value="no"><br><br>
							</div><!--End of id academic for ajax -->
			      			<button class="btn btn-primary icon-save" type="submit" name="activitySave"> Save</button>
							<select name="activity" style="width:200px;" onChange="showUser(this.value, this.name)">
								<option>--Courses--</option>
								<?php 
									#include('DBConnect.php');
									$user_id = $_SESSION['username'];
									$query = mysqli_query($con,"SELECT * from acad_act WHERE User_Id='$user_id'");
									while($row = mysqli_fetch_assoc($query)){
								?>
										<option><?php echo $row['Gen_Info_Noc']; ?></option>
								<?php } ?>
							</select>
							<button class="btn btn-primary icon-trash" type="submit" name="activityDelete"> Delete</button>
			  			</div>
			  		</form>
				 </div><!--End of col-sm6 class -->
			 
			 	<div class="col-sm-3">
					<div class="panel panel-primary">
      		 			<div class="panel-heading">
         					<h3 class="panel-title">QuickLinks</h3>
 	  			 		</div>
 	   					<div class="panel-body">
						 	<a href="general_Information.php">General Category</a><br><br>		 
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
			</div> <!--End of row class -->
		</div><!--End of container class -->
	</div><!--end of wrap id -->
	<?php
 		include('footer.php');
 		include('jsLinks.php');
 	?>
	<script>
		$(document).ready(function() {
 			$('#acadActivity').validate();
 		}); // end ready()
	</script>
	<script><!--Ajax script for showing information on the basis of combobox value -->
		function showUser(value, name)
		{
			if (value=="")
  			{
  				document.getElementById("academic").innerHTML="";
  				return;
  			}
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
        			document.getElementById("academic").innerHTML=xmlhttp.responseText;	
    			}
  			}
			xmlhttp.open("GET","form_process/academicShow.php?val="+value+"&name="+name,true);
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
