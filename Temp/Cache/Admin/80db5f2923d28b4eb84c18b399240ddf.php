<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>管理中心-<?php echo (C("cms_name")); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>


<style type="text/css">
body{font-size:12px;}
#admin_index{position:absolute;left:0;right:0;top:0;bottom:0;width:100%;height:100%}
#admin_top{position:absolute;left:0;right:0;top:0;height:85px;width:100%;}
#admin_middle{position:absolute;left:0;right:0;top:85px;bottom:42px;/*background:url(__PUBLIC__/Admin/images/bg.png);*/}
#admin_left{position:absolute;left:0;right:0;top:-9px;bottom:0;width:100%;height:100%;}
#admin_main{position:absolute;left:0;right:0;top:0;bottom:0;width:100%;height:100%;}
#admin_bottom{position:absolute;left:0;right:0;bottom:0;height:51px;width:100%}
</style>
</head>
<body>
<div id="admin_index">
	<iframe id="admin_top" name="topFrame" src="<?php echo U('Admin/Index/top');?>" scrolling="no" frameborder="0"></iframe>
	<div id="admin_middle">
		<div id="ll" style="position:absolute;top:0;left:0;bottom:0;width:230px;">
        	<iframe id="admin_left" name="leftFrame" src="<?php echo U('Admin/Index/left');?>" scrolling="auto" frameborder="0"></iframe>
        </div>
		<div style="position:absolute;top:0;left:230px;bottom:9px;right:0;">
			<iframe id="admin_main" name="main" src="<?php echo U('Admin/Index/main');?>" scrolling="auto" frameborder="0"></iframe>
		</div>
	</div>
	<iframe id="admin_bottom" src="<?php echo U('Admin/Index/footer');?>" scrolling="no" frameborder="0"></iframe>
</div>
</body>
</html>