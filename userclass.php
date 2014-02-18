<?php
	class user{
		//table fields
		var $user_table = 'users';         	//Users table name
		var $username_col = 'username';		//USERNAME column (value MUST be valid email)
		var $password_col = 'pwd';          //PASSWORD column
		var $email_col = 'email';			//EMAIL column
		var $dob_col = 'dob';				//DATE OF BIRTH column
		
		
		//Sign up as new user
		function signup($dbconn, $argUsername, $argPassword, $argEmail, $argDob)
		{
			if($dbconn != '')
			{
				$signup_query="INSERT INTO $this->user_table ($this->username_col, $this->password_col, $this->email_col, $this->dob_col) values($1, $2, $3, $4);";
				$result = pg_prepare($dbconn, "my_query", $signup_query);
				$result = pg_execute($dbconn, "my_query", array($argUsername, $argPassword, $argEmail, $argDob));
				if($result)
					return true; 
				else
					return false;
			}
		}
		
		//Login to app
		function login($dbconn, $argUsername, $argPassword)
		{
			if($dbconn != '')
			{
				$login_query="SELECT * FROM $this->user_table where $this->username_col = $1 AND $this->password_col = $2;";
				$result = pg_prepare($dbconn, "my_query", $login_query);
				$result = pg_execute($dbconn, "my_query", array($argUsername,$argPassword));
				
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
		
			if(($dbconn)  != ''){
				$login_query="SELECT * FROM $this->user_table where $this->pass_column = $1;";
				$result = pg_prepare($dbconn, "my_query", $login_query);
				$result = pg_execute($dbconn, "my_query", array($aLogincode));
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