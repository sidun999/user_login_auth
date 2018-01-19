<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
        "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (($tpl["pageTitle"])?($tpl["pageTitle"]):"主体"); ?></title>
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/Admin/css/style.css" />
    
    
    
</head>
<body>
<div id="right_main" style="">
    <div class="main_box">
        
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Admin/js/function.js"></script>
<script type="text/javascript">
//权限设置
	function setting_access(url, name) {
		window.top.art.dialog.open(url, {title: name + '权限设置', width: 600, height: 500});
	}
//内容管理权限设置
	function setting_cat_access(url, name) {
		window.top.art.dialog.open(url, {title: name + '内容管理权限设置', width: 600, height: 500});
	}
</script>
<div class="main_title" style="position:fixed;top:0;left:0;right:10px;z-index:9999;">
	<span class="title">
		后台角色管理
	</span>
	<input id="subSearch" type="button" onclick="location.href = '<?php echo U('/Admin/RbacUser/role_add');?>'" value="添加角色" />
	<span class="hr"></span>
</div>

<form action="<?php echo U('/Admin/RbacUser/role_sort');?>" method="post" name="myform" id="myform">
	<div class="main_content margintop36">
		<table id="main_table" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<td width="40">ID</td>
                    <td width="80">排序</td>
					<td width="100">角色名称</td>
					<td width="200">角色描述</td>
					<td width="40">状态</td>
					<td class="last">管理操作</td>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
                    <td><input type='text' value='<?php echo ($vo["sort"]); ?>' size='3' name='sort[<?php echo ($vo["id"]); ?>]'></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["remark"]); ?></td>
					<td><?php if(($vo["status"]) == "1"): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?> 
				</td>
				<td class="last">
					<a href="javascript:setting_access('<?php echo U('/Admin/RbacUser/access/',array('roleid'=>$vo['id']));?>', '<?php echo ($vo["name"]); ?>')">权限设置</a>
					<a href="<?php echo U('/Admin/RbacUser/role_edit/',array('id'=>$vo['id']));?>">修改</a>
					<a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/RbacUser/role_del/',array('id'=>$vo['id']));?>', '确定删除该角色吗?')">删除</a>
				</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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