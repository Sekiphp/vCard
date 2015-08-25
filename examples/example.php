<?php
	error_reporting(E_ALL);

	# import class
	require_once '../src/VCard.class.php';
	require_once '../src/Person.class.php';
	
	# create vCard object
	$vCard = new diginex\vCard\VCard();
	
	# create person and add data
	$person = new diginex\vCard\Person();
	$person -> set("first_name", "Lubos"); 
	$person -> set("last_name", "Hubacek"); 
	$person -> set("display_name", "XX Lubos Hubacek"); 
	$person -> set("company", "DIGINEX Technology s.r.o."); 
	$person -> set("office_tel", "888 999 444"); 
	# add person to vCard queue
	$vCard -> addPerson($person);
	
	# create another person
	$person = new diginex\vCard\Person();
	$person -> set("first_name", "Jan"); 
	$person -> set("last_name", "Janacek"); 
	$person -> set("display_name", "XX Jan Janacek"); 
	$person -> set("company", "HURO s.r.o."); 
	$person -> set("office_tel", "777 999 444"); 
	# add person to vCard queue
	$vCard -> addPerson($person);
	
	# create another person
	$person = new diginex\vCard\Person();
	$person -> set("first_name", "Dan"); 
	$person -> set("last_name", "Bilzerian"); 
	$person -> set("display_name", "XX Dan Bilzerian"); 
	$person -> set("office_tel", "112 112 112"); 
	$person -> set("note", "Big boss"); 
	# add person to vCard queue
	$vCard -> addPerson($person);
	
	# create another person
	$person = new diginex\vCard\Person();
	$person -> set("first_name", "XX Meredith"); 
	$person -> set("additional_name", "Rodney");
	$person -> set("last_name", "McKay"); 
	$person -> set('name_prefix', "PREF");
	$person -> set('name_suffix', "SUFF");
	$person -> set('nickname', "traktor");
	$person -> set('title', "PhD");
	$person -> set('role', "Scientist");
	$person -> set('department', "SGA");
	$person -> set('company', "MGM");
	$person -> set('work_po_box', "11");
	$person -> set('work_extended_address', "");
	$person -> set('work_address', "5 avenue");
	$person -> set('work_city', "New York");
	$person -> set('work_state', "USA");
	$person -> set('work_postal_code', "111 88");
	$person -> set('work_country', "USA");
	$person -> set('home_po_box', "22");
	$person -> set('home_extended_address', "");
	$person -> set('home_address', "Kocanda 10");
	$person -> set('home_city', "Springfield");
	$person -> set('home_state', "Washington");
	$person -> set('home_postal_code', "222 99");
	$person -> set('home_country', "IL");
	$person -> set('office_tel', "888 999 777");
	$person -> set('home_tel', "111 222 000");
	$person -> set('cell_tel', "999 999 999"); // mobile
	$person -> set('email1', "hub@hub.com");
	$person -> set('email2', "mail@gmail.com");
	$person -> set('url', "www.diginex.cz");
	$person -> set('photo', "");
	$person -> set('birthday', "1.1.1970");
	$person -> set('timezone', "2");
	$person -> set('note', "Fll example");			
	# add person to vCard queue
	$vCard -> addPerson($person);
	
  
  $vCard -> buildAll();
  //echo $vCard->output;
  
  $vCard -> downloadVcf();
