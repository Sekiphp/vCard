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
	
	public function addPerson($dataIN){
		
	}
	
	private function buildAll(){
		
	}
}