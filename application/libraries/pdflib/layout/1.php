<?php
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);
$this->pdf->Cell(0, 6, 'Participating Entity', 0, 1, '', true);

$this->pdf->SetTextColor(25, 25, 25);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(47, 6, 'Industry Segment', 0, 0, '');
$this->pdf->Cell(47, 6, 'Business Segment', 0, 0, '');
$this->pdf->Cell(79, 6, 'Type Of Business', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(47, 4, 'Industry Segment', 0, 0, '');
$this->pdf->Cell(47, 4, 'Business Segment', 0, 0, '');
$this->pdf->Cell(79, 4, 'Type Of Business', 0, 1, '');

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 6, 'Name of Participating Entity', 0, 0, '');
$this->pdf->Cell(79, 6, 'Website URL', 0, 0, '');
$this->pdf->Cell(47, 6, 'Date of Company Incorporation', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, 'Anirudhsatya Raju Iyyar', 0, 0, '');
$this->pdf->Cell(79, 4, 'anirudhsatyarajuiyyar.com', 0, 0, '');
$this->pdf->Cell(47, 4, date('F j, Y'), 0, 1, '');

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 6, 'Registered Address Participating Entity', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. \n Eius autem provident esse eveniet mollitia amet! Nulla, consequatur iusto! Enim nemo voluptatum, iusto soluta qui perferendis reprehenderit omnis voluptates impedit animi?', 0);
$this->pdf->Cell(63, 4, 'Registered Address Participating Entity', 0, 1, '');

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 6, 'Number of Employees', 0, 0, '');
$this->pdf->Cell(50, 6, 'Funding Source', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, 'More than 400', 0, 0, '');
$this->pdf->Cell(50, 3, 'Personal funds of the owner', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->Cell(0, 6, '(On payroll + On Contract) as on March 31, 2023', 0, 1, '');

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 3, '', 0, 1, '');
$this->pdf->SetFillColor(180, 180, 180);
$this->pdf->Cell(0, 6, 'Contact Person Details', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(63, 6, 'Name', 0, 0, '');
$this->pdf->Cell(79, 6, 'Email', 0, 0, '');
$this->pdf->Cell(47, 6, 'Contact', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, 'Industry Segment', 0, 0);
$this->pdf->Cell(79, 4, 'Type Of Business', 0, 0);
$this->pdf->Cell(47, 4, '+91 888 888 8888', 0, 1);

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
$this->pdf->Cell(63, 4, '201 - 250', 0, 0);
$this->pdf->Cell(63, 4, '201 - 250', 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Revenue Growth (in %)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, '90% - 100%', 0, 0);
$this->pdf->Cell(63, 4, '90% - 100%', 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Net Profit Margin (in %)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, '90% - 100%', 0, 0);
$this->pdf->Cell(63, 4, '90% - 100%', 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Asset Valuation (in INR Crores)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, '201 - 250', 0, 0);
$this->pdf->Cell(63, 4, '201 - 250', 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Debt : Equity Ratio', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, '2 - 3', 0, 0);
$this->pdf->Cell(63, 4, '2 - 3', 0, 1);

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
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Mission and Vision', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Products / Services Offered', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);

$this->pdf->AddPage();

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);
$this->pdf->Cell(0, 6, 'Case Studies', 0, 1, '', true);

$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(97, 6, 'Name of the initiative or product/service offering', 0, 0, '');
$this->pdf->Cell(47, 6, 'Start Date', 0, 0, '');
$this->pdf->Cell(47, 6, 'End Date', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(97, 4, 'Anirudhsatya Raju Iyyar', 0, 0, '');
$this->pdf->Cell(47, 4, date('F j, Y'), 0, 0, '');
$this->pdf->Cell(47, 4, date('F j, Y'), 0, 1, '');

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Describe the Initiative / Product / Service', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'The initiative/product/service  that you organization has developed between the period of April 01, 2022, to March 31, 2023 that has led to business success. What was the problem that you aimed to address through the initiative/product/service?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Highlight the challenges faced by you as an MSME', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'The challenges that you organization has faced to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Elaborate on your go-market-strategy', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'Use of Technology', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'How have you leveraged technology while implementing the initiative/product/service?', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, 'The challenges that you organization has faced to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum quod assumenda vero error quaerat ratione aut soluta ut necessitatibus, rerum harum minus similique temporibus voluptatem tenetur autem illum ipsa alias et quisquam voluptatibus nulla accusamus! Quibusdam repellendus expedita, beatae recusandae explicabo, temporibus soluta impedit voluptate totam placeat asperiores nemo repellat?', 0);
