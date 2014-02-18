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
						$completed = true;
					else
						$completed = false;
				?>
					<div class="todo-entry <?php if($important) echo("important");?> <?php if($completed!=0) echo("completed");?>">
						<div class="todo-name">
							<a href="?page=editTodo&editIndex=<?php echo($i)?>">
								<?php echo($todoName);?>
							</a>
						</div>
						<div class = "completion">
							<?php echo($completedHours."/".$totalHours)?> hours
						</div>
						<div class="progressbar">
						  <div style=" width : <?php echo($completedHours*100/$totalHours); ?>%"></div>
						</div>
						
						<div class="right">
							<form  method="post">
								<input type="hidden" value="<?php echo($i);?>" name="TodoID"/>
								<input class = "todo-button increment-button <?php if($completed) echo("disabled"); ?>" type="submit" value="Increment" name="IncrementTodo" <?php if($completed) echo("disabled"); ?>/>
								<input class = "todo-button <?php if($completedHours == 0) echo("disabled"); ?>" type="submit" value=" " style = "background-image: url('images/dec.png');"name="DecrimentTodo" <?php if($completedHours == 0) echo("disabled"); ?>/>
								<input class = "red-btn todo-button" type="submit" value=" " style = "background-image: url('images/del.png');" name="DeleteTodo"/>
								
							</form>
						</div>
						
						<div class="clear"></div>
						
						<?php if( isset($_REQUEST['editIndex']) && $i == $_REQUEST['editIndex']) //to edit selected todo
						{ ?>
							<div class = "form">
								<a class="right todo-link" href = "?page=cancel">Cancel</a>
								<form method="post">
									<input type = "hidden" value = "<?php echo($i) ;?>" name="TodoID"/>
									<input class="text-entry ninety-width"  value = "<?php echo($todoName);?>" name="TodoName" type="text"/>
									<input class="text-entry quarter-width left"  value = "<?php echo($totalHours);?>" name="TodoHours" type="number"/><br/>
									<input class="text-entry quarter-width right"  value = "<?php echo($completedHours);?>" name="TodoHoursCompleted" type="number"/><br/>
									<input class="chkbox"  name="TodoImportant" type="checkbox" <?php if ($important) echo("checked");?>/>
									<label> Important</label><br/>
									<input class = "btn half-width left" type="submit" name="UpdateTodo" value="Update todo"/>
									<input class = "btn red-btn half-width right" type="submit" name="DeleteTodo" value="Delete ToDo"/>
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