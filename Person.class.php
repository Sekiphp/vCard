<?php
namespace hubacek\vCard;

/**
 * Some parts of class are inherited from: https://github.com/facine/vCard/blob/master/vCard.class.php
 */
class Person {
	/** An array of this vcard's contact data */	
	public $data;
	
	/** All error messages */
	private $error;

	/**
	 * Constructor defined all supported values
	 */
	public function __construct(){
		$this -> error = array();	
			
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
	 * 
	 * @param String $key Name of the property
	 * @param mixed $value Value to set
	 * 
	 * @return mixed
	 */
	public function set($key, $value){
		if (array_key_exists($key, $this -> data)) {
			$this->data[$key] = trim($value);
			return TRUE;
		} 
		
		$this -> error[] = "Error: no exist key {$key}";
		return FALSE;
	}	

	/**
	 * @return String Error message
	 */
	public function getErrorLog(){
		return $this -> error;
	}
	
	public function printErrorLog(){
		if(sizeOf($this -> error) != 0){
			echo "<pre>";
				print_r($this -> error);
			echo "</pre><hr />";
		}	
		
		echo "No errors found!<hr />";
	}
}