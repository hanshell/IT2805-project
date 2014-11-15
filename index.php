<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" media="screen" href=styles.css />
<title>Movie review</title>

</head>

<body>
<img src="logo.png" width="50%" alt="logo"/>
<?php
	include "menubar.php";
	echo generate(); 
?>


<?php
// Connecting, selecting database
$link = mysql_connect('mysql.stud.ntnu.no', 'tomeivin_webtec', 'Doge69')
    or die('Could not connect: ' . mysql_error());
/*echo 'Connected successfully';*/
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

</html>