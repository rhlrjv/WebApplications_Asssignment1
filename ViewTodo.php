<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<form method="post">
				<label><input class="text-entry"  placeholder="Enter ToDo" name="addTodo" type="text"/></label>
				<input class = "btn" type="submit" name="submitToDo" value="Add ToDo">
			</form>
			<br/>
			<br/>
			<p> 
				<?php 
					if ($todo !=""){
						?>
						Todo : 
						<?php echo ($todo) ;
					}?>
			</p>
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>