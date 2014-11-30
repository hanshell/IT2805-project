<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Movie review</title>

</head>

<body>
<div id="wrapper">
<img id="logo" src="img/logo.png" alt="logo" hspace="10"/>

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

			//print one review
			echo "<br>";
			echo"<p id=\"nick\"> <span>Author:</span> " . $line["nick"]. "</p>";
			echo "<p id=\"rating\"> \t <span>Rating:</span> " .$line["rating"] . "</p>";
			echo "<div name=\"stars\">". $line["rating"] ."</div>\n";
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
		<!-- Form for adding a review-->
		</br>
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

<!-- to replace the review number with images -->
<script>
	onload = function(){
		var div = document.getElementsByName("stars");
		//goes through all elements called stars and aquires the number of stars to print and removes the value from the page.
		for(j = 0; j<div.length; j++){
			var nr = parseInt(div[j].innerHTML);
			div[j].innerHTML="";
			for(i = 0; i< nr ; i++){
				var img = new Image(32, 32);
				img.src="img/stars.png";
				img.setAttribute("alt", "Star");
				div[j].appendChild(img);
				//console.log(i);
			}

		}

	}
</script>
</body>

</html>