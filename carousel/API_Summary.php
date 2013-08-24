<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<?php
//DBConnect.php include the code for Database connectivity
include('DBConnect.php');
?>
<?php
	if(isset($_SESSION['username'])){
		include('template.php');}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Summary of API</title>
<style type="text/css">
table.mystyle
{
border-width: 0 0 1px 1px;
border-spacing: 0;
border-collapse: collapse;
border-style: solid;
margin:40px;
padding:0,0,0,50px;
font-size:12px;
}
.mystyle td, .mystyle th
{
font-size:12px;
margin: 2px;
padding: 4px;
border-width: 1px;
border-style: solid;
height:50px;
text-align:center;
}
</style>
</head>

<body>

<h2>Summary of API Score</h2>
<table class="mystyle">
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
</body>


</html>

