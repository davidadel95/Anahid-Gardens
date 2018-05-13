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

require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/StudentRating.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/CurriculumModel.php";
require_once $rootPath . "/Anahid-Gardens/Admin/php/Model/User.php";
    $User = new User;
    $selectedDate =  $_COOKIE['cookieReportDate'];
    $UserID= $_SESSION['userID'];
    $StudentRating=new StudentRating;
    $Counter= $StudentRating->ViewSpecificChildForDay($UserID,$selectedDate);


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$image="../../Logo/logoAnahid.png";
$pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );


$pdf->Cell(0,30,'',0,1);
$pdf->Cell(120,5,'ANAHID GARDENS NURSERY',0,0);
$pdf->Cell(59,5,'Daily Report Sheet',0,1);

$pdf->SetFont('Arial','',12);

$pdf->Cell(120,5,'9 - Abd Al Hamid Abou Heif - New Cairo',0,0);
$pdf->Cell(59,5,'',0,1);

$pdf->Cell(120,5,'Cairo',0,0);
$pdf->Cell(25,5,'Date ',0,0);
$pdf->Cell(34,5,$selectedDate,0,1);

$pdf->Cell(120,5,'Phone [0114 159 7790] ',0,0);
$pdf->Cell(25,5,'Child # ',0,0);
$pdf->Cell(34,5,$UserID,0,1);

$pdf->Cell(120,5,'Fax [+]',0,1);


$pdf->Cell(100,10, '', 0,1);

$pdf->Cell(100,10, 'Report To',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5, $User->getUsername($UserID), 0,1);


$pdf->Cell(189,10,'' ,0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(74,5,'My Mood Was:',0,1);
$pdf->Cell(74,5,'',0,1);
$pdf->Cell(30,5,'Happy(.......)',0,0);
$pdf->Cell(33,5,'Tired(.......)',0,0);
$pdf->Cell(35,5,'Attentive(.......)',0,0);
$pdf->Cell(37,5,'Cooperative(.......)',0,1);
$pdf->Cell(33,5,'Playful(.......)',0,0);
$pdf->Cell(35,5,'Talkative(.......)',0,0);
$pdf->Cell(37,5,'Quiet(.......)',0,1);
$pdf->Cell(74,25,'',0,1);
$pdf->Cell(37,5,'Rest time: I slept from ....../...... to ....../......',0,1);
$pdf->Cell(74,25,'',0,1);
$pdf->Cell(74,20,'Activities',0,1);
$pdf->Cell(74,5,'Course Name',1,0);
$pdf->Cell(74,5, 'Lesson Name', 1,0);
$pdf->Cell(41,5,'Rating',1,1);

$pdf->SetFont('Arial','',12);
for ($x=0;$x<=$Counter;$x++){
    $Curriculum = new CurriculumModel;
    $Curriculum->viewLessonDetail($StudentRating->CurriculumID[$x]);
    $pdf->Cell(74,5,$Curriculum->LessonName,1,0);
    $pdf->Cell(74,5, $Curriculum->LessonDetails, 1,0);
    $pdf->Cell(41,5,$StudentRating->Rating[$x].' Out Of 5', 1, 1);
}


$pdf->Cell(50,50,'',0,1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Anahid Gardens Nursery',0,1);




$pdf->Output();
?>
