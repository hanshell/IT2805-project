<?php 
	$servername = "mysql.stud.ntnu.no";
	$username = "tomeivin_webtec";
	$password = "Doge69";
	$dbname = "test";

	$connection = new mysqli($servername, $username, $password, $test);
	if($connection->connect_error){
		die("Connection failed" . mysqli_connect_error());
	}

	$movie_title=$_GET['title'];

	echo $movie_title;

	$sql="SELECT * FROM test.movie WHERE title='" . $movie_title . "'"; 
	if($connection->query($sql)===TRUE){
		echo "RECORD CREATED SUCCESSFULLY";
	}
	else{
		echo "ERROR" . $sql . $connection->error;
	}


	
	header("Location: index.php");

	mysql_close($connection);


?>