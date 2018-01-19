<?php

return array(
	'USER_AUTH_ON'			 => true, // 开启认证功能
	'USER_AUTH_TYPE'		 => 2,
	'USER_AUTH_KEY'			 => 'authId',
	'ADMIN_AUTH_KEY'		 => 'administrator',
	'USER_AUTH_MODEL'		 => 'RbacUser',
	'AUTH_PWD_ENCODER'		 => 'md5',
	'REQUIRE_AUTH_MODULE'	 => '',
	'NOT_AUTH_ACTION'		 => '',
	'REQUIRE_AUTH_ACTION'	 => '',
	'GUEST_AUTH_ON'			 => false,
	'GUEST_AUTH_ID'			 => 0,
	'RBAC_ROLE_TABLE'		 => 'bd_rbac_role',
	'RBAC_USER_TABLE'		 => 'bd_rbac_role_user',
	'RBAC_ACCESS_TABLE'		 => 'bd_rbac_access',
	'RBAC_NODE_TABLE'		 => 'bd_rbac_node',
	'SPECIAL_USER'			 => 'admin',
	'cms_name'				 => '管理系统',
	'cms_url'				 => 'http://localhost/ms/',
	'cms_var'				 => '0.0.1',
	'cms_admin'				 => 'admin.php',
);
