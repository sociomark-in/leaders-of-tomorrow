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
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'Participating Entity', 0, 1, '', true);

$this->pdf->SetTextColor(25, 25, 25);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 6, 'Name of Participating Entity', 0, 0, '');
$this->pdf->Cell(47, 6, 'Designation', 0, 0, '');
$this->pdf->Cell(47, 6, 'Date of Birth', 0, 0, '');
$this->pdf->Cell(32, 6, 'Experience', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['name'], 0, 0, '');
$this->pdf->Cell(47, 4, $data['id_74502'], 0, 0, '');
$this->pdf->Cell(47, 4, $data['id_74501'], 0, 0, '');
$this->pdf->Cell(32, 4, $data['id_74503'], 0, 1, '');

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 3, '', 0, 1, '');
$this->pdf->SetFillColor(180, 180, 180);
$this->pdf->Cell(0, 6, 'Organization Details', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 6, 'Name of Current Organization', 0, 0, '');
$this->pdf->Cell(47, 6, 'Type of Business', 0, 0, '');
$this->pdf->Cell(47, 6, 'Business Segment', 0, 0, '');
$this->pdf->Cell(32, 6, 'Experience', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['organization_name'], 0, 0, '');
$this->pdf->Cell(47, 4, $data['id_74505'], 0, 0, '');
$this->pdf->Cell(47, 4, $data['id_74506'], 0, 0, '');
$this->pdf->Cell(32, 4, $data['id_74508'], 0, 1, '');

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(47, 6, 'Company Incorporation', 0, 0, '');
$this->pdf->Cell(47, 6, 'No. Of Employees', 0, 0, '');
$this->pdf->Cell(97, 6, 'Website URL', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(47, 4, $data['id_74507'], 0, 0, '');
$this->pdf->Cell(47, 4, $data['id_74504'], 0, 0, '');
$this->pdf->Cell(97, 4, $data['organization_url'], 0, 1, '', 0, $data['organization_url']);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 3, '', 0, 1, '');
$this->pdf->SetFillColor(180, 180, 180);
$this->pdf->Cell(0, 6, 'Contact Person Details', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(63, 6, 'Name', 0, 0, '');
$this->pdf->Cell(79, 6, 'Email', 0, 0, '');
$this->pdf->Cell(47, 6, 'Contact', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_74529'], 0, 0);
$this->pdf->Cell(79, 4, $data['id_74530'], 0, 0);
$this->pdf->Cell(47, 4, $data['id_74531'], 0, 1);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'Financial Details', 0, 1, '', true);

$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(63, 6, '', 0, 0, '');
$this->pdf->Cell(63, 6, 'FY 2022-2023', 0, 0);
$this->pdf->Cell(63, 6, 'FY 2022-2023', 0, 1);

$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Revenue Turnover (in INR Crores)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_74512'], 0, 0);
$this->pdf->Cell(63, 4, $data['id_74513'], 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Revenue Growth (in %)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_74514'], 0, 0);
$this->pdf->Cell(63, 4, $data['id_74515'], 0, 1);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'About the Organization', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Brief Overview of the Company', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_74509'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Mission and Vision', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_74510'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Products / Services Offered', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_74511'], 0);

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);
$this->pdf->Cell(0, 6, 'Case Studies', 0, 1, '', true);

$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Describe your journey as an Entrepreneur.', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'What was your inspiration behind setting up your organization?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74516'], 0);

$this->pdf->AddPage();

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Highlight the challenges faced by you as an Entrepreneur', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Highlight the challenges faced by you in your journey towards becoming an entrepreneur how did you overcome these challenges?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74517'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74518'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74519'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74520'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74521'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74522'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74523'], 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_74524'], 0);
