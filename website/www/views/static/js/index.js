$(function() {
    var page = {

        // 页面初始化方法
        init: function() {
            var self = this,
                json = {
                    api: config.apiServer + 'home/get',
                    type: 'get',
                    data: {
                        actionxm: 'search'
                    }
                };
            var callback = function(res) {
                if(res.status == 0) {
                    console.log(res['data']);
                    var list = res['data'],
                        listTpl = '';
                    for(var i in list) {
                      listTpl += '<div class="swiper-slide" style="background-image:url('+list[i]['image']+')"></div>'
                    }
                    $('.gallery-top').find('.swiper-wrapper').html(listTpl);
                    $('.gallery-thumbs').find('.swiper-wrapper').html(listTpl);
                } else {
                    alert(res.msg);
                }
            };

            json.callback = callback;
            Utils.requestData(json);
        },


    };

    page.init();



});
