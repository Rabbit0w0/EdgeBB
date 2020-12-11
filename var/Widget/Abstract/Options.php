<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 全局选项
 *
 * @link edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 全局选项组件
 *
 * @link edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Abstract_Options extends Widget_Abstract
{
    /**
     * 以checkbox选项判断是否某个值被启用
     *
     * @access protected
     * @param mixed $settings 选项集合
     * @param string $name 选项名称
     * @return integer
     */
    protected function isEnableByCheckbox($settings, $name)
    {
        return is_array($settings) && in_array($name, $settings) ? 1 : 0;
    }

    /**
     * 获取原始查询对象
     *
     * @access public
     * @return Edge_Db_Query
     */
    public function select()
    {
        return $this->db->select()->from('table.options');
    }

    /**
     * 插入一条记录
     *
     * @access public
     * @param array $options 记录插入值
     * @return integer
     */
    public function insert(array $options)
    {
        return $this->db->query($this->db->insert('table.options')->rows($options));
    }

    /**
     * 更新记录
     *
     * @access public
     * @param array $options 记录更新值
     * @param Edge_Db_Query $condition 更新条件
     * @return integer
     */
    public function update(array $options, Edge_Db_Query $condition)
    {
        return $this->db->query($condition->update('table.options')->rows($options));
    }

    /**
     * 删除记录
     *
     * @access public
     * @param Edge_Db_Query $condition 删除条件
     * @return integer
     */
    public function delete(Edge_Db_Query $condition)
    {
        return $this->db->query($condition->delete('table.options'));
    }

    /**
     * 获取记录总数
     *
     * @access public
     * @param Edge_Db_Query $condition 计算条件
     * @return integer
     */
    public function size(Edge_Db_Query $condition)
    {
        return $this->db->fetchObject($condition->select(array('COUNT(name)' => 'num'))->from('table.options'))->num;
    }
}
