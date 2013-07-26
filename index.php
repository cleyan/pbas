<html>
	<head>
		<title>
		IIPS-DAVV
		</title>
		<style>
		.header{
		min-height:75px;background-image:url('images/LightGreyBackground.jpg');padding:0px 0px 0px 50px;text-align:left;
		width:1242px;
		}
		.box{
		margin-left:800px;
		margin-right:80px;
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
		
		<div class="header">
			<table>
			<tr>
				<td width="100px"><a href="www.iips.edu.in"><img src="images/iipslogo.jpg" height="100px" width="100px"/> </a></td>
				<td style="padding:0px 0px 0px 750px"> Not Yet Registered??</td>
				<td style="padding:0px 0px 0px 10px"><a href="signup.php"> <img src="images/createaccount.jpg"/> </a></td>
			</tr>
		</table>
		</div>
		
		<div class="box" style="background-image:url('images/LightGreyBackground.jpg'); min-height:300px; min-width:300px;">
		
			<table width="100%">
				<tr style="font-size:20px;padding-bottom:25px;">
					<td> Sign in </td>
					<td align="right"> PBAS </td>
				</tr>
				<tr style="height:20px"><td></td></tr>
				<tr style="padding-top:30px;font-size:18px;">
					<b><td><span style="font-weight:bold">Username </span></td></b>
				</tr>
				<tr>	
					<td colspan="2"><form method="POST"><input class="tdwidthheight" type="email" name="username" autofocus="on" value="username"/></form></td>
				</tr>
				<tr style="height:10px"><td></td></tr>
				<tr style="padding-top:30px;font-size:18px;">
					<td> <span style="font-weight:bold">Password </span></td>
				</tr>
				<tr>	
					<td colspan="2"><form method="POST"><input class="tdwidthheight" type="password" name="password" value="password"/></form></td>
				</tr>
				<tr style="height:10px"><td></td></tr>
				<tr>
					<td>
					<form action="logincheck.php" method="POST">
					<input type="image" name="submit" src="images/signin.jpg"/> </form>
					</td>
					<td align="left"><input type="checkbox" name="staysignedin">Stay signed in</td>
				</tr>
				<tr style="height:7px"><td></td></tr>
				<tr>
					<td colspan="2"><a href="">Can't access your account</a></td>
				</tr>
			</table>
			
		</div>
		
	</body>
</html>