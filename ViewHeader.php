<header>
	<div class = "wrap">
		<a href = "?page=<?php if(isLoggedIn()) echo("todo"); else echo("home");?>"><div class = "title">Todo Manager</div></a>
		<nav>
			<?php if (!isLoggedIn()) {?>
				<a <?php if($view == "viewHome.php") echo("class = \"selected\""); ?> href = "?page=home">Home</a>
				<a <?php if($view == "viewLogin.php") echo("class = \"selected\""); ?> href = "?page=login">Log in</a>
				<a <?php if($view == "viewSignup.php") echo("class = \"selected\""); ?> href = "?page=signup">Sign up</a>
			<?php } ?>
			
			<?php if (isLoggedIn()) {?>
				<a <?php if($view == "viewTodo.php") echo("class = \"selected\""); ?> href = "?page=todo">Todo</a>
				<a <?php if($view == "viewProfile.php") echo("class = \"selected\""); ?> href = "?page=profile">Profile</a>
			<?php } ?>
			
			
			<a <?php if($view == "viewNews.php") echo("class = \"selected\""); ?> href = "?page=addtodo">News</a>
			<a <?php if($view == "viewContact.php") echo("class = \"selected\""); ?> href = "?page=addtodo">Contact</a>
		</nav>
		<div class="clear"></div>
	</div>
</header>