<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Movie review</title>

</head>

<body>
<div id="wrapper">
<img id="logo" src="logo.png" alt="logo" hspace="10"/>

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
			echo"<p id=\"nick\"> <span>Author:</span> " . $line["nick"]. "</p>";
			echo "<p id=\"rating\"> \t <span>Rating:</span> " .$line["rating"] . "</p>";
			echo "<canvas id=\"canvas\" width=\"160\" height=\"32\">Your browser does not support the canvas telement.</canvas>";
			echo "<p id=\"review\"> <span>Review:</span> <br/>" .$line["review"] . "</p>";
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
			Username: <input type="text" name="username" id="username" required maxlength="30"><br>
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
			<textarea form="review_form" onfocus="clearContents(this);"cols="40" rows="10" name="reviewText" id="reviewText" required maxlength="255">write your review here...</textarea><br>
			<input type="submit" id="movieSubmit" value="Submit review" disabled>

			<input type="hidden" name="title" value="<?php
			echo $movie_title;
			?>">

		</form>

</div>

<div id="author">
        Author: Hans Melby, Luan Tran and Tom Glover
</div>
</div>
<script src="form/form.js"></script>

<script>
	onload = function(){
		console.log("sss");
		
		var img = new Image(32, 32);
		var can = document.getElementById("canvas");
		var ctx = can.getContext("2d");
		img.src="stars.png";
		img.onload = function() {
			ctx.drawImage(img, 0, 0);
		}

		function drawStars() {
			ctx.drawImage(img, 0, 0);
		}
	}
</script>
</body>

</html>