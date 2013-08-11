<?php
include('../lib/lib_tendocgen.php');

$document = new TenancyAgreement();

if (count($_GET) > 0) $pass = $document->populateFields($_GET);
else $pass = False;


if ($pass) {
	$document->generatePDF();
	die();
}
else {
	
	$p = new Page('Generate a tenancy agreement',
				  'Generate a professional quality tenancy agreement.');
	
	$c = new Content();
	$c->h1('Tenanncy agreement');
	$c->p("Enter the following tenancy details, leave blank if not applicable.");
	$p->append($c);
	$f = new Form('/tenancyAgreement/',array('method'=>'GET'));
	
	$f->h2('Landlord details:');
	$items = array('landlordName',
			       'landlordPhoneDay',
				   'landlordPhoneEve',
				   'landlordPhoneCell',
				   'landlordEmail',
				   'addressForService',
				   'addressForService2');
	$table = generate_inputTable($document, $items);
	$f->append(table($table));
	
	$f->h2('Payment details:');
	$items = array('weeklyRent',
				   'rentAdvance_weeks',
				   'bond_weeks',
				   'bankAccount_name',
				   'bankAccount_number',
				   'bankAccount_branch',
				   'bankAccount_bank',
				   'payment_reference',
				   'waterCharges',
				   'bodyCorporate');
	$table = generate_inputTable($document, $items);
	$f->append(table($table));
	
	$f->h2('Tenancy details:');
	$items = array('tenancyAddress',
				   'tenancyPeriodic',
				   'tenancyTerm',
				   'tenancyDateStart',
				   'catsAllowed',
				   'dogsAllowed',
				   'tenantsMax',
				   'guestParking',
				   'waterCharges',);
	$table = generate_inputTable($document, $items);
	$f->append(table($table));

	$f->button('Submit',array('type'=>'submit'));
	$p->append($f);
	$p->render();
}
?>