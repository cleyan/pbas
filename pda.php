<?php
	session_start();
	include('DBConnect.php');
	include('form_process/curricularProcess.php');
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
	 	<h3 align="center">Co-Curricular, Extension,Professional Development Related Activity</h3>
	  	  <div class="row">
		   	    <div class="col-sm-3" style="box-shadow:5px 5px 5px #888888; padding-bottom:55px;">
		   	    	
			 		<br><br><br><br><br>
			 		<a href="professionalDevelopmentActivity.php">Extension, Co-curricular & Field based activities.</a><br><br>
					<a href="clmi.php">Contribution to Corporate Life and Management of the Institution</a><br><br>
	   			 	<li class="active"><a href="pda.php">Professional Development Activities</a><br><br></li>						 		
			 	
				</div>
				<div class="col-sm-1"></div>
		  		<div class="col-sm-8">						
							     			  
						     <h5 align="center">Professional Development Activities</h5><br>
			   					<form role="form" name="development" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="developmentForm">
			   					<div class="form-group">
								  <div id="dev">
		          					<label>Type of Activity</label> 
				    					<input type="text" class="form-control required" name="typeOfActivity" title="Please Enter Type of Activity">
                  					<br><label>Yearly/Semester wise responsibility</label>
				    					<input type="text" class="form-control required" name="responsibility" title="Please Enter The Responsibility"/>
		          					<br><label>API Score</label>
				    					<input type="text" class="form-control required" name="devApi" title="Please Enter API Score"/><br>
			 					 </div><!--End dev Id for Ajax -->
			 				</div>
							       <input class="btn btn-primary" type="submit" value="Save" name="developmentSave" />
									<select name="dev" onChange="showUser(this.value, this.name)">
										<option>--Activity--</option>
										<?php 
											include('DBConnect.php');
											$userId = $_SESSION['username'];
											$year=$_SESSION['pbasYear'];
											$query = mysqli_query($con,"SELECT * from Teach_PDA WHERE User_Id = '$userId' and year='$year'");
											while($row = mysqli_fetch_assoc($query)){
										?>		<option><?php echo $row['Teach_PDA_TOA']; ?></option>
										<?php } ?>
									</select>
									<input type="submit" class="btn btn-primary"  value="Delete" name="developmentDelete" />
									<input type="reset" class="btn btn-primary" value="Reset" name="reset" onClick="this.form.reset()" />
		    					</form>
	         		 							
	  			</div>
				
	 	  </div><!--end of row class -->
	 </div><!--end of container class -->
  </div><!--end of wrap id -->
	 <?php
	      	include('footer.php');
	        include('jsLinks.php');
	 ?>
	 <!--JQuery Code For Form Validation -->
	 <script>
		$(document).ready(function() {
 			$('#curricularForm').validate();
			$('#contributionForm').validate();
			$('#developmentForm').validate();
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
					if(name == "curr"){
        			    document.getElementById("curr").innerHTML=xmlhttp.responseText;	
					}
					if(name == "contr"){
						document.getElementById("cont").innerHTML=xmlhttp.responseText;
					}
					if(name == "dev"){
        			    document.getElementById("dev").innerHTML=xmlhttp.responseText;	
					}
    			}
  			}
			xmlhttp.open("GET","form_process/curricularShow.php?val="+value+"&name="+name,true);
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
