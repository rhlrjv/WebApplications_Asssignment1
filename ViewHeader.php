<header>
	<div class = "wrap">
		<div class = "title">Todo Manager</div>
		<nav>
			<a <?php if($view == "viewLogin.php") echo("class = \"selected\""); ?> href = "?page=login">Log in</a>
			<a <?php if($view == "viewSignup.php") echo("class = \"selected\""); ?> href = "?page=signup">Sign up</a>
			<a <?php if($view == "viewTodo.php") echo("class = \"selected\""); ?> href = "?page=todo">Todo</a>
			<a <?php if($view == "viewAddTodo.php") echo("class = \"selected\""); ?> href = "?page=addtodo">Add Todo</a>
		</nav>
	</div>
</header>