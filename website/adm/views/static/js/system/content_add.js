$(function() {
    var page = {
        init: function() {

            // 渲染编辑菜单的选项
            this.renderMenuTree();

            $('#content_en').summernote({
                minHeight: 200,
                placeholder: 'Please enter the text content',
                dialogsFade: true,
                dialogsInBody: true,
                disableDragAndDrop: false,
                callbacks: {
                    onImageUpload: function(files) {
                        var $files = $(files),
                            url = config.apiServer + 'content/post?actionxm=upload_contentImg';
                        $files.each(function() {
                            var file = this;
                            var data = new FormData();
                            data.append('file', file);
                            $.ajax({
                                data: data,
                                type: 'POST',
                                url: url,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(res) {
                                    var data = JSON.parse(res);
                                    $('#content_en').summernote('insertImage', data.name, function($image) { });

                                },
                                error: function() {
                                    console.error('error');
                                }
                            });
                        });
                    }
                }
            });
            $('#content_tc').summernote({
                lang: 'zh-TW',
                minHeight: 200,
                placeholder: '请输入正文内容',
                dialogsFade: true,
                dialogsInBody: true,
                disableDragAndDrop: false,
                callbacks: {
                    onImageUpload: function(files) {
                        var $files = $(files),
                            url = config.apiServer + 'content/post?actionxm=upload_contentImg';
                        $files.each(function() {
                            var file = this;
                            var data = new FormData();
                            data.append('file', file);
                            $.ajax({
                                data: data,
                                type: 'POST',
                                url: url,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(res) {
                                    var data = JSON.parse(res);
                                    $('#content_tc').summernote('insertImage', data.name, function($image) { });

                                },
                                error: function() {
                                    console.error('error');
                                }
                            });
                        });
                    }
                }
            });
        },

        /**
         * 渲染分类树
         * @param  {[type]} list [description]
         * @return {[type]}      [description]
         */
        renderMenuTree: function() {
            var self = this,
                json = {
                    api: config.apiServer + 'clazz/get',
                    type: 'get',
                    data: {
                        actionxm: 'search'
                    }
                };
            var callback = function(res) {
                if(res.status == 0) {
                    var list = res.data,
                        listTpl = '<option value="0">/</option>';
                    for(var i in list) {
                        var prefix = '';
                        while(list[i]['level'] >= 0) {
                            prefix += '|--';
                            list[i]['level']--;
                        }
                        listTpl += '<option value="' + list[i]['id'] + '">' + prefix + list[i]['name_en'] + '（' + list[i]['name_tc'] + '）' + '</span></option>';
                    }
                    $('#clazz_id').html(listTpl);
                    if($('.js_update_clazz_id').val() != '') {
                        $('#clazz_id').val($('.js_update_clazz_id').val());
                    }
                    if($('.js_add_clazz_id').val() == 'add') {
                        $('#clazz_id').val(0);
                    }
                } else {
                    alert(res.msg);
                }
            };
            json.callback = callback;
            Utils.requestData(json);
        },
    };

    page.init();

    $('body').delegate('.js_submit', 'click', function() {
        var title_en = $('#title_en').val(),
            title_tc = $('#title_tc').val(),
            clazz_id = $('#clazz_id').val(),
            pic = $('#prevArea').attr('src'),
            content_en = $('#content_en').summernote('code'),
            content_tc = $('#content_tc').summernote('code'),
            author = $('#author').val();
        if(title_en == '') {
            alert('请输入标题（en）！');
            return;
        }
        if(title_tc == '') {
            alert('请输入标题（tc）！');
            return;
        }
        if(clazz_id == '') {
            alert('请选择分类！');
            return;
        }
        if(pic == '') {
            alert('请上传封面图！');
            return;
        }
        if(content_en == '') {
            alert('请输入正文内容（en）!');
            return;
        }
        if(content_tc == '') {
            alert('请输入正文内容（tc）!');
            return;
        }
        if(author == '') {
            alert('请输入作者!');
            return;
        }
        var nid = $('.js_nid').val();
        var json = {
            api: config.apiServer + 'content/post',
            type: 'post',
            data: {
                actionxm: 'add',
                nid: nid,
                params: {
                    title_en: title_en,
                    title_tc: title_tc,
                    clazz_id: clazz_id,
                    pic: pic,
                    content_en: content_en,
                    content_tc: content_tc,
                    author: author
                }
            }
        };
        var callback = function(res) {
            if(res.status == 0) {
                alert('保存成功！');
                window.location.href = "/adm/content";
            } else {
                alert(res.msg);
            }
        };
        json.callback = callback;
        Utils.requestData(json);
    });

    $('#pic').uploadifive({
        fileTypeDesc: '上传文件',
        fileTypeExts: '*.jpg;*.jpeg;*.gif;*.png',
        multi: false,
        buttonText: '上传图片',
        height: '25',
        width: '100',
        method: 'post',
        fileObjName: 'uploadfile',
        uploadScript: config.apiServer + 'content/post',
        formData: {
            'actionxm': 'upload_photo'
        },
        onUploadComplete: function(file, data, response) {
            result = $.parseJSON(data);
            if(result['status']==0) {
                $('#prevArea').attr('src', result['name']);
            } else {
                alert(result['msg']);
            }
        }
    });
});
