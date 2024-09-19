<?php

use Clegginabox\PDFMerger\PDFMerger;
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

	public function init($orientation = 'P', $unit = 'mm', $size = 'A4')
	{
		$this->pdf = new FPDF($orientation = 'P', $unit = 'mm', $size = 'A4');
		$this->pdf->AddPage();
		return $this;
	}

	public function generate($dest = null, $name = null)
	{
		$this->pdf->Output($dest, $name);
	}

	public function load($layout = 'layout-1', $data = null)
	{
		switch ($layout) {
			case 'layout-2':
				include_once __DIR__ . '/layout/2.php'; 
				break;

			default:
				include_once __DIR__ . '/layout/1.php'; 
				break;
		}
		return $this;
	}
}
