<?php
namespace hubacek\vCard;

/**
 * Class for generating vCard 4.0 
 * 
 * @author Lubos Hubacek, www.diginex.cz, 8/2015
 */
class VCard {
	/* name of generated file without extension */
	private $fileName;
	
	private $people = array();
	
	public $output;
	
	public function __construct(){
		//$this -> people = array();	
		$this -> output = "";
	}
	
	public function addPerson($person){
		if(count($person -> getErrorLog()) != 0){
			echo "--error--";
			return;
		}	

		$this -> people[] = $person;
	}
	
	public function generateCards(){
		foreach($this->people as $persona){
				//echo "<pre>";
				//print_r($persona);
				//echo $persona->data['last_name'];
			$this -> output .= $this->generate($persona->data) . "\r\n";	
		}
		
		return TRUE;
	}
	
	private function generate($person){
		$txt = array();
		
		$txt[] = "BEGIN:VCARD";
		$txt[] = "VERSION:2.1";
		$txt[] = "N:{$person['last_name']};{$person['first_name']}";
		$txt[] = "FN:{$person['first_name']} {$person['last_name']}";
		$txt[] = "ORG:{$person['company']}";
		$txt[] = "TITLE:Shrimp Man";
		$txt[] = "PHOTO;GIF:http://www.example.com/dir_photos/my_photo.gif";
		$txt[] = "TEL;WORK;VOICE:{$person['office_tel']}";
		//$txt[] = "TEL;HOME;VOICE:(404) 555-1212";
		//$txt[] = "ADR;WORK:;;100 Waters Edge;Baytown;LA;30314;United States of America";
		//$txt[] = "LABEL;WORK;ENCODING=QUOTED-PRINTABLE:100 Waters Edge=0D=0ABaytown, LA 30314=0D=0AUnited States of America";
		//$txt[] = "ADR;HOME:;;42 Plantation St.;Baytown;LA;30314;United States of America";
		//$txt[] = "LABEL;HOME;ENCODING=QUOTED-PRINTABLE:42 Plantation St.=0D=0ABaytown, LA 30314=0D=0AUnited States of America";
		$txt[] = "EMAIL;PREF;INTERNET:forrestgump@example.com";
		$txt[] = "REV:20080424T195243Z";
		$txt[] = "END:VCARD";
		
		return imPlode("\r\n", $txt);
	}
	
	
	/**
	 * Streams the vCard to the browser client.
	 */
	public function download($filename = "testovaci_vcard")
	{
		//if (!$this->card) $this->build();
		//$this->filename = preg_replace('/\s+/', '_', ($filename ? $filename : $this->data['display_name']));
		header("Content-type: text/directory");
		header("Content-Disposition: attachment; filename=" . $filename . ".vcf");
		header("Pragma: public");
		echo $this -> output;
	}
		
}