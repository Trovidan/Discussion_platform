<?php

require('connection.php');

if(isset($_REQUEST['submit'])){
	$update=htmlentities($_REQUEST['update_id']);
	$title=htmlentities($_REQUEST['title']);
	$text=htmlentities($_REQUEST['text']);
	$query="UPDATE posts SET title='$title', text='$text' WHERE id=".$update ;
	if(mysqli_query($conn,$query)){
		header('Location: ./page1.php');
	}
}


if(isset($_REQUEST['delete'])){
	$update=htmlentities($_REQUEST['delete_id']);
	$query="DELETE FROM posts WHERE id=".$update ;
	if(mysqli_query($conn,$query)){
		header('Location: ./page1.php');
	}
}

$id = $_REQUEST['update_id'];

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
		<article class="loginform">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				Title :<br> <input class="input_1" type="name" name="title" value="<?php echo $posts['title'];?>" required="necessary">
				Message :<br> <textarea class="input_1" type="textarea" name="text" required><?php echo $posts['text'];?></textarea>
				<input type="hidden" name="update_id" value="<?php echo $posts['id'];?>">
				<input type="submit" name="submit" class="button">
			</form>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="delete_id" value="<?php echo $posts['id'];?>">
					<input type="submit" name="delete" class="button" value="delete">
			</form>
		</article>
		
	</section>
	<footer>
		<p>Alter Web Tutorials &copy; 2019</p>
	</footer>
</body>
</html>