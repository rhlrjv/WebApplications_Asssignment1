======================================================================================================================
					INSTALLATION INSTRUCTIONS & POINTERS (ASSIGNMENT 1 | CP3101B)
======================================================================================================================

First assignment for web applications module - A Todo Manager

INSTALLATION INSTRUCTIONS:
	
1.	Install the unzipped files into a todo Directory on your server.
	Give the following permissions(assuming the base folder is https://cp3101b-1.comp.nus.edu.sg/~userid/todo/)
	- cd public_html
	- chmod 711 -R todo
	- chmod 777 -R todo/images
	- chmod 777 -R todo/fonts
	- chmod 777 todo/styles.css

2. 	Modify the following variables in config.inc to match your specs:
	$db_user=" ";
	$db_name=" ";
	$db_password=" ";
	$url_prefix=" "; //add the base folder address with https(eg : https://cp3101b-1.comp.nus.edu.sg/~userid/todo/)

3. 	Run the schema.sql to create the database prepopulated with some data to test.
	use the following instructions
	- cd public_html/todo
	- psql
	- \i schema.sql
	- \q
	
4. 	Go to the URL of the base folder, login using wither of the following two credentials:
	Username: jane
	Password: janepass
	
	Username: john
	Password: johnpass
	
	
TO NOTE:
1.	PLEASE USE CHROME BROWSER TO GET BEST RESULTS

2. 	Input Date for Date of Birth is used in the user profile/sign up forms for the purpose of using different form elements.But HTML5 doesn't support the input type on Firefox and IE. 
	Subsequently, our alignments get hindered.
	More info here: http://www.w3schools.com/html/html5_form_input_types.asp

