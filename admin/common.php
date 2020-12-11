<?php
if (!defined('__DIR__')) {
    define('__DIR__', dirname(__FILE__));
}

define('__EDGE_ADMIN__', true);

/** 载入配置文件 */
if (!defined('__EDGE_ROOT_DIR__') && !@include_once __DIR__ . '/../config.inc.php') {
    file_exists(__DIR__ . '/../install.php') ? header('Location: ../install.php') : print('Missing Config File');
    exit;
}

/** 初始化组件 */
Edge_Widget::widget('Widget_Init');

/** 注册一个初始化插件 */
Edge_Plugin::factory('admin/common.php')->begin();

Edge_Widget::widget('Widget_Options')->to($options);
Edge_Widget::widget('Widget_User')->to($user);
Edge_Widget::widget('Widget_Security')->to($security);
Edge_Widget::widget('Widget_Menu')->to($menu);

/** 初始化上下文 */
$request = $options->request;
$response = $options->response;

/** 检测是否是第一次登录 */
$currentMenu = $menu->getCurrentMenu();
list($prefixVersion, $suffixVersion) = explode('/', $options->version);
$params = parse_url($currentMenu[2]);
$adminFile = basename($params['path']);

if (!$user->logged && !Edge_Cookie::get('__edge_first_run') && !empty($currentMenu)) {
    
    if ('welcome.php' != $adminFile) {
        $response->redirect(Edge_Common::url('welcome.php', $options->adminUrl));
    } else {
        Edge_Cookie::set('__edge_first_run', 1);
    }
    
} else {

    /** 检测版本是否升级 */
    if ($user->pass('administrator', true) && !empty($currentMenu)) {
        $mustUpgrade = (!defined('Edge_Common::VERSION') || version_compare(str_replace('/', '.', Edge_Common::VERSION),
        str_replace('/', '.', $options->version), '>'));

        if ($mustUpgrade && 'upgrade.php' != $adminFile && 'backup.php' != $adminFile) {
            $response->redirect(Edge_Common::url('upgrade.php', $options->adminUrl));
        } else if (!$mustUpgrade && 'upgrade.php' == $adminFile) {
            $response->redirect($options->adminUrl);
        } else if (!$mustUpgrade && 'welcome.php' == $adminFile && $user->logged) {
            $response->redirect($options->adminUrl);
        }
    }

}
