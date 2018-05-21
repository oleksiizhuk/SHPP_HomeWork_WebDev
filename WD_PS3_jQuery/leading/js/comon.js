$(document).ready(function () {
  $('.main').on('click', 'a', function (event) { //  по клике на сылку смешаеться
    event.preventDefault();
    const id = $(this).attr('href'),
     top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 1000);
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('#go-up').fadeIn();
    } else {
      $('#go-up').fadeOut();
    }
  });

  $('#go-up').click(function () {
      $('body,html').animate({
        scrollTop: 0,
      }, 800);
      return false;
    });

});
