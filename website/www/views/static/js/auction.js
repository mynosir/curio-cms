$(function() {
  $('.menu .nav').on('click', function(){
    $(this).addClass('cur');
    $(this).siblings().removeClass('cur');
  })
  var aid = Utils.GetQueryString('aid');
  $('.sub-tit[data-aid='+aid+']').addClass('cur');
})
