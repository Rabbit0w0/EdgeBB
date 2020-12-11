<?php
/**
 * 可以被Widget_Do调用的接口
 *
 * @package Widget
 * @version $id$
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @author qining <magike.net@gmail.com>
 * @license MIT License
 */
interface Widget_Interface_Do
{
    /**
     * 接口需要实现的入口函数
     *
     * @access public
     * @return void
     */
    public function action();
}
