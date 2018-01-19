<?php
/**
 * 单入口系统
 */
if(strlen($_GET['s']) < 1) header('Location:?s=/Admin');
set_time_limit(64);

define('APP_KEY', md5($_SERVER['HTTP_HOST'] . __FILE__));

define('APP_NAME', '_CMS_');
define('APP_DEBUG', true); // 是否开启调试模式

$checkNowDir = str_replace(array('\\'), array('/'), dirname(__FILE__) . '/');

define('ROOT_PATH', $checkNowDir);

define('APP_PATH', ROOT_PATH . 'Core/');
define('TMPL_PATH', ROOT_PATH . 'Template/');
define('RUNTIME_PATH', ROOT_PATH . 'Temp/');

require(ROOT_PATH . "/Core/Think/ThinkPHP.php"); //加载框架入口文件
