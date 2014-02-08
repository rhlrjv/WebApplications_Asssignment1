<?php 
	
	require 'config.inc';
	require 'Model.php';
	
	session_save_path("$session_save_path");
	session_start(); // must be first thing in the php file
	
	//if(isset($_REQUEST['restart']))
	//	session_unset();
	
	if(isset($_REQUEST['submitToDo']))
		$todo = $_REQUEST['addTodo'];
	else
		$todo = "";
		
	require 'ViewToDo.php';
?> 