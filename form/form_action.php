<?php 
	$servername = "mysql.stud.ntnu.no";
	$username = "tomeivin_webtec";
	$password = "Doge69";
	$dbname = "test";

	$connection = new mysqli($servername, $username, $password, $test);
	if($connection->connect_error){
		die("Connection failed" . mysqli_connect_error());
	}

	$nick=$_POST["username"];
	$review=$_POST["reviewText"];
	$rating=$_POST["rating"];

	echo $nick;
	echo $review;
	echo $rating;



	$sql="INSERT INTO test.review (movie_title, rating, review, nick) 
		VALUES ('inception', '" . $rating . "', '" . $review ."', '" . $nick . "')"; 
	if($connection->query($sql)===TRUE){
		echo "RECORD CREATED SUCCESSFULLY";
	}
	else{
		echo "ERROR" . $sql . $connection->error;
	}
	header("Location: index.php");
?>