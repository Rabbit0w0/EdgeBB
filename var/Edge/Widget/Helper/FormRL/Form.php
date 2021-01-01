<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;
/**
 * 表单帮手
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 * @version $Id$
 */

/**
 * 表单帮手类
 *
 * @category edge
 * @package Widget
 * @copyright Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Edge_Widget_Helper_FormRL_Form{
    // 表单提交方法
    const POST = 'post';
    const GET = 'get';

    // 表单编码方式
    /** 标准编码方法 */
    const STANDARD_ENCODE = 'application/x-www-form-urlencoded';

    /** 混合编码 */
    const MULTIPART_ENCODE = 'multipart/form-data';

    /** 文本编码 */
    const TEXT_ENCODE= 'text/plain';
    // ARG
    private $_name;
    private $_action;
    private $_method;
    private $_encoding;
    private $_elements = array();
    /**
     * 构造器
     * 
     * @access public
     */
    public function __construct($name, $action = NULL, $method = self::POST, $encoding = self::STANDARD_ENCODE){
        $this->_name($name);
        $this->_action($action);
        $this->_method($method);
        $this->_encoding($encoding);
    }
    /**
     * 添加什么东西
     * 
     * @access public
     */
    public function addElement($uid, $elementData){
        $this->_elements[$uid] = $elementData;
        return $this;
    }
    /**
     * 获取元素
     * 
     * @access public
     */
    public function getElement($uid){
        return isset($this->_elements[$uid]) ? $this->_elements[$elementName] : NULL;
    }
    /**
     * 获取最终
     * 
     * @access public
     * @return string
     */
    public function getArtifact(){
        $lines = array();
        foreach($this->_elements as $uid => $element){
            array_push($lines, $element->render());
        }
        return $lines;
    }
    /**
     * 设置名字
     * 
     * @access protected
     */
    protected function _name($name){
        if($name == NULL){
            $this->_name = "";
        }
        else{
            $this->_name = $name;
        }
    }
    /**
     * 设置行为
     * 
     * @access protected
     */
    protected function _action($action){
        if($action == NULL){
            $this->_action = "";
        }
        else{
            $this->_action = $action;
        }
    }
    /**
     * 设置方法
     * 
     * @access protected
     */
    protected function _method($method){
        $this->_method = $method;
    }
    /**
     * 设置编码方式
     * 
     * @access protected
     */
    protected function _encoding($encoding){
        $this->_encoding = $encoding;
    }
}