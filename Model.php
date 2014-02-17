<?php
	// initialization
	
	session_save_path("$session_save_path");
	session_start();
	
	if(!isset($_SESSION['AppState']))
		$_SESSION['AppState'] = "l_out";
		
	if(!isset($_SESSION['Page']))
		$_SESSION['Page'] = "home";
		
	if(!isset($_SESSION['ErrMsg']))
		$_SESSION['ErrMsg'] = "";
	
			
	function clearSession()
	{
		session_unset();
	}
	
	function setState($toState)
	{
		switch($toState)
		{
			case "logged_in":
				$_SESSION['AppState'] = "l_in";
				$_SESSION['Page'] = "todo";
				return true;
				break;
			case "logged_out":
				$_SESSION['AppState'] = "l_out";
				$_SESSION['Page'] = "home";
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
	
	//changes the current page in the session data
	function setPage($toPage)
	{	
		$_SESSION['Page']=$toPage;
		return true;
	}
	
	//gets the page from the session data
	function getPage()
	{	
		return $_SESSION['Page'];
	}
	
	//sets Error Msg
	function setErrorMsg($errMsg)
	{
		$_SESSION['ErrMsg'] = $errMsg;
		return true;
	}
	
	//returns and Resets Error msg
	function getErrorMsg()
	{
		$errMsg = $_SESSION['ErrMsg'];
		$_SESSION['ErrMsg'] = "";
		return $errMsg;
	}
?>