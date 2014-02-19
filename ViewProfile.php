<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<?php
				$currentUserObj = new user();
				$currentUserObj = $currentUserObj->getUserObj ($_SESSION['dbconn'], $_SESSION['Username']);
				$username = $currentUserObj->getUsername();
				$password = $currentUserObj->getPassword();
				$email = $currentUserObj->getEmail();
				$dob = $currentUserObj->getDob();
				
			?>
			<div class = "form">
				<h1> Profile </h1>
				<form method="post">
					<input class="text-entry ninety-width"  placeholder="Enter User Name" name="profile_UserName" type="text" readonly value = "<?php echo($username);?>" />
					<input class="text-entry quarter-width left"  placeholder="Enter Password" name="profile_Password" type="password" value = "<?php echo($password);?>" />
					<input class="text-entry quarter-width right"  placeholder="Re-enter Password" name="profile_reEnterPassword" type="password" value = "<?php echo($password);?>" /><br/>
					<input class="text-entry quarter-width left"  placeholder="Email ID" name="profile_email" type="email" value = "<?php echo($email);?>" />
					<input class="text-entry quarter-width right date" name="profile_dob" type="date" value = "<?php echo($dob);?>" /><br/>
					<input class = "btn half-width left" type="submit" name="submitsUpdate" value="Update"/>
					<input class = "btn red-btn half-width right" type="submit" name="cancelUpdate" value="Cancel"/>
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