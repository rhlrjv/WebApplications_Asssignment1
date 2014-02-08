<?php 
	
	require 'config.inc';
	require 'Model.php';
	
	//if(isset($_REQUEST['restart']))
	//	session_unset();
	
	if(isset($_REQUEST['submitToDo']))
	{
		$NewTodoName = $_REQUEST['TodoName'];
		$NewTodoHours = $_REQUEST['TodoHours'];
		$NewTodoHoursCompleted = $_REQUEST['TodoHoursCompleted'];
	}
	else
		$NewTodoName = "";
		
	require 'ViewSignup.php'; //add this into a switch case statement to access different files
?> 