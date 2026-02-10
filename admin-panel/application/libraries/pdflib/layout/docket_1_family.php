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
$this->pdf->Cell(79, 4, $data['category']['name'] ?? "Excellence in Family Business Leadership", 0, 1, '');

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
$address = json_decode($data['id_255001'], true);
foreach ($address as $key => $line) {
	if ($line == "" || is_null($line)) {
		unset($address[$key]);
	}
}

$address = implode(', ', $address);
$this->pdf->MultiCell(0, 4, $address ?? "P.O. Box 463, 6237 Cursus Av.", 0);
$this->pdf->MultiCell(0, 4, $data['organization_city'] . ", " . $data['organization_state'] ?? "P.O. Box 463, 6237 Cursus Av.", 0);


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
$this->pdf->Cell(63, 4, $data['id_255106'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(63, 4, 'Current Ratio', 0, 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(63, 4, $data['id_255107'] ?? "Lorem Ipsum", 0, 1);

$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 5, '', 0, 1, '');
$this->pdf->SetFillColor(183, 32, 38);
$this->pdf->SetTextColor(255, 255, 255);

$this->pdf->Cell(0, 6, 'About the Organization', 0, 1, '', true);

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(47, 6, 'No. Of Employees', 0, 0, '');
$this->pdf->Cell(47, 6, 'Generational Status', 0, 0, '');
$this->pdf->Cell(97, 6, 'No. of family members actively involved', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(47, 4, $data['id_255201'] ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(47, 4, $data['id_255204'] ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(97, 4, $data['id_255205'] ?? "Lorem Ipsum", 0, 1, '');

$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(97, 6, 'Equity spilt between family members and investors', 0, 0, '');
$this->pdf->Cell(97, 6, 'Years the current generation has been leading the business', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$equity = explode('-', $data['id_255206']);
$this->pdf->Cell(97, 4, "{$equity[0]} (Family) - {$equity[0]} (Investors) - {$equity[0]} (Others)" ?? "Lorem Ipsum", 0, 0);
$this->pdf->Cell(97, 4, $data['id_255207'] ?? "Lorem Ipsum", 0, 1, '');


$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Brief Description of the Business', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, "How has the business evolved from one generation to the next? Describe the key transitions in leadership, vision, and strategy between generations", 0);
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->Cell(0, 2, '', 0, 1, '');
$this->pdf->MultiCell(0, 4, trim($data['id_255202']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Core Products / Services Offered', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, trim($data['id_255203']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
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
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, 'How has your family business balanced tradition with innovation? Please provide examples of how traditional practices have been updated or combined with new approaches', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, trim($data['id_255301']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->MultiCell(0, 4, 'What technological innovations have you adopted to enhance business operations or expand your market reach? How has technology helped in improving efficiency and competitiveness?', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, trim($data['id_255302']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Business Performance and Market Impact', 0, 1, '');
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, 'What have been the major challenges your family business has faced, and how did you overcome them? Please provide specific examples of challenges in areas such as management, market expansion, or technology integration', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, trim($data['id_255303']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->MultiCell(0, 4, 'Outline your growth trajectory over the past 10 years, providing specific metrics such as revenue growth, market share, or client acquisition (Details should be measurable and generic statements should be avoided)', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, trim($data['id_255304']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);

$this->pdf->Cell(0, 4, '', 0, 1, '');
$this->pdf->SetFont('Arial', 'B', 9);
$this->pdf->SetTextColor(183, 32, 38);
$this->pdf->Cell(0, 6, 'Scalability and Future Readiness', 0, 1, '');
$this->pdf->SetTextColor(25, 25, 25);
$this->pdf->MultiCell(0, 4, 'How have you handled economic or market downturns, and what strategies have you implemented to ensure business continuity and growth in challenging times.', 0);
$this->pdf->Cell(0, 1, '', 0, 1, '');
$this->pdf->SetFont('Arial', '', 9);
$this->pdf->MultiCell(0, 4, trim($data['id_255305']) ?? "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem repellat voluptatem ex quos consectetur voluptatum nemo, odio impedit veritatis tempora asperiores autem dolorum minus repellendus aliquid nesciunt deserunt vel placeat saepe? Dolor, ducimus. Ex inventore ea perspiciatis exercitationem, minus ipsam officiis, facere libero repudiandae quasi esse consectetur qui temporibus dolorum officia quia quis deleniti ab a! Incidunt nulla iure tempora distinctio dolorum vel consequuntur quod, beatae voluptatum a, dolor, nihil enim quisquam ullam ea alias totam aspernatur nisi praesentium! Neque, recusandae eos. Placeat, maxime iure quisquam aut recusandae consequatur iste cum dignissimos quas sint dicta pariatur incidunt provident facilis vitae.
", 0);
