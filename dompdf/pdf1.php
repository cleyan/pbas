<?php
require_once("dompdf_config.inc.php");
include('../DBConnect.php');
session_start();
$year=$_SESSION['pbasYear'];
$user = $_SESSION['username'];

//Select query for general information
$sqlgen="SELECT * from gen_info where user_id='$user'";
                $genresult=mysqli_query($con,$sqlgen) or die('Error'.mysqli_error($con));
                $genrow=mysqli_fetch_array($genresult);
                $name=$genrow['Gen_Info_Name'];
                $fname=$genrow['Gen_Info_Fname'];
                $mname=$genrow['Gen_Info_Mname'];
               $dept=$genrow['Gen_Info_Department'];
                $cd=$genrow['Gen_Info_CD'];
                $gp=$genrow['Gen_Info_GP'];
                $dlp=$genrow['Gen_Info_DLP'];
                $afc=$genrow['Gen_Info_AFC'];
                $pa=$genrow['Gen_Info_PA'];
                $tno=$genrow['Gen_Info_TNO'];
                $email=$genrow['Gen_Info_Email'];

//Select query for academic activity
$sqlacad="SELECT * FROM acad_act where user_id='$user' and year='$year'";
                $acadresult = mysqli_query($con,$sqlacad) or die('Error'.mysqli_error($con));
                $acresult = mysqli_query($con,$sqlacad) or die('Error'.mysqli_error($con));
                $acrw=mysqli_fetch_array($acresult);
                
                if($acrw>0)
                {

                    $acno="Yes";

                }
                else
                {
                	$acno="No";
                }	

//Select query for Lectures, Seminar,Tutorial, Practical, Contact Hours
$sqllstp="SELECT * from teach_lstp where user_id='$user' and year='$year'";
				$lstpresult=mysqli_query($con , $sqllstp) or die('Error'.mysqli_error($con));
				$lstpapi=mysqli_fetch_array($lstpresult);
				if($lstpapi>0)
				{
					$sample="hii";
				}
				else{
					$sample="bye";}

  //$html variable contains all the html code to be rendered as pdf which contains data
  $html =
    '<html><body>'.
    '<h3><center>University of Indore</center></h3><br/>'.
    '<h3><center>Devi Ahilya University, Indore</center></h3><br/>'.
    '<h4><center>Annual Self-Assessment for the Performance Based Appraisal System (PBAS)</center></h4><br/>'.
    '<h4><center>Session/Year :'.$year.' </center></h4><br/>'.
    '<h3><center>PART A : GENERAL INFORMATION</center></h3><br/>'.
    '<table border="1px" width="100%"><tr><th>Name</th><td>'.$name.'</td></tr>'.
    '<tr><th align="left">Father`s Name</th><td>'.$fname.'</td></tr>'.
    '<tr><th>Mother`s Name</th><td>'.$mname.'</td></tr>'.
    '<tr><th>Department</th><td>'.$dept.'</td></tr>'.
    '<tr><th>Current Designation</th><td>'.$cd.'</td></tr>'.
    '<tr><th>Grade Pay</th><td>'.$gp.'</td></tr>'.
    '<tr><th>Date of Last Promotion</th><td>'.$dlp.'</td></tr>'.
    '<tr><th>Address for Correspondance</th><td>'.$afc.'</td></tr>'.
    '<tr><th>Permanent Address</th><td>'.$pa.'</td></tr>'.
    '<tr><th>Contact No.</th><td>'.$tno.'</td></tr>'.
    '<tr><th>Email</th><td>'.$email.'</td></tr>'.
    '</table>';
    $acrow = mysqli_fetch_array($acresult);
    $html.=
    '<br><B>Whether acquired any degree or fresh academic qualification during the year : '.$acrow['Gen_Info_AQ'].''.
    '<br><B>9.	Academic Staff College Orientation/Refresher Course attended during the year: '.$acno.''.
    '<br><table width="100%" border="1px">'.
    '<tr><th>Name of Course</th><th>Place</th><th>Duration</th><th>Sponsoring Agency</th>';
   while($acadrow = mysqli_fetch_array($acadresult)){

    $html .='<tr><th>'.$acadrow['Gen_Info_Noc'].'</th><th>'.$acadrow['Gen_Info_Place'].'</th><th>'.$acadrow['Gen_Info_Duration'].'</th><th>'.$acadrow['Gen_Info_SA'].'</th>';}

    $html.='<h3><b><center>PART B : ACADEMIC PERFORMACE INDICATORS</center></b></h3><br/>'.
    '</table><h3><center><b>CATEGORY  I : TEACHING LEARNING AND EVALUATION RELATED ACTIVITES</b> </center></h3><br/>'.
    '<h4><center>(i) Lecture, Seminar, Tutorial, Practical, Contact Hours (Semester Wise)</center></h4><br/>'.
    '<br><table width="100%" border="1px">'.
    '<tr><th>Course/Paper</th><th>Level</th><th>Mode of Teaching</th> <th>No. of classes/per week allocated</th> <th>Total no. of classes conducted</th> <th>Practicals</th> <th>% of classes taken as per documented record</th>';
   while($lstprow=mysqli_fetch_array($lstpresult)){
    $html .='<tr><td>'.$lstprow['Teach_LSTP_Course'].'</td> <td>'.$lstprow['Teach_LSTP_Level'].'</td><td>'.$lstprow['Teach_LSTP_MOT'].'</td><td>'.$sample.'</td> <td>'.$lstprow['Teach_LSTP_NOCC'].'</td> <td>'.$lstprow['Teach_LSTP_Practicals'].'</td> <td>'.$lstprow['Teach_LSTP_CTDR'].'</td> ';}

    $html .='</table><br/><b><h4>Lecture (L), Seminars (S), Tutorials (T), Practical (P), Contact Hours (C)</h4></b><br/>'.
    	'<table border="1px" width="100%">'.
    	'<tr><th></th> <th></th> <th>API Score</th></tr>'.
    	'<tr><th>(a)</th><th>Classes Taken (max 50 for 100% performance & Proportionate Score upto 80% performance, below which no score may be given) </th><td>'.$lstpapi['Teach_LSTP_CTAPI'].'</td></tr>'.
    	'<tr><th>(b)</th><th>Teaching Load in excess of UGC norm (max score:10)</th><td>'.$lstpapi['Teach_LSTP_TLAPI'].'</td></tr>'.
		'</table></body></html>';


$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->stream("PBAS.pdf");

?>