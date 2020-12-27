<?php error_reporting(0);if(!defined('__EDGE_ADMIN__')) exit; ?>
<script>
(function () {
    $(document).ready(function () {
        var error = $('.edge-option .error:first');

        if (error.length > 0) {
            $('html,body').scrollTop(error.parents('.edge-option').offset().top);
        }

        $('form').submit(function () {
            if (this.submitted) {
                return false;
            } else {
                this.submitted = true;
            }
        });

        $('label input[type=text]').click(function (e) {
            var check = $('#' + $(this).parents('label').attr('for'));
            check.prop('checked', true);
            return false;
        });
    });
})();
</script>
