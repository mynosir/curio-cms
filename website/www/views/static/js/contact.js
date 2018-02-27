$(function() {
    $('body').delegate('#submit', 'click', function(e) {
        var name = $('#name').val(),
            email = $('#email').val(),
            phone = $('#phone').val();
        var json = {
            api: config.apiServer + 'contact/post',
            type: 'post',
            data: {
                actionxm: 'cataRequest',
                // page: !p ? 1 : p,
                // size: 20,
                // keyword: $('#title').val()
                params: {
                    name: name,
                    email: email,
                    phone: phone
                }
            }
        };
        var callback = function(res) {
              // console.log(res.msg);
        };
        var errorCall = function() {
            // $('.alert-warning').text('系统繁忙，请稍后再试').show();
            // setTimeout("$('.alert').hide()", 3000);
        };
        json.callback = callback;
        json.errorCall = errorCall;
        Utils.requestData(json);
    });


});
