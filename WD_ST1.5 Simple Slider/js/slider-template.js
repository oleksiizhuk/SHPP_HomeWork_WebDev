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
$('.slider-current').click(function(){
	nextSlide();
});

document.addEventListener("keyup", function(e){
	let key = e.key + e.location;
	console.log(key);
	if( key == "ArrowLeft0" ){
		/*prevSlide();*/
		prevNextSlide("0");
	}
	if(key == "ArrowRight0"){
		/*nextSlide();*/
		prevNextSlide("1");
	}
});

function nextSlide() {
	let currImage = $('.img.active');
	let currImageIndex = $('.img.active').index();
	console.log('currImageIndex - ' + currImageIndex);
	if(currImageIndex == IMAGES.length - 1){
		currImageIndex = -1;
	}
	let nextImageIndex = currImageIndex + 1;
	let photo = $('.slider-current img');
	const src = `https://picsum.photos/600/400/${IMAGES[nextImageIndex]}`;
	photo.attr('src', src);
	let nextImage = $('.img').eq(nextImageIndex);
	currImage.removeClass('active');
	nextImage.addClass('active');
}

function prevSlide() {
	let currImage = $('.img.active');
	let currImageIndex = $('.img.active').index();
	console.log('currImageIndex - ' + currImageIndex);
	if(currImageIndex == 0) {
		currImageIndex = IMAGES.length;
	}
	let nextImageIndex = currImageIndex - 1;
	let photo = $('.slider-current img');
	const src = `https://picsum.photos/600/400/${IMAGES[nextImageIndex]}`;
	photo.attr('src', src);
	let nextImage = $('.img').eq(nextImageIndex);
	currImage.removeClass('active');
	nextImage.addClass('active');
}
function prevNextSlide (prevOrNext) {
	console.log('prevOrNext - ' + prevOrNext);
	let currImage = $('.img.active');
	let currImageIndex = $('.img.active').index();
	console.log('currImageIndex - ' + currImageIndex);

	let nextImageIndex = checkIndeximage(currImageIndex, prevOrNext);
	let photo = $('.slider-current img');
	const src = `https://picsum.photos/600/400/${IMAGES[nextImageIndex]}`;
	photo.attr('src', src);
	let nextImage = $('.img').eq(nextImageIndex);
	currImage.removeClass('active');
	nextImage.addClass('active');
}

function checkIndeximage(index, prevOrNext) {
	console.log('index - ' + index +' prevOrNext - ' + prevOrNext);

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
