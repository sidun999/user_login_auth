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
        
<script type="text/javascript">
	$(document).ready(function() {
		$.formValidator.initConfig({formid: "myform", autotip: true, onerror: function(msg, obj) {
				window.top.art.dialog({content: msg, lock: true, width: 250, height: 100, ok: function() {
						$(obj).focus();
					}});
			}});
		$("#username").formValidator({onshow: "请输入用户名", onfocus: "用户名至少3个字符,最多50个字符", oncorrect: "输入正确"})
				.inputValidator({min: 3, empty: {leftempty: false, rightempty: false, emptyerror: "两边不能有空符号"},
						onerror: "你输入的用户名非法,请确认"})
				.ajaxValidator({
				datatype: "json",
						async: true,
						type: "GET",
						url: "<?php echo U('/Admin/RbacUser/check_username',array('userid'=>$info['id']));?>",
						success: function(data) {
							if (data == "0") {
								return true;
							} else {
								return false;
							}
						},
						error: function() {
							window.top.art.dialog({content: "服务器没有返回数据，可能服务器忙，请重试", lock: true, width: 250, height: 100, ok: function() {
								}});
						},
						onerror: "该用户名已存在，请更换",
						onwait : "用户名校验中..."
				}) <?php if(($info["id"]) > "0"): ?>.defaultPassed()<?php endif; ?>;


				$("#password").formValidator({ <?php if(($info["id"]) > "0"): ?>empty:true,<?php endif; ?>onshow:"请输入密码",onfocus:"至少6个长度",oncorrect:"密码合法"}).inputValidator({min:6,empty:{leftempty:false,rightempty:false,emptyerror:"密码两边不能有空符号"},onerror:"密码不能为空,请确认"});
				$("#repassword").formValidator({ <?php if(($info["id"]) > "0"): ?>empty:true,<?php endif; ?>onshow:"输再次输入密码",onfocus:"至少6个长度",oncorrect:"密码一致"}).inputValidator({min:6,empty:{leftempty:false,rightempty:false,emptyerror:"重复密码两边不能有空符号"},onerror:"重复密码不能为空,请确认"}).compareValidator({desid:"password",operateor:"=",onerror:"两次密码不一致,请确认"});
				$("#remark").formValidator({empty: true, onshow: "请输入你的描述"}).inputValidator({max: 250, onerror: "描述不能超过250个字符,请确认"});

	});
</script>
<?php if(($info["id"]) > "0"): ?><form action="<?php echo U('/Admin/RbacUser/edit');?>" method="post" name="form" id="myform">
	<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
	<?php else: ?>
	<form action="<?php echo U('/Admin/RbacUser/add');?>" method="post" name="form" id="myform"><?php endif; ?>
		<div class="main_title" style="position:fixed;top:0;left:0;right:10px;z-index:9999;">
			<span class="title">
				<?php echo ($tpltitle); ?>后台用户
			</span>
			<input class="titlebutton" type="submit" name="dosubmit" value="保 存" />
			<span class="hr"></span>
		</div>
		<div class="main_content margintop36">
			<table id="main_form" cellpadding="0" cellspacing="0">
                <tr>
                   	<td width="200">用户名称：</td>
                    <td><input type="text" class="medium_input" id="username" name="username" maxlength="50" value="<?php echo ($info["username"]); ?>" <?php if(($info["username"]) == C("SPECIAL_USER")): ?>readonly="readonly"<?php endif; ?> /></td>
                </tr>
                <tr>
					<td>密　　码：</td>
                    <td><input type="password" class="medium_input" id="password" name="password" maxlength="50" value="" /></td>
                </tr>
                <tr>
					<td>确认密码：</td>
                    <td><input type="password" class="medium_input" id="repassword" name="repassword" maxlength="50" value="" /></td>
                </tr>
                <tr>
					<td>用户角色：</td>
                    <td>
						<select name="role">
							<?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $info["role"]): ?>selected=""<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
                </tr>
                <tr>
					<td>用户状态：</td>
                    <td>
						<label><input type="radio" class="radio" value="1" name="status" id="status1" <?php if(($info["status"] == 1) OR ($info['status'] == '') ): ?>checked=""<?php endif; ?> >
							启用</label>
						<label><input type="radio" class="radio" value="0" name="status" id="status2" <?php if(($info["status"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</label>
                    </td>
                </tr>
				<tr>
					<td>用户姓名：</td>
                    <td><input type="text" class="medium_input" value="<?php echo ($info["uname"]); ?>"  name="uname" maxlength="50" value="" /></td>
                </tr>
				<tr>
					<td>联系电话：</td>
                    <td><input type="text" class="medium_input" value="<?php echo ($info["mobile"]); ?>" name="mobile" maxlength="50" value="" /></td>
                </tr>
                <tr>
					<td>备注说明：</td>
                    <td><input type="text" class="medium_input" id="remark" name="remark" value="<?php echo ($info["remark"]); ?>" /></td>
                </tr>
            </table>
            <div class="main_bottom">
				<div class="main_submit">
					<input id="subSubmit" type="submit" name="dosubmit" value="保 存" />
                    <input id="subReset" type="button" onclick="history.back()" value="返 回" />
                </div>
            </div>
        </div>
	</form>

    </div>
</div>
</body>
</html>