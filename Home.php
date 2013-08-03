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
	}
</style>
</head>

<body>
<?php 
	if(isset($_SESSION['username'])){
		include('template.php');
?>
  <div class="index">
     <ul type="square">
	 	<h2 >Index</h2>
		<li><h3>General Category</h3>(Work in Progress)</li> 
		<li><h3>Academic Activity</h3> (Work in Progress)</li>
		<li><h3>Teaching Learing and Evalution Related Activities</h3> (Work in Progress)</li>
		<li><h3>Co-Curricular, Extension,Professional Development Related Activity</h3> (Work in Progress)</li>
	    <li><a href="Research Publication.php"> <h3>Research Publiaction & Academic Contribution</h3></a> (80-90% Completed)</li>
		<li><h3>Summary Of API Score</h3></li> (Work in Progress)
		<li><h3>Other Relevent Information And Closures</h3></li> (Work in Progress)
	 </ul>
</div>
<?php
	}
	else{
		header('location: index.php');
	}
?>
</body>
</html>
