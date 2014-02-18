<?php
	class user{
		//table fields
		var $user_table = 'users';         	//Users table name
		var $username_col = 'username';		//USERNAME column (value MUST be valid email)
		var $password_col = 'pwd';          //PASSWORD column
		var $email_col = 'email';			//EMAIL column
		var $dob_col = 'dob';				//DATE OF BIRTH column
		
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
		
		//Sign up as new user
		function signup($argUsername, $argPassword, $argEmail, $argDob)
		{
			if(($this->dbconn)  != '')
			{
				$signup_query="INSERT INTO $this->user_table ($this->username_col, $this->password_col, $this->email_col, $this->dob_col) values($1, $2, $3, $4);";
				$result = pg_prepare($this->dbconn, "my_query", $signup_query);
				$result = pg_execute($this->dbconn, "my_query", array($argUsername, $argPassword, $argEmail, $argDob));
				if($result)
					return true; 
				else
					return false;
			}
		}
		
		//Login to app
		function login($argUsername, $argPassword)
		{
			if(($this->dbconn)  != '')
			{
				$login_query="SELECT * FROM $this->user_table where $this->username_col = $1 AND $this->password_col = $2;";
				$result = pg_prepare($this->dbconn, "my_query", $login_query);
				$result = pg_execute($this->dbconn, "my_query", array($argUsername,$argPassword));
				
				if($result)
				{
					$rows = pg_num_rows($result); 
					if($rows)
						return true;
					else
						return false;
				}
			}
		}
		
		function logincheck($aLogincode){
		
			if(($this->dbconn)  != ''){
				$login_query="SELECT * FROM $this->user_table where $this->pass_column = $1;";
				$result = pg_prepare($this->dbconn, "my_query", $login_query);
				$result = pg_execute($this->dbconn, "my_query", array($aLogincode));
				if(pg_num_rows($result)==0 || !($result)){
					//echo "no result";
					return false;
				}else{
					//is logged on
					return true;
				}
				
			}
			return false;
		}
		
		function logout(){
			$_SESSION['isloggedin'] = "";
		}
		

		
	}

?>