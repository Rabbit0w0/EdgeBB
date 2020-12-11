<?php
/**
 * EdgeBB Forum
 *
 * @copyright  Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license    MIT License
 * @version    $Id: Exception.php 106 2008-04-11 02:23:54Z magike.net $
 */

/**
 * Edge异常基类
 * 主要重载异常打印函数
 *
 * @package Exception
 */
class Edge_Exception extends Exception
{

    public function __construct($message, $code = 0)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
