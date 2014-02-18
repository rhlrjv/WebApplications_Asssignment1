<?php
	class task{

		var $id ;
		var $taskname;     
		var $totalhrs;		
		var $completedhrs;	
		var $imp;				
		var $username;			
		

		function getNextId ($dbconn)
		{
			if($dbconn != '')
			{
				$largestId_query="SELECT MAX(id_col) FROM task;";
				$result = pg_query($dbconn, $largestId_query);
				
					return ($result+1); 
			}
		}
		
		//Add a new to do
		function addtodo($dbconn, $argTaskname, $argTotalHrs, $argCompletedhrs, $argImp, $argUsername)
		{
			if(($dbconn)  != '')
			{
				$argId = getNextId($dbconn);
				echo $id;
				$addtodo_query="INSERT INTO task (id, taskname, totalhrs, completedhrs, imp, username) values($1, $2, $3, $4, $5, $6);";
				$result = pg_prepare($dbconn, "add_query", $addtodo_query);
				$result = pg_execute($dbconn, "add_query", array($argId, $argTaskname, $argTotalHrs, $argCompletedhrs, $argImp, $argUsername));
				if($result)
					return true; 
				else
					return false;
			}
		}
		
		//Add a new to do
		function viewAlltodo($dbconn, $argUsername)
		{
			if(($dbconn)  != '')
			{
				$viewAlltodo_query="SELECT * FROM task WHERE username = $1;";
				$result = pg_prepare($dbconn, "viewAll_query", $viewAlltodo_query);
				$result = pg_execute($dbconn, "viewAll_query", array($argUsername));
				if($result)
				{
					$rowcnt = pg_num_rows($result);
					$viewTaskObjects = array("");
					while($row = pg_fetch_row($result)) 
					{
						$viewTaskObj = new task();
						$viewTaskObj->id = $row[0];
						$viewTaskObj->taskname = $row[1];
						$viewTaskObj->totalhrs = $row[2];
						$viewTaskObj->completedhrs = $row[3];
						$viewTaskObj->important = $row[4];
						//echo("<br/>$viewTaskObj->id, $viewTaskObj->taskname, $viewTaskObj->totalhrs, $viewTaskObj->completedhrs, $viewTaskObj->important ");
						array_push($viewTaskObjects, $viewTaskObj);
						//$test = new task();
						//$test = array_pop($viewTaskObjects);
						//echo("<br/>$test->id, $test->taskname, $test->totalhrs, $test->completedhrs, $test->important ");
					}
						
					return $viewTaskObjects;
					
				}
				/*else
				{
					return false;
				}*/
			}
		}
		
		function getId()
		{
			return $this->id;
		}
		
		function setId($argId)
		{
			$this->id = $argId;
		}
		
		function getTaskname()
		{
			return $this->taskname;
		}
		
		function setTaskname($argTaskname)
		{
			$this->taskname = $argTaskname;
		}
		
		function getTotalHrs()
		{
			return $this->totalhrs;
		}
		
		function setTotalHrs($argTotalHrs)
		{
			$this->totalhrs = $argTotalHrs;
		}
		
		function getCompletedHrs()
		{
			return $this->completedhrs;
		}
		
		function setCompletedHrs($argCompletedHrs)
		{
			$this->completedhrs = $argCompletedHrs;
		}
		
		function getImp()
		{
			return $this->imp;
		}
		
		function setImp($argImp)
		{
			$this->imp = $argImp;
		}
		
	}

?>