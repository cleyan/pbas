<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PBAS | HOME</title>
<style type="text/css">
	.index{
		color:#0066FF;
		width:400px;
		font-size:14px;
 	}
</style>
</head>
<body>
<?php 
	if(isset($_SESSION['username'])){
		include('Template.php');
?>
 <div class="container">
    <div class="index">
      <ul type="square">
	 	<h2 style="">Index</h2>
		<li>General Category</li>(Work in Progress) <br /><br />
		<li>Academic Activity</li> (Work in Progress)<br /><br />
		<li>Teaching Learing and Evalution Related Activities</li> (Work in Progress)<br /><br />
		<li>Co-Curricular, Extension,Professional Development Related Activity </li>(Work in Progress)<br /><br />
	    <li><a href="researchPublication.php">Research Publiaction & Academic Contribution</a></li> (80-90% Completed)<br /><br />
		<li><a href="API_Summary.php">Summary Of API Score</a></li> (90% completed)<br /><br />
		<li>Other Relevent Information And Closures</li> (Work in Progress)<br /><br />
	 </ul>
   </div>
</div>
<?php
	}
	else{
		header('location: index.php');
	}
?>
</body>
</html>
