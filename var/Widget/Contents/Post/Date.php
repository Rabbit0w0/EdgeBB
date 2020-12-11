<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 按日期归档列表组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 按日期归档列表组件
 *
 * @fixme 交给缓存
 * @author qining
 * @category edge
 * @package Widget
 */
class Widget_Contents_Post_Date extends Edge_Widget
{
    /**
     * 全局选项
     *
     * @access protected
     * @var Widget_Options
     */
    protected $options;

    /**
     * 数据库对象
     *
     * @access protected
     * @var Edge_Db
     */
    protected $db;

    /**
     * 构造函数,初始化组件
     *
     * @access public
     * @param mixed $request request对象
     * @param mixed $response response对象
     * @param mixed $params 参数列表
     */
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);

        /** 初始化数据库 */
        $this->db = Edge_Db::get();

        /** 初始化常用组件 */
        $this->options = $this->widget('Widget_Options');
    }

    /**
     * 初始化函数
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        /** 设置参数默认值 */
        $this->parameter->setDefault('format=Y-m&type=month&limit=0');

        $resource = $this->db->query($this->db->select('created')->from('table.contents')
        ->where('type = ?', 'post')
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created < ?', $this->options->time)
        ->order('table.contents.created', Edge_Db::SORT_DESC));

        $offset = $this->options->timezone - $this->options->serverTimezone;
        $result = array();
        while ($post = $this->db->fetchRow($resource)) {
            $timeStamp = $post['created'] + $offset;
            $date = date($this->parameter->format, $timeStamp);

            if (isset($result[$date])) {
                $result[$date]['count'] ++;
            } else {
                $result[$date]['year'] = date('Y', $timeStamp);
                $result[$date]['month'] = date('m', $timeStamp);
                $result[$date]['day'] = date('d', $timeStamp);
                $result[$date]['date'] = $date;
                $result[$date]['count'] = 1;
            }
        }

        if ($this->parameter->limit > 0) {
            $result = array_slice($result, 0, $this->parameter->limit);
        }

        foreach ($result as $row) {
            $row['permalink'] = Edge_Router::url('archive_' . $this->parameter->type, $row, $this->widget('Widget_Options')->index);
            $this->push($row);
        }
    }
}
