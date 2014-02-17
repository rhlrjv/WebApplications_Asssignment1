<?php 
	
	require 'config.inc';
	require 'Model.php';
	
	//for testing posposes only
	//setState("logged_out");
	//echo(getPage());
	
	//Define access rights and the handle user events for the various pages
	switch(getPage())
	{
		case "home":
			loggedOutAccess();	//access to pages when logged OUT
			homeController();
			break;
		case "login":
			loggedOutAccess();	//access to pages when logged OUT
			loginController();
			break;
		case "signup":
			loggedOutAccess();	//access to pages when logged OUT
			signupController();
			break;
		case "todo":
			loggedInAccess();	//access to pages when logged IN
			todoController();
			break;
	}
	
	//switch case to choose the view after all user events have been executed
	switch(getPage())
	{
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
	}
	
	require $view;
	
/*	===========================================================================	*/
/* 	Controller functions to handle user events									*/
/*	===========================================================================	*/
	
	// defines the pages that are accessible through a GET request when logged OUT
	function loggedOutAccess()
	{
		if(!isLoggedIn())
		{
			if(isset($_REQUEST['page'])){
				switch ($_REQUEST['page']){
					case "home":
						setPage("home");
						break;
					case "login":
						setPage("login");
						break;
					case "signup":
						setPage("signup");
						break;
					default:
						setPage("home");
						break;
				}
			}
		}
	}
	
	// defines the pages that are accessible through a GET request when logged IN
	function loggedInAccess()
	{
		if(isLoggedIn())
		{
			if(isset($_REQUEST['page'])){
				switch ($_REQUEST['page']){
					case "todo":
						setPage("todo");
						break;
					default:
						setPage("todo");
						break;
				}
			}
		}
	}
	
	// manages user events that take place in Home
	function homeController()
	{
	}
	
	// manages user events that take place in Login
	function loginController()
	{
		if(isset($_REQUEST['submitlogin']))
		{
			//checkLogin($_REQUEST['submitlogin'], $_REQUEST['submitlogin']
			setErrorMsg("wrong login");
		}
		else if(isset($_REQUEST['submitSignup']))
		{
			//change to signup page
			setPage("signup");
			header("Location: ?page=signup");
		}
	}
	
	// manages user events that take place in Signup
	function signupController()
	{
	}
	
	// manages user events that take place in todo overview page
	function todoController()
	{
	}
?> 