<!DOCTYPE html>
<html>
	<?php require 'ViewHead.php'; ?>

	<body>
	
		<?php require 'ViewHeader.php'; ?>
		<div class = "banner home-banner">
			<div class="wrap center banner-text">	
				<h2>Lets get some work done!</h2>
				<p>Welcome to the ToDo Manager- the simplest and sleekest productivity app.</p>
				<a class="btn" href = "?page=login">Login</a><br/>
				or <a href = "?page=signup">Sign Up</a>
			</div>
			<div style="clear:both"></div>
		</div>
		<div class = "wrap">
			<div class = "container-box third left center homepage">
				<a href="http://www.cs.toronto.edu/~arnold/cp3101b/assignments/01/">CP3101B Assignment1</a>
				<p>
					We have already gone over the GuessGame application, including seeing an sample MVC web architecture for it. It's time for a change. For this assignment, we create a ToDo application.
				</p>
			</div>
			<div class = "container-box third center homepage">
				<a> Special Features</a>
				<p>
				<ul style= "text-align:left;">
					<li> Task Summary
					<li>Cancel or delte a task
					<li>A minimalist and clean display.
					<li>undo accidental increments/completes
					<li>Dynamic creation of add to do and edit to do areas on the to do page.
					<li>Funny and motivating message on completing all tasks :P
				</ul>
				</p>
			</div>
			<div class = "container-box third right center homepage">
				<a href = "?page=contact"> Contact us</a>
				<ul style= "text-align:left;">
					<li>email : xxxxxx@xx.com
					<li>phone : xx-xxxxxxx
					<li>fax	  : xxxxxxxxxx
				</ul>
			</div>
			
		</div>
		<div style="clear:both"></div>
		<?php require 'ViewFooter.php'; ?>
	</body>
</html>