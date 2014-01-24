<?php 

// INCLUDEM CONFIGUL SI INITIALIZAM CLASELE DE SISTEM
include('db_connect.php');
require_once("/dompdf_config.inc.php");

// Database
// Conectarea LA BAZA DE DATE !!!


// Session
// SESIUNEA CARE TINE UTILIZATORUL LOGAT !
     
?>

<html>
<head>
    
    
    <title>pbas</title>
</head>
<body>
    
    
                <?php 

                // daca nu exista id-ul produsului
                $sqlinv="SELECT * FROM acad_act";
    $res_inv = mysql_query($sqlinv) or die(mysql_error());
    while ($sql3=mysql_fetch_array($res_inv)) {
            $inv_id = $sql3['User_id'];
            $date = $sql3['Year'];
            $cname = $sql3['Gen_Info_AQ'];
            $subtotal = $sql3['Gen_Info_NOC'];
            $disc = $sql3['Gen_Info_Place'];
            $subtotal2 = $sql3['Gen_Info_Duration'];
            $tax = $sql3['Gen_Info_SA'];
            $gtotal = $sql3['Gen_Info_Aqyear'];
    }
                     
                            
                                 ."<p>".$date."</p>
                                <p>".$cname."</p>
                                
                       
                            
</body>
</html>."?>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("factura.pdf");

?>