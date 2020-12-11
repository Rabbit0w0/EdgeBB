<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 多行文字域帮手
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 多行文字域帮手类
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Edge_Widget_Helper_Form_Element_Textarea extends Edge_Widget_Helper_Form_Element
{
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
        $input = new Edge_Widget_Helper_Layout('textarea', array('id' => $name . '-0-' . self::$uniqueId, 'name' => $name));
        $this->label->setAttribute('for', $name . '-0-' . self::$uniqueId);
        $this->container($input->setClose(false));
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
        $this->input->html(htmlspecialchars($value));
    }
}
