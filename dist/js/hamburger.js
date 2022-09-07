// document.getElementById("item-container").style.right = "-300px";

function slideNav(){
	document.getElementById("item-container").style.right = "-300px";

	if (document.getElementById("item-container").style.right == "-300px") {
		document.getElementById("item-container").style.right = "0";
	}else{
		document.getElementById("item-container").style.right = "-300px";
	}
}

 
