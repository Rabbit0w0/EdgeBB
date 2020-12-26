<?php if(!defined('__EDGE_ADMIN__')) exit; ?>
<script>
(function () {
    $(document).ready(function () {
        $('.edge-list-table').tableSelectable({
            checkEl     :   'input[type=checkbox]',
            rowEl       :   'tr',
            selectAllEl :   '.edge-table-select-all',
            actionEl    :   '.dropdown-menu a,button.btn-operate'
        });

        $('.btn-drop').dropdownMenu({
            btnEl       :   '.dropdown-toggle',
            menuEl      :   '.dropdown-menu'
        });
    });
})();
</script>
