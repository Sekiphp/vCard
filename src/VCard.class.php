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
	
	/**
	 * The constructor
	 */
	public function __construct(){
		$this -> fileName = "contacts_" . date('Y-m-d');
		$this -> data = array();
		$this -> output = '';
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