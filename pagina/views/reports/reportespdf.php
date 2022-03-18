<?php
require('../../assets/fpdf/fpdf.php');
date_default_timezone_set('America/Bogota');

class PDF extends FPDF
{
// Cabecera de página
//Numeros de paginas
//SetTextColor(255,255,255);es RGB extraer colores con GIMP
//SetFillColor()
//SetDrawColor()
//Line(derecha-izquierda, arriba-abajo,ancho,arriba-abajo)
//Color line setDrawColor(61,174,233)
//GetX() || GetY() posiciones en cm
//Grosor SetLineWidth(1)
// SetFont(tipo{COURIER, HELVETICA,ARIAL,TIMES,SYMBOL, ZAPDINGBATS}, estilo[normal,B,I ,A], tamaño)
// Cell(ancho , alto,texto,borde,salto(0/1),alineacion,rellenar, link)
//AddPage(orientacion[PORTRAIT, LANDSCAPE], tamño[A3.A4.A5.LETTER,LEGAL],rotacion)
//Image(ruta, poscisionx,pocisiony,alto,ancho,tipo,link)
//SetMargins(10,30,20,20) luego de addpage
  
function Header()
{
$this->Image('../../img/waves.png',-10,-1,110);
$this->Image('../../img/logo_login.png',130,30,60);
$this->SetY(40);
$this->SetX(128);

$this->SetFont('Arial','B',12);
$this->Cell(89, 80, 'REPORTE DE PRODUCTOS',0,1);
$this->SetY(45);
$this->SetX(144);
$this->SetFont('Arial','',8);
$this->Cell(40, 85, utf8_decode('Gestion de Inventario'));

$this->Ln(60);

}

function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Johan-Style © Todos los derechos reservados."),0,0,"C");
        
}


}



$pdf = new PDF();
require ("cn.php");
$consulta = "SELECT * FROM producto";
$resultado = mysqli_query($conexion, $consulta);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);




$pdf->SetX(15);
$pdf->SetFillColor(25,132,151);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(80, 12,('Nombre Producto'),0,0,'C',1);
$pdf->Cell(30, 12,('Existencia'),0,0,'C',1);
$pdf->Cell(30, 12,('Precio'),0,0,'C',1);
$pdf->Cell(30, 12,('Ultimo Precio'),0,1,'C',1);

$pdf->SetFont('Arial','',10);

while ($row=$resultado->fetch_assoc()) { // Se realiza ciclo while para obtener los datos de la base de datos

  $pdf->SetX(15);//posicionamos en x

  //-------------INTERCALAMOS COLOR LOS PARES DE UN COLOR Y LOS QUE NO DE OTRO


$pdf->SetFillColor(255, 255, 255 );


//--------------------------------TERMINAMOS DE PINTAR----------------------------

//                          DATOS

$pdf->Cell(80, 8, $row['nombreProducto'],'B',0,'C',1);
$pdf->Cell(30, 8, $row['existencia'],'B',0,'C',1);
$pdf->Cell(30, 8, $row['precio'],'B',0,'C',1);
$pdf->Cell(30, 8, $row['ultimoCosto'],'B',1,'C',1);
$pdf->Ln(0.5);

}


$pdf->Output();
?>