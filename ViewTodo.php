<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		
		<div class = "wrap">
			
			<?php
				//show Msgs
				$ErrorMsg = getErrorMsg();
				$Msg = getMsg();
				if ($ErrorMsg != ""){
				?>
					<div class = "container-box error message">
						<?php echo($ErrorMsg);?>
					</div>
				<?php 
				} 
				else if ($Msg != ""){
				?>
					<div class = "container-box message">
						<?php echo($Msg);?>
					</div>
				<?php 
				} 
			?>
			
			
			<div class = "container-box">
				<a class="right todo-link" href = "?page=logout">Logout</a>
				<a class="right todo-link" href = "?page=addTodo">Add Todo</a>
				<div class="clear"></div>
				<?php if( isset($_REQUEST['page']) && $_REQUEST['page']=="addTodo") //to add new todo
				{ ?>
					<div class = "form">
						<h1> Add a new To-Do </h1>	
						<form method="post">	
							<input class="text-entry ninety-width"  placeholder="Todo name" name="TodoName" type="text"/>
							<input class="text-entry quarter-width left"  placeholder="Total number of hours " name="TodoHours" type="number"/><br/>
							<input class="text-entry quarter-width right"  placeholder="Hours Completed " name="TodoHoursCompleted" type="number"/><br/>
							<input class="chkbox"  name="TodoImportant" type="checkbox"/><label> Important</label><br/>
							<input class = "btn half-width left" type="submit" name="AddTodo" value="Add Todo"/>
							<input class = "btn red-btn half-width right" type="submit" name="CancelAddTodo" value="Cancel"/>
						</form>
						<div class="clear"></div>
					</div>
				<?php } ?>
				<hr/>
				
				<?php
				//display todos
				$no=10;
				$editTodo = 4;
				for($i=0;$i<$no;$i++)
				{
					$completedHours = rand(0,5);
					$totalHours= rand(0,5) + $completedHours;
					$important = rand(0	,1);
					$todoName = "Name of the Todo #" . ($i+1);
					if ( $totalHours== $completedHours)
						$completed =1;
					else
						$completed = 0;
				?>
					<div class="todo-entry <?php if($important) echo("important");?> <?php if($completed!=0) echo("completed");?>">
						<div class="todo-name">
							<a href="?page=editTodo&editIndex=<?php echo($i)?>">
								<?php echo($todoName);?>
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
						
						<?php if( isset($_REQUEST['editIndex']) && $i == $_REQUEST['editIndex']) //to edit selected todo
						{ ?>
							<div class = "form">
								<a class="right todo-link" href = "?page=cancel">Cancel</a>
								<form method="post">
									<input class="text-entry ninety-width"  value = "<?php echo($todoName);?>" name="TodoName" type="text"/>
									<input class="text-entry quarter-width left"  value = "<?php echo($totalHours);?>" name="TodoHours" type="number"/><br/>
									<input class="text-entry quarter-width right"  value = "<?php echo($completedHours);?>" name="TodoHoursCompleted" type="number"/><br/>
									<input class="chkbox"  name="TodoImportant" type="checkbox" <?php if ($important) echo("checked");?>/>
									<label> Important</label><br/>
									<input class = "btn half-width left" type="submit" name="updateTodo" value="Update todo"/>
									<input class = "btn red-btn half-width right" type="submit" name="deleteTodo" value="Delete ToDo"/>
								</form>
								<div class="clear"></div>
							</div>
						<?php } ?>
					</div>
				<hr/>
				<?php } ?>

			</div>
		</div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>