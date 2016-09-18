<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:home.php');
}
$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);
$ceksudahbelum=mysql_query("SELECT * FROM log_baba WHERE akun_id='".$_SESSION['userid']."'");
if(mysql_num_rows($ceksudahbelum) != 9){
	echo 'Anda belum menyelesaikan kursus!<br/>';
  echo '<a href="user.php">&laquo; Kembali</a>';
  
}

	date_default_timezone_set('UTC');
	require('fpdf/fpdf.php');
	
	class PDF_result extends FPDF {
		function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
			$this->FPDF($orientation, $unit, $format);
			$this->SetTopMargin($margin);
			$this->SetLeftMargin($margin);
			$this->SetRightMargin($margin);
			
			$this->SetAutoPageBreak(true, $margin);
		}
		
		function Header () {
			
			 $this->Image('assets/img/sert.jpg',-5,-3,306,217);
		}
		
			
	}
	
	
	$query=mysql_query("SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'");
	$row=mysql_fetch_array($query);
	
	
	$pdf = new PDF_result('L','mm','A4');
	$pdf->AddPage();
	
	
	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetY(200);
	
	
	$pdf->SetFont('Arial', 'B', 35);
	$pdf->SetX(107);
	$pdf->Cell(30, -200, $row['nama_lengkap']);
	
	$pdf->SetFont('Arial', '', 15);
	$pdf->SetX(65);
	$pdf->Cell(50, -170, "atas partisipasi anda dalam kursus memasak online ccourse.com.");
	$pdf->SetX(50);

	$pdf->SetX(220);
	$pdf->SetFont('Arial', 'B');
	
	$pdf->SetFont('Arial', '');
	$pdf->Cell(60, -30, date('F j, Y'), 0, 1);
	
	$pdf->SetFont('Arial', 'I');
	$pdf->SetY(140);
	
	
	

	
	
	
	
	//$pdf->Output('result.pdf', 'F');
	$pdf->Output();

?>
?>