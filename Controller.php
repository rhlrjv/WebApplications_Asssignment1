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
		case "profile":
			loggedInAccess();	//access to pages when logged IN
			profileController();
			break;
		case "news":
			loggedInAccess();
			loggedOutAccess();
			break;
		case "contact":
			loggedInAccess();
			loggedOutAccess();
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
		case "profile":
			$view = "viewProfile.php";
			break;
		case "news":
			$view = "viewNews.php";
			break;
		case "contact":
			$view = "viewContact.php";
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
					case "news":
						setPage("news");
						break;
					case "contact":
						setPage("contact");
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
					case "profile":
						setPage("profile");
						break;
					case "news":
						setPage("news");
						break;
					case "contact":
						setPage("contact");
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
				if($GLOBALS['userobj']->login($_SESSION['dbconn'], $_REQUEST['UserName'], $_REQUEST['Password']) == true)
				{
					setState("logged_in");
					$_SESSION['Username'] = $_REQUEST['UserName'];
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
			else if ($GLOBALS['userobj']->duplicateUsername($_SESSION['dbconn'], $_REQUEST['UserName']))
				setErrorMsg("Username already exists. Pick another one!");
			else
			{				
				if($GLOBALS['userobj']->signup($_SESSION['dbconn'], $_REQUEST['UserName'], $_REQUEST['Password'], $_REQUEST['email'], $_REQUEST['dob']) == true)
				{
					setMsg("User added. Please login to continue.");
					setPage("login");
					header("Location: ?page=login");
					exit;
				}
				else
					setErrorMsg("Signup error. Please try again.");
			}
		}
		else if(isset($_REQUEST['cancelSignup']))
		{
			setPage("home");
			header("Location: ");
		}
			
	}
	
	// manages user events that take place in todo overview page
	function todoController()
	{
		if(isset($_REQUEST['AddTodo']))
		{
			//add a new todo
			$argImp = isset($_REQUEST['TodoImportant']);
			$GLOBALS['taskobj']->addtodo($_SESSION['dbconn'], $_REQUEST['TodoName'], $_REQUEST['TodoHours'], $_REQUEST['TodoHoursCompleted'], $_REQUEST['TodoHours'], $argImp, $_SESSION['username']);
		}
		else if(isset($_REQUEST['UpdateTodo']))
		{
			//add a new todo
		}
		else if(isset($_REQUEST['DeleteTodo']))
		{
			//add a new todo
		}
	}
	
	function profileController()
	{
	}
?> 