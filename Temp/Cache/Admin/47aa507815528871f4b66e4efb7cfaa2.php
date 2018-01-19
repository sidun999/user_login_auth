<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
        "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (($tpl["pageTitle"])?($tpl["pageTitle"]):"主体"); ?></title>
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/Admin/css/style.css" />
    
    
    <script type="text/javascript" src="__PUBLIC__/Admin/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Admin/js/function.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Admin/js/checkbox.js"></script>

    
</head>
<body>
<div id="right_main" style="">
    <div class="main_box">
        
<div class="main_title" style="position:fixed;top:0;left:0;right:10px;z-index:9999;">
	<span class="title">
		后台菜单(节点)管理
	</span>
	<input id="subSearch" type="button" onclick="location.href = '<?php echo U('/Admin/RbacNode/add');?>'" value="添加菜单(节点)" />
	<span class="hr"></span>
</div>

<form action="<?php echo U('/Admin/RbacNode/sort');?>" method="post" name="myform" id="myform">
	<div class="main_content margintop36">
		<table id="main_table" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!-- <td width="20"><input type="checkbox" value="" id="check_all" /></td> -->
					<td width="50">排序权重</td>
					<td width="40">ID</td>
					<td>菜单名称</td>
					<td width="50">类型</td>
					<td width="40">状态</td>
					<td width="50">显示</td>
					<td width="200" class="last">管理操作</td>
				</tr>
			</thead>
			<tbody>
				<?php echo ($html_tree); ?>
			</tbody>
		</table>

		<div class="main_bottom">
			<a href="javascript:;" onclick="myform.submit()" class="main_button">排序</a>
		</div>
	</div>
</form>

    </div>
</div>
</body>
</html>