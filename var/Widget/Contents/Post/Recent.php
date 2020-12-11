<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 最新文章
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 最新评论组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Contents_Post_Recent extends Widget_Abstract_Contents
{
    /**
     * 执行函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        $this->parameter->setDefault(array('pageSize' => $this->options->postsListSize));

        $this->db->fetchAll($this->select()
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created < ?', $this->options->time)
        ->where('table.contents.type = ?', 'post')
        ->order('table.contents.created', Edge_Db::SORT_DESC)
        ->limit($this->parameter->pageSize), array($this, 'push'));
    }
}
