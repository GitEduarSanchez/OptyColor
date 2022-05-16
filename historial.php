<?php
require('fpdf/fpdf.php');
include("conexion.php");
class PDF extends FPDF
{
	var $widths;
	var $aligns;

	function SetWidths($w)
	{

		$this->widths=$w;
	}

	function SetAligns($a)
	{

		$this->aligns=$a;
	}

	function Row($data)
	{

		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=8*$nb;

		$this->CheckPageBreak($h);

		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

			$x=$this->GetX();
			$y=$this->GetY();


			$this->Rect($x,$y,$w,$h);

			$this->MultiCell($w,8,$data[$i],0,$a,'true');

			$this->SetXY($x+$w,$y);
		}

		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{

		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{

		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function Header()
	{
		/*$this->SetFont('Arial','',10);
		$this->Text(20,14,'Historia Clinica OptyColor',0,'C', 0);
		*/$this->Ln(10);
	}

	function Footer()
	{
	/*	$this->SetY(-15);
		$this->SetFont('Arial','B',8);
		$this->Cell(100,10,'Historial del paciente',0,0,'L');
    */
	}

}

$paciente_id= $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM v_paciente where id='$paciente_id'");
if(mysqli_num_rows($sql)> 0){
		$pdf=new Pdf();
        $pdf->AddPage();
        $pdf->SetMargins(20,20,20);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',12);
        $pdf->Image("img/logo_optycolor.jpeg",165,0,50,30);
        
        while($paciente = mysqli_fetch_assoc($sql)){
            $pdf->Cell(30,6,'Nombres Apellidos: ',19,0);
            $pdf->Cell(230,6,$paciente['paciente'],0,1);
            $pdf->Cell(30,6,'Edad: ',0,0);
            $pdf->Cell(0,6,$paciente['edad'],0,1);
            
        }
	}

$sql = mysqli_query($con, "SELECT * FROM v_empresa");
if(mysqli_num_rows($sql)> 0){
        while($emp = mysqli_fetch_assoc($sql)){
            $pdf->SetWidths(array(10, 20, 50, 50, 40));
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(150,255,255);
            $pdf->SetTextColor(0);
            $pdf->Cell(50,5,$emp['empresa'],0,1);

        }
	}

$sql = mysqli_query($con, "SELECT * FROM v_historiaclinica where idpaciente='$paciente_id'");
if(mysqli_num_rows($sql)> 0){
         
        while($hc = mysqli_fetch_assoc($sql)){
            $pdf->SetWidths(array(10, 20, 50, 50, 40));
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(51,153,255);
            $pdf->SetTextColor(255);
            $pdf->Cell(0,6,$hc[''],0,1);
            $pdf->Row(array('#','XXX', 'XXX', 'XXX', 'XXXX'));
        }
	}


/*$i = 0;
$n=0;
foreach ($consultas as $consulta) {$n++;
	$pdf->SetFont('Arial','',9);

	if($i%2 == 1){
		$pdf->SetFillColor(181,175,173);
		$pdf->SetTextColor(0);
		$pdf->Row(array($n,$consulta['fecha_consulta'], $consulta['nombre_medico'], $consulta['consultorio'], $consulta['diagnostico']));
		$i++;
	}else{
		$pdf->SetFillColor(212,204,202);
		$pdf->SetTextColor(0);
		$pdf->Row(array($n,$consulta['fecha_consulta'], $consulta['nombre_medico'], $consulta['consultorio'], $consulta['diagnostico']));
		$i++;
	}
}*/
$pdf->Output('HistoriaClinicaOptyColor','I');
?>