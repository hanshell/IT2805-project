<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<title>Movie review</title>
</head>
<body>

<?php
	// Connecting, selecting database
	$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_webtec', 'Doge69')
	    or die('Could not connect: ' . mysql_error());
	/*echo 'Connected successfully';*/
	mysql_select_db('test') or die('Could not select database');

	// Performing SQL query


	$movie_title=$_GET['title'];

	echo $movie_title;

	$query="SELECT * FROM movie WHERE title='" . $movie_title . "'"; 
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


	echo $result;
	// Free resultset
	mysql_free_result($result);

	// Closing connection
	mysql_close($link);
?>



</body>

</html>