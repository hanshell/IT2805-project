<<<<<<< HEAD
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="form.js"></script>
		<title>Testform</title>
	</head>
	<body>
		<h3>Rating submission</h3>
		<form action="form_action.php" method="POST" id="review_form">
			Username: <input type="text" name="username"><br>
			Movie rating: 
			<input type="radio" name="rating" value="1">1
			<input type="radio" name="rating" value="2">2
			<input type="radio" name="rating" value="3">3
			<input type="radio" name="rating" value="4">4
			<input type="radio" name="rating" value="5">5

			<br>
			<br>
			Review:
			<br>
			<textarea form="review_form" onfocus="clearContents(this);"cols="40" rows="10" name="reviewText">write your review here...</textarea><br>
			<input type="submit" id="movieSubmit" value="Submit review">

		</form>
		<br>
		 <br>
	</body>
=======
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<title>Movie review</title>

</head>

<body>
<h1>Project site</h1>



<?php
// Connecting, selecting database
$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_webtec', 'Doge69')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('test') or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM review';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>

</body>

>>>>>>> ee79655d0533e87aec9f6f1582c18e541adc8f5b
</html>