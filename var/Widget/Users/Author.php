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
class Widget_Users_Author extends Widget_Abstract_Users
{
    /**
     * 执行函数,初始化数据
     *
     * @access public
     * @return void
     */
    public function execute()
    {
        if ($this->parameter->uid) {
            $this->db->fetchRow($this->select()
            ->where('uid = ?', $this->parameter->uid), array($this, 'push'));
        }
    }
}
