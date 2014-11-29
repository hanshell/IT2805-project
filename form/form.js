var clear=true;
function clearContents(element){
	if(clear){
		element.value='';
		clear=false;
	}
}
username = document.getElementById('username');
review = document.getElementById('reviewText');
username.addEventListener("change", validate);
review.addEventListener("change", validate);

function validate(){
	if(!validateUsername()){
		document.getElementById('movieSubmit').disabled = true;
		return;
	}
	if(!validReviewText()){
		document.getElementById('movieSubmit').disabled = true;
		return;
	}

	document.getElementById('movieSubmit').disabled = false;
}

function validateUsername(){
	if(username.value.length<3){
		return false;
	}
	username.value = username.value.match(/[A-Za-z-_0-9æøåÆØÅ]/g).join("");

	return true;
}

function validReviewText(){
	if(reviewText.value.length<3){
		return false;
	}

	reviewText.value = reviewText.value.match(/[A-Za-z-_0-9æøåÆØÅ?,.!@)( ]/g).join("");

	return true;

}