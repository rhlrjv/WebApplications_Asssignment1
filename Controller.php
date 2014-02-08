<?php 
	
	require 'config.inc';
	require 'Model.php';
	
	//if(isset($_REQUEST['restart']))
	//	session_unset();
	
	if(isset($_REQUEST['submitToDo']))
		$todo = $_REQUEST['addTodo'];
	else
		$todo = "";
		
	require 'ViewToDo.php'; //add this into a switch case statement to access different files
?> 