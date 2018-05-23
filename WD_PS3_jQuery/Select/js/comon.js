$(document).ready(function () {
  const massName = ['Jenny Hess', 'Elliot Fu', 'Stevie Feliciano', 'Christian', 'Matt Damon'];
  let listName;
  let ul =  $('ul');
  for (let i = 0; i < massName.length - 1; i++) {
    listName = `<li><img src='image/images.png'><span>${massName[i]}</span></li>`;
    ul.append(listName);
  }

  $('.btn-slide').click(function () {
    $('#panel').slideToggle('slow');
    $(this).toggleClass('active');
  });

  $('.ul').on('click', 'li', function () {  //  заменить ник
    const name = $(this).text();
    $(this).remove();
    $('#panel').slideToggle('slow');
    $('#selectFreand').text(name);
  });

  $('#buttonAddFreand').click(function () { // добавить  друга
    let addFriend = $('.addFreand').val();
    let errBlock = $('.alertMessege p');
    if (addFriend === '') {
      errBlock.text('You must write something!');
      return;
    }

    errBlock.text('');
    if (addFriend.length > 16) {
      addFriend = addFriend.substring(0, 16);
    }

    const friend = `<li><img src='image/images.png'><span>${addFriend}</span></li>`;
    $('ul').append(friend);
  });

});
