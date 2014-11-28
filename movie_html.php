<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Movie review</title>
<style>
#linear{
width:100%;
}
#previous, #next, #review_button {
	float: left;
	background-color: #333;
    color: white;
    font-family: Tahoma, Geneva, sans-serif;
    list-style: none;
    text-decoration: none;
    padding: 5px;
    display: inline;
    min-width:200px;
    border-right: 1px solid #fff;

}
#next {
margin-left: auto;
/*float: right;/**/
text-align: right;
border-right: 0px;
}
#linear a:hover{
	background-color: #ddd;
	color: #333;
}
#review_button {
	text-align: center;
}



</style>
</head>

<body>
<div id="wrapper">
<img src="logo.png" width="50%" alt="logo"/>

<!-- navigation bar -->
<?php
	include "menubar.php";
	echo generate(); 
?>

<!-- content -->
<div id="container">
<?php

$movie_title=$_GET['title'];

// Connecting, selecting database
$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_web', '1337Doge')
    or die('Could not connect: ' . mysql_error());
/*echo 'Connected successfully';*/
mysql_select_db('tomeivin_review') or die('Could not select database');

	$query="SELECT genre FROM movie WHERE title='" . $movie_title . "'";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());


	// aquiering the genre.
	$movie_array=array();
	if ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    foreach ($line as $col_value) {
	       $genre =  $col_value;

	    }
	}

	$query="SELECT * FROM movie WHERE genre='" . $genre . "'";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
    echo "<br/>";
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

		if($line["title"] == $movie_title){
		   echo"<h1>" . $line["title"]. "</h1>";
		   echo "<h3> Genre: " .$line["genre"] . "</h3>";
		   echo "<h3> Director: " .$line["director"] . "</h3>";
		   echo "Description: <br/>" .$line["description"] . "<br/>" ;
        break;
        }
        $previous = $line["title"];
        }

        echo "<div id=\"linear\">";

        if($previous !== null){
        echo "\n<a id=\"previous\" href=\"movie_html.php?title=". $previous . "\"><--Previous</a>\n" ;
        }

            echo "<a id=\"review_button\" href=\"review_html.php?title=". $movie_title . "\">Reviews</a>";

        if ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

        echo "<a id=\"next\" href=\"movie_html.php?title=". $line["title"] . "\">Next--></a>" ;
 		}
		echo "</div>";



// Free resultset
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