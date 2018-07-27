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

$(function() {
	let image;
	let sliderPreviews = $('.slider-previews');
	for (let i = 0; i <= IMAGES.length - 1; i++) {
		if (i === 0) {
			image = `<li class="img current"><img src='${API_URL}${SMALL_SIZE}/${IMAGES[i]}'></li>`;
			sliderPreviews.append(image);
		} else {
			image = `<li class="img"><img src='${API_URL}${SMALL_SIZE}/${IMAGES[i]}'></li>`;
			sliderPreviews.append(image);
		}
	}
});

$('.slider-current').on('click', 'img', function() {
	prevNextSlide("1");
});

$('.slider-previews').on('click', 'li', function() {
    const nextSlide = $( this ).index();
    prevNextSlide(false, nextSlide);

});

document.addEventListener("keyup", function(e) {
	const key = e.key + e.location;
	if (key === "ArrowLeft0") {
		prevNextSlide("0");
	}
	if (key === "ArrowRight0") {
		prevNextSlide("1");
	}
});

function prevNextSlide(prevOrNext,nextSlide) {
	if (prevOrNext === false) {
		changePicture(nextSlide);
	} else {
		const currImageIndex = $('.current').index();
		const nextImageIndex = checkIndexImage(currImageIndex, prevOrNext);
		changePicture(nextImageIndex);
	}
}

function changePicture(nextImageIndex) {
	const photo = $('.slider-current img');
	const src = `${API_URL}${BIG_SIZE}/${IMAGES[nextImageIndex]}`;
	photo.attr('src', src);
	const nextImage = $('.img').eq(nextImageIndex);
	const currImage = $('.current');
	currImage.removeClass('current');
	nextImage.addClass('current');
}

function checkIndexImage(index, prevOrNext) {
	if (prevOrNext == 0) {
		return index === 0 ? IMAGES.length-1 : index-1;
	}
	return index == IMAGES.length - 1 ?  0 : index + 1;
}

