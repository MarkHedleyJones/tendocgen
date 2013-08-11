<?php
include('lib/lib_html.php');
include('lib/lib_functions.php');

$p = new Page('Welcome',
			  'Welcome to TenDocGen, New Zealand Tenancy Document Generators.');
$c = new Content();
$c->h1('Tenancy Document Generator - (TenDocGen)');
$c->p("Welcome to the New Zealand tenancy document generator website. Create 
		professional quality tenancy documents in minutes.");
$c->h2('Documents:');

$documents = array();
$docs['conditionalOffer'] = 'Conditional offer of tenancy';
$docs['inspectionReport'] = 'Property inspection report';
$docs['tenantApplication'] = 'Tenant application form';
$docs['tenancyAgreement'] = 'Tenancy agreement form';

foreach($docs as $key => $value) {
	$c->href($value,'/'.$key);
	$c->br();
}
$p->append($c);
$p->render();
?>