<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 独立页面列表
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 独立页面列表组件
 *
 * @author qining
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Contents_Page_List extends Widget_Abstract_Contents
{
    /**
     * 执行函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        $select = $this->select()->where('table.contents.type = ?', 'page')
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created < ?', $this->options->time)
        ->order('table.contents.order', Edge_Db::SORT_ASC);

        //去掉自定义首页
        $frontPage = explode(':', $this->options->frontPage);
        if (2 == count($frontPage) && 'page' == $frontPage[0]) {
            $select->where('table.contents.cid <> ?', $frontPage[1]);
        }

        $this->db->fetchAll($select, array($this, 'push'));
    }
}
