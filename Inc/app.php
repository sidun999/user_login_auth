<?php

$_GET['TPmodel'] = $TPdatas['m'];
$_GET['TPaction'] = $TPdatas['c'];
$_GET['m'] = $TPdatas['m'];
$_GET['c'] = $TPdatas['c'];
$_GET['s'] = $TPdatas['c'];
/**
 * 单入口系统
 */
set_time_limit(64);


define('APP_KEY', md5($_SERVER['HTTP_HOST'] . __FILE__));

define('APP_NAME', '_CMS_');
define('APP_DEBUG', true); // 是否开启调试模式

$checkNowDir = str_replace(array('\\'), array('/'), dirname(__FILE__) . '/');
$checkNowDir = str_replace('Inc/','',$checkNowDir);

define('ROOT_PATH', $checkNowDir);
define('THINK_PATH', ROOT_PATH.'/Core/Think/');

define('APP_PATH', ROOT_PATH . 'Core/');
define('TMPL_PATH', ROOT_PATH . 'T/Tpls/');
define('RUNTIME_PATH', ROOT_PATH . 'Temp/');

require(ROOT_PATH . "/Core/Think/ThinkPHP.php"); //加载框架入口文件
