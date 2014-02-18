<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<div class = "form">
				<h1> User Login </h1>
				<form method="post">
					<input class="text-entry ninety-width"  placeholder="User Name" name="UserName" type="text"/>
					<input class="text-entry ninety-width"  placeholder="Password" name="Password" type="password"/><br/>
					<input class = "btn half-width left" type="submit" name="submitlogin" value="Login"/>
					<input class = "btn red-btn half-width right" type="submit" name="submitSignup" value="New User"/>
				</form>
				<div class="clear"></div>
				<div class = "center surround-space"> <a href="?page=home">Forgot Password </a></div>
			</div>
			
			<?php
				//show Error Msg
				$ErrorMsg = getErrorMsg();
				if ($ErrorMsg != ""){
				?>
					<div class = "form error-msg">
						<?php echo($ErrorMsg);?>
					</div>
				<?php 
				} 
			?>
			
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>