<?php
	$mysqli=new mysqli("mysql.eecs.ku.edu", "a831k702", "boov3eex", "a831k702");
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$user=$_POST["user"];
	$post=$_POST["post"];
	$id=uniqid();
	$query="SELECT * FROM Users WHERE user_id='$user'";
	$result=$mysqli->query($query);
	if($post==NULL)
	{
		echo "You must enter something to post.";
	}
	else if(!(mysqli_num_rows($result)>0))
	{
		echo "The user asked for does not exist.";
	}
	else
	{
		$mysqli->query("INSERT INTO Posts (author_id, content, post_id) VALUES ('$user','$post', '$id')");
		echo "Your post has been posted successfully.";
	}
	$mysqli->close();
?>
