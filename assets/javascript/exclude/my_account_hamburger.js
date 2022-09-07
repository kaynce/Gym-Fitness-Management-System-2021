// document.getElementById("my-account-container").style.right = "-300px";

function myAccountMenuSlide(){
	if (document.getElementById("my-account-container").style.right == "-300px") {
		
		document.getElementById("my-account-container").style.right = "0";

	}else{
		document.getElementById("my-account-container").style.right = "-300px";
	}
}
