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
		if(isset($_REQUEST['page'])){
			switch ($_REQUEST['page']){
				case "cancel":
					setPage("todo");
					clrEditTodoID();
					$_SESSION['AddTodo'] = false;
					header("Location: ?page=todo");
					break;
				case "addTodo":
					$_SESSION['AddTodo'] = true;
					setPage("todo");
					header("Location: ?page=todo");
					break;
				case "editTodo":
					if(!setEditTodoID($_REQUEST['editIndex']))
						setErrorMsg("Unknown Task ID");
					setPage("todo");
					header("Location: ?page=todo");
					break;
			}
		}
		if(isset($_REQUEST['AddTodo']))
		{
			//add a new todo
			
			//$argImp = isset($_REQUEST['TodoImportant']);
			//$GLOBALS['taskobj']->addtodo($_SESSION['dbconn'], $_REQUEST['TodoName'], $_REQUEST['TodoHours'], $_REQUEST['TodoHoursCompleted'], $_REQUEST['TodoHours'], $argImp, $_SESSION['username']);
			
			if(true)//things work out
			{
				setMsg("New Todo added.");
				$_SESSION['AddTodo'] = false;
			}
			else
			{
				setErrorMsg("Error Adding Todo. Please Retry");
			}
		}
		else if (isset($_REQUEST['CancelAddTodo']))
		{
			//cancel add of todo
			$_SESSION['AddTodo'] = false;
		}
		
		else if(isset($_REQUEST['UpdateTodo']))
		{
			//add a new todo
			//get the ID of the current todo by using : $_REQUEST['TodoID'];
			
			if(true)//things work out
			{
				setMsg("Todo Updated");
				clrEditTodoID();
			}
			else
			{
				setErrorMsg("Error updating Todo. Please Retry");
			}
			
		}
		else if(isset($_REQUEST['DeleteTodo']))
		{
			//delete Todo
			//get the ID of the current todo by using : $_REQUEST['TodoID'];
			
			if(true)//things work out
			{
				setMsg("Todo Deleted");
				clrEditTodoID();
			}
			else
			{
				setErrorMsg("Error Deleting Todo. Please Retry");
				clrEditTodoID();
			}
		}
		
		else if(isset($_REQUEST['IncrementTodo']))
		{
			//increment Todo
			//get the ID of the current todo by using : $_REQUEST['TodoID'];
			
			if(true)//things work out
				;//do nothing
			else
			{
				setErrorMsg("Error Incrementing Todo. Please Retry");
			}
		}
		
		else if(isset($_REQUEST['DecrimentTodo']))
		{
			//decriment Todo
			//get the ID of the current todo by using : $_REQUEST['TodoID'];
			
			if(true)//things work out
				;//do nothing
			else
			{
				setErrorMsg("Error Incrementing Todo. Please Retry");
			}
		}
		
		else if(isset($_REQUEST['UpdateTodoRate']))
		{
			//update Todo rate
			
			if($_REQUEST['TodoRate'] > 0 && $_REQUEST['TodoRate'] < 24)//things work out
			{
				$_SESSION['TodoRate'] = $_REQUEST['TodoRate'] ;
				setMsg("Todo Rate updated");
			}
			else
			{
				setErrorMsg("Error updating Todo Rate. Please Retry");
			}
		}
	}
	
	function profileController()
	{
		if(isset($_REQUEST['submitUpdate']))
		{
			if ($_REQUEST['profile_Password'] == "")
				setErrorMsg("Enter your password");
			else if ($_REQUEST['profile_email'] == "")
				setErrorMsg("Enter your email ID");
			else if ($_REQUEST['profile_dob'] == "")
				setErrorMsg("Enter your date of birth");
			else if ($_REQUEST['profile_Password'] != $_REQUEST['profile_reEnterPassword'])
				setErrorMsg("Passwords don't match");
			else
			{				
				//update the todo
				if(true)
				{
					setMsg("User Updated.");
					setPage("todo");
					header("Location: ?page=todo");
					exit;
				}
				else
					setErrorMsg("Update error. Please try again.");
			}
		}
		else if(isset($_REQUEST['cancelUpdate']))
		{
			setPage("todo");
			header("Location: ?page=todo");
		}
	}
?> 