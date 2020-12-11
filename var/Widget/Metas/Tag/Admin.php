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
class Widget_Metas_Tag_Admin extends Widget_Metas_Tag_Cloud
{
    /**
     * 入口函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        $select = $this->select()->where('type = ?', 'tag')->order('mid', Edge_Db::SORT_DESC);
        $this->db->fetchAll($select, array($this, 'push'));
    }

    /**
     * 获取菜单标题
     *
     * @access public
     * @return string
     */
    public function getMenuTitle()
    {
        if (isset($this->request->mid)) {
            $tag = $this->db->fetchRow($this->select()
                ->where('type = ? AND mid = ?', 'tag', $this->request->mid));

            if (!empty($tag)) {
                return _t('编辑标签 %s', $tag['name']);
            }
        } else {
            return;
        }

        throw new Edge_Widget_Exception(_t('标签不存在'), 404);
    }
}
