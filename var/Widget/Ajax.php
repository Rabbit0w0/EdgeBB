<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 异步调用组件
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 异步调用组件
 *
 * @author qining
 * @category edge
 * @package Widget
 */
class Widget_Ajax extends Widget_Abstract_Options implements Widget_Interface_Do
{
    /**
     * 针对rewrite验证的请求返回
     *
     * @access public
     * @return void
     */
    public function remoteCallback()
    {
        if ($this->options->generator == $this->request->getAgent()) {
            echo 'OK';
        }
    }

    /**
     * 获取最新版本
     *
     * @throws Edge_Widget_Exception
     */
    public function checkVersion()
    {
        $this->user->pass('editor');
        $client = Edge_Http_Client::get();
        if ($client) {
            $client->setHeader('User-Agent', $this->options->generator)
                ->setTimeout(10);
            $result = array('available' => 0);

            try {
                $client->send('http://mcedge.ink/version.json');

                /** 匹配内容体 */
                $response = $client->getResponseBody();
                $json = Json::decode($response, true);

                if (!empty($json)) {
                    list($soft, $version) = explode(' ', $this->options->generator);
                    $current = explode('/', $version);

                    if (isset($json['release']) && isset($json['version'])
                        && preg_match("/^[0-9\.]+$/", $json['release'])
                        && preg_match("/^[0-9\.]+$/", $json['version'])
                        && version_compare($json['release'], $current[0], '>=')
                        && version_compare($json['version'], $current[1], '>')) {
                        $result = array(
                            'available' => 1,
                            'latest' => $json['release'] . '-' . $json['version'],
                            'current' => $current[0] . '-' . $current[1],
                            'link' => 'http://mcedge.ink/download'
                        );
                    }
                }
            } catch (Exception $e) {
                // do nothing
            }

            $this->response->throwJson($result);
            return;
        }

        throw new Edge_Widget_Exception(_t('禁止访问'), 403);
    }

    /**
     * 远程请求代理
     *
     * @throws Edge_Widget_Exception
     */
    public function feed()
    {
        $this->user->pass('subscriber');
        $client = Edge_Http_Client::get();
        if ($client) {
            $client->setHeader('User-Agent', $this->options->generator)
                ->setTimeout(10)
                ->send('http://mcedge.ink/feed/');

            /** 匹配内容体 */
            $response = $client->getResponseBody();
            preg_match_all("/<item>\s*<title>([^>]*)<\/title>\s*<link>([^>]*)<\/link>\s*<guid>[^>]*<\/guid>\s*<pubDate>([^>]*)<\/pubDate>/is", $response, $matches);

            $data = array();

            if ($matches) {
                foreach ($matches[0] as $key => $val) {
                    $data[] = array(
                        'title'  =>  $matches[1][$key],
                        'link'   =>  $matches[2][$key],
                        'date'   =>  date('n.j', strtotime($matches[3][$key]))
                    );

                    if ($key > 8) {
                        break;
                    }
                }
            }
            
            $this->response->throwJson($data);
            return;
        }

        throw new Edge_Widget_Exception(_t('禁止访问'), 403);
    }

    /**
     * 自定义编辑器大小
     *
     * @access public
     * @return void
     */
    public function editorResize()
    {
        $this->user->pass('contributor');
        if ($this->db->fetchObject($this->db->select(array('COUNT(*)' => 'num'))
        ->from('table.options')->where('name = ? AND user = ?', 'editorSize', $this->user->uid))->num > 0) {
            $this->widget('Widget_Abstract_Options')
            ->update(array('value' => $this->request->size), $this->db->sql()->where('name = ? AND user = ?', 'editorSize', $this->user->uid));
        } else {
            $this->widget('Widget_Abstract_Options')->insert(array(
                'name'  =>  'editorSize',
                'value' =>  $this->request->size,
                'user'  =>  $this->user->uid
            ));
        }
    }

    /**
     * 异步请求入口
     *
     * @access public
     * @return void
     */
    public function action()
    {
        if (!$this->request->isAjax()) {
            $this->response->goBack();
        }

        $this->on($this->request->is('do=remoteCallback'))->remoteCallback();
        $this->on($this->request->is('do=feed'))->feed();
        $this->on($this->request->is('do=checkVersion'))->checkVersion();
        $this->on($this->request->is('do=editorResize'))->editorResize();
    }
}
