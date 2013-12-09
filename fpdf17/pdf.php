

<?php
require('fpdf.php');

class geninfo {
    public function all() {
        try {
			
            $db = new PDO('mysql:host=localhost;dbname=pbas;charset=UTF-8', 'user', 'password');
            $query = $db->prepare("SELECT * FROM gen_info ");
            $query->execute();
            return ($gen = $query->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            //echo "Exeption: " .$e->getMessage();
            $result = false;
        }
        $query = null;
        $db = null;
        //return $gen;        
    }
}

class geninfoPDF extends FPDF {
    // Create basic table
    public function CreateTable($header, $data)
    {
        // Header
        $this->SetFillColor(0);
        $this->SetTextColor(255);
        $this->SetFont('','B');
        foreach ($header as $col) {
            //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
            $this->Cell($col[1], 12, $col[0], 1, 0, 'L', true);
        }
        $this->Ln();
        // Data
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('');
        foreach ($data as $row)
        {
            $i = 0;
            foreach ($row as $field) {
                $this->Cell($header[$i][1], 12, $field, 1, 0, 'L', true);
                $i++;
            }
            $this->Ln();
        }
    }
}

// Column headings
$header = array(
             array('user id',30), 
             array('Middle Name',30), 
             array('Last Name',30),
             array('Age',50),
             array('Email',47),
			 array('a',30), 
             array('b',30), 
             array('c',30),
             array('d',50),
             array('e',47),
			  array('f',  30), 
             array('g', 30)
             
          );
// Get data
$gen = new geninfo();
$data = $gen->all();
echo $data;

$pdf = new geninfoPDF();
$pdf->SetFont('Arial', '', 12);
$pdf->AddPage();
$pdf->CreateTable($header,$data);
$pdf->Output();
?>