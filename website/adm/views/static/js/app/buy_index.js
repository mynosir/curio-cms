$(function() {
    var page = {

        // 页面初始化方法
        init: function() {
            var self = this,
                json = {
                    api: config.apiServer + 'buy/get',
                    type: 'get',
                    data: {
                        actionxm: 'search'
                    }
                };
            var callback = function(res) {
                if(res.status == 0) {
                    var list = res['data'],
                        listTpl = '';
                    listTpl += '<tr>';
                    listTpl += '<td>Content(EN)</td>';
                    listTpl += '<td>' + list[0]['content_en'] + '</td>';
                    listTpl += '</tr>';
                    listTpl += '<tr>';
                    listTpl += '<td>Content(TC)</td>';
                    listTpl += '<td>' + list[0]['content_tc'] + '</td>';
                    listTpl += '</tr>';
                    $('.js_table').html(listTpl);
                } else {
                    alert(res.msg);
                }
            };
            json.callback = callback;
            Utils.requestData(json);
        },

        deleteConfirmTip: function(id) {
            $('#confirmModal').find('.js_sure_delete').attr('data-id', id);
            $('#confirmModal').modal('show');
        },

        deletItem: function(id) {
            var json = {
                api: config.apiServer + 'category/post',
                type: 'post',
                data: {
                    actionxm: 'delete',
                    id: id
                }
            };
            var callback = function(res) {
                $('#confirmModal').modal('hide');
                alert(res.msg);
                window.location.reload();
            };
            json.callback = callback;
            Utils.requestData(json);
        },

        getDetail: function(id) {
            var json = {
                api: config.apiServer + 'category/get',
                type: 'get',
                data: {
                    actionxm: 'detail',
                    id: !id ? 1 : id
                }
            };
            var callback = function(res) {
                if(res.status==0) {
                    $('.js_update_id').val(res['data'].id);
                    $('.js_update_status').val(res['data'].status);
                    $('.js_update_nameen').val(res['data'].name_en);
                    $('.js_update_nametc').val(res['data'].name_tc);
                } else {
                    alert('系统异常！');
                }
            };
            json.callback = callback;
            Utils.requestData(json);
        }

    };


    $('body').delegate('.js_delete', 'click', function(e) {
        var id = $(e.currentTarget).data('id');
        page.deleteConfirmTip(id);
    });

    $('body').delegate('.js_sure_delete', 'click', function(e) {
        var id = $(e.currentTarget).data('id');
        page.deletItem(id);
    });

    $('body').delegate('.js_add_saveBtn', 'click', function() {
        var status = $('.js_add_status').val(),
            nameen = $('.js_add_nameen').val(),
            nametc = $('.js_add_nametc').val();
        var json = {
            api: config.apiServer + 'category/post',
            type: 'post',
            data: {
                actionxm: 'add',
                params: {
                    status: status,
                    name_en: nameen,
                    name_tc: nametc
                }
            }
        };
        var callback = function(res) {
            alert(res.msg);
            if(res.status==0) {
                $('#addModal').modal('hide');
                window.location.reload();
            }
        };
        json.callback = callback;
        Utils.requestData(json);
    });

    $('body').delegate('.js_saveBtn', 'click', function() {
        var id = $('.js_update_id').val(),
            status = $('.js_update_status').val(),
            nameen = $('.js_update_nameen').val(),
            nametc = $('.js_update_nametc').val();
        var json = {
            api: config.apiServer + 'category/post',
            type: 'post',
            data: {
                actionxm: 'update',
                id: id,
                params: {
                  status: status,
                  name_en: nameen,
                  name_tc: nametc
                }
            }
        };
        var callback = function(res) {
            alert(res.msg);
            if(res.status==0) {
                $('#editModal').modal('hide');
                window.location.reload();
            }
        };
        json.callback = callback;
        Utils.requestData(json);
    });

    $('body').delegate('.js_edit', 'click', function(e) {
        var id = $(e.currentTarget).data('id');
        page.getDetail(id);
    });

    page.init();
});
