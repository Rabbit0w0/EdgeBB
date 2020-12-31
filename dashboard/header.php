<?php
error_reporting(0);
if (!defined('__EDGE_ADMIN__')) {
    exit;
}
$header = '<link rel="stylesheet" href="' . Edge_Common::url('normalize.css?v=' . $suffixVersion, $options->adminStaticUrl('css')) . '">
<link rel="stylesheet" href="' . Edge_Common::url('grid.css?v=' . $suffixVersion, $options->adminStaticUrl('css')) . '">
<link rel="stylesheet" href="' . Edge_Common::url('style.css?v=' . $suffixVersion, $options->adminStaticUrl('css')) . '">
<link rel="stylesheet" href="' . Edge_Common::url('style.css?v=' . $suffixVersion, $options->adminStaticUrl('assets/css')) . '">
<link rel="stylesheet" href="' . Edge_Common::url('vendor.bundle.base.css?v=' . $suffixVersion, $options->adminStaticUrl('assets/vendors/css')) . '">
<link rel="stylesheet" href="' . Edge_Common::url('materialdesignicons.min.css?v=' . $suffixVersion, $options->adminStaticUrl('assets/vendors/mdi/css')) . '">
<link href="' . Edge_Common::url('toast.style.css', $options->adminStaticUrl('toast')) . '" rel="stylesheet">
<link href="' . Edge_Common::url('mdui.css', $options->adminStaticUrl('mdui/css')) . '" rel="stylesheet">
<script src="' . Edge_Common::url('mdui.js?v=' . $suffixVersion, $options->adminStaticUrl('mdui/js')) . '"></script>
<script src="' . Edge_Common::url('toast.script.js?v=' . $suffixVersion, $options->adminStaticUrl('toast')) . '"></script>
<script src="' . Edge_Common::url('vendor.bundle.base.js?v=' . $suffixVersion, $options->adminStaticUrl('assets/vendors/js')) . '"></script>
<script src="' . Edge_Common::url('off-canvas.js?v=' . $suffixVersion, $options->adminStaticUrl('assets/js')) . '"></script>
<script src="' . Edge_Common::url('hoverable-collapse.js?v=' . $suffixVersion, $options->adminStaticUrl('assets/js')) . '"></script>

<!--[if lt IE 9]>
<script src="' . Edge_Common::url('html5shiv.js?v=' . $suffixVersion, $options->adminStaticUrl('js')) . '"></script>
<script src="' . Edge_Common::url('respond.js?v=' . $suffixVersion, $options->adminStaticUrl('js')) . '"></script>
<![endif]-->';

/** 注册一个初始化插件 */
$header = Edge_Plugin::factory('dashboard/header.php')->header($header);

?>

<!-- <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <meta charset="<?php $options->charset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php _e('%s - Powered by Edge',$menu->title); ?></title>
        <meta name="robots" content="noindex, nofollow">
        <?php echo $header; ?>
    </head>
    <body <?php if (isset($bodyClass)) {echo 'class="' . $bodyClass . '"';} ?>>
    <!--[if lt IE 9]>
        <div class="message error browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="https://www.microsoft.com/zh-cn/edge/">升级你的浏览器</a>'); ?>.</div>
    <![endif]-->
