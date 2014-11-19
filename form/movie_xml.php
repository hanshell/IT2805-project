<?php
	// Connecting, selecting database
	$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_web', '1337Doge')
	    or die('Could not connect: ' . mysql_error());
	/*echo 'Connected successfully';*/
	mysql_select_db('tomeivin_review') 
		or die('Could not select database');

	// Performing SQL query


	$movie_title=$_GET['title'];

	//$movie_title="The Room";


	$query="SELECT * FROM movie WHERE title='" . $movie_title . "'"; 
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());


	// Printing results in HTML
	$movie_array=array();
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
//	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
//	        echo $col_value . "<br>";
	        $movie_array[]=$col_value;
	    }
	}
	foreach ($movie_array as $column) {
//		echo $column . "<br>";
	}

	$xml=new SimpleXMLElement("<xml></xml>");

	$movie=$xml->addChild('movie');
	
	$title=$movie->addChild('title', $movie_array[0]);
	$description=$movie->addChild('description', $movie_array[1]);
	$director=$movie->addChild('director', $movie_array[2]);
	$genre=$movie->addChild('genre', $movie_array[3]);
/*
	$title->addChild($movie_array[0]);
	$description->addChild($movie_array[1]);
	$director->addChild($movie_array[2]);
	$genre->addChild($movie_array[3]);
*/
	Header('Content-type: text/xml');
	echo $xml->asXML();

	// Free resultset
	mysql_free_result($result);

	// Closing connection
	mysql_close($link);
?>