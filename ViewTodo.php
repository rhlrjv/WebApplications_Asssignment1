<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			<div class = "container-box">
				<a class="right settings" href = "?page=settings">Settings</a>
				<div class="clear"></div>
				<hr/>
				<div class="todo-entry">
					<div class="todo-name">
						<?php echo("Name of the Todo");?>
					</div>
					<div class = "completion">
						<?php echo("2"."/"."6")?> completed
					</div>
					<div class="progressbar">
					  <div></div>
					</div>
					
					<div class="clear"></div>
				</div>
				<hr/>
				<div class="todo-entry important">
					hello world
				</div>
				<hr/>
				<div class="todo-entry">
					hello world
				</div>
				<hr/>
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