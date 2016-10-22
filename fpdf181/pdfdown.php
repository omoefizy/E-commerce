<?php
require($_SERVER['DOCUMENT_ROOT'].'/fpdf181/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');
//specify width and height of the cell Multicell(width, height, string)
$pdf->Multicell(190,10); 
$pdf->Output('osi.pdf', 'D');

?>