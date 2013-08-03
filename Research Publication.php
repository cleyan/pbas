<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
?>
<?php
//DBConnect.php include the code for Database connectivity
include('DBConnect.php');

//Query for clicking on 'SAVE' button in 'Published Papers' form.
if(!empty($_POST['ppij_save'])){
	
	$PPIJ_TNO = $_POST['PPIJ_TNO'];
	$PPIJ_Journal = $_POST['PPIJ_Journal'];
	$PPIJ_ISBN = $_POST['PPIJ_ISBN'];
	$PPIJ_PR = $_POST['PPIJ_PR'];
	$PPIJ_NCA = $_POST['PPIJ_NCA'];
	$PPIJ_YN = $_POST['PPIJ_YN'];
	$PPIJ_API = $_POST['PPIJ_API'];
	$sql = "Insert into `teach_ppij` (Teach_PPIJ_Tno,Teach_PPIJ_Journal,Teach_PPIJ_ISBN,Teach_PPIJ_PR,Teach_PPIJ_NCA, Teach_PPIJ_MA,Teach_PPIJ_API) Values('$PPIJ_TNO','$PPIJ_Journal','$PPIJ_ISBN','$PPIJ_PR','$PPIJ_NCA','$PPIJ_YN','$PPIJ_API')";
	$result = mysqli_query($con,$sql) or die("error : ").mysqli_error($con);
	
}

//Query for clicking on "Save" Button in 'Article/Chapetrs' form
if(!empty($_POST['acpb_save'])){
	$APB_TNO = $_POST['APB_TNO'];
	$APB_BEP = $_POST['APB_BEP'];
	$APB_ISSN = $_POST['APB_ISSN'];
	$APB_WPR = $_POST['APB_WPR'];
	$APB_NOC = $_POST['APB_NOC'];
	$ACPB_Yes = $_POST['ACPB_Yes'];
	$APB_API = $_POST['APB_API'];
	$sql2 = "Insert into `teach_apb` (Teach_APB_Tno,Teach_APB_BEP,Teach_APB_ISSN,Teach_APB_WPR,Teach_APB_NOC, Teach_APB_MA,Teach_APB_API) Values('$APB_TNO','$APB_BEP','$APB_ISSN','$APB_WPR','$APB_NOC','$ACPB_Yes','$APB_API')";
	$result2 = mysqli_query($con,$sql2) or die("error : ").mysqli_error($con);
	if($result2){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}
if(!empty($_POST['fpcp_save'])){
	$FCP_TNO = $_POST['FCP_TNO'];
	$FCP_BEP = $_POST['FCP_BEP'];
	$FCP_ISSN = $_POST['FCP_ISSN'];
	$FCP_NOC = $_POST['FCP_NOC'];
	$FCP_Yes = $_POST['FCPS_Yes'];
	$FCP_API = $_POST['FCP_API'];
	$sql3 = "Insert into `teach_fcp` (Teach_FCP_Tno,Teach_FCP_BEP,Teach_FCP_ISSN,Teach_FCP_NOC, Teach_FCP_MA,Teach_FCP_API) Values('$FCP_TNO','$FCP_BEP','$FCP_ISSN','$FCP_NOC','$FCP_Yes','$FCP_API')";
	$result3 = mysqli_query($con,$sql3) or die("error : ").mysqli_error($con);
	if($result3){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}
if(!empty($_POST['bps_save'])){
	$BPE_TPN = $_POST['BPE_TPN'];
	$BPE_TBA = $_POST['BPE_TBA'];
	$BPE_PISSN = $_POST['BPE_PISSN'];
	$PE_WPR = $_POST['PE_WPR'];
	$BPE_NOC = $_POST['BPE_NOC'];
	$BPSA_Yes = $_POST['BPSA_Yes'];
	$BPE_API = $_POST['BPE_API'];
	$sql4 = "Insert into `teach_bpe` (Teach_BPE_TPN,Teach_BPE_TBA,Teach_BPE_PISSN,Teach_BPE_WPR,Teach_BPE_NOC, Teach_BPE_MA,Teach_BPE_API) Values('$BPE_TPN','$BPE_TBA','$BPE_PISSN','$PE_WPR','$BPE_NOC','$BPSA_Yes','BPE_API')";
	$result4 = mysqli_query($con,$sql4) or die("error : ").mysqli_error($con);
	if($result4){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error($con);
	}
}
if(!empty($_POST['opc_save'])){
	$OPC_Title = $_POST['OPC_Title'];
	$OPC_Agency = $_POST['OPC_Agency'];
	$OPC_Period = $_POST['OPC_Period'];
	$OPC_Gam = $_POST['OPC_GAM'];
	$OPC_API = $_POST['OPC_API'];
	$sql5 = "Insert into `teach_opc` (Teach_OPC_Title,Teach_OPC_Agency,Teach_OPC_Period,Teach_OPC_Gam,Teach_OPC_API) Values('$OPC_Title','$OPC_Agency','$OPC_Period','$OPC_Gam','$OPC_API')";
	$result5 = mysqli_query($con,$sql5) or die("error : ").mysqli_error($con);
	if($result5){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}
if(!empty($_POST['cpc_save'])){
	$CPC_Title = $_POST['CPC_Title'];
	$CPC_Agency = $_POST['CPC_Agency'];
	$CPC_Period = $_POST['CPC_Period'];
	$CPC_Gam = $_POST['CPC_GAM'];
	$CPC_API = $_POST['CPC_API'];
	$sql6 = "Insert into `teach_cpc` (Teach_CPC_Title,Teach_CPC_Agency,Teach_CPC_Period,Teach_CPC_Gam,Teach_CPC_API) Values('$CPC_Title','$CPC_Agency','$CPC_Period','$CPC_Gam','$CPC_API')";
	$result6 = mysqli_query($con,$sql6) or die("error : ").mysqli_error($con);
	if($result6){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}

if(!empty($_POST['rg_save'])){
	$RG_NE = $_POST['RG_NE'];
	$RG_TS = $_POST['RG_TS'];
	$RG_DA = $_POST['RG_DA'];
	$RG_API = $_POST['RG_API'];
	$sql7 = "Insert into `teach_rg` (Teach_RG_NE,Teach_RG_TS,Teach_RG_DA,Teach_RG_API) Values('$RG_NE','$RG_TS','$RG_DA','$RG_API')";
	$result7 = mysqli_query($con,$sql7) or die("error : ").mysqli_error($con);
	if($result7){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}
if(!empty($_POST['fdp_save'])){
	$FDP_Programme = $_POST['FDP_Programme'];
	$FDP_Duration = $_POST['FDP_Duration'];
	$FDP_Organized = $_POST['FDP_Organized'];
	$FDP_API = $_POST['FDP_API'];
	$sql8 = "Insert into `teach_fdp` (Teach_FDP_Programme,Teach_FDP_Duration,Teach_FDP_Organized,Teach_FDP_API) Values('$FDP_Programme','$FDP_Duration','$FDP_Organized','$FDP_API')";
	$result8 = mysqli_query($con,$sql8) or die("error : ").mysqli_error($con);
	if($result8){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}
if(!empty($_POST['ppc_save'])){
	$PPC_TPP = $_POST['PPC_TPP'];
	$PPC_TCS = $_POST['PPC_TCS'];
	$PPC_DOE = $_POST['PPC_DOE'];
	$PPC_Organized = $_POST['PPC_Organized'];
	$PPC_WINS = $_POST['PPC_WINS'];
	$PPC_API = $_POST['PPC_API'];
	$sql9 = "Insert into `teach_ppc` (Teach_PPC_TPP,Teach_PPC_TCS,Teach_PPC_DOE, Teach_PPC_Organized, Teach_PPC_WINS,Teach_PPC_API) Values('$PPC_TPP','$PPC_TCS','$PPC_DOE','$PPC_Organized','$PPC_WINS','$PPC_API')";
	$result9 = mysqli_query($con,$sql9) or die("error : ").mysqli_error($con);
	if($result9){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}
if(!empty($_POST['ilc_save'])){
	$ILC_TOL = $_POST['ILC_TOL'];
	$ILC_TCS = $_POST['ILC_TCS'];
	$ILC_DOE = $_POST['ILC_DOE'];
	$ILC_Organized = $_POST['ILC_Organized'];
	$ILC_WINS = $_POST['ILC_WINS'];
	$IlC_API = $_POST['ILC_API'];
	$sql10 = "Insert into `teach_ilc` (Teach_ILC_TOL,Teach_ILC_TCS,Teach_ILC_DOE, Teach_ILC_Organized, Teach_ILC_WINS,Teach_ILC_API) Values('$ILC_TOL','$ILC_TCS','$ILC_DOE','$ILC_Organized','$ILC_WINS','$ILC_API')";
	$result10 = mysqli_query($con,$sql10) or die("error : ").mysqli_error($con);
	if($result10){
		header('Location: rpac.php');
	}
	else{
		echo "Error".mysqli_error();
	}
}

//Query for showing submitted data (by selecting combobox value and then clicking on 'SHOW' button
//in the 'Published Papers' form.).
if(!empty($_POST['ppij_show'])){
	$_SESSION['ppij_show'] = 'show';
include('DBConnect.php');
	$opt = $_POST['pp'];
	$result = mysqli_query($con,"Select * from teach_ppij where Teach_PPIJ_TNO='".$opt."'") or die('error');
	$row = mysqli_fetch_array($result);
	$PPIJ_TNO = $row['Teach_PPIJ_TNO'];
	$PPIJ_Journal = $row['Teach_PPIJ_Journal'];
	$PPIJ_ISBN = $row['Teach_PPIJ_ISBN'];
	$PPIJ_PR = $row['Teach_PPIJ_PR'];
	$PPIJ_NCA = $row['Teach_PPIJ_NCA'];
	$PPIJ_YN = $row['Teach_PPIJ_MA'];
	$PPIJ_API = $row['Teach_PPIJ_API'];
}
if(!empty($_POST['ppij_delete'])){
	$PPIJ_TNO = $_POST['PPIJ_TNO'];
	$del = "DELETE from teach_ppij where Teach_PPIJ_TNO='".$PPIJ_TNO."'";
	$rel = mysqli_query($con, $del);
	unset($_SESSION['ppij_show']);
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Research, publication And Academic Contribution</title>
<link rel="stylesheet" href="CSS/RPAC_css.css" type="text/css" />
<style type="text/css">

.logout{
	position:relative;
	float:left;
	margin-left:500px;
	color:#FF0000;
}
</style>
<script type="text/javascript"src="JS/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>
</head>

<body>
<?php
	if(isset($_SESSION['username'])){
		include('template.php');
?>
<h2>Research, publication And Academic Contribution</h2>

<div class="container">

    <ul class="tabs">
        <li><a href="#tab1">Published Papers</a></li>
        <li><a href="#tab2">Articles</a></li>
        <li><a href="#tab3">Full Papers</a></li>
        <li><a href="#tab4">Books</a></li>
		<li><a href="#tab5">Projects</a></li>
		<li><a href="#tab6">Completed Projects</a></li>
		<li><a href="#tab7">Research</a></li>
		<li><a href="#tab8">Training</a></li>
		<li><a href="#tab9">Seminars</a></li>
		<li><a href="#tab10">Lectures</a></li>
		

    </ul>
    <div class="tab_container">
        <div id="tab1" class="tab_content" align="center">
            <h3>Published Papers in Journals</h3>
            <table>
	<form method="post" name="ppij" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title With Page Numbers </td><td><input type="text" name="PPIJ_TNO" value="<?php if(isset($_POST['pp']) and isset($_SESSION['ppij_show'])){ echo $PPIJ_TNO; } ?>"></td></tr>
              <tr> <td> Journal </td><td><input type="text" name="PPIJ_Journal" value="<?php if(isset($_POST['pp']) and isset($_SESSION['ppij_show'])){ echo $PPIJ_Journal; } ?>"/></td></tr>
		       <tr> <td>ISSN / ISBN No. </td><td><input type="text" name="PPIJ_ISBN" value="<?php if(isset($_POST['pp']) and isset($_SESSION['ppij_show'])){ echo $PPIJ_ISBN; } ?>" /></td></tr>
		     <tr> <td>  Whether peer reviewed. IMpact factor, if any</td><td> <input type="text" name="PPIJ_PR" value="<?php if(isset($_POST['pp']) and isset($_SESSION['ppij_show'])){ echo $PPIJ_PR; } ?>" /></td></tr>
		      <tr> <td> No. of Co-authors </td><td><input type="text" name="PPIJ_NCA" value="<?php if(isset($_POST['pp']) and isset($_SESSION['ppij_show'])){ echo $PPIJ_NCA; } ?>"/></td></tr>
		      <tr> <td>Whether you are the main Author </td><td><input type="radio" name="PPIJ_YN" >Yes <input type="radio" name="PPIJ_YN">NO<br /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="PPIJ_API" value="<?php if(isset($_POST['pp']) and isset($_SESSION['ppij_show'])){ echo $PPIJ_API; } ?>" /></td></tr>
			  <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="ppij_save" />
				<select name="pp">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_ppij");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_PPIJ_TNO']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="ppij_show"/><input type="submit" value="Delete" name="ppij_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
		</form></table>

        </div>
        <div id="tab2" class="tab_content" align="center">
            <h3>Articles / Chapters published in Books</h3>
            <table class="answer">
  <form method="post" name="apb" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title With Page Numbers </td><td><input type="text" name="APB_TNO"></td></tr>
              <tr> <td> Book Title, Editor And Publisher </td><td><input type="text" name="APB_BEP" /></td></tr>
		       <tr> <td>ISSN / ISBN No. </td><td><input type="text" name="APB_ISSN" /></td></tr>
		     <tr> <td>  Whether peer reviewed. IMpact factor, if any</td><td> <input type="text" name="APB_WPR" /></td></tr>
		      <tr> <td> No. of Co-authors </td><td><input type="text" name="APB_NOC"/></td></tr>
		      <tr> <td>Whether you are the main Author </td><td><input type="radio" name="ACPB_Yes" />Yes <input type="radio" name="ACPB_No" />No<br /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="APB_API" /></td></tr></table>
			 <input type="submit" value="Send" name="acpb_save" />
			 <select name="ap">
			 	<option>--Title--</option>
				<?php
					$sql2 = mysqli_query($con,"Select * from teach_apb");
					while($row = mysqli_fetch_assoc($sql2)){ ?>
					<option><?php echo $row['Teach_APB_TNO']; ?></option>		
				<?php } ?>
			 </select>
			 <input type="button" value="Show" name=""> <input type="button" value="Delete">
			 </form></table>
        </div>
        <div id="tab3" class="tab_content" align="center">
            <h3>Full Papers in Conference Proceedings</h3>
          	<table class="answer">
		<form method="post" name="fpcp" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title With Page Numbers </td><td><input type="text" name="FCP_TNO"></td></tr>
              <tr> <td> Details of Conference publications </td><td><input type="text" name="FCP_BEP" /></td></tr>
		       <tr> <td>ISSN / ISBN No. </td><td><input type="text" name="FCP_ISSN" /></td></tr>
		      <tr> <td> No. of Co-authors </td><td><input type="text" name="FCP_NOC" /></td></tr>
		      <tr> <td>Whether you are the main Author </td><td><input type="radio" name="FPCP_Yes" />Yes <input type="radio" name="FPCP_No" />No<br /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="FCP_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="fpcp_save" />
				<select name="fp">
					<option>--Title--</option>
					<?php 
						$sql3 = mysqli_query($con,"SELECT * from teach_fcp");
						while($row = mysqli_fetch_assoc($sql3)){
					?><option><?php echo $row['Teach_FCP_TNO']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="ppij_show"/><input type="button" value="Delete" /></td></tr>
			</form> </table>
            
        </div>
        <div id="tab4" class="tab_content" align="center">
            <h3>Books Published as Single Author or as a Editor</h3>
            <table class="answer">
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title With Page Numbers </td><td><input type="text" name="BPE_TPN"></td></tr>
			   <tr> <td>Type of Book And Authorship </td><td><input type="text" name="BPE_TBA"></td></tr>
		       <tr> <td>Publisher And ISSN / ISBN No. </td><td><input type="text" name="BPE_PISSN" /></td></tr>
			   <tr> <td> Whether Peer Reviewed</td><td><input type="text" name="PE_WPR" /></td></tr>
		      <tr> <td> No. of Co-authors </td><td><input type="text" name="BPE_NOC" /></td></tr>
		      <tr> <td>Whether you are the main Author </td><td><input type="radio" name="BPSA_Yes" />Yes <input type="radio" name="BPSA_No"/>No<br /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="BPE_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="bps_save" />
				<select name="bp">
					<option>--Title--</option>
					<?php 
						$sql4 = mysqli_query($con,"SELECT * from teach_bpe");
						while($row = mysqli_fetch_assoc($sql4)){
					?><option><?php echo $row['Teach_BPE_TPN']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="bpe_show"/><input type="submit" value="Delete" /></td></tr>
   </form> </table>
        </div>
		 <div id="tab5" class="tab_content" align="center">
            <h3>Ongoing Projects / Consultancies</h3>

            <table class="answer">
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title </td><td><input type="text" name="OPC_Title"></td></tr>
              <tr> <td> Agency </td><td><input type="text" name="OPC_Agency" /></td></tr>
		       <tr> <td>Period </td><td><input type="text" name="OPC_Period" /></td></tr>
		      <tr> <td> Grant / Amount Mobilized (Rs. Lakh) </td><td><input type="text" name="OPC_GAM" /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="OPC_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="opc_save" />
				<select name="op">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_opc");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_OPC_Title']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="opc_show"/><input type="submit" value="Delete" name="opc_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
			 </form>
			 </table>
        </div>
		<div id="tab6" class="tab_content" align="center">
            <h3>Completed Projects / Consultancies</h3>
            <table class="answer">
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title </td><td><input type="text" name="CPC_Title"></td></tr>
              <tr> <td> Agency </td><td><input type="text" name="CPC_Agency" /></td></tr>
		       <tr> <td>Period </td><td><input type="text" name="CPC_Period" /></td></tr>
		      <tr> <td> Grant / Amount Mobilized (Rs. Lakh) </td><td><input type="text" name="CPC_GAM" /></td></tr>
		     <tr> <td>Whether policy document / Patent as outcome</td><td><input type="text" name="CPC_WPD" /></td></tr>
			 <tr> <td> API Score </td><td><input type="text" name="CPC_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="cpc_save" />
				<select name="cp">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_cpc");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_CPC_Title']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="cpc_show"/><input type="submit" value="Delete" name="cpc_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
			 </form></table>
        </div>
		<div id="tab7" class="tab_content" align="center">
            <h3>Research Guidance</h3>
            <table class="answer">
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Number Enrolled</td><td><input type="text" name="RG_NE"></td></tr>
              <tr> <td>Thesis Submitted</td><td><input type="text" name="RG_TS" /></td></tr>
		       <tr> <td>Degree Awarded </td><td><input type="text" name="RG_DA" /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="RG_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="rg_save" />
				<select name="rg">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_rg");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_RG_NE']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="ppij_show"/><input type="submit" value="Delete" name="ppij_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
			 </form></table>
        </div>
		<div id="tab8" class="tab_content" align="center">
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <h3>Training Courses , Teaching-Learning-Evaluation Technology, Faculty Development Programmes</h3>
            <table class="answer">
		       <tr> <td>Programme</td><td><input type="text" name="FDP_Programme"></td></tr>
              <tr> <td>Duration</td><td><input type="text" name="FDP_Duration" /></td></tr>
		       <tr> <td>Organized By </td><td><input type="text" name="FDP_Organized" /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="FDP_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="fdp_save" />
				<select name="pp">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_fdp");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_FDP_Programme']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="fdp_show"/><input type="submit" value="Delete" name="fdp_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
			 </form></table>
        </div>
		<div id="tab9" class="tab_content" align="center">
            <h3>Papers Presented in Conferences, Seminars, Workshops, Symposia</h3>
            <table class="answer">
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title of the Paper Presented</td><td><input type="text" name="PPC_TPP"></td></tr>
              <tr> <td>Title Conference / Seminar etc.</td><td><input type="text" name="PPC_TCS" /></td></tr>
		       <tr> <td>Date (s) of the Event</td><td><input type="text" name="PPC_DOE" /></td></tr>
			  <tr> <td>Organized By </td><td><input type="text" name="PPC_Organized" /></td></tr>
			  <tr> <td>Whether International / National / State</td><td><input type="text" name="PPC_WINS" /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="PPC_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="ppc_save" />
				<select name="pc">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_ppc");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_PPC_TPP']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="ppc_show"/><input type="submit" value="Delete" name="ppc_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
			 </form></table>
        </div>
		<div id="tab10" class="tab_content" align="center">
            <h3>Invited Lectures and Chairmanship at National or International Conference/ Seminar</h3>
         
            <table class="answer">
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title of the Lecture / Academic Session</td><td><input type="text" name="ILC_TOL"></td></tr>
              <tr> <td>Title Conference / Seminar etc.</td><td><input type="text" name="ILC_TCS" /></td></tr>
		       <tr> <td>Date (s) of the Event</td><td><input type="text" name="ILC_DOE" /></td></tr>
			  <tr> <td>Organized By </td><td><input type="text" name="ILC_Organized" /></td></tr>
			  <tr> <td>Whether International / National / State</td><td><input type="text" name="ILC_WINS" /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="ILC_API" /></td></tr>
			 <tr><td colspan="2"><br />
			  	<input type="submit" value="Save" name="ilc_save" />
				<select name="il">
					<option>--Title--</option>
					<?php 
						include('DBConnect.php');
						$query = mysqli_query($con,"SELECT * from teach_ilc");
						while($row = mysqli_fetch_assoc($query)){
					?><option><?php echo $row['Teach_ILC_TOL']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Show" name="ilc_show"/><input type="submit" value="Delete" name="ilc_delete" /><input type="reset" value="Reset" name="reset" /></td></tr>
			 </form></table>
        </div>
    </div>
</div>
<?php echo '<p class="logout"><a href="logout.php"><h4>LOG OUT</h4></a></p>'; ?>
<?php echo '<p class="cp"><a href="changePass.php"><h4>CHANGE PASSWORD</h4></a></p>'; ?>
<?php
}
	else{
		
		echo '<h3 align="center">You Are Not Logged In !<h3><br>';
	}
?>
</body>
</html>