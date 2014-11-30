<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Sitemap</title>

<style>
	#nav #sitemap{
	background-color: #ddd;
	color: #333;
}
</style>
</head>

<body>
<div id="wrapper">
<img id="logo" src="logo.png" alt="logo" hspace="10"/>
<?php
	include "menubar.php";
	echo generate(); //create menubar
?>
<div id="container">

<h1>Sitemap</h1><br><br>

<h4><a href="index.html">Home page</a></h4>
<h4><a href="toplist.php">Toplist</a></h4><br>
<h5>Movie categories</h5>

<?php
	/*
	Create database connection, select database
	*/
	$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_web', '1337Doge') or die('Could not connect: ' . mysql_error());
	/*echo 'Connected successfully';*/
	mysql_select_db('tomeivin_review') or die('Could not select database');

	$sql_string = "SELECT DISTINCT genre from movie";

	$result = mysql_query($sql_string);

	$movie_array=array();
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    foreach ($line as $col_value) {
	        $movie_array[]=$col_value; // put each unique genre in an array for easier manipulation
	    }
	}

	$sitemap_string.="\n<ul>"; //html string to generate site
	foreach ($movie_array as $genre){
		$sitemap_string .= "\n<li>" . $genre;

		$movie_genre_query="SELECT title FROM movie WHERE genre='" . $genre . "'"; //Get all movie titles for each genre

		$result_genre = mysql_query($movie_genre_query);

		$sitemap_string .= "\n<ul>";
		while ($line = mysql_fetch_array($result_genre, MYSQL_ASSOC)) {
			// For-loop to write movies for each category, as well as link to reviews and XML-file
			foreach ($line as $col_value) {
				$sitemap_string .= "\n<li><a href=\"movie_html.php?title=" . $col_value . "\">" . $col_value . "</a></li>";
				$sitemap_string .= "<a href=\"review_html.php?title=" . $col_value . "\"> Reviews</a><br>"; 
				$sitemap_string .= "<a href=\"form/movie_xml.php?title=" . $col_value . "\"> XML-file</a>"; 
	        }
	    }
	    $sitemap_string .= "\n</ul>";

	}
	$sitemap_string .= "\n</ul>";

	echo $sitemap_string; //write html-string to page

	mysql_free_result($result);

			// Closing connection
	mysql_close($link);
?>
</div>
<div id="author">
        Author: Hans Melby, Luan Tran and Tom Glover
</div>

</div>
</body>
</html>