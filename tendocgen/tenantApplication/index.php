<?php
include('../lib/lib_tendocgen.php');

$document = new TenantApplication();

if (count($_GET) > 0) $pass = $document->populateFields($_GET);
else $pass = False;


if ($pass) {
	$document->generatePDF();
	die();
}
else {

	$p = new Page('Generate a tenant application form',
				  'Generate a tenant application form for prospective tenants to fill out.');
	
	$c = new Content();
	$c->h1('Tenant application form');
	$c->p("Enter the following tenancy details, leave blank if not applicable.");
	$p->append($c);
	$f = new Form('/tenantApplication/',array('method'=>'GET'));
	
	$f->h2('Tenancy details:');
	
	$items = $document->get_fieldNames();
	$table = generate_inputTable($document, $items);

	$f->append(table($table));
	

	$f->button('Submit',array('type'=>'submit'));
	$p->append($f);
	$p->render();
}
?>