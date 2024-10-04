<?php

use Fpdf\Fpdf;

require_once APPPATH . "vendor/autoload.php";
/*
	1	16
	2	32
	3	47
	4	63 
	5	79 
	6	97 
	7	107 
	8	126 
	9	137 
	10	152 
	11	167 
	12	189 
*/
class MakePDF extends Fpdf
{
	private $pdf;
	public function __construct()
	{
		parent::__construct();
	}

	function Header()
	{
		// Logo
		$this->Image(base_url('assets/images/main.png'), 10, 10, 0, 8);
		// Arial bold 15
		$this->SetFont('Arial', 'B', 15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30, 10, 'Application Form', 0, 0, 'C');
		// Line break
		$this->Ln(20);
	}

	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Page number
		$this->Cell(97, 10, APP_NAME . ' - Season 12', 0, 0, 'L');
		$this->Cell(97, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
	}


	public function init($orientation = 'P', $unit = 'mm', $size = 'A4')
	{
		$this->pdf = new MakePDF($orientation = 'P', $unit = 'mm', $size = 'A4');
		$this->pdf->AliasNbPages();
		$this->pdf->AddPage();
		return $this;
	}

	public function generate($dest = null, $name = null)
	{
		$this->pdf->Output($dest, $name);
	}

	public function load($data = null, $layout = 'msme')
	{
		switch ($layout) {
			case 'individual':
				include_once __DIR__ . '/layout/individual.php';
				break;

			default:
				include_once __DIR__ . '/layout/msme.php';
				break;
		}
		return $this;
	}
}
