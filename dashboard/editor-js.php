<?php error_reporting(0);if(!defined('__EDGE_ADMIN__')) exit; ?>
<?php $content = !empty($post) ? $post : $page; if ($options->markdown): ?>
<script src="<?php $options->adminStaticUrl('editor/js', 'editormd.min.js?v=' . $suffixVersion); ?>"></script>
<link rel="stylesheet" href="<?php $options->adminStaticUrl('editor/css', 'editormd.css?v=' . $suffixVersion); ?>"/>
        <script>
            var uploadURL = '<?php Helper::security()->index('/action/upload?cid=CID'); ?>';
        </script>
        <script type="text/javascript" src="<?php echo $jsUrl; ?>"></script>
        <script>
            $(document).ready(function() {

                var textarea = $('#text').parent("p");
                var isMarkdown = $('[name=markdown]').val()?1:0;
                    $('#text').wrap("<div id='text-editormd'></div>");
                    postEditormd = editormd("text-editormd", {
                        width: "100%",
                        height: 640,
                        path: '/dashboard/editor/lib/',
                        toolbarAutoFixed: false,
                        htmlDecode: true,
                        emoji: false,
                        tex: true,
                        toc: true,
                        tocm: true,    // Using [TOCM]
                        taskList: true,
                        flowChart: false,  // 默认不解析
                        sequenceDiagram: true,
                        toolbarIcons: function () {
                            return ["undo", "redo", "|", "bold", "del", "italic", "quote", "h1", "h2", "h3", "h4", "|", "list-ul", "list-ol", "hr", "|", "link", "reference-link", "image", "code", "preformatted-text", "code-block", "table", "datetime"<?php echo $editormd->emoji ? ', "emoji"' : ''; ?>, "html-entities", "more", "|", "goto-line", "watch", "preview", "clear", "|", "help", "info"]
                        },
                        toolbarIconsClass: {
                            more: "fa-newspaper-o",  // 指定一个FontAawsome的图标类
                            isMarkdown: "fa-power-off fun"
                        },
                        // 自定义工具栏按钮的事件处理
                        toolbarHandlers: {
                            /**
                             * @param {Object}      cm         CodeMirror对象
                             * @param {Object}      icon       图标按钮jQuery元素对象
                             * @param {Object}      cursor     CodeMirror的光标对象，可获取光标所在行和位置
                             * @param {String}      selection  编辑器选中的文本
                             */
                            more: function (cm, icon, cursor, selection) {
                                cm.replaceSelection("<!--more-->");
                            }
                        },
                        lang: {
                            toolbar: {
                                more: "插入摘要分隔符",
                                isMarkdown: "非Markdown模式"
                            }
                        },
                    });

                    // 优化图片及文件附件插入 Thanks to Markxuxiao
                    Edge.insertFileToEditor = function (file, url, isImage) {
                        html = isImage ? '![' + file + '](' + url + ')'
                            : '[' + file + '](' + url + ')';
                        postEditormd.insertValue(html);
                    };

                    // 支持黏贴图片直接上传
                    $(document).on('paste', function(event) {
                        event = event.originalEvent;
                        var cbd = event.clipboardData;
                        var ua = window.navigator.userAgent;
                        if (!(event.clipboardData && event.clipboardData.items)) {
                            return;
                        }

                        if (cbd.items && cbd.items.length === 2 && cbd.items[0].kind === "string" && cbd.items[1].kind === "file" &&
                            cbd.types && cbd.types.length === 2 && cbd.types[0] === "text/plain" && cbd.types[1] === "Files" &&
                            ua.match(/Macintosh/i) && Number(ua.match(/Chrome\/(\d{2})/i)[1]) < 49){
                            return;
                        }

                        var itemLength = cbd.items.length;

                        if (itemLength == 0) {
                            return;
                        }

                        if (itemLength == 1 && cbd.items[0].kind == 'string') {
                            return;
                        }

                        if ((itemLength == 1 && cbd.items[0].kind == 'file')
                                || itemLength > 1
                            ) {
                            for (var i = 0; i < cbd.items.length; i++) {
                                var item = cbd.items[i];

                                if(item.kind == "file") {
                                    var blob = item.getAsFile();
                                    if (blob.size === 0) {
                                        return;
                                    }
                                    var ext = 'jpg';
                                    switch(blob.type) {
                                        case 'image/jpeg':
                                        case 'image/pjpeg':
                                            ext = 'jpg';
                                            break;
                                        case 'image/png':
                                            ext = 'png';
                                            break;
                                        case 'image/gif':
                                            ext = 'gif';
                                            break;
                                    }
                                    var formData = new FormData();
                                    formData.append('blob', blob, Math.floor(new Date().getTime() / 1000) + '.' + ext);
                                    var uploadingText = '![图片上传中(' + i + ')...]';
                                    var uploadFailText = '![图片上传失败(' + i + ')]'
                                    postEditormd.insertValue(uploadingText);
                                    $.ajax({
                                        method: 'post',
                                        url: uploadURL.replace('CID', $('input[name="cid"]').val()),
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            if (data[0]) {
                                                postEditormd.setValue(postEditormd.getValue().replace(uploadingText, '![](' + data[0] + ')'));
                                            } else {
                                                postEditormd.setValue(postEditormd.getValue().replace(uploadingText, uploadFailText));
                                            }
                                        },
                                        error: function() {
                                            postEditormd.setValue(postEditormd.getValue().replace(uploadingText, uploadFailText));
                                        }
                                    });
                                }
                            }

                        }

                    });

            });
        </script>
<?php endif; ?>

