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
					<input class="text-entry quarter-width left"  placeholder="Total number of hours " name="TodoHours" type="number"/><br/>
					<input class="text-entry quarter-width right"  placeholder="Hours Completed " name="TodoHoursCompleted" type="number"/><br/>
					<input class="chkbox"  name="important" type="checkbox"/><label> Important</label><br/>
					<input class = "btn full-width" type="submit" name="submitToDo" value="Add ToDo"/>
				</form>
			</div>
			<br/>
			<br/>
			<p> 
				<?php 
					if ($NewTodoName !=""){
						echo ("Todo Name = " . $newTodoName. "<br/>Todo hours = ". $newTodoHours . "<br/> Hours Completed = ". $newTodoHoursCompleted);
				}?>
			</p>
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>