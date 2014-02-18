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
				
		//Add a new to do
		function addtodo($dbconn, $argId, $argTaskname, $argTotalHrs, $argCompletedhrs, $argImp, $argUsername)
		{
			if(($dbconn)  != '')
			{
				$addtodo_query="INSERT INTO $this->task_table (id_col, taskname_col, totalhrs_col, completedhrs_col, imp_col, username_col) values($1, $2, $3, $4, $5, $6);";
				$result = pg_prepare($dbconn, "my_query", $signup_query);
				$result = pg_execute($dbconn, "my_query", array($argUsername, $argPassword, $argEmail, $argDob));
				if($result)
					return true; 
				else
					return false;
			}
		}
		
		
		
	}

?>