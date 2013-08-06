<?php
	session_start();
	if(isset($_POST['username']) and isset($_POST['password'])){
		//If the user just tried to log in
		$user = $_POST['username'];
		$pass = $_POST['password'];
		include('DBConnect.php');
		$result = mysqli_query($con,"Select * from userinfo where User_Id ='".$user."' and Pwd = '".$pass."'");
		$row = mysqli_fetch_array($result);
		if($row['User_Id']==$user and $row['Pwd']==$pass){
			$_SESSION['username'] = $user;
		}
		mysqli_close($con);
	}
?>
<html>
	<head>
		<title>
		IIPS-DAVV
		</title>
		<style>
		.header{
		min-height:75px;background-image:url('images/LightGreyBackground.jpg');padding:0px 0px 0px 0px;text-align:left;
		width:100%;
		}
		.box{
		float:right;
		margin-top:50px;
		padding:25px;
		}
		.tdwidthheight{
		min-width:300px;
		font-size:20px;
		}
		</style>
	</head>
	<body>
		<?php
			if(isset($_SESSION['username'])){
			header('Location:Home.php');
		}
		else{
		?>
		<div class="header">
			<table width="100%">
			<tr>
				<td width="100px"><a href="www.iips.edu.in"><img src="images/iipslogo.jpg" height="100px" width="100px"/> </a></td>
				<td style="float:right;"> Not Yet Registered??</br>
				<a href="signup.php"> <img src="images/createaccount.jpg"/> </a></td>
			</tr>
		</table>
		</div>
		
		<div class="box" style="background-image:url('images/LightGreyBackground.jpg'); min-height:300px; min-width:300px;">
		
			<table width="100%">
				<tr style="font-size:20px;padding-bottom:25px;">
					<td> Sign in </td>
					<td align="right"> PBAS </td>
				</tr>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
				<tr style="height:20px"><td></td></tr>
				<tr style="padding-top:30px;font-size:18px;">
					<b><td><span style="font-weight:bold">Username </span></td></b>
				</tr>
				<tr>	
					<td colspan="2"><input class="tdwidthheight" type="text" name="username" autofocus="on"/></td>
				</tr>
				<tr style="height:10px"><td></td></tr>
				<tr style="padding-top:30px;font-size:18px;">
					<td> <span style="font-weight:bold">Password </span></td>
				</tr>
				<tr>	
					<td colspan="2"><input class="tdwidthheight" type="password" name="password" /></td>
				</tr>
				<tr style="height:10px"><td></td></tr>
				<tr>
					<td>
					<input type="image" name="submit" src="images/signin.jpg"/>
					</td>
					<td align="left"><input type="checkbox" name="staysignedin">Stay signed in</td>
				</tr>
				</form>
				<tr style="height:7px"><td></td></tr>
				<tr>
					<td colspan="2"><a href="">Can't access your account</a></td>
				</tr>
			</table>
			
		</div>
		<?php
			}
		?>
	</body>
</html>