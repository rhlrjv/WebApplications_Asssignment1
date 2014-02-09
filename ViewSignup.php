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
					<input class="text-entry quarter-width right"  placeholder="Re-enter Password" name="re_enter_password" type="password"/><br/>
					<input class="text-entry ninety-width"  placeholder="Email ID" name="email" type="email"/><br/>
					<input class = "btn half-width left" type="submit" name="submitsSignup" value="Signup"/>
					<input class = "btn red-btn half-width right" type="submit" name="cancel Signup" value="Cancel"/>
				</form>
				<div style="clear:both"></div>
			</div>
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>