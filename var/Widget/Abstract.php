<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 纯数据抽象组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 纯数据抽象组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
abstract class Widget_Abstract extends Edge_Widget
{
    /**
     * 全局选项
     *
     * @access protected
     * @var Widget_Options
     */
    protected $options;

    /**
     * 用户对象
     *
     * @access protected
     * @var Widget_User
     */
    protected $user;

    /**
     * 安全模块
     *
     * @var Widget_Security
     */
    protected $security;

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
        $this->user = $this->widget('Widget_User');
        $this->security = $this->widget('Widget_Security');
    }

    /**
     * 查询方法
     *
     * @access public
     * @return Edge_Db_Query
     */
    abstract public function select();

    /**
     * 获得所有记录数
     *
     * @access public
     * @param Edge_Db_Query $condition 查询对象
     * @return integer
     */
    abstract public function size(Edge_Db_Query $condition);

    /**
     * 增加记录方法
     *
     * @access public
     * @param array $rows 字段对应值
     * @return integer
     */
    abstract public function insert(array $rows);

    /**
     * 更新记录方法
     *
     * @access public
     * @param array $rows 字段对应值
     * @param Edge_Db_Query $condition 查询对象
     * @return integer
     */
    abstract public function update(array $rows, Edge_Db_Query $condition);

    /**
     * 删除记录方法
     *
     * @access public
     * @param Edge_Db_Query $condition 查询对象
     * @return integer
     */
    abstract public function delete(Edge_Db_Query $condition);
}
