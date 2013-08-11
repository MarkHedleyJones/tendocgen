<?php 

function field($string, $type, $value=False) {
	return array('string'=>$string, 'type'=>$type, 'value'=>$value);
}

class Document {
	
	private $fields = array();
	public $filename = '';
	
	public function add_field($name, $string, $type, $value=False) {
		$this->fields[$name] = field($string, $type, $value);
	}
	
	public function get_field($name) {
		if (isset($this->fields[$name])) return $this->fields[$name];
		else return False;
	}
	
	public function get_fieldNames() {
		return array_keys($this->fields);
	}
	
	public function prepareFields() {
		$out = array();
		foreach ($this->fields as $name => $items) {
			$out[$name] = $items['value'];
		}
		return $out;
	}	
	
	public function generatePDF() {
		
		$data = $this->prepareFields();
	
		//Produce the custom .TEX file
		ob_start();
		include ($this->filename);
		$latex = ob_get_clean();
	
		//Setup paths
		$filename_out = '/documents/' . randomHash();
		file_put_contents(PATH_STATIC . $filename_out . '.tex', $latex);
		
		exec('/usr/bin/latexmk -pdf -cd ' . PATH_STATIC . $filename_out . '.tex', $out);
		header('Location: ' . $filename_out . '.pdf');
	}
	
	public function populateFields($srcArray) {
		$fields_tmp = array();
		foreach ($this->fields as $name => $field) {
			$fields_tmp[$name] = $field['type'];
		}
		$userData = getVars($srcArray, $fields_tmp, False, True, True);
		
		$pass = True;
		foreach ($userData as $key => $value) {
			$this->fields[$key]['value'] = $value;
			if (isset($srcArray[$key]) &&
				$srcArray[$key] != '' &&
				$value === False) $pass = False;
		}
		return $pass;
	}
}


class ConditionalOffer extends Document {
	
	public function __construct() {
		$this->filename = PATH_STATIC . '/conditionalOffer/conditionalOffer.php';
		$this->add_field('landlordName', 'Name of landlord', 'safeString');
		$this->add_field('landlordPhoneDay', 'Tenant phone (day)', 'phone');
		$this->add_field('landlordPhoneEve', 'Tenant phone (eve)', 'phone');
		$this->add_field('landlordPhoneCell', 'Tenant phone (cell)', 'phone');
		$this->add_field('landlordEmail', 'Tenant email', 'email');
		$this->add_field('addressForService', 'Address for service', 'safeString');
		$this->add_field('tenancyAddress', 'Address of tenancy', 'safeString');
		$this->add_field('tenancyDateStart', 'Tenancy start date', 'date');
		$this->add_field('weeklyRent', 'Rent (weekly)', 'money');
		$this->add_field('bond_weeks', 'Bond (weeks)', 'float');
		$this->add_field('rentAdvance_weeks', 'Rent in advance (weeks)', 'float');
	}
}

class InspectionReport extends Document {

	public function __construct() {
		$this->filename = PATH_STATIC . '/inspectionReport/inspectionReport.php';
		$this->add_field('tenancyAddress', 'Address of tenancy', 'safeString');
		$this->add_field('numberOfBathrooms', 'Number of bathrooms', 'int 1 10');
		$this->add_field('numberOfBedrooms', 'Number of bedrooms', 'int 1 10');
		$this->add_field('hasLaundry', 'Has a laundry', 'bool');
		$this->add_field('hasGarage', 'Has a garage', 'bool');
	}
}

class TenantApplication extends Document {
	
	public function __construct() {
		$this->filename = PATH_STATIC . '/tenantApplication/tenantApplication.php';
		$this->add_field('tenancyAddress', 'Address of tenancy', 'safeString');
	}
}

class TenancyAgreement extends Document {
	
	public function __construct() {
		$this->filename = PATH_STATIC . '/tenancyAgreement/tenancyAgreement.php';
		$this->add_field('tenancyPeriodic', 'Is a periodic tenancy', 'bool');
		$this->add_field('tenancyTerm', 'Term for the tenancy (months)', 'int 1');
		$this->add_field('tenancyAddress', 'Address of the tenancy', 'safeString');
		$this->add_field('catsAllowed', 'Cats allowed at tenancy', 'int 0 10');
		$this->add_field('dogsAllowed', 'Dogs allowed at tenancy', 'int 0 10');
		$this->add_field('weeklyRent', 'Rent (weekly)', 'money');
		$this->add_field('rentAdvance_weeks', 'Rent in advance (weeks)', 'float');
		$this->add_field('bond_weeks', 'Bond (weeks)', 'float');
		$this->add_field('bodyCorporate', 'Includes body corporate', 'bool');
		$this->add_field('bankAccount_name', 'Bank account name', 'safeString');
		$this->add_field('bankAccount_number', 'Bank account number', 'safeString');
		$this->add_field('bankAccount_branch', 'Bank branch', 'safeString');
		$this->add_field('bankAccount_bank', 'Bank name', 'safeString');
		$this->add_field('payment_reference', 'Reference for payment', 'safeString');
		$this->add_field('landlordName', 'Name of landlord', 'safeString');
		$this->add_field('landlordPhoneDay', 'Tenant phone (day)', 'phone');
		$this->add_field('landlordPhoneEve', 'Tenant phone (eve)', 'phone');
		$this->add_field('landlordPhoneCell', 'Tenant phone (cell)', 'phone');
		$this->add_field('landlordEmail', 'Tenant email', 'email');
		$this->add_field('addressForService', 'Address for service', 'safeString');
		$this->add_field('addressForService2', 'Secondary service address', 'safeString');
		$this->add_field('tenancyDateStart', 'Tenancy start date', 'date');
		$this->add_field('tenantsMax', 'Maximum tenants', 'int 1 20');
		$this->add_field('guestParking', 'Guest parking', 'bool');
		$this->add_field('waterCharges', 'Water charges', 'bool');		
	}
}