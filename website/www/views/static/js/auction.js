$('.menu .nav').on('click', function(){
  $(this).addClass('cur');
  $(this).siblings().removeClass('cur');
})
