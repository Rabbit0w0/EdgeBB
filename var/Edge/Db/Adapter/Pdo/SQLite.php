<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * EdgeBB Forum
 *
 * @copyright  Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license    MIT License
 * @version    $Id$
 */

/**
 * 数据库Pdo_SQLite适配器
 *
 * @package Db
 */
class Edge_Db_Adapter_Pdo_SQLite extends Edge_Db_Adapter_Pdo
{
    /**
     * @var sqlite version 2.x
     */
    private $_isSQLite2 = false;

    /**
     * 判断适配器是否可用
     *
     * @access public
     * @return boolean
     */
    public static function isAvailable()
    {
        return parent::isAvailable() && in_array('sqlite', PDO::getAvailableDrivers());
    }

    /**
     * 清空数据表
     *
     * @param string $table
     * @param mixed $handle 连接对象
     * @return mixed|void
     * @throws Edge_Db_Exception
     */
    public function truncate($table, $handle)
    {
        $this->query('DELETE FROM ' . $this->quoteColumn($table), $handle);
    }

    /**
     * 初始化数据库
     *
     * @param Edge_Config $config 数据库配置
     * @access public
     * @return PDO
     */
    public function init(Edge_Config $config)
    {
        $pdo = new PDO("sqlite:{$config->file}");
        $this->_isSQLite2 = version_compare($pdo->getAttribute(PDO::ATTR_SERVER_VERSION), '3.0.0', '<');
        return $pdo;
    }

    /**
     * @param resource $resource
     * @return array
     */
    public function fetch($resource)
    {
        return Edge_Common::filterSQLite2ColumnName(parent::fetch($resource));
    }

    /**
     * @param resource $resource
     * @return object
     */
    public function fetchObject($resource)
    {
        return (object) $this->fetch($resource);
    }

    /**
     * 对象引号过滤
     *
     * @access public
     * @param string $string
     * @return string
     */
    public function quoteColumn($string)
    {
        return '"' . $string . '"';
    }

    /**
     * 合成查询语句
     *
     * @access public
     * @param array $sql 查询对象词法数组
     * @return string
     */
    public function parseSelect(array $sql)
    {
        if (!empty($sql['join'])) {
            foreach ($sql['join'] as $val) {
                list($table, $condition, $op) = $val;
                $sql['table'] = "{$sql['table']} {$op} JOIN {$table} ON {$condition}";
            }
        }

        $sql['limit'] = (0 == strlen($sql['limit'])) ? NULL : ' LIMIT ' . $sql['limit'];
        $sql['offset'] = (0 == strlen($sql['offset'])) ? NULL : ' OFFSET ' . $sql['offset'];

        $query = 'SELECT ' . $sql['fields'] . ' FROM ' . $sql['table'] .
        $sql['where'] . $sql['group'] . $sql['having'] . $sql['order'] . $sql['limit'] . $sql['offset'];

        if ($this->_isSQLite2) {
            $query = Edge_Common::filterSQLite2CountQuery($query);
        }

        return $query;
    }
}
