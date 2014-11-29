<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Sitemap</title>

</head>

<body>

<h1>Sitemap</h1><br><br>

<h4><a href="index.html">Home page</a></h4>
<h4><a href="toplist.php">Toplist</a></h4><br>
<h5>Movie categories</h4>

<?php

	$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_web', '1337Doge') or die('Could not connect: ' . mysql_error());
	/*echo 'Connected successfully';*/
	mysql_select_db('tomeivin_review') or die('Could not select database');

	$sql_string = "SELECT DISTINCT genre from movie";

	$result = mysql_query($sql_string);

	$movie_array=array();
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
//	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
//	        echo $col_value . "<br>";
	        $movie_array[]=$col_value;
	    }
	}

	$sitemap_string.="\n<ul>";
	foreach ($movie_array as $genre){
		$sitemap_string .= "\n<li>" . $genre;

		$movie_genre_query="SELECT title FROM movie WHERE genre='" . $genre . "'";

		$result_genre = mysql_query($movie_genre_query);

		$sitemap_string .= "\n<ul>";
		while ($line = mysql_fetch_array($result_genre, MYSQL_ASSOC)) {
			foreach ($line as $col_value) {
				$sitemap_string .= "\n<li><a href=\"movie_html.php?title=" . $col_value . "\">" . $col_value . "<a></li>";
	        }
	    }
	    $sitemap_string .= "\n</ul>";

	}
	$sitemap_string .= "\n</ul>";

	echo $sitemap_string;


?>
	</body>
</html>