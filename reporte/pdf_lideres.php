<?php
	//SE LLAMAN LOS ARCHIVOS NECESARIOS
  session_start();
  include ("../conex.php");
  require_once("fpdf/fpdf.php");
 //CREACION CLASE PDF
 $pdf = new FPDF();
 //AÑADE LA PAGINA
$pdf->AddPage();
//CARACTERISTICAS DEL ENCABEZADO, TIPO DE LETRA, CELDAS Y TODO ESO
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/Logo_rm.png' , 10 ,8, 10 , 13,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, '"Centro Cristiano Restauracion Mundial"', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE TRABAJADORES', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 8, 'Cedula',1, 0, 'C');
$pdf->Cell(40, 8, 'Nombres',1, 0, 'C');
$pdf->Cell(40, 8, 'Apellidos',1, 0, 'C');
$pdf->Cell(30, 8, 'Telefono',1, 0, 'C');
$pdf->Cell(35, 8, 'Fecha nac.',1, 0, 'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$sql = 'SELECT * FROM lideres';
$rec=mysqli_query($enlace,$sql);
//SE MUESTRAN EN LA TABLA LOS DATOS CONSULTADOS DE LA BASE DE DATOS
while($row=mysqli_fetch_assoc($rec)){
	$pdf->Cell(30, 8,$row['ci_lider'],1, 0, 'C');
	$pdf->Cell(40, 8,$row['nom_lider'],1, 0, 'C');
	$pdf->Cell(40, 8,$row['ape_lider'],1, 0, 'C');
	$pdf->Cell(30, 8,$row['tel_lider'],1, 0, 'C');
	$pdf->Cell(35, 8,$row['fec_nac_lider'],1, 1, 'C');
}
//MUESTRA EL PDF
$pdf->Output();
?>
