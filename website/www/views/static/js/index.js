var galleryTop = new Swiper('.gallery-top', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 10,
});
var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    centeredSlides: true,
    slidesPerView: 'auto',
    touchRatio: 0.2,
    slideToClickedSlide: true
});
// galleryTop.params.control = galleryThumbs;
galleryThumbs.params.control = galleryTop;




// $(function() {
//     var page = {
//
//         // 页面初始化方法
//         init: function() {
//             var self = this,
//                 json = {
//                     api: config.apiServer + 'home/get',
//                     type: 'get',
//                     data: {
//                         actionxm: 'search'
//                     }
//                 };
//             var callback = function(res) {
//                 if(res.status == 0) {
//                     console.log(res['data']);
//                     var list = res['data'],
//                         listTpl = '';
//                     for(var i in list) {
//                       listTpl += '<div class="swiper-slide" style="background-image:url('+list[i]['image']+')"></div>'
//                     }
//                     $('.gallery-top').find('.swiper-wrapper').html(listTpl);
//                     $('.gallery-thumbs').find('.swiper-wrapper').html(listTpl);
//                 } else {
//                     alert(res.msg);
//                 }
//             };
//
//             json.callback = callback;
//             Utils.requestData(json);
//         },
//
//
//     };
//
//     page.init();
//
//
//
// });



var addH = 0,
    addh = 0,
    bgh;
var proArr = $('.product1');
for (var i = 0; i < proArr.length; i++) {
    var imgArr = $($('.product1')[i]).find('.item .img img');
    for (var j = 0; j < imgArr.length; j++) {
        if (j%2==0) {
            var a1 = imgArr[j].height;
            var a2 = imgArr[j+1]&&imgArr[j+1].height;
            addh = a1>a2?a1:a2;
            addh?addh -= 290:addh = 0;
            addh > 0?addh: addh = 0;
            addH += addh;
            console.log(addH);
        }
        if(j==3) {
            var n = i+1;
            bgh = $('.products .product1:nth-child('+n+')').height()+addH;
            $('.products .product1:nth-child('+n+')').css('height', bgh);
        }
    }
    addH = 0;
}
