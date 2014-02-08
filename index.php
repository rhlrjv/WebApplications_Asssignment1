<?php 
	session_save_path("sess");
	session_start(); // must be first thing in the php file
	
	if(isset($_REQUEST['restart']))
		session_unset();
	
	if(!isset($_SESSION['random']))
		$_SESSION['random'] = rand(0,100);
	
	if(!isset($_SESSION['guesses']))
		$_SESSION['guesses'] = 0;
		
	if(!isset($_SESSION['prev']))
		$_SESSION['prev']=array(0);
		
	$fullHistory=&$_SESSION['history']; 
?> 

<!DOCTYPE html>
<html>
	<body>
		<h1>Welcome to Guess Game</h1>
		<b/>
		<form action="guessGame.php" method="post">
			<label>Your Guess: <input name="guess" type="text"/></label>
			<input type="submit" name="submitGuess" value="Check My Guess">
			<input type="submit" name="restart" value="Reset">
		</form>
		<br/>
		<?php 
			if(isset($_REQUEST['submitGuess'])){ 
				if(is_numeric($_REQUEST['guess'])&&$_REQUEST['guess']>=0&&$_REQUEST['guess']<=100)
				{
					$fullHistory[] = $_REQUEST['guess'];
					//print_r($fullHistory);
					//echo "<br/>";
					foreach($fullHistory as $key=>$value )
					{
						$number = $key+1;
						echo ("Your guess #");
						echo($number." is ".$value." which is ");
						
						if ($value == $_SESSION['random'])
						{
							echo ("correct!!<br/>");
							?>
							<form action="guessGame.php" method="post">
								<input type="submit" name="restart" value="Restart Game">
							</form><br/>
							<?php
						}
						else if ($value>$_SESSION['random'])
							echo ("too high<br/>");
						else
							echo ("too low<br/>");	
					}
					//save number of guesses
					$_SESSION['guesses']=$_SESSION['guesses']+1;
				}
				else 
					echo ("Your guess not between 0-100. Try Again.");
			}
				
			echo ("<br/><h2>Number of Guesses = ".$_SESSION['guesses']."</h2>");
			echo ("<h2>Random Number = ".$_SESSION['random']."</h2>");
		?>
	</body>
</html>