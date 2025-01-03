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

$this->pdf->SetTextColor(25, 25, 25);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(47, 6, 'Application ID', 0, 0, '');
$this->pdf->Cell(79, 6, 'Category', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(47, 4, $data['nomination_id'] ?? "Lorem Ipsum", 0, 0, '');
$this->pdf->Cell(79, 4, $data['category']['name'] ?? "Lorem Ipsum", 0, 1, '');

$this->pdf->Cell(0, 5, '', 0, 1, '');

$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);
$this->pdf->Cell(0, 6, 'Participating Entity', 0, 1, '', true);

$this->pdf->SetTextColor(25, 25, 25);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(97, 6, 'Name of Participating Entity', 0, 0, '');
$this->pdf->Cell(97, 6, 'Name of Applicant', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(97, 6, $data['organization_name'] ?? 'Lorem Ipsum', 0, 0, '');
$this->pdf->Cell(97, 6, $data['name'] ?? 'Lorem Ipsum', 0, 1, '');

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 6, 'Designation', 0, 0, '');
$this->pdf->Cell(79, 6, 'Business Segment', 0, 0, '');
$this->pdf->Cell(47, 6, 'Date of Company Incorporation', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['designation'] ?? 'Lorem Ipsum', 0, 0, '');
$this->pdf->Cell(79, 4, $data['id_255003'] ?? 'Lorem Ipsum', 0, 0, '');
$this->pdf->Cell(47, 4, $data['id_255002'] ?? 'Lorem Ipsum', 0, 1, '');

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 6, 'Registered Address Participating Entity', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->MultiCell(0, 4, $data['id_255001'] ?? "P.O. Box 463, 6237 Cursus Av.", 0);

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 6, 'Type of Ownership', 0, 0, '');
$this->pdf->Cell(126, 6, 'Website URL', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255005'] ?? "Lorem Ipsum" . ' Employees', 0, 0, '');
$this->pdf->Cell(126, 3, $data['organization_url'] ?? "http://guardian.co.uk", 0, 1, '');

$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetFillColor(180, 180, 180);
$this->pdf->Cell(0, 6, 'Contact Person Details', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(63, 6, 'Name', 0, 0, '');
$this->pdf->Cell(79, 6, 'Email', 0, 0, '');
$this->pdf->Cell(47, 6, 'Contact', 0, 1, '');

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255901'] ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(79, 4, $data['id_255902'] ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(47, 4, $data['id_255903'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'Financial Details', 0, 1, '', true);

$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->Cell(63, 6, '', 0, 0, '');
$this->pdf->Cell(63, 6, 'FY 2023-2024', 0, 0);
$this->pdf->Cell(63, 6, 'FY 2022-2023', 0, 1);

$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Revenue / Turnover (in INR Crores)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255101'] ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(63, 4, $data['id_255102'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Revenue Growth (in %)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255103'] ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(63, 4, $data['id_255104'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Net Profit Margin (in %)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255105'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Return On Assets (ROA)', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255107'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Current Ratio', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255109'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'About the Organization', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'No. Of Employees', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_255201'] ?? "Lorem Ipsum", 0);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Brief Description of the Business', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_255202'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Core Products / Services Offered', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_255203'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Target Market Segment & Geographic Reach', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, $data['id_255204'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

// $this->pdf->AddPage();

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);
$this->pdf->Cell(0, 6, 'Case Studies', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Innovation & Adaptibility', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 3, '(The initiative or innovation can be a new product/ solution development, digitization, technical innovation, process improvement, entering new market, etc.)', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_255301'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Business Performance and Market Impact', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
// $this->pdf->MultiCell(0, 3, 'The challenges that you organization has faced to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_255302'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Sustainability and Social Responsibility', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
// $this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_255303'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Scalability and Future Readiness', 0, 1, '');
$this->pdf->SetFont('Arial', '', 7);
$this->pdf->SetTextColor(25, 25, 25);
// $this->pdf->MultiCell(0, 3, 'Elaborate on strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, $data['id_255304'] ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

