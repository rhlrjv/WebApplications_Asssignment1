<?php
	class task{
		//table fields
		var $task_table = 'task';         	//Task table name
		var $id_col = 'id';					//ID column 
		var $taskname_col = 'taskname';     //TASKNAME column
		var $totalhrs_col = 'totalhrs';		//TOTAL HOURS column
		var $completedhrs_col = 'completedhrs';	//COMPLETED HOURS column
		var $imp_col = 'important';				//IMPORTANT column
		var $username_col = 'username';			//USERNAME column
		
		var $dbconn = '';
		
		//connect to database
		function dbconnect()
		{
			$dbhostname = "localhost";
			$dbport = "5432";
			$dbname = $GLOBALS["db_name"];
			$dbuser = $GLOBALS["db_user"];
			$dbpwd = $GLOBALS["db_password"];
			$connectionString = "host=$dbhostname port=$dbport dbname=$dbname user=$dbuser password=$dbpwd";
			$this->dbconn = pg_connect($connectionString);
			if(!$this->dbconn)
			{
				setMessage("Can't connect to the database");	
				exit;
			}
			return;
		}
		
		//Add a new to do
		function addtodo($argId, $argTaskname, $argTotalHrs, $argCompletedhrs, $argImp, $argUsername)
		{
			if(($this->dbconn)  != '')
			{
				$addtodo_query="INSERT INTO $this->task_table (id_col, taskname_col, totalhrs_col, completedhrs_col, imp_col, username_col) values($1, $2, $3, $4, $5, $6);";
				$result = pg_prepare($this->dbconn, "my_query", $signup_query);
				$result = pg_execute($this->dbconn, "my_query", array($argUsername, $argPassword, $argEmail, $argDob));
				if($result)
					return true; 
				else
					return false;
			}
		}
		
		
		
	}

?>