<?php


function insertReview($title, $rating, $review, $nick){
$servername = "mysql.stud.ntnu.no";
$username = "tomeivin_webtec";
$password = "Doge69";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO review (movie_title, rating, review, nick)
VALUES ('";

$sql .= $title . "'," . $rating . ",'" . $review . "','" . $nick . "')";



echo $sql . " <br> ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}
/*
insertReview("The Room", 4, "not enough explosions", "michaelBay");
*/


?>





