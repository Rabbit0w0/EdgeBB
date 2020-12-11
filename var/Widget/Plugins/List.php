<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * EdgeBB Forum
 *
 * @copyright  Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license    MIT License
 * @version    $Id$
 */

/**
 * 插件列表组件
 *
 * @author qining
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Plugins_List extends Edge_Widget
{
    /**
     * 已启用插件
     *
     * @access public
     * @var array
     */
    public $activatedPlugins = array();

    /**
     * @return array
     */
    protected function getPlugins()
    {
        return glob(__EDGE_ROOT_DIR__ . '/' . __EDGE_PLUGIN_DIR__ . '/*');
    }

    /**
     * @param string $plugin
     * @param string $index
     * @return array|null
     */
    protected function getPlugin($plugin, $index)
    {
        if (is_dir($plugin)) {
            /** 获取插件名称 */
            $pluginName = basename($plugin);

            /** 获取插件主文件 */
            $pluginFileName = $plugin . '/Plugin.php';
        } else if (file_exists($plugin) && 'index.php' != basename($plugin)) {
            $pluginFileName = $plugin;
            $part = explode('.', basename($plugin));
            if (2 == count($part) && 'php' == $part[1]) {
                $pluginName = $part[0];
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }

        return array($pluginName, $pluginFileName);
    }

    /**
     * 执行函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        /** 列出插件目录 */
        $pluginDirs = $this->getPlugins();
        $this->parameter->setDefault(array('activated' => NULL));

        /** 获取已启用插件 */
        $plugins = Edge_Plugin::export();
        $this->activatedPlugins = $plugins['activated'];

        if (!empty($pluginDirs)) {
            foreach ($pluginDirs as $key => $pluginDir) {
                $parts = $this->getPlugin($pluginDir, $key);
                if (empty($parts)) {
                    continue;
                }

                list ($pluginName, $pluginFileName) = $parts;

                if (file_exists($pluginFileName)) {
                    $info = Edge_Plugin::parseInfo($pluginFileName);
                    $info['name'] = $pluginName;

                    list ($version, $build) = explode('/', Edge_Common::VERSION);
                    $info['dependence'] = Edge_Plugin::checkDependence($build, $info['dependence']);

                    /** 默认即插即用 */
                    $info['activated'] = true;

                    if ($info['activate'] || $info['deactivate'] || $info['config'] || $info['personalConfig']) {
                        $info['activated'] = isset($this->activatedPlugins[$pluginName]);

                        if (isset($this->activatedPlugins[$pluginName])) {
                            unset($this->activatedPlugins[$pluginName]);
                        }
                    }

                    if ($info['activated']  == $this->parameter->activated) {
                        $this->push($info);
                    }
                }
            }
        }
    }
}
