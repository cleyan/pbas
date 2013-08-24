
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
if(!empty($_POST['apb_show'])){
	$_SESSION['apb_show'] = 'show';
include('DBConnect.php');
	$opt = $_POST['ap'];
	$result = mysqli_query($con,"Select * from teach_apb where Teach_APB_TNO='".$opt."'") or die('error');
	$row = mysqli_fetch_array($result);
	$APB_TNO = $row['Teach_APB_TNO'];
	$APB_BEP = $row['Teach_APB_BEP'];
	$APB_ISSN = $row['Teach_APB_ISSN'];
	$APB_WPR = $row['Teach_APB_WPR'];
	$APB_NOC = $row['Teach_APB_NOC'];
	$APB_YN = $row['Teach_APB_MA'];
	$APB_API = $row['Teach_APB_API'];
	
}
if(!empty($_POST['ppij_delete'])){
	$PPIJ_TNO = $_POST['PPIJ_TNO'];
	$del = "DELETE from teach_ppij where Teach_PPIJ_TNO='".$PPIJ_TNO."'";
	$rel = mysqli_query($con, $del);
	unset($_SESSION['ppij_show']);
}

?>

