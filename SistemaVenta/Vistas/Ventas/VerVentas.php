<?php
require_once "Acceso/pdf/fpdf.php";
$total = 0.00;
$pdf = new FPDF('P', 'mm', array(105 , 148));
$pdf->AddPage();
$pdf->setFont('Arial', 'B', 14);
$pdf->setTitle("Reporte de Venta");
$pdf->image ('http://localhost:40400/CrearSystem/Acceso/img/logo2.jpg', 70, 5, 30, 30, 'JPG');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(50, 5, utf8_decode("Tienda de Sport"), 0, 1, 'L');
$pdf->Cell(50, 5, utf8_decode(" "), 0, 1, 'L');
$pdf->Cell(20, 5, utf8_decode("Ruc"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode("0000000"), 0, 1, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Teléfono"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode("0984242424"), 0, 1, 'L');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección"), 0, 0, 'L');
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, utf8_decode("Caacupe"), 0, 1, 'L');
$pdf->Ln();
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(80, 8, utf8_decode("Datos del cliente"), 0, 1, 'C');

$pdf->setFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(20, 5, 'Ruc/Ci', 0, 0, 'L');
$pdf->Cell(50, 5, 'Nombre', 0, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('Teléfono'), 0, 0, 'L');
$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 5, utf8_decode($data['VentC']['ruc_cliente']), 0, 0, 'L');
$pdf->Cell(50, 5, utf8_decode($data['VentC']['nombre_cliente']), 0, 0, 'L');
$pdf->Cell(30, 5, utf8_decode($data['VentC']['telefono_cliente']), 0, 0, 'L');
$pdf->Ln(10);


$pdf->setFont('Arial', '', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(45, 5, utf8_decode('Descripción'), 1, 0, 'L', 1);
$pdf->Cell(10, 5, 'Cant.', 1, 0, 'L', 1);
$pdf->Cell(15, 5, 'Precio', 1, 0, 'L', 1);
$pdf->Cell(20, 5, 'Sub Total', 1, 1, 'L', 1);
 
 

foreach ($VentD as $row) {
    $subtotal = $row['cantidadVendida'] * $row['precio_articulo'];
    $total = $total + $subtotal;
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(45, 5, utf8_decode($row['nombre_articulo']), 0, 0, 'L');
    $pdf->Cell(10, 5, $row['cantidadVendida'], 0, 0, 'L');
    $pdf->Cell(15, 5, $row['precio_articulo'], 0, 0, 'L');
    $pdf->Cell(20, 5, number_format($subtotal,), 0, 1, 'L');
}

    $pdf->Ln();
    $pdf->Cell(90, 5, 'Total GS/.'. number_format( $total), 0, 1, 'R');
    

    
    $pdf->setFont('Arial', 'B', 10);
    $pdf->Cell(30, 5, utf8_decode("Tipo De Compra:"), 0, 0, 'L');
    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(50, 5, utf8_decode($data['VentC']['descripcion_tipoCompra']), 0, 1, 'L');
    $pdf->setFont('Arial', 'B', 10);
    $pdf->Cell(30, 5, utf8_decode("Tipo de Venta:"), 0, 0, 'L');
    $pdf->setFont('Arial', '', 10);
    $pdf->Cell(50, 5, utf8_decode($data['VentC']['descripcion_tipoPago']), 0, 1, 'L');
    $pdf->Ln();

    
$pdf->Output();
?>