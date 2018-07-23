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
	let img ;
	let ul = $('ul');
	for (var i = 0; i <= IMAGES.length - 1; i++) {
		if (i === 0) {
			img = `<li class="img active"><img src='${API_URL}${SMALL_SIZE}/${SMALL_SIZE}/${IMAGES[i]}' </li>`;
			ul.append(img);
		} else {
			img = `<li class="img"><img src='${API_URL}${SMALL_SIZE}/${SMALL_SIZE}/${IMAGES[i]}' ></li>`;
			ul.append(img);
		}
	}
});


document.addEventListener("keyup", function(e){
	let key = e.key + e.location;
	console.log(key);
	if( key == "ArrowLeft0" ){
		/*slide("0");*/
		slideLeft();
	}
	if(key == "ArrowRight0"){
		/*slide("1");*/
		slideRight();
	}
});

function slide (click) { 
	if(click == 1) {
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
	} else {
		console.log('work');
	}

	function slideRight() {
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

	function slideLeft() {
		let currImage = $('.img.active');
		let currImageIndex = $('.img.active').index();
		console.log('currImageIndex - ' + currImageIndex);
		if(currImageIndex == IMAGES.length - 1) {
			currImageIndex = 7;
		}

		let nextImageIndex = currImageIndex - 1;

		let photo = $('.slider-current img');
		const src = `https://picsum.photos/600/400/${IMAGES[nextImageIndex]}`;
		photo.attr('src', src);

		let nextImage = $('.img').eq(nextImageIndex);
		currImage.removeClass('active');
		nextImage.addClass('active');
	}

}
