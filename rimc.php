<?php
	session_start();
	include('DBConnect.php');
	include('form_process/teachingProcess.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Research Publication </title>
  <?php
  		include('cssLinks.php');
  ?>
</head>

<body>
	<?php
		if(isset($_SESSION['username']) and $_SESSION['pbasYear']){
			echo '<div id="wrap">';
			include('header.php');
     ?>
	 	<div class="container" style="background-color:#FFFFFF;">
	 		<div class="col-md-4" id="myNav">
        <br><br>
        <div class="panel panel-primary" >
            <ul class="nav nav-tabs nav-pills"  data-offset-top="190" style="width:100%;">
                <li><a href="teachingLearningActivities.php">Lectures, Seminar,Tutorial, Practical, Contact Hours<div class="pull-right"><i class="icon-chevron-right" ></i></div></a></li>
                <li><li class="active"><a href="rimc.php">Reading/Instructional material consulted and additional knowledge resources provided to students<div class="pull-right"><i class="icon-chevron-right" ></i></div></a></li>
                <li><a href="tlm.php">Use of participatory and innovative Teaching-Learning Methodologies, Updating of subject contents<div class="pull-right"><i class="icon-chevron-right" ></i></div></a></li>
                <li><a href="edap.php">Examination Duties Assigned and Performed<div class="pull-right"><i class="icon-chevron-right" ></i></div></a></li>
                
            </ul>
        </div>
        </div>
	   		 	<div class="col-sm-8">
	   		 		<br>						
						     <h5 align="center">Reading/Instructional material consulted and additional 
                                                knowledge resources provided to students</h5><br>
			   					<form role="form" name="resources" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="resourceForm">
			   					<div class="form-group">
								   <div id="res"><br />
		          					<label>Course / Paper</label>
				    					<input type="text" class="form-control required" name="readingCourse" title="Please Enter Course Name">
                  					 <br><label>Consulted</label>
				    					<input type="text" class="form-control required" name="consulted" title="Please Enter value"/>
		          					 <br><label>Prescribed</label>
				    					<input type="text" class="form-control required" name="prescribed" title="Please Fill this information"/>
		   		  					 <br><label>Additional Resources Provided : </label>
				    					Yes<input type="radio" name="addiResources" value="Yes"/>
										No<input type="radio" name="addiResources" value="No"/>	
									  <input type="text" class="form-control required" name="resrc" title="Please Fill this information"/>  					
			 					 </div><!--End if id res for Ajax -->
			 				  </div>
							<input class="btn btn-primary" type="submit" value="Save" name="resourceSave" />
									<select name="course" onChange="showUser(this.value, this.name)">
										<option>--Course--</option>
										<?php 
											include('DBConnect.php');
											$user_id = $_SESSION['username'];
											$year=$_SESSION['pbasYear'];
											$query = mysqli_query($con,"SELECT * from Teach_RIMC WHERE User_Id='$user_id' and year='$year'");
											while($row = mysqli_fetch_assoc($query)){
										?>		<option><?php echo $row['Teach_RIMC_Course']; ?></option>
										<?php } ?>
									</select>
									<input type="submit" class="btn btn-primary"  value="Delete" name="resourceDelete" />
									<input type="reset" class="btn btn-primary" value="Reset" name="reset" />
		    					</form>
	         
		 										
	         
		 				
				</div><!--End of col-sm-9 class -->
				
			</div><!--End of row class -->
	 	 </div><!--End of container class -->
	</div><!--end of wrap id -->
	 <?php
	      	include('footer.php');
	        include('jsLinks.php');
	?>
<script>
		$(document).ready(function() {
 			$('#lectureForm').validate();
			$('#resourceForm').validate();
			$('#innovationForm').validate();
			$('#dutiesForm').validate();
			
 		}); // end ready()
	</script>
	<script>
		function showUser(value, name)
		{
			if (value=="")
  			{
  				document.getElementById("lect").innerHTML="";
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
					if(name == "lect"){
        			    document.getElementById("lect").innerHTML=xmlhttp.responseText;	
					}
					if(name == "course"){
						document.getElementById("res").innerHTML=xmlhttp.responseText;
					}
					if(name == "desc"){
        			    document.getElementById("inno").innerHTML=xmlhttp.responseText;	
					}
					if(name == "dut"){
        			    document.getElementById("duty").innerHTML=xmlhttp.responseText;	
					}
    			}
  			}
			xmlhttp.open("GET","form_process/teachingShow.php?val="+value+"&name="+name,true);
			xmlhttp.send();
		}
	</script>

	<?php
		  }
		  else{
		     header('location:index.php');
	      }
     ?>
</body>
</html>
