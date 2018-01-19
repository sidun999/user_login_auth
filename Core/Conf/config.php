<?php

//优先加载项目配置文件
C((Array) include ROOT_PATH . 'Inc/config.php');

return array(
	'APP_GROUP_LIST'		 => 'Admin', // 分组
	'TMPL_FILE_DEPR'		 => '/', // 模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效
	'DEFAULT_GROUP'			 => 'Home', // 默认分组
	'URL_MODEL'				 => 3, // URL兼容模式
	'URL_CASE_INSENSITIVE'	 => true, // URL是否不区分大小写 默认区分大小写
	'TOKEN_ON'				 => true, // 是否开启令牌验证
	'TOKEN_NAME'			 => '__hash__', // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE'			 => 'md5', //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'			 => false, //令牌验证出错后是否重置令牌 默认为true
	'SHOW_PAGE_TRACE'		 => false, // 显示TRACE页面
	'LAYOUT_ON'				 => true, // 开启LAYOUT
    'LAYOUT_NAME'       =>  'Layout/Layout',
	'URL_ROUTER_ON'			 => false, // 开启URL路由
	'APP_AUTOLOAD_PATH'		 => '@.Class',
	//SESSION前缀
	'SESSION_PREFIX'		 => APP_KEY,
	//COOKIE前缀
	'COOKIE_PREFIX'			 => APP_KEY,
);

