$(function() {
    var id = Utils.GetQueryString('id');
    if(id){
      $('.sub-tit[data-id='+id+']').addClass('cur');
    }else{
      $('.nav').find('.sub-tit:first-child').addClass('cur');
    }
})
