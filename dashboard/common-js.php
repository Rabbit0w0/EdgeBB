<?php if(!defined('__EDGE_ADMIN__')) exit; ?>
    <!-- Angular JS Toaster NOT USING -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js" ></script>
    <script src="https://code.angularjs.org/1.2.0/angular-animate.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/3.0.0/toaster.min.js"></script> -->
    <!-- End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php $options->adminStaticUrl('js', 'jquery.js?v=' . $suffixVersion); ?>"></script>
    <script src="<?php $options->adminStaticUrl('js', 'jquery-ui.js?v=' . $suffixVersion); ?>"></script>
    <script src="<?php $options->adminStaticUrl('js', 'typecho.js?v=' . $suffixVersion); ?>"></script>
    <script>
        (function () {
            $(document).ready(function() {
                // 处理消息机制
                (function () {
                    var prefix = '<?php echo Edge_Cookie::getPrefix(); ?>',
                        cookies = {
                            notice      :   $.cookie(prefix + '__edge_notice'),
                            noticeType  :   $.cookie(prefix + '__edge_notice_type'),
                            highlight   :   $.cookie(prefix + '__edge_notice_highlight')
                        },
                        path = '<?php echo Edge_Cookie::getPath(); ?>';

                    if (!!cookies.notice && 'success|notice|error'.indexOf(cookies.noticeType) >= 0) {
                        function addToast(title, content, type){
                            $.Toast(title, content, type, {
                                has_icon:true,
                                has_close_btn:true,
                                fullscreen:false,
                                timeout:5000,
                                sticky:false,
                                has_progress:true,
                                rtl:false,
                            });
                        }

                        addToast("EdgeBB", cookies.notice, cookies.noticeType)
                        $.cookie(prefix + '__edge_notice', null, {path : path});
                        $.cookie(prefix + '__edge_notice_type', null, {path : path});
                        $.cookie(prefix + '__edge_notice_highlight', null, {path : path});
                    }
                });
            });
        })();
    </script>
