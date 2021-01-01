<?php
/**
 * 一直bb
 *
 * @copyright  Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license    MIT License
 * @version    0.1
 */

/** 载入配置支持 */
if (!defined('__EDGE_ROOT_DIR__') && !@include_once 'config.inc.php') {
    file_exists('./install.php') ? header('Location: install.php') : _e('FATAL: Missing Config File');
    exit;
}

/** 初始化组件 */
Edge_Widget::widget('Widget_Init');

/** 注册一个初始化插件 */
Edge_Plugin::factory('index.php')->begin();

/** 开始路由分发 */
Edge_Router::dispatch();

/** 注册一个结束插件 */
Edge_Plugin::factory('index.php')->end();
