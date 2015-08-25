<?php
namespace diginex\vCard;

/**
 * Class for generating vCard
 * 
 * @author Lubos Hubacek, www.diginex.cz, 8/2015
 */
class VCard {
	/** Name of outputted file */
	private $fileName;	
	/** Array contains all data */
	private $data;	
	/** String to be outputted to vcf file */
	private $output;
	/** DateTime of generating file */
	private $revision_date;
	
	/**
	 * The constructor
	 */
	public function __construct(){
		$this -> fileName = "contacts_" . date('Y-m-d');
		$this -> data = array();
		$this -> output = '';
		$this -> revision_date = date('Y-m-d H:i:s');
	}
	
	/**
	 *  Add person to queue
	 */
	public function addPerson(Person $person){
		if($person -> getErrorsCount() == 0){
			$this -> data = $person;
		}
	}
	
	private function buildAll(){
		foreach($this->data as $person){
			$this -> output .= $this -> buildOne($person -> data) . "\r\n";	
		}		
	}
	
	/**
   * Checks all the values, builds appropriate defaults for
   * missing values and generates the vcard data string.
	 * Inspired by: https://github.com/facine/vCard/blob/master/vCard.class.php
	 *
	 * @param array $data Personal data
   */  
	private function buildOne($data){
		$txt = array();
		
		# edit and complete data to correct form 
		if (!$data['display_name']) {
			$data['display_name'] = $data['first_name'] . ' ' . $data['last_name'];
		}
		if (!$data['sort_string']) {
			$data['sort_string'] = $data['last_name'];
		}
		if (!$data['sort_string']) {
			$data['sort_string'] = $data['company'];
		}
		if (!$data['timezone']) {
			$data['timezone'] = date("O"); // Difference to Greenwich time (GMT) in hours
		}

		
		# generate string
		$txt[] = "BEGIN:VCARD";
		$txt[] = "VERSION:3.0";
		$txt[] = "CLASS:PUBLIC";
		//$txt[] = "PRODID:-//class_vCard from WhatsAPI//NONSGML Version 1//EN";
		$txt[] = "REV:" . $this->revision_date . "";
		$txt[] = "FN:" . $data['display_name'] . "";
		$txt[] = "N:"
			. $data['last_name'] . ";"
			. $data['first_name'] . ";"
			. $data['additional_name'] . ";"
			. $data['name_prefix'] . ";"
			. $data['name_suffix'] . "";
			
		if ($data['nickname']) {
			$txt[] = "NICKNAME:" . $data['nickname'] . "";
		}
		if ($data['title']) {
			$txt[] = "TITLE:" . $data['title'] . "";
		}		
		// Example: ORG:Hutchinson;quality
		if ($data['company'] || $data['department']) {
			$txt[] = "ORG:" 
				. $data['company'] . ";" 
				. $data['department'] . "";
		}

		if ($data['work_po_box'] || $data['work_extended_address']
				|| $data['work_address'] || $data['work_city']
				|| $data['work_state'] || $data['work_postal_code']
				|| $data['work_country']) {
						$$txt[] = "ADR;type=WORK:"
								. $data['work_po_box'] . ";"
								. $data['work_extended_address'] . ";"
								. $data['work_address'] . ";"
								. $data['work_city'] . ";"
								. $data['work_state'] . ";"
								. $data['work_postal_code'] . ";"
								. $data['work_country'] . "\r\n";
		}
		if ($data['home_po_box'] || $data['home_extended_address']
				|| $data['home_address'] || $data['home_city']
				|| $data['home_state'] || $data['home_postal_code']
				|| $data['home_country']) {
						$$txt[] = "ADR;type=HOME:"
								. $data['home_po_box'] . ";"
								. $data['home_extended_address'] . ";"
								. $data['home_address'] . ";"
								. $data['home_city'] . ";"
								. $data['home_state'] . ";"
								. $data['home_postal_code'] . ";"
								. $data['home_country'] . "\r\n";
		}
		if ($data['email1']) {
				$$txt[] = "EMAIL;type=INTERNET,pref:" . $data['email1'] . "\r\n";
		}
		if ($data['email2']) {
				$$txt[] = "EMAIL;type=INTERNET:" . $data['email2'] . "\r\n";
		}
		if ($data['office_tel']) {
				$$txt[] = "TEL;type=WORK,voice:" . $data['office_tel'] . "\r\n";
		}
		if ($data['home_tel']) {
				$$txt[] = "TEL;type=HOME,voice:" . $data['home_tel'] . "\r\n";
		}
		if ($data['cell_tel']) {
				$$txt[] = "TEL;type=CELL,voice:" . $data['cell_tel'] . "\r\n";
		}
		if ($data['fax_tel']) {
				$$txt[] = "TEL;type=WORK,fax:" . $data['fax_tel'] . "\r\n";
		}
		if ($data['pager_tel']) {
				$$txt[] = "TEL;type=WORK,pager:" . $data['pager_tel'] . "\r\n";
		}
		if ($data['url']) {
				$$txt[] = "URL;type=WORK:" . $data['url'] . "\r\n";
		}
		if ($data['birthday']) {
				$$txt[] = "BDAY:" . $data['birthday'] . "\r\n";
		}
		if ($data['role']) {
				$$txt[] = "ROLE:" . $data['role'] . "\r\n";
		}
		if ($data['note']) {
				$$txt[] = "NOTE:" . $data['note'] . "\r\n";
		}
		$$txt[] = "TZ:" . $data['timezone'] . "\r\n";
		$$txt[] = "END:VCARD\r\n";
    }
	
	// TODO: save vcf file on server
	public function saveVcfAsFile(){
		
	}
	
	/**
	 * Streams the vCard to the browser client.
	 */
	public function downloadVcf(){
		if($this -> output == ""){
			return FALSE;
		}
		
		header("Content-type: text/directory");
		header("Content-Disposition: attachment; filename=" . $this->filename . ".vcf");
		header("Pragma: public");
		echo $this -> output;
		exit();
	}
}