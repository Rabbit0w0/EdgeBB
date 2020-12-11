<?php
/**
 * Http客户端
 *
 * @author qining
 * @category edge
 * @package Http
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * Http客户端
 *
 * @author qining
 * @category edge
 * @package Http
 */
class Edge_Http_Client
{
    /** POST方法 */
    const METHOD_POST = 'POST';

    /** GET方法 */
    const METHOD_GET = 'GET';

    /** 定义行结束符 */
    const EOL = "\r\n";

    /**
     * 获取可用的连接
     *
     * @access public
     * @return Edge_Http_Client_Adapter
     */
    public static function get()
    {
        $adapters = func_get_args();

        if (empty($adapters)) {
            $adapters = array();
            $adapterFiles = glob(dirname(__FILE__) . '/Client/Adapter/*.php');
            foreach ($adapterFiles as $file) {
                $adapters[] = substr(basename($file), 0, -4);
            }
        }

        foreach ($adapters as $adapter) {
            $adapterName = 'Edge_Http_Client_Adapter_' . $adapter;
            if (Edge_Common::isAvailableClass($adapterName) && call_user_func(array($adapterName, 'isAvailable'))) {
                return new $adapterName();
            }
        }

        return false;
    }
}
