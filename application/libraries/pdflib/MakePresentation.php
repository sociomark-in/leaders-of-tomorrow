<?php

use Fpdf\Fpdf;

require_once APPPATH . "vendor/autoload.php";
class MakePresentation extends FPDF
{
	protected $pdf;

	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		$this->SetX(15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Page number
		$this->Cell(97, 10, APP_NAME . ' - Season 12', 0, 0, 'L');
		$this->Cell(97, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');

		// Logo
		$this->Image(FCPATH . 'assets/images/main.png', 300, 180, 0, 8);
		// Arial bold 15
		$this->SetFont('Arial', 'B', 15);
		// Move to the right
		// $this->Cell(80);
		// Title
		// $this->Cell(30, 10, 'Application Form', 0, 0, 'C');
		// Line break
		$this->Ln(20);
	}

	public function init($orientation = 'P', $unit = 'mm', $size = 'A4')
	{
		$this->pdf = new MakePresentation($orientation, $unit = 'mm', $size);
		$this->pdf->SetMargins(0,0);
		$this->pdf->AliasNbPages();
		$this->pdf->AddPage();
		return $this;
	}

	public function load($data = null, $layout = 'stage_2_layout_1')
	{
		include_once __DIR__ . '/layout/' . $layout . '.php';
		return $this;
	}

	public function generate($dest = null, $name = null)
	{
		$this->pdf->Output($dest, $name);
	}
}
