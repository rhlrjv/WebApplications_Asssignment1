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
					case "logout":
						setState("logged_out");
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
			if($_REQUEST['UserName'] == "")
				setErrorMsg("Enter a username");
			else if ($_REQUEST['Password'] == "")
				setErrorMsg("Enter your password");
			else
			{
				if($GLOBALS['userobj']->login($_REQUEST['UserName'], $_REQUEST['Password']) == true)
				{
					setState("logged_in");
				}
				else
					setErrorMsg("Incorrect Login Details");
			}
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
		if(isset($_REQUEST['submitsSignup']))
		{
			if($_REQUEST['UserName'] == "")
				setErrorMsg("Enter a username");
			else if ($_REQUEST['Password'] == "")
				setErrorMsg("Enter your password");
			else if ($_REQUEST['email'] == "")
				setErrorMsg("Enter your email ID");
			else if ($_REQUEST['dob'] == "")
				setErrorMsg("Enter your date of birth");
			else if ($_REQUEST['Password'] != $_REQUEST['reEnterPassword'])
				setErrorMsg("Passwords don't match");
			else
			{
				//$usersignup = new user();	//Instantiate object of user class
				//$usersignup->dbconnect();	//Connect to database
				
				if($GLOBALS['userobj']->signup($_REQUEST['UserName'], $_REQUEST['Password'], $_REQUEST['email'], $_REQUEST['dob']) == true)
				{
					setPage("login");
					setErrorMsg("User added. Please login to continue.");
					header("Location: ?page=login");
				}
				else
					setErrorMsg("Database error. Please sign up again.");
			}
		}
	}
	
	// manages user events that take place in todo overview page
	function todoController()
	{
	}
	
?> 