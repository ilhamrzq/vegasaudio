<?php
require "../fpdf181/fpdf.php";
require "../config/koneksi.php";
session_start();
class Mypdf extends FPDF
{
    function header()
    {
        $this->SetTitle('Struk');
        $this->SetFont('Times','B',10);
        $this->Cell(80,15,'Jadwal Booking Jasa',0,0,'C');
        $this->ln();
        $this->Cell(80,15,'Instalasi Audio',0,0,'C');
        $this->SetFont('Times','',14);
        $this->ln();
        $this->ln();
    }
    function mycell($w,$h,$x,$t)
    {
        $height = $h/3;
        $first  = $height+2;
        $second = $height+$height+$height+3;
        $len    = strlen($t);

        if ($len>20) {
            $txt = str_split($t,20);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB',0,'C',0);
        }else{
            $this->SetX($x);
            $this->Cell($w,$h,$t,'LTRB',0,'C',0);
        }
    }
}

$tgl_noAntrian = $_GET['id'];

$queryy = mysql_query("SELECT * FROM pendaftaran join customer using (id_customer) where tgl_noAntrian = '$tgl_noAntrian'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

$per=mysql_query("SELECT * FROM pendaftaran join customer using (id_customer) where tgl_noAntrian = '$tgl_noAntrian'");
$no=1;
while($a=mysql_fetch_array($per))
    $no = explode('/', $a['tgl_noAntrian']);
    $tgl_noAntrian = $no[1]; 

{

    $pdf = new Mypdf('P','pt',array(270.9,137.16));
    $pdf->AddPage();
    $pdf->SetFont('Times','B',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Nomor Antrian',1,0,'C');
    $pdf->Ln();
	$pdf->SetFont('Times','',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$tgl_noAntrian,1,0,'C');
    $pdf->Ln();

	$pdf->SetFont('Times','B',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Nama Customer',1,0,'C');
    $pdf->Ln();
	$pdf->SetFont('Times','',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$dt['nama'],1,0,'C');
    $pdf->Ln();

	$pdf->SetFont('Times','B',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Nomor Plat',1,0,'C');
    $pdf->Ln();
	$pdf->SetFont('Times','',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$dt['nomor_plat'],1,0,'C');
    $pdf->Ln();

	$pdf->SetFont('Times','B',8);
	$x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Tanggal dan Jam',1,0,'C');
    $pdf->Ln();
	$pdf->SetFont('Times','',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$dt['tgl_pendaftaran'],1,0,'C');
    $pdf->Ln();

    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$dt['jam_pendaftaran'],1,0,'C');
    $pdf->Ln();

    $pdf->SetFont('Times','B',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'VEGAS Audio Variasi',1,0,'C');
    $pdf->Ln();
	$pdf->SetFont('Times','',8);
}

$pdf->Output('I', 'Struk Pendaftaran');;
//$pd->download()
?> 

