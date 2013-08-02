<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!-- 
.style1 {font-weight: bold}
.style7 {
color: yellow;
font-size: 24px;
}
.style9 {
color: #FF6666;
font-weight: bold;
}
.style12 {
color: #666666;
font-weight: bold;
}
.style14 {color: #CC0033; font-weight: bold; }
-->
</style>
</head>

<body>
<?php
	$con = mysqli_connect('localhost','root','','info');
		if(mysqli_connect_errno($con)){
			echo 'Failed to connect to database : '.mysqli_connect_error($con);
			die();
		}
	if(!empty($_REQUEST['Submit'])){
		$sql = "UPDATE users set pass='".$_REQUEST['newp']."' where Users_Email = '".$_REQUEST['email']."'";
		if(mysqli_query($con,$sql)){
			header('Location : changePass.php?msg=updated');		
		}
	}
?>
<form action="changePass.php" method="post">
	<table width="47%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" align="center"></td>
</tr>
<tr bgcolor="#666666">
<td colspan="2"><span class="style7">Change Password</span></td>
</tr>
<?php if(!empty($_REQUEST['msg']) and $_REQUEST['msg']=="updated") { ?>
<tr bgcolor="#666666">
<td colspan="2"><span class="style7">Password has been changed successfully.</span></td>
</tr>
<?php } ?>
<tr>
<td bgcolor="#CCCCCC"><span class="style14">New Password:</span></td>
<td bgcolor="#CCCCCC"><input type="password" name="newp" id="newpassword" size="20" autocomplete="off"/>&nbsp; <label id="newpassword_label" class="level_msg"></td>
</tr>
<tr>
<td bgcolor="#CCCCCC"><span class="style14">Confirm Password:</span></td>
<td bgcolor="#CCCCCC"><input type="password" name="cpassword" id="cpassword" size="20" autocomplete="off">&nbsp; <label id="cpassword_label" class="level_msg"></td>
</tr>

<tr bgcolor="#666666">
<td colspan="2" align="center"><input type="submit" name="Submit" value="Update"  /></td>
</tr>
</form>
</body>
</html>
