<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<style type="text/css">
	.tab{
	
	border-style:dotted;
	
	border: 0px solid #040809;
	}
	.pre{
	background-color:#FFFFFF;
	}
	#dropdown{
		margin-top:-12px;
		display:none;
		color:#000000;
	}
	.pictab{
		float: right;
		margin-top: -140px;
	}

	.logop{
		margin-top:10px;
	}
	.hr{
		margin-top:-21px;
	}
	h1{
		color:#999999;
	}
</style> 


<body>
<?php
		include('DBCOnnect.php');
		$sql = "SELECT DISTINCT path FROM image WHERE name = 'Default'";
		$result = mysqli_query($con,$sql);
		if(!$result){
			echo "Error : ".mysqli_error($con);
		}
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		
		
?>
<table class='tab' border=0 cellpadding="0" cellspacing="0" height="150" width="90%">
  <tr >
	<td class='logo' valign="baseline" align="center" height="25" width="12%"><img class="logop" src="images/logo.jpg" width="150"/><hr/></td>
	<td class='text' width="70%" valign="top"><h1>Performance Based Appraisal System </h1> <hr class='hr' />
	</td>
	</tr>
</table>
<div  class="pictab">
<table border=0 width="20">
  <tr>
	<td >
	<?php echo "<img class ='propic' src='images/".$row['path']."' width='120' height='180'/>"; ?>
	<div class="dd" >
			<img class="drop" src="images/arroback copy.jpg" width="130" height="23" />
	  		<div id="dropdown">
  		 <pre class="pre">Profile
Settings
About
Log Out</pre>
 </div>
 </div>
 </td></tr>
 </table>

</div>
	<br /><br />
	
	
</body>
</html>