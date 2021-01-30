<?php
if (!defined('__EDGE_ROOT_DIR__')) exit;

/**
 * Markdown解析
 *
 * @package Markdown
 * @copyright Copyright (c) 2014 Edge team (http://www.mcedge.ink)
 * @license MIT License
 */
class Markdown
{
    /**
     * convert 
     * 
     * @param string $text 
     * @return string
     */
    public static function convert($text)
    {
        static $parser;
        $parser = new HyperDown();
        return str_replace('<p><!--more--></p>', '<!-- more -->', $parser->text($text));
    }

    /**
     * transerCodeClass
     * 
     * @param string $html
     * @return string
     */
    public static function transerCodeClass($html)
    {
        return preg_replace("/<code class=\"([_a-z0-9-]+)\">/i", "<code class=\"lang-\\1\">", $html);
    }

    /**
     * @param $html
     * @return mixed
     */
    public static function transerComment($html)
    {
        return preg_replace_callback("/<!\-\-(.+?)\-\->/s", array('Markdown', 'transerCommentCallback'), $html);
    }

    /**
     * @param $matches
     * @return string
     */
    public static function transerCommentCallback($matches)
    {
        return self::$parser->makeHolder($matches[0]);
    }
}

