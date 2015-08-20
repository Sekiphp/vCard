<?php
	//header("Content-type: text/html; charset=utf-8;");
	require_once 'VCard.class.php';
	require_once 'Person.class.php';
	
	//echo "vCard test!<br />";
	
	$vCard = new hubacek\vcard\VCard();
	
	$person = new hubacek\vCard\Person();
	$person -> set("first_name", "XXlubos"); 
	$person -> set("last_name", "XXhubacek"); 
	$person -> set("display_name", "XXLubos Hubacek"); 
	$person -> set("company", "DIGINEX Technology s.r.o."); 
	$person -> set("office_tel", "888 999 444"); 
		//$person -> printErrorLog(); 
		$vCard -> addPerson($person);
	
	$person = new hubacek\vCard\Person();
	$person -> set("first_name", "XXJan"); 
	$person -> set("last_name", "XXjanacek"); 
	$person -> set("display_name", "Jan janacek"); 
	$person -> set("company", "HURO s.r.o."); 
	$person -> set("office_tel", "777 999 444"); 
		//$person -> printErrorLog(); 
		$vCard -> addPerson($person);

	$person = new hubacek\vCard\Person();
	$person -> set("first_name", "XXKarel"); 
	$person -> set("last_name", "XXzebra"); 
	$person -> set("display_name", "XXKarel Zebra"); 
	$person -> set("company", "Coca-Cola s.r.o."); 
	$person -> set("office_tel", "111 999 444");
		//$person -> printErrorLog(); 
		$vCard -> addPerson($person);
		
	$person = new hubacek\vCard\Person();
	$person -> set("first_name", "XXkubos"); 
	$person -> set("last_name", "XXtesto"); 
	$person -> set("display_name", "XXkubos testo"); 
	$person -> set("company", "DIGINEX Technology s.r.o."); 
	$person -> set("office_tel", "888 999 444"); 
		//$person -> printErrorLog(); 
		$vCard -> addPerson($person);
		
		
		
		
	$vCard -> generateCards();
	//var_dump($vCard -> output);
	$vCard -> download();
	
	//echo "vCard END";
	