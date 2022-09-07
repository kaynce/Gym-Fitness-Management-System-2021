document.getElementById("registration-container").style.right = "-300px";

function registrationMenuSlide(){


	if (document.getElementById("registration-container").style.right == "-300px") {
		document.getElementById("registration-container").style.right = "0";
		document.getElementById("login-container").style.right = "-300px";

	}else{
		document.getElementById("registration-container").style.right = "-300px";
		// document.getElementById("login-container").style.right = "0";
	}
}
