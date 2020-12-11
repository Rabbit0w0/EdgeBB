<?php
/**
 * 插件接口
 *
 * @category edge
 * @package Plugin
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 插件接口
 *
 * @package Plugin
 * @abstract
 */
interface Edge_Plugin_Interface
{
    /**
     * 启用插件方法,如果启用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Edge_Plugin_Exception
     */
    public static function activate();

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Edge_Plugin_Exception
     */
    public static function deactivate();

    /**
     * 获取插件配置面板
     *
     * @static
     * @access public
     * @param Edge_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Edge_Widget_Helper_Form $form);

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Edge_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Edge_Widget_Helper_Form $form);
}
