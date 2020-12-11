<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 虚拟域帮手类
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 虚拟域帮手类
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Edge_Widget_Helper_Form_Element_Fake extends Edge_Widget_Helper_Form_Element
{
    /**
     * 构造函数
     *
     * @access public
     * @param string $name 表单输入项名称
     * @param mixed $value 表单默认值
     * @return void
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        self::$uniqueId ++;

        /** 运行自定义初始函数 */
        $this->init();

        /** 初始化表单项 */
        $this->input = $this->input($name);

        /** 初始化表单值 */
        if (NULL !== $value) {
            $this->value($value);
        }
    }

    /**
     * 自定义初始函数
     *
     * @access public
     * @return void
     */
    public function init()
    {}

    /**
     * 初始化当前输入项
     *
     * @access public
     * @param string $name 表单元素名称
     * @param array $options 选择项
     * @return Edge_Widget_Helper_Layout
     */
    public function input($name = NULL, array $options = NULL)
    {
        $input = new Edge_Widget_Helper_Layout('input');
        $this->inputs[] = $input;
        return $input;
    }

    /**
     * 设置表单项默认值
     *
     * @access protected
     * @param string $value 表单项默认值
     * @return void
     */
    protected function _value($value)
    {
        $this->input->setAttribute('value', $value);
    }
}

