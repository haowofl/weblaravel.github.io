const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const imgPositions = $$('.aspect-ratio-169 img');
const imgContainer = $('.aspect-ratio-169');
const dotItem = $$('.dot');
let index = 0;
let imgNumber = imgPositions.length;
imgPositions.forEach(function(image,index){
	image.style.left = index*100 + "%";
	dotItem[index].addEventListener("click",function(){
		slider(index);
	});
});
function imgSlider() {
	index++;
	if (index >= imgNumber) {
		index = 0;
	}
	slider(index);
}
function slider (index){
	imgContainer.style.left = "-" + index*100 + "%";
	const dotactive = $('.active');
	dotactive.classList.remove("active");
	dotItem[index].classList.add("active");
}
setInterval(imgSlider,6000);
let items = document.querySelectorAll(".brand1")
	items.forEach(function(item,index) {
		item.addEventListener("click", function () {
			item.classList.toggle("expose")
		})
	});
