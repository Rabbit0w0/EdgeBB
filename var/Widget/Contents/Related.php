<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 相关内容
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 相关内容组件(根据标签关联)
 *
 * @author qining
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_Contents_Related extends Widget_Abstract_Contents
{
    /**
     * 获取查询对象
     *
     * @access public
     * @return Edge_Db_Query
     */
    public function select()
    {
        return $this->db->select('DISTINCT table.contents.cid', 'table.contents.title', 'table.contents.slug', 'table.contents.created', 'table.contents.authorId',
        'table.contents.modified', 'table.contents.type', 'table.contents.status', 'table.contents.text', 'table.contents.commentsNum', 'table.contents.order',
        'table.contents.template', 'table.contents.password', 'table.contents.allowComment', 'table.contents.allowPing', 'table.contents.allowFeed')
        ->from('table.contents');
    }

    /**
     * 执行函数,初始化数据
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        $this->parameter->setDefault('limit=5');

        if ($this->parameter->tags) {
            $tagsGroup = implode(',', Edge_Common::arrayFlatten($this->parameter->tags, 'mid'));
            $this->db->fetchAll($this->select()
            ->join('table.relationships', 'table.contents.cid = table.relationships.cid')
            ->where('table.relationships.mid IN (' . $tagsGroup . ')')
            ->where('table.contents.cid <> ?', $this->parameter->cid)
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.password IS NULL')
            ->where('table.contents.created < ?', $this->options->time)
            ->where('table.contents.type = ?', $this->parameter->type)
            ->order('table.contents.created', Edge_Db::SORT_DESC)
            ->limit($this->parameter->limit), array($this, 'push'));
        }
    }
}
