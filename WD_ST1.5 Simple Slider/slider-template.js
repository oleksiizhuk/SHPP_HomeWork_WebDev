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
	document.addEventListener("keyup", function(e){
		var key = e.key + e.location;
		if(key == "Shift1")
			alert('Left shift key');
		if(key == "Shift2")
		alert('Right shift key');
	});
});

