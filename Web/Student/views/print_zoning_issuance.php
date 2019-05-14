<?php
 require('../../../resources/custom/fpdf/fpdf.php');
 require('../../../db_con.php');
 
 if (isset($_GET['getNo'])) 
    {
        $zdec_ID = $_GET['getNo'];
    }


$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
// Times regular 12
$pdf->SetFont('Arial');
// Arial bold 14
$pdf->SetFont('Arial','B',11);
// Removes bold
$pdf->SetFont('');


$pdf->Cell(190,0,'Republic of the Philippines',0,1,'C');
$pdf->ln();
$pdf->Cell(190,10,'Province of Batangas',0,1,'C');
$pdf->Cell(190,	0,'Municipality of Tuy',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,	30,'OFFICE OF THE DEPUTIZED ZONING ADMINISTRATOR',0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(192,	10,'DECISION ON ZONING',0,1,'C');
$pdf->SetFont('Arial','',11);

$pdf->Cell(40,15,'Application No:',0,1,'L'); 
$pdf->Cell(10,0,'Date of Receipt:',0,1,'L');



$pdf->Output();
?>
