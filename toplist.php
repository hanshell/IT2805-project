<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
	<title>Top list</title>

	<style>
	#nav #topList{
	background-color: #ddd;
	color: #333;
}
</style>
</head>

<body>
<div id="wrapper">
	<img id="logo" src="img/logo.png" alt="logo" hspace="10"/>
	<?php
		include "menubar.php";
		echo generate(); 
	?>

	<div id="container">
		<?php
		// Connecting, selecting database
		$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_web', '1337Doge')
		    or die('Could not connect: ' . mysql_error());
		/*echo 'Connected successfully';*/
		mysql_select_db('tomeivin_review') or die('Could not select database');

		// Performing SQL query
		$query = 'SELECT movie_title, avg(rating) FROM review GROUP BY movie_title ORDER BY avg(rating) DESC';
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

		// Printing results in HTML
		echo "<table id=\"toplistTable\">\n";
		$counter = 1;

		echo "<tr id=\"toplistHeader\">\n";
		echo "<td>Rank</td><td>Title</td><td>Rating</td>\n";
		echo "</tr>\n";

		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    echo "\t<tr>\n";
		    echo "<td>" . $counter . "</td>";
		    foreach ($line as $col_value) {
		      if(!($col_value == $line["avg(rating)"])){
   				echo "\t\t<td>$col_value";
                echo "</td>\n";
		        }
		        else{
            		 echo "\t\t<td>";
            		 echo substr($col_value, 0, 3);
                     echo "/5.0";
                     echo "</td>\n";
            	}
		    }
		    $counter++;
		    echo "\t</tr>\n";
		}
		echo "</table>\n";

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