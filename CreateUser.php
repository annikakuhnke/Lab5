<?php
	$mysqli=new mysqli("mysql.eecs.ku.edu", "a831k702", "boov3eex", "a831k702");
	if ($mysqli->connect_errno) 
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$user=$_POST["user"];
	$query="SELECT * FROM Users WHERE user_id='$user'";
	$result=$mysqli->query($query);
	if($user==NULL)
	{
		echo "Please actually enter a username to be stored you jerk.";
	}
	else if(mysqli_num_rows($result)>0)
	{
		echo "The username you provided already exists in this database.";
	}
	else
	{
		$mysqli->query("INSERT INTO Users (user_id) VALUES ('$user')");
		echo "Your username has been successfully added.";
	}
	$mysqli->close();
?>
