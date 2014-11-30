<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" media="screen" href=styles.css />

<style>
#nav #home{
	background-color: #ddd;
	color: #333;
}
</style>
<title>Fresh Tomatoes</title>

</head>

<body>
<div id="wrapper">
<img id="logo" src="img/logo.png" alt="logo" hspace="10"/>

<?php
	include "menubar.php";
	echo generate(); 
?>

<div id="container">
	<fieldset>
		<legend>25.11.14</legend>
		<h3>New Star Wars Trailer Released!</h3>
		The much anticipated trailer of the new Star Wars movie directed by J. J. Abrams is now released!
		<iframe width="560" height="315" src="//www.youtube.com/embed/erLk59H86ww" frameborder="0" allowfullscreen></iframe>
	</fieldset>

	<fieldset>
		<legend>11.11.14</legend>
		<h3>‘Hunger Games’ Leads Thanksgiving Pack With $11.1 Million</h3>
		<section id="image"><img src="http://static.squarespace.com/static/5233347fe4b00c95cda9e5d6/t/546f7e83e4b0ae90887928bf/1416593028255/" width="100%" alt="Hunger games"></section>
		<section id="text">
			“The Hunger Games” continued to give Lionsgate reasons to be thankful this holiday season after “Mockingjay – Part 1,”
			the latest installment in the blockbuster franchise, dominated the box office.
			<br>
			<br>
			<a href="http://www.imdb.com/news/ni58057194?ref_=hm_nw_tp1">Read more here.</a>
		</section>
		
	</fieldset>
	
</div>

<div id="author">
        Author: Hans Melby, Luan Tran and Tom Glover
</div>
</div>
</body>

</html>