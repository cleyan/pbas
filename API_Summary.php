<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<?php
//DBConnect.php include the code for Database connectivity
include('DBConnect.php');
?>


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
	if(isset($_SESSION['username'])){
		echo '<div id="wrap">';
		include('header.php');
?>
<div class="container" style="background-color:#FFFFFF;">
	<h3 align="center">Summary of API Score</h3>
	<div class="row" style=" margin-bottom:50px;">

	  <div class="col-sm-9">
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>S.No. </th>
					<th>Criteria</th>
					<th>Last Academic Year</th>
					<th>Total API Score for Assessement</th>
					<th>Annual Average API Score for Assessement</th>
				</tr>
				<tr>
					<td>I</td>
					<td>Teaching Learning and Evaluation Related Activities</td>
					<td><?php $muid=$_SESSION['username'];
				  				$get = mysqli_query($con, "select sum(Teach_LSTP_CTAPI) as value_sum  from Teach_LSTP where User_Id='".$muid."'");
                  $row = mysqli_fetch_assoc($get); 
                  $sum1 = $row['value_sum'];
				  echo $sum1;
				  
				  /*$query = mysqli_query($con,"select sum(Teach_LSTP_CTAPI) as value_sum  from Teach_LSTP where User_Id='".$muid."'");
				  while($row = mysqli_fetch_assoc($query))
				  {$sum1=row[];}*/
				  ?></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>II</td>
		<td>Co-Curricular,Extension,Professional,Development Related Activities</td>
		<td><?php ?></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total I+II</td>
		<td><?php ?></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>III</td>
		<td>Research Publication and Academic Contribution</td>
		<td><?php ?></td>
		<td></td>
		<td></td>
	</tr>
</table>
       </div> <!--table-responsive-->
	   </div><!--End of col-sm-9 class -->
	        <div class="col-sm-3">
	 			<div class="panel panel-primary">
      		 		<div class="panel-heading">
         				<h3 class="panel-title">QuickLinks</h3>
 	  			 	</div>
 	   				<div class="panel-body">
						<a href="general_Information.php">General Category</a><br><br>
						 <a href="academicActivity.php">Academic Activity </a><br><br>		 
						<a href="teachingLearning.php">Teaching Learning and Evalution Related Activities</a> <br><br>
						<a href="curricularActivities.php">Co-Curricular, Extension,Professional Development Related Activity</a><br><br>
   			 			<a href="researchPublication.php">Research, publication And Academic Contribution</a><br><br>
						<a href="otherInfo.php">Other Relevent Information<br> And Closures</a><br><br>
  	  				</div>	
   		 		</div>
	  		</div><!--End of col-sm-3 class -->
	   </div><!--End of row class -->
	</div><!--End of container class -->
</div><!--End of Wrap id -->
<?php
	      	include('footer.php');
	        include('jsLinks.php');
		  }
		  else{
		     header('location:index.php');
	      }
     ?>
</body>


</html>

