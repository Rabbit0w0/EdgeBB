<?php if(!defined('__EDGE_ADMIN__')) exit; ?>
<div class="edge-page-title">
    <h2><?php echo $menu->title; ?><?php 
    if (!empty($menu->addLink)) {
        echo "<a href=\"{$menu->addLink}\">" . _t("新增") . "</a>";
    }
    ?></h2>
</div>
