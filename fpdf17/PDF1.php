<?php
  session_start();
require('fpdf.php');
class Gen_Info {
    public function all1() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=pbas_db;charset=UTF-8', 'root', '');
			//echo $_SESSION['username'];
            $query = $db->prepare("SELECT * from Gen_Info where user_id='".$_SESSION['username']."'");
            $query->execute();
            $gen = $query->fetchAll(PDO::FETCH_ASSOC);
			
        } catch (PDOException $e) {
            //echo "Exeption: " .$e->getMessage();
            $result = false;
        }
        $query = null;
        $db = null;
        return $gen;        
    }
	public function all2() {
        try {
            $db1 = new PDO('mysql:host=localhost;dbname=pbas_db;charset=UTF-8', 'root', '');
			//echo $_SESSION['username'];
            $query1 = $db1->prepare("SELECT * from acad_act where user_id='".$_SESSION['username']."'");
            $query1->execute();
            $acad = $query1->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //echo "Exeption: " .$e->getMessage();
            $result = false;
        }
        $query1 = null;
        $db1 = null;
        return $acad;        
    }
	
	public function all3() {
        try {
            $db2 = new PDO('mysql:host=localhost;dbname=pbas_db;charset=UTF-8', 'root', '');
			//echo $_SESSION['username'];
            $query2 = $db2->prepare("SELECT Teach_LSTP_Course,Teach_LSTP_Level,Teach_LSTP_MOT,Teach_LSTP_NOCA,Teach_LSTP_NOCC,Practicals,Teach_LSTP_CTDR,Teach_LSTP_CTAPI,Teach_LSTP_TLAPI from teach_lstp where user_id='".$_SESSION['username']."'");
            $query2->execute();
            $lstp = $query2->fetchAll(PDO::FETCH_ASSOC);
			
        } catch (PDOException $e) {
            //echo "Exeption: " .$e->getMessage();
            $result = false;
        }
        $query2 = null;
        $db2 = null;
        return $lstp;        
    }
	
}

class Gen_InfoPDF extends FPDF {
    
    public function CreateTable($header1, $data1)
    {
       // Header
       $this->SetFillColor(0);
        $this->SetTextColor(255);
        $this->SetFont('','B');
		
       // Data
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('');
		
		$this->Cell(60, 10,"User Id", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['User_Id'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Name", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_Name'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Father's Name", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_Fname'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Mother's Name", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_Mname'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Department", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_Department'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Current Designation", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_CD'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Grade Pay", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_GP'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Date of Last Promotion", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_DLP'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Address For Correspondence", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_AFC'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Permanent Address", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_PA'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Contact No.", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_TNO'], 1, 0, 'C', true);
		$this->Ln();
		$this->Cell(60, 10,"Email", 1, 0, 'C', true);
		$this->Cell(120, 10, $data1[0]['Gen_Info_Email'], 1, 0, 'C', true);
		$this->Ln();
		//$this->Ln();
		 
    }
	public function CreateTable2($header2, $data2)
    {
       // Header
	   //$this->SetBorder(2);
       $this->SetFillColor(255);
        $this->SetTextColor(0);
        //$this->SetFont('','B');
        foreach ($header2 as $row) {
            //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
            $this->Cell(20, 10, $row[0], 1, 0, 'L', true);

        }
        $this->Ln();
       // Data
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        //$this->SetFont('');
        foreach ($data2 as $col)
        {
            $i = 0;
            foreach ($col as $field) {
                $this->Cell(20, 6, $field, 1, 0, 'L', true);
                $i++;
            }
            $this->Ln();
        }
    }
	
	public function CreateTable3($header3, $data3)
    {
       // Header
	   //$this->SetBorder(2);
       $this->SetFillColor(255);
        $this->SetTextColor(0);
       // $this->SetFont('','B');
        foreach ($header3 as $row) {
            //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
            $this->Cell(20, 10, $row[0], 1, 0, 'L', true);
        }
        $this->Ln();
       // Data
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        //$this->SetFont('');
        foreach ($data3 as $col)
        {
            $i = 0;
            foreach ($col as $field) {
                $this->Cell(20, 6, $field, 1, 0, 'L', true);
                $i++;
            }
            $this->Ln();
        }
    }
	   
}	



// Column headings


$header1 = array(
             array('User_Id','Name','Father Name','Mother Name','Department','Designation','Grade Pay','Date of Last promotion','AFC','Address','Cont. No.','Email'),
             array(15,10,10,15,10,10,15,40,10,20,12,15)
          );
// Get data
$gen = new Gen_Info();
$data1 = $gen->all1();
$pdf = new Gen_InfoPDF();
$pdf->AddPage();
$reportName = "PBAS Report";

$pdf->SetFont( 'Arial', 'B' );
$pdf->SetFillColor(255);
$pdf->SetTextColor(0);
$pdf->Cell(180, 10 ," UNIVERSITY OF INDORE", 0, 0, 'C', true);
//$pdf->Write( 6,'University of Indore');
$pdf->ln(10);
$pdf->Cell(180, 10 ," DEVI AHILYA UNIVERSITY, INDORE", 0, 0, 'C', true);
//$pdf->Write( 6,'Devi Ahilya University, Indore');
$pdf->ln(10);
$pdf->Cell(180, 10 ," Annual Self-Assessment for the Performance Based Appraisal System (PBAS)", 0, 0, 'C', true);
//$pdf->Write( 6,'Annual Self-Assessment for the Performance Based Appraisal System (PBAS)');
$pdf->ln(10);
$pdf->Cell(180, 10 ," Session/Year : ", 0, 0, 'C', true);
//$pdf->Write( 6,'Session/Year : ');
$pdf->ln(10);
$pdf->Cell(180, 10 ," PART A : GENERAL INFORMATION ", 0, 0, 'C', true);
//$pdf->Write( 6,'PART A : GENERAL INFORMATION : ');
$pdf->ln(10);
//heading for academic table
$header2 = array(
             array('User_Id',15),
             array('Year',10),
             array('A Q',10),
             array('NOC',15),  
             array('place',10),   
	     array('Duration',10),
             array('SA',15),
             array('A year',40),
             array('ASC',10)
          );

//$acad= new Gen_Info();
$data2=$gen->all2();
$pdf->SetFont( 'Arial', 'B' );
$pdf->CreateTable($header1,$data1);
$pdf->ln(5);
$pdf->CreateTable2($header2,$data2);
$pdf->ln(10);
$pdf->SetFillColor(255);
$pdf->SetTextColor(0);

$pdf->Cell(180, 10 ," PART B : ACADEMIC PERFORMACE INDICATORS", 0, 0, 'C', true);
//$pdf->ln(10);
//$pdf->Write( 6,'PART B : ACADEMIC PERFORMACE INDICATORS');

$pdf->ln(13);
$pdf->Write( 6,'CATEGORY  I : TEACHING LEARNING AND EVALUATION RELATED ACTIVITES ');
$pdf->ln(8);
$pdf->Write( 4,'(i) Lecture, Seminar, Tutorial, Practical, Contact Hours (Semester Wise)');
$pdf->ln(10);
//$pdf->Write( 6,'');

//$pdf->Output();

//Heading for Teach_LSTP

$header3 = array(
             array('Course/Paper',15),
             array('Level',10),
             array('Mode of Teaching',10),
             array('No. of classes/per week allocated',15),  
             array('Total No. of classes conducted',10),   
			 array('Practicals',10),
             array('% of classes taken as per documented record ',15),
             array('Teach_LSTP_CTAPI',10),
             array('Teach_LSTP_TLAPI',10)
          );
$data3=$gen->all3();
$pdf->CreateTable3($header3,$data3);
$pdf->ln(10);
$pdf->Output();
?>