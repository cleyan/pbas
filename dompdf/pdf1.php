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
				else
                {
					$sample="bye";
                }

//Select query for Reading/Instructional material consulted and additional knowledge resources provided to students

$sqlrimc="SELECT * from teach_rimc where user_id='$user' and year='$year'";
                $rimcresult=mysqli_query($con , $sqlrimc) or die('Error'.mysqli_error($con));


//Select query for Use of Participatory and innovative Teaching-Learning Methodologies, Updating of subject contents

$sqltlm="SELECT * from teach_tlm where user_id='$user' and year='$year'";
                $tlmresult=mysqli_query($con , $sqltlm) or die('Error'.mysqli_error($con));

//Select query for  Examination Duties Assigned and Performed 

$sqledap="SELECT * from teach_edap where user_id='$user' and year='$year'";
                $edapresult=mysqli_query($con , $sqledap) or die('Error'.mysqli_error($con));
                

 //Select query for (i) Extension, Co-curricular & Field based activities.

$sqlecfa="SELECT * from teach_ecfa where user_id='$user' and year='$year'";
                $ecfaresult=mysqli_query($con , $sqlecfa) or die('Error'.mysqli_error($con));


//Select query for Contribution to Corporate Life and Management of the Institution.

$sqlclmi="SELECT * from teach_clmi where user_id='$user' and year='$year'";
                $clmiresult=mysqli_query($con , $sqlclmi) or die('Error'.mysqli_error($con));


//Select query for Professional Development Activities.

$sqlpda="SELECT * from teach_pda where user_id='$user' and year='$year'";
                $pdaresult=mysqli_query($con , $sqlpda) or die('Error'.mysqli_error($con));


//Select query for Published Papers in Journals.

$sqlppij="SELECT * from teach_ppij where user_id='$user' and year='$year'";
                $ppijresult=mysqli_query($con , $sqlppij) or die('Error'.mysqli_error($con));


//Select query for Articles/ Chapters published in Books                 

$sqlapb="SELECT * from teach_apb where user_id='$user' and year='$year'";
                $apbresult=mysqli_query($con , $sqlapb) or die('Error'.mysqli_error($con));


 /*General Information Table */
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

/*Academic activity table    */

    $acrow = mysqli_fetch_array($acresult);
    $html.=
    '<br><B>Whether acquired any degree or fresh academic qualification during the year : '.$acrow['Gen_Info_AQ'].''.
    '<br><B>Whether acquired any degree or fresh academic qualification during the year: '.$acno.''.
    '<br><table width="100%" border="1px">'.
    '<tr><th>Name of Course</th><th>Place</th><th>Duration</th><th>Sponsoring Agency</th>';
   while($acadrow = mysqli_fetch_array($acadresult)){
    $html .='<tr><th>'.$acadrow['Gen_Info_Noc'].'</th><th>'.$acadrow['Gen_Info_Place'].'</th><th>'.$acadrow['Gen_Info_Duration'].'</th><th>'.$acadrow['Gen_Info_SA'].'</th>';}

    $html.='<h3><b><center>PART B : ACADEMIC PERFORMACE INDICATORS</center></b></h3><br/>'.

/*CATEGORY  I : TEACHING LEARNING AND EVALUATION RELATED ACTIVITES*/
/*LSTP Table*/    

    '</table><h3><center><b>CATEGORY  I : TEACHING LEARNING AND EVALUATION RELATED ACTIVITES</b> </center></h3><br/>'.
    '<h4>(i) Lecture, Seminar, Tutorial, Practical, Contact Hours (Semester Wise)</h4>'.
    '<table width="100%" border="1px">'.
    '<tr><th>Course/Paper</th><th>Level</th><th>Mode of Teaching</th> <th>No. of classes/per week allocated</th> <th>Total no. of classes conducted</th> <th>Practicals</th> <th>% of classes taken as per documented record</th>';
    while($lstprow=mysqli_fetch_array($lstpresult)){
    $html .='<tr><td>'.$lstprow['Teach_LSTP_Course'].'</td> <td>'.$lstprow['Teach_LSTP_Level'].'</td><td>'.$lstprow['Teach_LSTP_MOT'].'</td><td>'.$sample.'</td> <td>'.$lstprow['Teach_LSTP_NOCC'].'</td> <td>'.$lstprow['Teach_LSTP_Practicals'].'</td> <td>'.$lstprow['Teach_LSTP_CTDR'].'</td> ';}

    $html .='</table><br/><b><h4>Lecture (L), Seminars (S), Tutorials (T), Practical (P), Contact Hours (C)</h4></b>'.
    	'<table border="1px" width="100%">'.
    	'<tr><th></th> <th></th> <th>API Score</th></tr>'.
    	'<tr><th>(a)</th><th>Classes Taken (max 50 for 100% performance & Proportionate Score upto 80% performance, below which no score may be given) </th><td>'.$lstpapi['Teach_LSTP_CTAPI'].'</td></tr>'.
    	'<tr><th>(b)</th><th>Teaching Load in excess of UGC norm (max score:10)</th><td>'.$lstpapi['Teach_LSTP_TLAPI'].'</td></tr>'.
		
/*RIMC Table*/

        '</table><br/><h4>(ii) Reading/Instructional material consulted and additional knowledge resources provided to students :</h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Course Paper</th><th>Consulted </th><th>Prescribed</th> <th>Additional Resources Provided</th>';
        while($rimcrow = mysqli_fetch_array($rimcresult)){
        $html .='<tr><th>'.$rimcrow['Teach_RIMC_Course'].'</th><th>'.$rimcrow['Teach_RIMC_Consulted'].'</th><th>'.$rimcrow['Teach_RIMC_Prescribed'].'</th><th>'.$rimcrow['Teach_RIMC_ARP'].'</th>';}
        
/*TLM Table*/

        $html.='</table><br/><h4>(iii) Use of Participatory and innovative Teaching-Learning Methodologies, Updating of subject contents :</h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Short Description</th><th>API Score</th>';
        while($tlmrow = mysqli_fetch_array($tlmresult)){
        $html .='<tr><th>'.$tlmrow['Teach_TLM_SD'].'</th><th>'.$tlmrow['Teach_TLM_API'].'</th>';}

/*EDAP Table*/ 

        $html.='</table><br/><h4>(iv) Examination Duties Assigned and Performed </h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Type of Examination duties</th><th>Duties Assigned</th><th>Extent to which carried out(%) </th><th>API Score</th>';
        while($edaprow = mysqli_fetch_array($edapresult)){
        $html .='<tr><th>'.$edaprow['Teach_EDAP_TED'].'</th><th>'.$edaprow['Teach_EDAP_DA'].'</th><th>'.$edaprow['Teach_EDAP_ECO'].'</th><th>'.$edaprow['Teach_EDAP_API'].'</th>';}      
        
/*CATEGORY  II : CO-CURRICULAR, EXTENSION, PROFESSIONAL DEVELOPMENT  RELATED  ACTIVITIES */
        $html.='</table><br/><h3><center><b>CATEGORY  II : CO-CURRICULAR, EXTENSION, PROFESSIONAL DEVELOPMENT  RELATED  ACTIVITIES </b> </center></h3><br/>'.
        
/*ECFA Table*/

        '</table><br/><h4>(i) Extension, Co-curricular & Field based activities. </h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Type of Activity</th><th>Average Hrs/Week</th><th>API Score</th>';
        while($ecfarow = mysqli_fetch_array($ecfaresult)){
        $html .='<tr><th>'.$ecfarow['Teach_ECFA_TOA'].'</th><th>'.$ecfarow['Teach_ECFA_AH'].'</th><th>'.$ecfarow['Teach_ECFA_API'].'</th>';}      

/*CLMI Table*/
        
        $html.='</table><br/><h4>(ii) Contribution to Corporate Life and Management of the Institution. </h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Type of Activity</th><th>Yearly/Semester wise responsibility</th><th>API Score</th>';
        while($clmirow = mysqli_fetch_array($clmiresult)){
        $html .='<tr><th>'.$clmirow['Teach_CLMI_TOA'].'</th><th>'.$clmirow['Teach_CLMI_YSR'].'</th><th>'.$clmirow['Teach_CLMI_API'].'</th>';}      

/*PDA Table*/

        $html.='</table><br/><h4>(iii) Professional Development Activities</h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Type of Activity</th><th>Yearly/Semester wise responsibility</th><th>API Score</th>';
        while($pdarow = mysqli_fetch_array($pdaresult)){
        $html .='<tr><th>'.$pdarow['Teach_PDA_TOA'].'</th><th>'.$pdarow['Teach_PDA_YWR'].'</th><th>'.$pdarow['Teach_PDA_API'].'</th>';}      

/*CATEGORY   III : RESEARCH, PUBLICATION AND ACADEMIC CONTRIBUTION*/
        $html.='</table><br/><h3><center><b>CATEGORY   III : RESEARCH, PUBLICATION AND ACADEMIC CONTRIBUTION</b> </center></h3><br/>'.

/*PPIJ Table*/

        '</table><br/><h4>A) Published Papers in Journals.</h4>'.
        '<table width="100%" border="1px">'.
        '<tr><th>Title with page no.</th><th>Journal</th><th>ISSN/ISBN No.</th> <th>Whether peer reviewed.Impact factor,if any</th> <th>No. of Co.authors</th> <th>Whether you are the main author</th> <th>API Score</th>';
        while($ppijrow = mysqli_fetch_array($ppijresult)){
        $html.='<tr><th>'.$ppijrow['Teach_PPIJ_TNO'].'</th><th>'.$ppijrow['Teach_PPIJ_Journal'].'</th> <th>'.$ppijrow['Teach_PPIJ_ISBN'].'</th> <th>'.$ppijrow['Teach_PPIJ_PR'].'</th> <th>'.$ppijrow['Teach_PPIJ_NCA'].'</th> <th>'.$ppijrow['Teach_PPIJ_MA'].'</th>  <th>'.$ppijrow['Teach_PPIJ_API'].'</th>';}      
        
/*APB Table*/

        

/*PPIJ Table*/
        
        $html.='</table><br/><h4>B (i) Articles/ Chapters published in Books</h4><br>';
        
        $html.='<br/></body></html>';
        

$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->stream("PBAS.pdf");

?>