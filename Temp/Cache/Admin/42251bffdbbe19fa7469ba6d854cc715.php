<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>头部</title>
		<link type="text/css" rel="stylesheet" href="__PUBLIC__/Admin/css/style.css" />
		<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
		<style type="text/css">
			#cache{font-weight:normal!important;}
		</style>
	</head>
	<body>
		<div id="header">
			<div class="main">
				<div id="header_main">
					<div id="logo"></div>
					<ul id="header_link_ul">
						<li>您好：<span class="username"><?php echo (session('username')); ?> </span>，欢迎使用<?php echo (C("cms_name")); ?>！ </li>
						<li class="hr"></li>
						<!-- 
						<li><a href="<?php echo U('Admin/User/Index');?>/admin/members/edit/id/" target="main">个人中心</a></li>
						<li class="hr"></li>
						-->
						<li><a href="<?php echo (C("web_url")); ?>" target="_blank">网站主页</a></li>
						<li class="hr"></li>
						<li><a href="<?php echo U('Admin/Index/Index');?>" target="_parent">后台首页</a></li>
						<li class="hr"></li>
						<li><a href="<?php echo U('Admin/Cache/delCore');?>" target="main" id="delcache">更新缓存</a><a id="cache" style="display:none;"></a></li>
						<li class="hr"></li>
						<li><a href="<?php echo U('Admin/Login/logout');?>" target="_parent">退出登录</a></li>
					</ul>
				</div>
				<div id="header_bar">
					<div class="header_bar_left"></div>
					<div class="home">
						<a class="link" target="main" href="<?php echo U('Admin/Index/main');?>"><span>起始页<span></span></span></a>
					</div>
					<div class="header_hr"></div>
					<ul id="header_bar_menu">
						<?php if(is_array($main_menu)): $i = 0; $__LIST__ = $main_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1){ $first_menu_id = $vo['id']; } ?>
							<li id="d<?php echo ($i); ?>" <?php if(($i) == "1"): ?>class="thisclass"<?php endif; ?> onClick="ConClass(<?php echo ($i); ?>);">
								<a target="leftFrame" href="<?php echo U('/Admin/Index/left/id/'.$vo['id']);?>">
									<div class="left"></div>
									<div class="img"><img alt="" src="__PUBLIC__/Admin/images/title_btn_win.png"></div>
									<div class="hr"></div>
									<div class="content"><?php echo ($vo["title"]); ?></div>
									<div class="right"></div>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="header_bar_right"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#delcache").click(function() {
					$ajaxurl = $(this).attr('href');
					$.get($ajaxurl, null, function(data) {
						$("#cache").show();
						$("#cache").html(' <font color=#ff0000>' + data + '</font>');
						window.setTimeout(function() {
							$("#cache").hide();
						}, 2000);
					});
					return false;
				});
				$("#cache").click(function() {
					$("#cache").hide();
					return false;
				});
			});

			function left(url) {
				leftfra.show(url);
			}

			function ConClass(id) {
				var i, max;
				max = '<?php echo ($i); ?>';
				if (max == false) {
					max = 10;
				}
				var str = $('#d' + id).text() + ' > ';
				for (i = 1; i <= max; i++) {
					if (id == i) {
						$('#d' + i).addClass('thisclass');
					} else {
						$('#d' + i).removeClass('thisclass');
					}
				}
				$('#sub_current').html('');
				$('#current').html(str);
			}
		</script>
	</body>
</html>