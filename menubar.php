<?php

function generate() {
	$string = "<ul id=\"nav\">
			<li><a href=\"index.php\">Home</a></li>

			";






			// Connecting, selecting database
			$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_webtec', 'Doge69')
			or die('Could not connect: ' . mysql_error());
			/*echo 'Connected successfully';*/
			mysql_select_db('test') or die('Could not select database');

			// Performing SQL query
			$query = 'SELECT DISTINCT genre FROM movie';

			$result = mysql_query($query) or die('Query failed: ' . mysql_error());

			// Printing results in HTML
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$string .= "\t<li>\n";
				foreach ($line as $col_value) {
					$string .= "\t\t<a>$col_value</a>\n";

					$string .="\t<ul>\n";
					$query2 = "SELECT title FROM movie where genre ='" . $col_value . "';";
					//echo $query2;

					$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
					while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {

						// write php file to send to here
						$string .= "\t<li><a href=\"movie_xml.php?title=";
						foreach ($line2 as $col_value2) {
							$string .= $col_value2 . "\">";
							$string .= $col_value2;
						}
						$string .= "\t</li></a>\n";
					}
					$string .="\t</ul>\n";
				}


				$string .="\t</li>\n";
			}

			// Free resultset
			mysql_free_result($result);

			// Closing connection
			mysql_close($link);










			$string .= "
					<li><a href=\"sitemap.php\">Sitemap</a></li>

					</ul>";
					return $string;

}
	
?>