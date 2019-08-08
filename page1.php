<?php

require('connection.php');

$query='SELECT * FROM posts ORDER BY time DESC';

$result= mysqli_query($conn,$query);

$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
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
	<aside class="sideform">
		<h1>Get Quote</h1>
		<form>
			Name  <br><input type="Name" name="Name" placeholder="Enter your name..." class="input_1"><br>
			Email  <br><input type="email" name="Email" placeholder="Enter email..." class="input_1"><br>
			<button class="button">Get it!</button>
		</form>
	</aside>
	<article class="article">
		<h1>Posts Till Now!!!</h1>
		<ul>
			<?php if(!$posts): ?>
				<li class="li">
					<h3>No Post reconded till now...</h3>
					<p>To add a post click on the upper left corner of the screen saying "ADD POST".</p>

				</li>
				<br><br><br><br><br><br><br><br>	
			<?php endif;?>	
			<?php foreach($posts as $post):?>
			<li class="li">
				<h3><?php echo $post['title'];?></h3>
				<p><?php echo $post['text'];?></p>
				<p><?php echo "Created At :". $post['time'];?></p>
				<a href="page2.php?id=<?php echo $post['id'];?>" class="button">Read More</a><br>
				
			</li>
			<?php endforeach;?>
			<br><br><br><br><br>
		</ul>
	</article>
	</section>
	<footer>
		<p>Alter Web Tutorials &copy; 2019</p>
	</footer>
</body>
</html>