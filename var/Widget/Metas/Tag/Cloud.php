<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 标签云
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 标签云组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Metas_Tag_Cloud extends Widget_Abstract_Metas
{
    /**
     * 入口函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        $this->parameter->setDefault(array('sort' => 'count', 'ignoreZeroCount' => false, 'desc' => true, 'limit' => 0));
        $select = $this->select()->where('type = ?', 'tag')->order($this->parameter->sort,
        $this->parameter->desc ? Edge_Db::SORT_DESC : Edge_Db::SORT_ASC);

        /** 忽略零数量 */
        if ($this->parameter->ignoreZeroCount) {
            $select->where('count > 0');
        }

        /** 总数限制 */
        if ($this->parameter->limit) {
            $select->limit($this->parameter->limit);
        }

        $this->db->fetchAll($select, array($this, 'push'));
    }

    /**
     * 按分割数输出字符串
     *
     * @access public
     * @param string $param 需要输出的值
     * @return void
     */
    public function split()
    {
        $args = func_get_args();
        array_unshift($args, $this->count);
        echo call_user_func_array(array('Edge_Common', 'splitByCount'), $args);
    }
}
