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
</html>
