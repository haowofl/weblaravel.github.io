
	const detail = document.getElementById("detail");
	const preserve = document.getElementById("preserve");
	const bigImg = document.querySelector(".demowrap img");
	const smallImgs = document.querySelectorAll(".elastislide-wrapper img");
	const buttonShow = document.querySelector(".productDetail_buttonShow_btn")
	smallImgs.forEach(function(smallImg,index){
		smallImg.addEventListener("click",function(){
			bigImg.src = smallImg.src
		})
	})


	if (detail) {
		detail.addEventListener("click",function () {
			document.querySelector(".tabpanel-detail").style.display = "block";
			document.querySelector(".tabpanel-preserve").style.display = "none";

		})
	}
	if (preserve) {
		preserve.addEventListener("click",function () {
			document.querySelector(".tabpanel-detail").style.display = "none";
			document.querySelector(".tabpanel-preserve").style.display = "block";

		})
	}
	if (buttonShow) {
		buttonShow.addEventListener("click", function() {
			document.querySelector(".productDetail-hidden").classList.toggle("hidden");
		})
	}
