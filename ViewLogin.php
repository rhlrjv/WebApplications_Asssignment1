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
					<input class = "btn half-width" type="submit" name="submitlogin" value="Login"/>
					<input class = "btn red-btn half-width" type="submit" name="signup" value="New User"/>
				</form>
			</div>
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>