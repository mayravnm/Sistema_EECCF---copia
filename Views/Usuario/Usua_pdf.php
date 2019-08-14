<?php 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	$this->SetFont('Arial','B',15);
	$this->Ln(13);
	$this->Cell(30,10,'',0);
	//$this->Cell(150,10,getcwd());
	$this->Cell(130,10,'Nombre de Sistema',0);
	$this->SetFont('Arial','',8);
	$this->Cell(20,10,'Fecha: '.date('d-m-Y').'',0);
	$this->Ln(40);
	$this->Image('Views/default/fpdf/img/prueba.png', 10,8,33,'png');
	$this->SetFont('Arial', 'BU',11);
	$this->SetTextColor(244,70,17);
	$this->Cell(70,8,'',0);
	$this->Cell(100,14,'LISTADO DE USUARIOS',0);
	$this->Ln(23);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf= new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B',8);
$pdf->SetFillColor(247,94,37);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(88,88,88);
$pdf->Cell(30,8,'CEDULA',1,0,'C',1);
$pdf->Cell(40,8,'NOMBRE',1,0,'C',1);
$pdf->Cell(40,8,'APELLIDO',1,0,'C',1);
$pdf->Cell(40,8,'ESTACION',1,0,'C',1);
$pdf->Cell(40,8,'USUARIO',1,0,'C',1);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(0,0,0);
						
$query=('SELECT usua."CI",usua."Nombre",usua."Apellido",edc."NombreEDC",usua."Usuario"
					FROM "UsuarioEDC" AS usua
					LEFT JOIN "EDC" AS edc
					ON usua."CodigoSAP"=edc."CodigoSAP"; ' );
$result = pg_query($query);
if(pg_num_rows($result) > 0){
	while($row = pg_fetch_assoc($result)){
		 $pdf->Cell(30,8,$row['CI'],1);
		 $pdf->Cell(40,8,$row['Nombre'],1);
		 $pdf->Cell(40,8,$row['Apellido'],1);
		 $pdf->Cell(40,8,$row['NombreEDC'],1);
		 $pdf->Cell(40,8,$row['Usuario'],1);
		 $pdf->Ln(8);
	}
}



$pdf->Output();


 ?>
