<?php

require('connection.php');

$id = $_REQUEST['id'];

$query='SELECT * FROM posts WHERE id = '.$id ;

$result= mysqli_query($conn,$query);

$posts = mysqli_fetch_assoc($result);

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
	<article class="article">
		<h1> <?php echo $posts['title'];?> </h1><br>
		<p><?php echo $posts['text'];?></p><br><br>
		<p><?php echo "Created At :". $posts['time'];?></p>
		<a href="page4.php?update_id=<?php echo $posts['id'];?>" class="button">Edit</a>
		<br><br><br><br><br><br>
	</article>
	</section>
	<footer>
		<p>Alter Web Tutorials &copy; 2019</p>
	</footer>
</body>
</html>