<?php
$this->pdf->SetFillColor(255, 255, 255);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(120, 40, "", 0, 1, '', true);

$this->pdf->Cell(20, 20, "", 0, 0, '', true);
$this->pdf->Image(FCPATH . 'assets/images/favicon.png', 290, 10, 40, 40);


$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of Organization]', 0, 1, '', true);
$this->pdf->Cell(0, 2, "", 0, 1, '', true);
$this->pdf->Cell(20, 20, "", 0, 0, '', true);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, $data['organization_name'] ?? "", 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', true);

$this->pdf->Cell(20, 20, "", 0, 0, '', true);
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of CEO/Founder]', 0, 1, '', true);
$this->pdf->Cell(0, 2, "", 0, 1, '', true);
$this->pdf->Cell(20, 20, "", 0, 0, '', true);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, $data['name'] ?? "", 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', true);

$this->pdf->Cell(20, 20, "", 0, 0, '', true);
$this->pdf->SetFont('Arial', '', 16);
$this->pdf->Cell(100, 10, '[Name of Category]', 0, 1, '', true);
$this->pdf->Cell(0, 2, "", 0, 1, '', true);
$this->pdf->Cell(20, 20, "", 0, 0, '', true);
$this->pdf->SetFont('', 'B', 30);
$this->pdf->MultiCell(200, 15, 'Name of Organization', 0, 'L');
$this->pdf->Cell(0, 10, "", 0, 1, '', true);
