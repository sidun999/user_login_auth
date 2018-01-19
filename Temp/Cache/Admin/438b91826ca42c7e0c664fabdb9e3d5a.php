<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航-<?php echo (C("cms_name")); ?></title>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/Admin/css/style.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	var menu_a = $('.active');
	var second = $('.menu_ul_second');
	menu_a.click(function(){
		if($(this).attr('show')=='0'){
			second.slideUp(200,function(){
				$(this).siblings('a').removeClass('hover').addClass('active').attr('show','0');
			});
			$(this).removeClass('active').addClass('hover').attr('show','1').siblings('.menu_ul_second').slideDown(200);
		}
	});
	menu_a.eq(0).click();
});
</script>
</head>
<body>
	<div id="left_main" style="position:absolute;top:0;bottom:0;left:10px;">
    	<div id="menu">
        	<ul id="menu_ul" class="menu_ul">
        	<?php echo ($sub_menu_html); ?>
            </ul>
        </div>
    </div>
</body>
</html>