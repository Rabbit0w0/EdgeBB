<?php
/**
 * EdgeBB Forum
 *
 * @copyright  Copyright (c) 2020 Edge team (http://www.mcedge.ink)
 * @license    MIT License
 * @version    1.2.1
 */
 
/** 定义根目录 */
define('__EDGE_ROOT_DIR__', dirname(__FILE__));

/** 定义插件目录(相对路径) */
define('__EDGE_PLUGIN_DIR__', '/usr/plugins');

/** 定义模板目录(相对路径) */
define('__EDGE_THEME_DIR__', '/usr/themes');

/** 后台路径(相对路径) */
define('__EDGE_ADMIN_DIR__', '/dashboard/');

/** 设置包含路径 */
@set_include_path(get_include_path() . PATH_SEPARATOR .
__EDGE_ROOT_DIR__ . '/var' . PATH_SEPARATOR .
__EDGE_ROOT_DIR__ . __EDGE_PLUGIN_DIR__);

/** 载入API支持 */
require_once 'Edge/Common.php';

/** 程序初始化 */
Edge_Common::init();

/** 定义数据库参数 */
$db = new Edge_Db('Pdo_SQLite', 'edge_');
$db->addServer(array (
  'file' => 'C:/phpstudy_pro/WWW/usr/5fee8209ab487.db',
), Edge_Db::READ | Edge_Db::WRITE);
Edge_Db::set($db);
