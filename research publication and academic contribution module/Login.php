<!DOCTYPE HTML>
<?php
	session_start();
	if(isset($_POST['email']) and isset($_POST['pass'])){
		//If the user just tried to log in
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		include('DBConnect.php');
		$result = mysqli_query($con,"Select * from userinfo where User_Id ='".$email."' and Pwd = '".$pass."'");
		$row = mysqli_fetch_array($result);
		if($row['User_Id']==$email and $row['Pwd']==$pass){
			$_SESSION['valid_user'] = $email;
		}
		mysqli_close($con);
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login Modal Dialog Window with CSS and jQuery</title>
<link rel="stylesheet" type="text/css" href="index.css">
<style type="text/css">
h1{
	color:#999999;
}
h3{
	color:#999999;
}
</style>
</head>

<body>
<?php
	if(isset($_SESSION['valid_user'])){
		header('Location:RPAC.php');
	}
	else{
?>
  <h1>Performance Based Appraisal System </h1><br><hr>
  <Div align="center">
  <table border="0">
  	<tr><td>
        <div id="login-box" class="login-popup">
 		 	<form method="post" class="signin" action="#">
        	<fieldset class="textbox">
       	 <label class="username">
        <h3>Username or email</h3>
        <input id="username" name="email" value="" type="text" autocomplete="on" placeholder="E-Mail">
        </label>
        <label class="password">
        <span>Password</span>
        <input id="password" name="pass" value="" type="password" placeholder="Password">
        </label>
        <input type="submit" value="Sign In" class="button">
        <p>
        <a class="forgot" href="#">Forgot your password?</a>
        </p>        
        </fieldset>
           </form>
        </div></td>
<td>
<div align="center">
<h3> Or Sign Up Below </h3>
<form method="post" class="signin" action="#">
        <fieldset class="textbox">
		<label class="username">
        <span>First Name</span>
		<input id="username" name="fname" value="" type="text" autocomplete="on" placeholder="First Name">
		</label>
		<label class="username">
        <span>Last Name</span>
		<input id="lastname" name="lname" value="" type="text" autocomplete="on" placeholder="Last Name">
		</label>
		<label class="username">
        <span>E-Mail</span>
		<input id="e-mail" name="lname" value="" type="text" autocomplete="on" placeholder="Last Name">
		</label>
		<label class="password">
        <span>Password</span>
        <input id="password" name="password" value="" type="password" placeholder="Password"><br>
		<button class="submit button" type="button"><b>Sign Up</b></button>
        </label>
		</fieldset>
 </form>
</div>
</td></tr></table>
</Div>
<?php
	}
?>
</body>
</html>