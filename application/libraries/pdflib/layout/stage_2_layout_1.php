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


$this->pdf->SetFillColor(255, 255, 255);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(120, 20, "", 0, 1, '', false);

$this->pdf->Image(FCPATH . $data['logo_image'], 290, 10, 40, 40);


$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of Organization]', 0, 1, '', false);
$this->pdf->Cell(0, 2, "", 0, 1, '', false);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, $data['organization_name'] ?? "", 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of CEO/Founder]', 0, 1, '', false);
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
$this->pdf->Cell(70, 15, "Type of Business", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255004']??"", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Revenue Turnover (in Cr.)", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255101'] . " Cr."??"", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255102'] . " Cr."??"", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "No. Of Employees", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255101'] . " Employees"??"", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Revenue Growth (in %)", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255103']??"", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255104']??"", 1, 1, '', false);

$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(70, 15, "Incorporation Date", 1, 0, '', false);
$this->pdf->Cell(70, 15, $data['id_255002']??"", 1, 0, '', false);
$this->pdf->Cell(20, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Net Profit Margin", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255105']??"", 1, 1, '', false);

$this->pdf->Cell(160, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Asset Valuation", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255106'] . " Cr."??"", 1, 1, '', false);

$this->pdf->Cell(160, 15, "", 0, 0, true);
$this->pdf->Cell(70, 15, "Debt Equity Ratio", 1, 0, '', false);
$this->pdf->Cell(35, 15, $data['id_255107']??"", 1, 1, '', false);

$test = "LOREM IPSUM DOLOR SIT AMET CONSECTETUR, ADIPISICING ELIT. DOLORUM QUOS VOLUPTATEM INCIDUNT. IMPEDIT LABORIOSAM POSSIMUS ATQUE TEMPORA REPREHENDERIT NULLA NECESSITATIBUS HARUM VERITATIS MODI DESERUNT VEL MOLESTIAS ILLO, CUPIDITATE DELENITI EUM ID MOLLITIA ITAQUE? SIMILIQUE RATIONE, MOLLITIA QUAS ILLO OMNIS EA ALIQUID EIUS QUIS IPSA EAQUE DOLORUM. NON INVENTORE IN DOLORUM NIHIL DOLORE REM QUASI QUAS, VERO IPSUM PERFERENDIS EX NEMO. OFFICIA LAUDANTIUM QUISQUAM SUSCIPIT SAPIENTE PERFERENDIS ALIAS DUCIMUS NULLA INVENTORE REPUDIANDAE QUIA. ILLO, DOLOREM CULPA SAPIENTE VERO IPSAM IUSTO? ASSUMENDA DOLORIBUS VERITATIS MAIORES TEMPORA! EXCEPTURI AT DOLORE SEQUI PORRO VERO ALIQUAM VOLUPTATEM RATIONE, NEMO, FUGIT APERIAM VEL MAGNI VOLUPTATIBUS ISTE! ASSUMENDA DOLORIBUS VERITATIS MAIORES TEMPORA! EXCEPTURI AT DOLORE SEQUI PORRO VERO ALIQUAM VOLUPTATEM RATIONE, NEMO, FUGIT APERIAM VEL MAGNI VOLUPTATIBUS ISTE!  EXCEPTURI AT DOLORE SEQUI PORRO VERO ALIQUAM VOLUPTATEM RATIONE, NEMO?? FUGIT APERIAM VEL!";

$this->pdf->SetCellMargin(0);
$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Background about your organization/institute. Highlight the challenges that you are aiming to solve through the initiative")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255201'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->Image(FCPATH . $data['id_255401'], 25, 25, 140, 140);
$this->pdf->Image(FCPATH . $data['id_255402'], 180, 25, 140, 140);

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Geographical areas where the organization works. Few success stories (If applicable)")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255202'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("What are unique offerings that differentiates you from the existing competitiors in the market?")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255203'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->Image(FCPATH . $data['id_255403'], 25, 25, 140, 140);
$this->pdf->Image(FCPATH . $data['id_255404'], 180, 25, 140, 140);

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Describe the initiatives taken by your organizations in last year (April 2023 - March 2024)")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255204'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Describe the impact created by the initiatives in the last year on the business growth and other stakeholders. i.e. Customers Employees, Industry, etc.")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255205'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Based on the current economic conditions describe key risk management initiatives implemented by your organization to mitigate these risks and how has technology played a role in it.")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255206'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("Elaborate on the Sustainability and/or Scalability plan of your organization for the next 2-3 years.")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255207'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->SetFont('Arial', 'B', 18);
$this->pdf->MultiCell(300, 10, ucwords(strtolower("List any awards/achievements won in the last 2 years or any other additional information for the jury.")), 0, 'L');
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(300, 7, "", 0, 1, '', false);
$this->pdf->MultiCell(300, 10, ucwords(strtolower($data['id_255208'])), 0, 'L');

$this->pdf->addPage();
$this->pdf->Image(FCPATH . $data['id_255405'], 25, 25, 140, 140);
$this->pdf->Image(FCPATH . $data['id_255406'], 180, 25, 140, 140);

