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
        
<div class="main_title" style="position:fixed;top:0;left:0;right:10px;z-index:9999;">
	<span class="title">
		用户管理
	</span>
	<input id="subSearch" type="button" onclick="location.href = '<?php echo U('/Admin/RbacUser/add/');?>'" value="添加用户" />
	<span class="hr"></span>
</div>

<div class="main_content margintop36">
	<table id="main_table" cellpadding="0" cellspacing="0" >
		<thead>
			<tr>
				<td width="40">ID</td>
				<td width="80">用户名称</td>
				<td width="100">用户姓名</td>
				<td width="80">角色名称</td>
				<td width="90">最后登录IP</td>
				<td width="130">最后登录时间</td>
				<td width="30">状态</td>
				<td class="last">管理操作</td>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($vo["id"]); ?></td>
				<td ><?php echo ($vo["username"]); ?></td>
				<td ><?php echo ($vo["uname"]); ?></td>
				<td ><?php echo ($role[$vo['role']]); ?></td>
				<td><?php echo ($vo["last_login_ip"]); ?></td>
				<td><?php echo get_color_date('Y-m-d H:i:s', $vo['last_login_time']);?></td>
				<td><?php if(($vo["status"]) == "1"): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?> 
			</td>
			<td class="last">
				<a href="<?php echo U('/Admin/RbacUser/edit/',array('id'=>$vo['id']));?>" title="编辑">编辑</a>
				<?php if(($vo["username"]) == C("SPECIAL_USER")): else: ?><a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/RbacUser/del/',array('id'=>$vo['id']));?>', '确定删除该用户吗?')" title="删除">删除</a><?php endif; ?>
			</td>
			</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
		</tbody>
	</table>

	<div class="main_bottom">
		<ul class="page">
			<?php echo ($page); ?>
		</ul>
	</div>
</div>

    </div>
</div>
</body>
</html>