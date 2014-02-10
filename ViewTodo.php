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
				
				<?php
				$no=10;
				for($i=0;$i<20;$i++)
				{
					$completedHours = rand(0,5);
					$totalHours= rand(0,5) + $completedHours;
					$important = rand(-1	,1);
					if ( $totalHours== $completedHours)
						$completed =1;
					else
						$completed = 0;
				?>
					<div class="todo-entry <?php if($important>0) echo("important");?> <?php if($completed!=0) echo("completed");?>">
						<div class="todo-name">
							<a href="?page=editTodo&index=<?php echo($i)?>">
								<?php echo("Name of the Todo #" . ($i+1));?>
							</a>
						</div>
						<div class = "completion">
							<?php echo($completedHours."/".$totalHours)?> completed
						</div>
						<div class="progressbar">
						  <div style=" width : <?php echo($completedHours*100/$totalHours); ?>%"></div>
						</div>
						<?php 
						if($completed==0)
						{ ?>
							<div>
								<form method="post">
									<input type="hidden" value="<?php echo($i);?>" name="todoIncrement"/>
									<input class = "todo-button" type="submit" value="Increment" name="todoIncrement"/>
								</form>
							</div>
						<?php 
						}
						else{
						?>
							<div>
								<form method="post">
									<input type="hidden" value="<?php echo($i);?>" name="todoDelete"/>
									<input class = "todo-button delete-btn" type="submit" value="Delete" name="todoDelete"/>
								</form>
							</div>
						<?php 
						}
						?>
						<div class="clear"></div>
					</div>
				<hr/>
				<?php } ?>

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