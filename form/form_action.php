<?php 
	$servername = "mysql.stud.ntnu.no";
	$username = "tomeivin_web";
	$password = "1337Doge";
	$dbname = "tomeivin_review";

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



	$sql="INSERT INTO tomeivin_review.review (movie_title, rating, review, nick) 
		VALUES ('inception', '" . $rating . "', '" . $review ."', '" . $nick . "')"; 
	if($connection->query($sql)===TRUE){
		echo "RECORD CREATED SUCCESSFULLY";
	}
	else{
		echo "ERROR" . $sql . $connection->error;
	}
	header("Location: index.php");
?>