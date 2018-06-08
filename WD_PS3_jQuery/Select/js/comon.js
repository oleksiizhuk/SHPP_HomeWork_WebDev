$(document).ready(function () {
	const massName = ['Jenny Hess', 'Elliot Fu', 'Stevie Feliciano', 'Christian', 'Matt Damon'];
	let listName;
	const onClickSelect = $('#selectFreand');
	let ul =  $('ul');
	for (let i = 0; i < massName.length - 1; i++) {
		listName = `<li><img src='image/${i+1}.jpg'><span>${massName[i]}</span></li>`;
		ul.append(listName);
	}

			onClickSelect.on('click', function () { // slide booton
				if( $('#panel').is(':animated') ){
					return;
				} 
				$('#panel').slideToggle('slow');
			});
	 

	$('.ul').on('click', 'li', function () {  //  заменить ник
		const name = $(this).text();
 
		$('#panel').slideToggle('slow');
		$('#selectFreand').text(name);
	});

	$('#buttonAddFreand').click(function () { // добавить  друга
		let addFriend = $('.addFreand').val();
		let errBlock = $('.alertMessege').find('p');
		if (!addFriend.length) {
			errBlock.text('You must write something!');
			return;
		}

		errBlock.text('');
		if (addFriend.length > 16) {
			addFriend = addFriend.substring(0, 16);
		}
		let rand = Math.floor(Math.random() * 6);
		const friend = `<li><img src='image/${rand}.jpg'><span>${addFriend}</span></li>`;
		$('ul').append(friend);
	});

});
