window.onscroll = function() {scrollFunction()};

var l = document.getElementById("logo");

function scrollFunction() {
	if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
		document.querySelector('.navbarku').style.background = "#4d606e";
		document.querySelector('.navbarku').style.fontSize = "20px";
		document.querySelector('.navbarku').style.padding = "25px";
		document.querySelector('.btnku').style.fontSize = "18px";
		l.classList.remove("logo");
	}
	else {
		document.querySelector('.navbarku').style.background = "none";
		document.querySelector('.navbarku').style.fontSize = "24px";
		document.querySelector('.navbarku').style.padding = "30px";
		document.querySelector('.btnku').style.fontSize = "20px";
		l.classList.add("logo");
	}
}

function ConfirmPass() {
	var a = document.getElementById("pass");
	var b = document.getElementById("confirm");
}

