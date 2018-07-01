$(document).ready(function () {
	const massName = ['Jenny Hess', 'Elliot Fu', 'Stevie Feliciano', 'Christian', 'Matt Damon'];
	let listName;
	const panel = $('#panel');
	const selectedFriend = $('#selectedFriend');
	const ul =  $('ul');
	for (let i = 0; i < massName.length - 1; i++) {
		listName = `<li><img src='image/${i+1}.jpg'><span>${massName[i]}</span></li>`;
		ul.append(listName);
	}

	selectedFriend.on('click', function () { // slide booton
		if( panel.is(':animated') ){
			return;
		} 
		panel.slideToggle('slow');
	});
  /*если клик вне блока, сровачивает его, если он развернут*/
	$(document).on('click', function(e) { 
		if (!$(e.target).closest(".list").length) {
			panel.hide('slow');
		}
		e.stopPropagation();
	});
	
	 

	ul.on('click', 'li', function () {  //  заменить ник
		const name = $(this).text();
 
		panel.slideToggle('slow');
		selectedFriend.text(name);
	});

	$('#buttonAddFreand').click(function () { // добавить  друга
		let addFriend = $('.addFreand').val();
		const errBlock = $('.alertMessege').find('p');
		if (!addFriend.length) {
			errBlock.text('You must write something!');
			return;
		}

		errBlock.text('');
		if (addFriend.length > 16) {
			addFriend = addFriend.substring(0, 16);
		}
		const rand = Math.floor(Math.random() * 6);
		const friend = `<li><img src='image/${rand}.jpg'><span>${addFriend}</span></li>`;
		ul.append(friend);
	});

});
