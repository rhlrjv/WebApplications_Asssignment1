<!DOCTYPE html>
<html>
	<body>
		<h1>TODO Manager</h1>
		<b/>
		<form method="post">
			<label>Add ToDo: <input name="addTodo" type="text"/></label>
			<input type="submit" name="submitToDo" value="Add To Do">
		</form>
		<br/>
		<br/>
		<h2> 
			<?php 
				if ($todo !=""){
					?>
					Added Todo : 
					<?php echo ($todo) 
				}?>
		</h2>
	</body>
</html>