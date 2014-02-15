<?php
	session_save_path("sess");
	session_start();
	
	class user{
		var $hostname_dbconn = 'localhost';      //Database server LOCATION
		var $database_dbconn = 'postgres';       //Database NAME
		var $username_dbconn = 'postgres';       //Database USERNAME
		var $password_dbconn = 'ishaan';         //Database PASSWORD
		var $hostport_dbconn = '5432';
		//table fields
		var $user_table = 'users';               //Users table name
		var $username_col = 'username';          //USERNAME column (value MUST be valid email)
		var $password_col = 'password';          //PASSWORD column
		
		var $dbconn = '';
		
		//connect to database
		function dbconnect()
		{
		
			$connectionString = "host=$this->hostname_dbconn port=$this->hostport_dbconn dbname=$this->database_dbconn user=$this->username_dbconn password=$this->password_dbconn";
			$this->dbconn = pg_connect($connectionString) or die ('Unable to connect to the database.');
			
			return;
		}
		
		//Sign up as new user
		function signup($argUsername, $argPassword)
		{
			if(($this->dbconn)  != '')
			{
				$signup_query="INSERT INTO $this->user_table (username, password) values($1, $2);";
				$result = pg_prepare($this->dbconn, "my_query", $signup_query);
				$result = pg_execute($this->dbconn, "my_query", array($argUsername, $argPassword));
				if($result)
					return true; 
				else
					return false;
			}
		}
		
		function login($aUsername, $aPassword){
			
			if(($this->dbconn)  != ''){
				//echo('logging in');
				$login_query="SELECT * FROM $this->user_table where $this->user_column = $1 AND $this->pass_column = $2;";
				$result = pg_prepare($this->dbconn, "my_query", $login_query);
				$result = pg_execute($this->dbconn, "my_query", array($aUsername,$aPassword));
				
				if(pg_num_rows($result)==0 || !($result)){
					//echo "no result";
					return false;
				}else{
					$row = pg_fetch_array($result);
					$_SESSION['isloggedin']=$row[password];
					return true;
				}
			}
			else{
				//echo ("Cannot log in");
				return false;
			}
		}
		
		function logout(){
			$_SESSION['isloggedin'] = "";
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

		
	}

?>