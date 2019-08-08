<?php
require('connection.php');

if(isset($_REQUEST['submit'])){

	$title=htmlentities($_REQUEST['title']);
	$text=htmlentities($_REQUEST['text']);
	$query="INSERT INTO posts(title,text) VALUES('$title','$text')";
	mysqli_query($conn,$query);
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="./page1.css">
	<title>
		Alter Web Tutorials
	</title>
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<h1><span>Alter</span> Web Tutorials</h1>
			</div>
			<nav>
				<ul>
					<li><a href="page1.php">Posts</a></li>
					<li><a href="page3.php">Add Post</a></li>
					<li><a href="page5.php">Login</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section id="newsletter">
		<div class="container">
			<h2>Subscribe to our newsletter</h2>
			<form>
				<input type="email" name="email" placeholder="Enter your email...">
				<button type="submit" class="button_1">Subscribe</button>
			</form>
		</div>
	</section>
	<section class="container">
		<article class="loginform">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				Title :<br> <input class="input_1" type="name" name="title" required="necessary">
				Message :<br> <textarea name="text" class="input_1" required></textarea>
				<input type="submit" name="submit" class="button">
			</form>
		</article>
	</section>
	<footer>
		<p>Alter Web Tutorials &copy; 2019</p>
	</footer>
</body>
</html>