<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['userID']))
{
    // not logged in
    header('Location: Login.php');
    exit();
}
require('fpdf/fpdf.php');
$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/EventModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/TransactionModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    $EventModel = new EventModel;
    $transactionID =  $_COOKIE['cookieView'];
    $TransactionModel = new TransactionModel;
    $User = new User;






$EventPrice = $EventModel->getEventPrice($EventModel->getEventName($TransactionModel->getTransaction($transactionID)[2]));
$subTotal = $EventPrice * $TransactionModel->getTransaction($transactionID)[4];
$tax = 10;
$total = $tax*$subTotal/100 +$subTotal;


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$image="../../Logo/logoAnahid.png";
$pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );


$pdf->Cell(0,30,'',0,1);
$pdf->Cell(120,5,'ANAHID GARDENS NURSERY',0,0);
$pdf->Cell(59,5,'INVOICE',0,1);

$pdf->SetFont('Arial','',12);

$pdf->Cell(120,5,'9 - Abd Al Hamid Abou Heif - New Cairo',0,0);
$pdf->Cell(59,5,'',0,1);

$pdf->Cell(120,5,'Cairo',0,0);
$pdf->Cell(25,5,'Date ',0,0);
$pdf->Cell(34,5,$TransactionModel->getTransaction($transactionID)[3],0,1);

$pdf->Cell(120,5,'Phone [0114 159 7790] ',0,0);
$pdf->Cell(25,5,'Invoice # ',0,0);
$pdf->Cell(34,5,$transactionID,0,1);

$pdf->Cell(120,5,'Fax [+]',0,0);
$pdf->Cell(25,5,'Customer # ',0,0);
$pdf->Cell(34,5,$TransactionModel->getTransaction($transactionID)[1],0,1);

$pdf->Cell(100,10, '', 0,1);

$pdf->Cell(100,10, 'Bill To',0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5, 'Name', 0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5, 'Company Name', 0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5, 'Address', 0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5, 'Phone', 0,1);

$pdf->Cell(189,10,'' ,0,1);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(100,5,'Description',1,0);
$pdf->Cell(25,5, 'Taxable', 1,0);
$pdf->Cell(25,5,'Amount',1,0);
$pdf->Cell(39,5,'Price', 1, 1);

$pdf->SetFont('Arial','',12);

$pdf->Cell(100,5,$EventModel->getEventName($TransactionModel->getTransaction($transactionID)[2]),1,0);
$pdf->Cell(25,5, 'YES', 1,0);
$pdf->Cell(25,5,$TransactionModel->getTransaction($transactionID)[4], 1, 0);
$pdf->Cell(30,5,$EventPrice,1,0);
$pdf->Cell(9,5,'L.E.', 1, 1);

$pdf->Cell(125,5,'',0,0);
$pdf->Cell(25,5, 'Subtotal', 0,0);
$pdf->Cell(30,5,$subTotal, 1, 0);
$pdf->Cell(9,5,'L.E.', 1,1);

$pdf->Cell(125,5,'',0,0);
$pdf->Cell(25,5, 'Tax Rate', 0,0);
$pdf->Cell(30,5,$tax, 1, 0);
$pdf->Cell(9,5,'%', 1, 1);


$pdf->Cell(125,5,'',0,0);
$pdf->Cell(25,5, 'Total Due', 0,0);
$pdf->Cell(30,5,$total, 1, 0);
$pdf->Cell(9,5,'L.E.', 1, 1);

$pdf->Cell(30,20,'', 0, 1);

$pdf->Cell(50,10,'Signature',0,1);
$pdf->Cell(50,10,'.........................',0,1);




$pdf->Output();
?>