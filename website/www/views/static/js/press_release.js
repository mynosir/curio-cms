$(function() {
    var id = Utils.GetQueryString('id');
    if(id){
      console.log(id);
      $('.sub-tit[data-id='+id+']').addClass('cur');
    }else{
      $('.press_release').find('.sub-tit:first-child').addClass('cur');
    }
})
