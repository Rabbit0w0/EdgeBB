<?php
/**
 * WordPress转换到EdgeBB
 * 
 * @package WordPress to Edge
 * @author qining
 * @version 1.0.3 Beta
 * @link http://typecho.org
 */
class WordpressToEdge_Plugin implements Edge_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Edge_Plugin_Exception
     */
    public static function activate()
    {
        if (!Edge_Db_Adapter_Mysql::isAvailable() && !Edge_Db_Adapter_Pdo_Mysql::isAvailable()) {
            throw new Edge_Plugin_Exception(_t('没有找到任何可用的 Mysql 适配器'));
        }
        
        /**$error = NULL;
        if ((!is_dir(__EDGE_ROOT_DIR__ . '/usr/uploads/') || !is_writeable(__EDGE_ROOT_DIR__ . '/usr/uploads/'))
        && !is_writeable(__EDGE_ROOT_DIR__ . '/usr/')) {
            $error = '<br /><strong>' . _t('%s 目录不可写, 可能会导致附件转换不成功', __EDGE_ROOT_DIR__ . '/usr/uploads/') . '</strong>';
        }
		*/
    
        Helper::addPanel(1, 'WordpressToEdgeBB/panel.php', _t('从 WordPress 导入数据'), _t('从 WordPress 导入数据'), 'administrator');
        Helper::addAction('wordpress-to-edge', 'WordpressToEdge_Action');
        return _t('请在插件设置里设置 WordPress 所在的数据库参数') . $error;
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Edge_Plugin_Exception
     */
    public static function deactivate()
    {
        Helper::removeAction('wordpress-to-edge');
        Helper::removePanel(1, 'WordpressToEdgeBB/panel.php');
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Edge_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Edge_Widget_Helper_Form $form)
    {
        $host = new Edge_Widget_Helper_Form_Element_Text('host', NULL, 'localhost',
        _t('数据库地址'), _t('请填写 WordPress 所在的数据库地址'));
        $form->addInput($host->addRule('required', _t('必须填写一个数据库地址')));
        
        $port = new Edge_Widget_Helper_Form_Element_Text('port', NULL, '3306',
        _t('数据库端口'), _t('WordPress 所在的数据库服务器端口'));
        $port->input->setAttribute('class', 'mini');
        $form->addInput($port->addRule('required', _t('必须填写数据库端口'))
        ->addRule('isInteger', _t('端口号必须是纯数字')));
        
        $user = new Edge_Widget_Helper_Form_Element_Text('user', NULL, 'root',
        _t('数据库用户名'));
        $form->addInput($user->addRule('required', _t('必须填写数据库用户名')));
        
        $password = new Edge_Widget_Helper_Form_Element_Password('password', NULL, NULL,
        _t('数据库密码'));
        $form->addInput($password);
        
        $database = new Edge_Widget_Helper_Form_Element_Text('database', NULL, 'wordpress',
        _t('数据库名称'), _t('WordPress 所在的数据库名称'));
        $form->addInput($database->addRule('required', _t('您必须填写数据库名称')));
    
        $prefix = new Edge_Widget_Helper_Form_Element_Text('prefix', NULL, 'wp_',
        _t('表前缀'), _t('所有 WordPress 数据表的前缀'));
        $form->addInput($prefix->addRule('required', _t('您必须填写表前缀')));
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Edge_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Edge_Widget_Helper_Form $form){}
}
