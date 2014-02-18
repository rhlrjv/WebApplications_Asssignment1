<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<div class = "form">
				<h1> Profile </h1>
				<form method="post">
					<input class="text-entry ninety-width"  placeholder="Enter User Name" name="profile_UserName" type="text"/>
					<input class="text-entry quarter-width left"  placeholder="Enter Password" name="profile_Password" type="password"/>
					<input class="text-entry quarter-width right"  placeholder="Re-enter Password" name="profile_reEnterPassword" type="password"/><br/>
					<input class="text-entry quarter-width left"  placeholder="Email ID" name="profile_email" type="email"/>
					<input class="text-entry quarter-width right date" value="yyyy-mm-dd" name="profile_dob" type="date"/><br/>
					<input class = "btn half-width left" type="submit" name="submitsUpdate" value="Update"/>
					<input class = "btn red-btn half-width right" type="submit" name="cancelUpdate" value="Cancel"/>
				</form>
				<div style="clear:both"></div>
			</div>
			
			<?php
				//show Msgs
				$_REQUEST['profile_UserName']="Sham";
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