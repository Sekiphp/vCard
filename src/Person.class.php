<?php
namespace diginex\vCard;

/**
 * Class for get person data
 * 
 * @author Lubos Hubacek, www.diginex.cz, 8/2015
 */
class Person {
	/** Contains all data about Person */
	private $data;
	
	/** All error messages */
	private $errors;
	
	/**
	 * Constructor defined all supported values
	 */
	public function __construct(){
		$this -> errors = array();	
			
		$this -> data = array(
			'display_name' => NULL,
			'first_name' => NULL,
			'last_name' => NULL,
			'additional_name' => NULL,
			'name_prefix' => NULL,
			'name_suffix' => NULL,
			'nickname' => NULL,
			'title' => NULL,
			'role' => NULL,
			'department' => NULL,
			'company' => NULL,
			'work_po_box' => NULL,
			'work_extended_address' => NULL,
			'work_address' => NULL,
			'work_city' => NULL,
			'work_state' => NULL,
			'work_postal_code' => NULL,
			'work_country' => NULL,
			'home_po_box' => NULL,
			'home_extended_address' => NULL,
			'home_address' => NULL,
			'home_city' => NULL,
			'home_state' => NULL,
			'home_postal_code' => NULL,
			'home_country' => NULL,
			'office_tel' => NULL,
			'home_tel' => NULL,
			'cell_tel' => NULL,
			'fax_tel' => NULL,
			'pager_tel' => NULL,
			'email1' => NULL,
			'email2' => NULL,
			'url' => NULL,
			'photo' => NULL,
			'birthday' => NULL,
			'timezone' => NULL,
			'sort_string' => NULL,
			'note' => NULL,
		);			
	}
	
	/**
	 * Global setter
	 * (no data control)
	 * 
	 * @param String $key Name of the property
	 * @param mixed $value Value to set
	 * 
	 * @return bool
	 */
	public function set($key, $value){
		if(array_key_exists($key, $this -> data)){
			$this -> data[$key] = trim($value);
			return TRUE;
		} 
		
		$this -> errors[] = "vCard Error (class Person): error for key: {$key}";
		return FALSE;
	}	
	
	/**
	 * Get errors count (0 = no errors)
	 */
	public function getErrorsCount(){
		return sizeOf($this -> errors);
	}
	
	/**
	 * Get array, which contain errors messages
	 */
	public function getErrors(){
		return $this -> errors;
	}
	
	/**
	 *  Test mode
	 */
	public function toString(){
		$str = "";
		
		foreach($this -> data as $key => $value){
			if($value != NULL){
				$str .= "[{$key}] = {$value}\r\n";
			}
		}
		
		return $str;
	}
	
}