<?php
	session_save_path("$session_save_path");
	session_start(); // must be first thing in the php file
	
	if(!isset($_SESSION['AppState']))
		$_SESSION['AppState'] = "l_out";

	function clearSession()
	{
		session_unset();
	}
	
	function changeState($toState)
	{
		switch($toState)
		{
			case "logged_in":
				$_SESSION['AppState'] = "l_in";
				return true;
				break;
			case "logged_out":
				$_SESSION['AppState'] = "l_out";
				return true;
				break;
			default:
				return false;
				break;
		}
	}
	
	function isLoggedIn()
	{
		if($_SESSION['AppState'] == "l_in")
			return true;
		else
			return false;
	}
?>