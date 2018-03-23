$(function() {
    var page = {
        init: function() {

            // 渲染编辑菜单的选项
            // this.renderMenuTree();

            $('#content_en').summernote({
                minHeight: 200,
                placeholder: 'Please enter the text content',
                dialogsFade: true,
                dialogsInBody: true,
                disableDragAndDrop: false,
                callbacks: {
                    onImageUpload: function(files) {
                        var $files = $(files),
                            url = config.apiServer + 'staticpage/post?actionxm=upload_contentImg';
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
                            url = config.apiServer + 'staticpage/post?actionxm=upload_contentImg';
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
        }
    }

    page.init();

    $('body').delegate('.js_submit', 'click', function() {
        var name_en = $('#name_en').val(),
            name_tc = $('#name_tc').val(),
            pic = $('#prevArea').attr('src'),
            descript_en = $('#descript_en').val(),
            descript_tc = $('#descript_tc').val(),
            content_en = $('#content_en').summernote('code'),
            content_tc = $('#content_tc').summernote('code');
        // if(pic == '') {
        //     alert('请上传封面图！');
        //     return;
        // }
        if(content_en == '') {
            alert('请输入正文内容（en）!');
            return;
        }
        if(content_tc == '') {
            alert('请输入正文内容（tc）!');
            return;
        }
        var nid = $('.js_nid').val();
        var json = {
            api: config.apiServer + 'staticpage/post',
            type: 'post',
            data: {
                actionxm: 'update',
                nid: nid,
                params: {
                    pic: pic,
                    descript_en: descript_en,
                    descript_tc: descript_tc,
                    content_en: content_en,
                    content_tc: content_tc
                }
            }
        };
        var callback = function(res) {
            if(res.status == 0) {
                alert('保存成功！');
                window.location.href = "/adm/staticpage";
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
        uploadScript: config.apiServer + 'staticpage/post',
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
