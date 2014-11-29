<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<script src="form/form.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Movie review</title>

</head>

<body>
<div id="wrapper">
<img src="logo.png" width="50%" alt="logo"/>

<!-- navigation bar -->
<?php
	include "menubar.php";
	echo generate(); 
?>
<div id="container">
<!-- content -->
<?php

$movie_title=$_GET['title'];

// Connecting, selecting database
$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_web', '1337Doge')
    or die('Could not connect: ' . mysql_error());
/*echo 'Connected successfully';*/
mysql_select_db('tomeivin_review') or die('Could not select database');


	$query="SELECT * FROM review WHERE movie_title='" . $movie_title . "'";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
    echo "<h1>Reviews for " . $movie_title . "</h1>";
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

			echo "<br>";
			echo"<p id=\"nick\"> <strong>Author:</strong> " . $line["nick"]. "</p>";
			echo "<p id=\"rating\"> \t Rating: " .$line["rating"] . "</p>";
			echo "<p id=\"review\"> Review: <br/>" .$line["review"] . "</p>";
			echo "<hr>";
        }




// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);

    echo "<br/>\n";

    echo "<a id=\"review\" href=\"movie_html.php?title=". $movie_title . "\">Back</a>";
    echo "<br/>";
    echo "<br/>";
    echo "<hr>";


?>

		<h3>Rating submission</h3>
		<form action="form/form_action.php" method="POST" id="review_form">
			Username: <input type="text" name="username" required><br>
			Movie rating:
			<input type="radio" name="rating" value="1" checked="checked">1
			<input type="radio" name="rating" value="2">2
			<input type="radio" name="rating" value="3">3
			<input type="radio" name="rating" value="4">4
			<input type="radio" name="rating" value="5">5

			<br>
			<br>
			Review:
			<br>
			<textarea form="review_form" onfocus="clearContents(this);"cols="40" rows="10" name="reviewText" required>write your review here...</textarea><br>
			<input type="submit" id="movieSubmit" value="Submit review">

			<input type="hidden" name="title" value="<?php
			echo $movie_title;
			?>">

		</form>

</div>

<div id="author">
        Author: Hans Melby, Luan Tran and Tom Glover
</div>
</div>
</body>

</html>