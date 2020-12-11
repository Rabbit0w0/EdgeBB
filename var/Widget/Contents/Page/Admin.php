<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 独立页面管理列表
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 独立页面管理列表组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Contents_Page_Admin extends Widget_Contents_Post_Admin
{
    /**
     * 执行函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        /** 过滤状态 */
        $select = $this->select()->where('table.contents.type = ? OR (table.contents.type = ? AND table.contents.parent = ?)', 'page', 'page_draft', 0);

        /** 过滤标题 */
        if (NULL != ($keywords = $this->request->keywords)) {
            $args = array();
            $keywordsList = explode(' ', $keywords);
            $args[] = implode(' OR ', array_fill(0, count($keywordsList), 'table.contents.title LIKE ?'));

            foreach ($keywordsList as $keyword) {
                $args[] = '%' . Edge_Common::filterSearchQuery($keyword) . '%';
            }

            call_user_func_array(array($select, 'where'), $args);
        }

        /** 提交查询 */
        $select->order('table.contents.order', Edge_Db::SORT_ASC);

        $this->db->fetchAll($select, array($this, 'push'));
    }
}
