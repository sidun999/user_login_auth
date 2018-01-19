<?php

C((array) include APP_PATH . 'Conf/rbac_config.php');
return array(
	'default_theme'		 => '',
	'USER_AUTH_GATEWAY'	 => '/Admin/Login',
	'NOT_AUTH_MODULE'	 => 'Login,Public',
	'LAYOUT_ON'			 => true, // 开启LAYOUT
	'LAYOUT_NAME'		 => 'Layout/Layout',
    'TMPL_FILE_DEPR'		 => '/', // 模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效
    'TMPL_ACTION_SUCCESS'   => 'Tips/success',
    'TMPL_ACTION_ERROR'   => 'Tips/error',
);

