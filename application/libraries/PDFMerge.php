<?php

use Clegginabox\PDFMerger\PDFMerger;

require_once APPPATH . "vendor/autoload.php";

class PDFMerge extends PDFMerger
{
	public function __construct()
	{
		parent::__construct();
	}
}
