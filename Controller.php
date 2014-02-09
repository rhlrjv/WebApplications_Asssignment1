<?php 
	
	require 'config.inc';
	require 'Model.php';
	
	//if(isset($_REQUEST['restart']))
	//	session_unset();
	
	$view = "viewHome.php";
	
	if(isset($_REQUEST['page'])){
		switch ($_REQUEST['page']){
			case "home":
				$view = "viewHome.php";
				break;
			case "login":
				$view = "viewLogin.php";
				break;
			case "signup":
				$view = "viewSignup.php";
				break;
			case "todo":
				$view = "viewTodo.php";
				break;
			case "addtodo":
				$view = "viewAddTodo.php";
				break;
		}
	}
	if(isset($_REQUEST['submitToDo']))
	{
		$NewTodoName = $_REQUEST['TodoName'];
		$NewTodoHours = $_REQUEST['TodoHours'];
		$NewTodoHoursCompleted = $_REQUEST['TodoHoursCompleted'];
	}
	else
		$NewTodoName = "";
		
	require $view; //add this into a switch case statement to access different files
?> 