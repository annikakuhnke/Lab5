<?php
	$mysqli=new mysqli("mysql.eecs.ku.edu", "a831k702", "boov3eex", "a831k702");
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	echo "<table border=\"1\" style='border-collapse: collapse'>";
	$query="SELECT user_id FROM Users";
	$result=$mysqli->query($query);
	if($result->num_rows>0)
	{
		echo "<th>User IDs</th>";
		while($row=$result->fetch_assoc())
		{
			echo "<tr> \n";
			echo "<td>". $row["user_id"]. "</td>";
			echo "</tr>";
		}
	}
	else
	{
		echo "There are no users in this mySQL database.";
	}
	$mysqli->close();
?>
