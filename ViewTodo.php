<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<div class = "form">
				<h1> Add a new To-Do </h1>
				<form method="post">
					<input class="text-entry ninety-width"  placeholder="Todo name" name="TodoName" type="text"/>
					<input class="text-entry half-width"  placeholder="Total number of hours " name="TodoHours" type="number"/><br/>
					<input class="text-entry half-width"  placeholder="Hours Completed " name="TodoHoursCompleted" type="number"/><br/>
					<input class = "btn full-width" type="submit" name="submitToDo" value="Add ToDo"/>
				</form>
			</div>
			<br/>
			<br/>
			<p> 
				<?php 
					if ($NewTodoName !=""){
						echo ("Todo Name = " . $NewTodoName. "<br/>Todo hours = ". $NewTodoHours . "<br/> Hours Completed = ". $NewTodoHoursCompleted);
				}?>
			</p>
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>