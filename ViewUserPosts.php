<?php
	$mysqli=new mysqli("mysql.eecs.ku.edu", "a831k702", "boov3eex", "a831k702");
	if ($mysqli->connect_errno) 
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	echo "<table border=\"1\" style='border-collapse: collapse'>";
	$select=$_POST["id"];
	$query="SELECT content FROM Posts WHERE author_id='$select'";
	$result=$mysqli->query($query);
	if($result->num_rows>0)
	{
		echo "<th>Posts</th>";
		while($row=$result->fetch_assoc())
		{
			echo "<tr> \n";
			echo "<td>". $row["content"]. "</td>";
			echo "</tr>";
		}
	}
	else
	{
		echo "This user has made no posts yet.";
	}
	$mysqli->close();
?>
