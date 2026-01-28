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


// [ ] Application Header 
{
	$this->pdf->SetFont('Arial', '', 9);

	$this->pdf->SetTextColor(25, 25, 25);

	$this->pdf->Cell(0, 2, '', 0, 1, '');
	$this->pdf->Cell(46, 6, 'Application ID', 0, 0, '');
	$this->pdf->Cell(79, 6, 'Category', 0, 1, '');

	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(46, 4, $data['nomination_id'] ?? "Lorem Ipsum", 0, 0, '');
	$this->pdf->Cell(79, 4, $data['category']['name'] ?? "Excellence in IT/ITES and Electronics", 0, 1, '');

	$this->pdf->Cell(0, 5, '', 0, 1, '');
}
// [ ] Personal Details 
{
	$this->pdf->SetFillColor(183, 32, 38);
	$this->pdf->SetTextColor(255, 255, 255);
	$this->pdf->Cell(0, 6, 'Participating Entity', 0, 1, '', true);

	$this->pdf->SetTextColor(25, 25, 25);

	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(0, 2, '', 0, 1, '');
	$this->pdf->Cell(97, 6, 'Participating Entity (Organization Name)', 0, 0, '');
	$this->pdf->Cell(46, 6, 'Business Segment', 0, 0, '');
	$this->pdf->Cell(46, 6, 'Date of Company Incorporation', 0, 1, '');
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(97, 6, $data['organization_name'] ?? 'Lorem Ipsum', 0, 0, '');
	$this->pdf->Cell(46, 4, $data['id_255003'] ?? 'Lorem Ipsum', 0, 0, '');
	$this->pdf->Cell(46, 4, $data['id_255002'] ?? 'Lorem Ipsum', 0, 1, '');

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
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->SetFillColor(180, 180, 180);
	$this->pdf->Cell(189, 6, 'Equity Split Between Partners', 0, 1, '');
	$this->pdf->Cell(63, 6, 'Name', 1, 0, '', true);
	$this->pdf->Cell(32, 6, 'Gender', 1, 0, '', true);
	$this->pdf->Cell(46, 6, 'Designation', 1, 0, '', true);
	$this->pdf->Cell(46, 6, 'Equity', 1, 1, '', true);

	$partners = json_decode($data['id_255004'], true);

	$this->pdf->SetFont('Arial', '', 9);
	foreach ($partners as $key => $partner) {
		$this->pdf->Cell(63, 6, $partner['name'] ?? 'Lorem Ipsum', 1, 0, '');
		$this->pdf->Cell(32, 6, $partner['gender'] ?? 'Lorem Ipsum', 1, 0, '');
		$this->pdf->Cell(46, 6, $partner['designation'] ?? 'Lorem Ipsum', 1, 0, '');
		$this->pdf->Cell(46, 6, $partner['equity'] ?? '0.00', 1, 1, '');
	}
	
	
	
	$this->pdf->Cell(0, 5, '', 0, 1, '');
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(97, 6, 'Name of the Applicant', 0, 0, '');
	$this->pdf->Cell(32, 6, 'Designation', 0, 0, '');
	$this->pdf->Cell(32, 6, 'Date of Birth', 0, 0, '');
	$this->pdf->Cell(32, 6, 'Gender', 0, 1, '');
	
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(97, 4, $data['name'] ?? 'Lorem Ipsum', 0, 0, '');
	$this->pdf->Cell(32, 4, $data['designation'] ?? 'Lorem Ipsum', 0, 0, '');
	$this->pdf->Cell(32, 4, $data['id_255008'] ?? 'Lorem Ipsum', 0, 0, '');
	$this->pdf->Cell(32, 4, $data['id_255007'] ?? 'Lorem Ipsum', 0, 1, '');
	
	$this->pdf->Cell(0, 5, '', 0, 1, '');
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->SetFillColor(180, 180, 180);
	$this->pdf->Cell(0, 6, 'Primary Contact for Award Coordination', 0, 1, '', true);
	
	$this->pdf->Cell(0, 2, '', 0, 1, '');
	$this->pdf->Cell(63, 6, 'Name', 0, 0, '');
	$this->pdf->Cell(79, 6, 'Email', 0, 0, '');
	$this->pdf->Cell(46, 6, 'Contact', 0, 1, '');
	
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(63, 4, $data['id_255901'] ?? "Lorem Ipsum", 0, 0);
	$this->pdf->Cell(79, 4, $data['id_255902'] ?? "Lorem Ipsum", 0, 0);
	$this->pdf->Cell(46, 4, $data['id_255903'] ?? "Lorem Ipsum", 0, 1);
}

// [ ] Financial Details
{
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(0, 5, '', 0, 1, '');
	$this->pdf->SetFillColor(183, 32, 38);
	$this->pdf->SetTextColor(255, 255, 255);
	
	$this->pdf->Cell(0, 6, 'Financial Details', 0, 1, '', true);
	
	$this->pdf->SetTextColor(183, 32, 38);
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(0, 2, '', 0, 1, '');
	$this->pdf->Cell(97, 6, '', 1, 0, '');
	$this->pdf->Cell(46, 6, 'FY 2024-2025', 1, 0);
	$this->pdf->Cell(46, 6, 'FY 2023-2024', 1, 1);
	
	$this->pdf->SetTextColor(25, 25, 25);
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(97, 6, 'Annual Turnover (INR in Crores)', 1, 0);
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(46, 6, $data['id_255101'] ?? "Lorem Ipsum", 1, 0);
	$this->pdf->Cell(46, 6, $data['id_255102'] ?? "Lorem Ipsum", 1, 1);
	
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(97, 6, 'EBITDA margin (In %)', 1, 0);
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(46, 6, $data['id_255103'] ?? "Lorem Ipsum", 1, 0);
	$this->pdf->Cell(46, 6, $data['id_255104'] ?? "Lorem Ipsum", 1, 1);
	
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(97, 6, 'Net Profit Margin (in %)', 1, 0);
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(46, 6, $data['id_255105'] ?? "Lorem Ipsum", 1, 0);
	$this->pdf->Cell(46, 6, $data['id_255106'] ?? "Lorem Ipsum", 1, 1);
	
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(97, 6, 'Revenue Growth % (FY 2024-25 over FY 2023-24)', 1, 0);
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(46, 6, $data['id_255107'] ?? "Lorem Ipsum", 1, 1);
	
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(97, 6, 'Debt-to-Equity Ratio (as on March 31, 2025)', 1, 0);
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->Cell(46, 6, $data['id_255108'] ?? "Lorem Ipsum", 1, 1);
}

// [ ] Organization Overview
{

	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->Cell(0, 5, '', 0, 1, '');
	$this->pdf->SetFillColor(183, 32, 38);
	$this->pdf->SetTextColor(255, 255, 255);
	
	$this->pdf->Cell(0, 6, 'Organization Overview', 0, 1, '', true);
	
	$this->pdf->Cell(0, 2, '', 0, 1, '');
	$this->pdf->SetFont('Arial', 'B', 9);
	$this->pdf->SetTextColor(183, 32, 38);
	$this->pdf->Cell(63, 6, 'No. Of Employees', 0, 0, '');
	$this->pdf->Cell(126, 6, 'Target Market Segment & Geographic Reach', 0, 1, '');
	$this->pdf->SetFont('Arial', '', 9);
	$this->pdf->SetTextColor(25, 25, 25);
	$this->pdf->Cell(63, 4, $data['id_255201'] ?? "Lorem Ipsum", 0, 0);
	$this->pdf->Cell(63, 4, $data['id_255204'] ?? "Lorem Ipsum", 0, 0);
	$this->pdf->Cell(63, 4, $data['id_255205'] ?? "Lorem Ipsum", 0, 1);
	
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
}
