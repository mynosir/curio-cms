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



// console.log($('.product1 .item .img img'));
var addH = 0,
    addh = 0,
    bgh;
var img = new Image();
var imgArr = $('.product1 .item .img img');
for (var i = 0; i < imgArr.length; i++) {
    // console.log(imgArr[i].height);
    // console.log(i%2);
    if (i%2==1) {
        addh = imgArr[i].height>imgArr[i-1].height?imgArr[i].height:imgArr[i-1].height;
        addh -= 290;
        addh > 0?addh: addh = 0;
        // console.log(addh);
        addH += addh;
    }
    if(i==3) {
        // console.log($('.products .product1:nth-child(1)').height());
        bgh = $('.products .product1:nth-child(1)').height()+addH;
        $('.products .product1:nth-child(1)').css('height', bgh);
    }
}
