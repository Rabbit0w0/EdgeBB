<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 元素
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 元素类
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
//我感觉我要猝死了
abstract class Edge_Widget_Helper_FormRL_Element{
    /**
     * 表单描述
     *
     * @access private
     * @var string
     */
    protected $description;

    /**
     * 表单消息
     *
     * @access protected
     * @var string
     */
    protected $message;

    /**
     * 表单元素容器
     *
     * @access public
     * @var Edge_Widget_Helper_Layout
     */
    public $container;

    /**
     * inputs  
     * 
     * @var array
     * @access public
     */
    public $inputs = array();
    public $label;
    public $rules = array();
    public $name;
    public $value;

    /**
     * 构造函数
     *
     * @access public
     * @param string $name 表单输入项名称
     * @param array $options 选择项
     * @param mixed $value 表单默认值
     * @param string $label 表单标题
     * @param string $description 表单描述
     * @return void
     */
    public function __construct($name = NULL, array $options = NULL, $value = NULL, $label = NULL, $description = NULL)
    {
        // aa
    }
}