<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<div class = "form">
				<h1> User Sign-Up </h1>
				<form method="post">
					<input class="text-entry ninety-width"  placeholder="Enter User Name" name="UserName" type="text"/>
					<input class="text-entry quarter-width left"  placeholder="Enter Password" name="Password" type="password"/>
					<input class="text-entry quarter-width right"  placeholder="Re-enter Password" name="reEnterPassword" type="password"/><br/>
					<input class="text-entry quarter-width left"  placeholder="Email ID" name="email" type="email"/>
					<input class="text-entry quarter-width right date" value="yyyy-mm-dd" name="dob" type="date"/><br/>
					<input class = "btn half-width left" type="submit" name="submitsSignup" value="Signup"/>
					<input class = "btn red-btn half-width right" type="submit" name="cancelSignup" value="Cancel"/>
				</form>
				<div style="clear:both"></div>
			</div>
			
			<?php
				//show Msgs
				$ErrorMsg = getErrorMsg();
				$Msg = getMsg();
				if ($ErrorMsg != ""){
				?>
					<div class = "form error message">
						<?php echo($ErrorMsg);?>
					</div>
				<?php 
				} 
				else if ($Msg != ""){
				?>
					<div class = "form message">
						<?php echo($Msg);?>
					</div>
				<?php 
				} 
			?>
			
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>