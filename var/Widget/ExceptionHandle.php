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
 * 异常处理组件
 *
 * @author qining
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Widget_ExceptionHandle extends Widget_Archive
{
    /**
     * 重载构造函数
     */
    public function __construct()
    {
        $this->widget('Widget_Archive@404', 'type=404')->render();
        exit;
    }
}
