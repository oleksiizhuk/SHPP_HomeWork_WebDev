const API_URL = 'https://picsum.photos/';
const BIG_SIZE = '600/400';
const SMALL_SIZE = '60';

const IMAGES = [
  '?image=1080', 
  '?image=1079', 
  '?image=1069', 
  '?image=1063', 
  '?image=1050',
  '?image=1039'
];

$(document).ready(function () {
	let img;
	let ul = $('ul');
	for (var i = 0; i <= IMAGES.length - 1; i++) {
		if (i === 0) {
			img = `<li class="img active"><img src='${API_URL}${SMALL_SIZE}/${IMAGES[i]}'></li>`;
			ul.append(img);
		} else {
			img = `<li class="img"><img src='${API_URL}${SMALL_SIZE}/${IMAGES[i]}'></li>`;
			ul.append(img);
		}
	}
});

$('.slider-current').on('click', 'img', function(){
	prevNextSlide("1");
});

document.addEventListener("keyup", function(e){
	let key = e.key + e.location;
	if( key == "ArrowLeft0" ){
		prevNextSlide("0");
	}
	if(key == "ArrowRight0"){
		prevNextSlide("1");
	}
});

function prevNextSlide (prevOrNext) {
	let currImage = $('.img.active');
	let currImageIndex = $('.img.active').index();

	let nextImageIndex = checkIndeximage(currImageIndex, prevOrNext);
	let photo = $('.slider-current img');
	const src = `https://picsum.photos/600/400/${IMAGES[nextImageIndex]}`;
	photo.attr('src', src);
	let nextImage = $('.img').eq(nextImageIndex);
	currImage.removeClass('active');
	nextImage.addClass('active');
}

function checkIndeximage(index, prevOrNext) {
	if (prevOrNext == 0) {
		if(index == 0) {
			return IMAGES.length - 1;
		}
		return index - 1;
	} else {
		if(index == IMAGES.length - 1){
			return 0;
		}
		return index + 1;
	}

}
