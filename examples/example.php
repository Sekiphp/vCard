<?php
	error_reporting(E_ALL);

	# import class
	require_once '../src/VCard.class.php';
	require_once '../src/Person.class.php';
	echo 1;
	# create vCard object
	$vCard = new diginex\vCard\VCard();
	
	# create person and add data
	$person = new diginex\vCard\Person();
	$person -> set("first_name", "XX Lubos"); 
	$person -> set("last_name", "XX Hubacek"); 
	$person -> set("display_name", "XX Lubos Hubacek"); 
	$person -> set("company", "DIGINEX Technology s.r.o."); 
	$person -> set("office_tel", "888 999 444"); 
	echo $person -> toString();
	# add person to vCard queue
	$vCard -> addPerson($person);
	
	# create another person
	$person = new diginex\vCard\Person();
	$person -> set("first_name", "XXJan"); 
	$person -> set("last_name", "XXjanacek"); 
	$person -> set("display_name", "Jan janacek"); 
	$person -> set("company", "HURO s.r.o."); 
	$person -> set("office_tel", "777 999 444"); 
	# add person to vCard queue
	$vCard -> addPerson($person);
