<?php


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

$files = [
	"logo_image" => $data["logo_image"],
	"id_255401" => $data["id_255401"],
	"id_255402" => $data["id_255402"],
	"id_255403" => $data["id_255403"],
	"id_255404" => $data["id_255404"],
	"id_255405" => $data["id_255405"],
	"id_255406" => $data["id_255406"],
	"id_255407" => $data["id_255407"],
	"id_255408" => $data["id_255408"],
];
foreach ($files as $key => $file) {
	if($file == '' || $file == NULL){
		unset($data[$key]);
		unset($files[$key]);
	}
}


$this->pdf->SetFillColor(255, 255, 255);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(120, 20, "", 0, 1, '', false);

if (isset($data['logo_image'])) {
	$this->pdf->Image(FCPATH . $data['logo_image'], 290, 10, 40, 40);
	unset($files['logo_image']);
}


$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of Organization]', 0, 1, '', false);
$this->pdf->Cell(0, 2, "", 0, 1, '', false);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, $data['organization_name'] ?? "", 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of Presenter]', 0, 1, '', false);
$this->pdf->Cell(0, 2, "", 0, 1, '', false);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, $data['name'] ?? "", 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of Category]', 0, 1, '', false);
$this->pdf->Cell(0, 2, "", 0, 1, '', false);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, $data['category']['name'] ?? '', 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', false);


$this->pdf->addPage();
$this->pdf->SetCellMargin(3);
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->Cell(70, 15, "Particulars", 1, 0, '', false);
$this->pdf->Cell(70, 15, "Information", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Particulars", 1, 0, '', false);
$this->pdf->Cell(35, 15, "FY 2024", 1, 0, '', false);
$this->pdf->Cell(35, 15, "FY 2023", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "Generational Status", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255005'] ?? "", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Revenue Turnover (in Cr.)", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255101'] ?? "", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255102'] ?? "", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "No. Of Employees", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255101'] . " Employees" ?? "", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Revenue Growth (in %)", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255103'] ?? "", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255104'] ?? "", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "Incorporation Date", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255002'] ?? "", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Net Profit Margin", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255105'] ?? "", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255106'] ?? "", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "Current Generation", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255011'] ?? "", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Asset Valuation", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255107'] ?? "", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255108'] ?? "", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "Family Members Involved", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255010'] ?? "", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Debt Equity Ratio", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255109'] ?? "", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255110'] ?? "", 1, 1, '', false);

$split = explode('-', $data['id_255004']);
$this->pdf->SetFont('Arial', 'B', 16);
$this->pdf->Cell(20, 15, "", 0, 1, true);
$this->pdf->Cell(300, 15, "Equity Split Between Family & Investors & Others", 1, 1, false);
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->MultiCell(300, 15, "Family: " . $split[0] . "% - Investors: " . $split[1] . "% - Others: " . $split[2] . "%", 1, 'L');

$test = "LOREM IPSUM DOLOR SIT AMET CONSECTETUR, ADIPISICING ELIT. DOLORUM QUOS VOLUPTATEM INCIDUNT. IMPEDIT LABORIOSAM POSSIMUS ATQUE TEMPORA REPREHENDERIT NULLA NECESSITATIBUS HARUM VERITATIS MODI DESERUNT VEL MOLESTIAS ILLO, CUPIDITATE DELENITI EUM ID MOLLITIA ITAQUE? SIMILIQUE RATIONE, MOLLITIA QUAS ILLO OMNIS EA ALIQUID EIUS QUIS IPSA EAQUE DOLORUM. NON INVENTORE IN DOLORUM NIHIL DOLORE REM QUASI QUAS, VERO IPSUM PERFERENDIS EX NEMO. OFFICIA LAUDANTIUM QUISQUAM SUSCIPIT SAPIENTE PERFERENDIS ALIAS DUCIMUS NULLA INVENTORE REPUDIANDAE QUIA. ILLO, DOLOREM CULPA SAPIENTE VERO IPSAM IUSTO? ASSUMENDA DOLORIBUS VERITATIS MAIORES TEMPORA! EXCEPTURI AT DOLORE SEQUI PORRO VERO ALIQUAM VOLUPTATEM RATIONE, NEMO, FUGIT APERIAM VEL MAGNI VOLUPTATIBUS ISTE! ASSUMENDA DOLORIBUS VERITATIS MAIORES TEMPORA! EXCEPTURI AT DOLORE SEQUI PORRO VERO ALIQUAM VOLUPTATEM RATIONE, NEMO, FUGIT APERIAM VEL MAGNI VOLUPTATIBUS ISTE!  EXCEPTURI AT DOLORE SEQUI PORRO VERO ALIQUAM VOLUPTATEM RATIONE, NEMO?? FUGIT APERIAM VEL!";


$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Innovation & Adaptability")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255203'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Business Performance and Market Impact")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255204'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Sustainability and Social Responsibility")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255206'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Scalability and Future Readiness")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255207'])), 0, 'L');

if (count($files) > 0) {
	$x = 25;
	$y = 25;
	$w = 140;
	$j = 1;
	foreach ($files as $key => $file) {
		if ($j % 2 != 0) {
			$this->pdf->addPage();
			$x = 25;
		} else {
			// odd
			$x = $x * 2 + $w;
		}
		if (isset($file)) {
			$this->pdf->Image(FCPATH . $file, $x, $y, $w, $w);
		}
		$j++;
	}
}

