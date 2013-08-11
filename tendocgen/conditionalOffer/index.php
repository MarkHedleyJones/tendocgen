<?php
include('../lib/lib_tendocgen.php');

$document = new ConditionalOffer();

if (count($_GET) > 0) $pass = $document->populateFields($_GET);
else $pass = False;


if ($pass) {
	$document->generatePDF();
	die();
}
else {

	$p = new Page('Generate a conditional offer',
				  'Generate a conditional offer of tenancy for the applicant of
				   your rental property');
	
	$c = new Content();
	$c->h1('Conditional offer of tenancy');
	$c->p("Enter the following tenancy details, leave blank if not applicable.");
	$p->append($c);
	$f = new Form('/conditionalOffer/',array('method'=>'GET'));
	
	$f->h2('Landlord details:');
	
	$items = array('landlordName',
			       'landlordPhoneDay',
				   'landlordPhoneEve',
				   'landlordPhoneCell',
				   'landlordEmail',
				   'addressForService');
	
	$table = generate_inputTable($document, $items);

	
	$f->append(table($table));
	$f->h2('Tenancy details:');
	
	$items = array('tenancyAddress',
				   'tenancyDateStart',
				   'weeklyRent',
				   'bond_weeks',
				   'rentAdvance_weeks');
	
	$table = generate_inputTable($document, $items);
	
	$f->append(table($table));
	$f->button('Submit',array('type'=>'submit'));
	$p->append($f);
	$p->render();
}
?>