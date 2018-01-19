<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理登陆</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #1D3647;
}
.login_txt{color:#6d6e70;}
.inputbox{width:150px; height:22px; line-height:22px;float:left;}
-->
</style>
<script>
function loginok(form){
  if (form.login_name.value==""){
    alert("用户名不能为空！");
    form.login_name.focus();
    return (false);
  }
  if (form.login_pwd.value==""){
    alert("密码不能为空！");
    form.login_pwd.focus();
    return (false);
  }
  if (form.verify.value==""){
    alert("验证码不能为空！");
    form.verify.focus();
    return (false);
  }
  return (true);
}

if(self!=top){
  top.location=self.location;
}
</script>
</head>
<body style="background:url(__PUBLIC__/Admin/images/bg.png);" onload="document.getElementById('login_name').focus();">
	<div style="width:100%;height:159px;background:#fff url(__PUBLIC__/Admin/images/header_bg.png);">
    
    </div>
    <div style="width:230px; margin:40px auto;">
    <form name="cms" action="<?php echo U('Admin/Login/checkLogin');?>" method="post" onSubmit="return loginok(this)">
        <table cellSpacing="0" cellPadding="0" width="100%" border="0" height="143" id="table212">
          <tr>
            <td width="80" height="38"><span class="login_txt">管理员：</span></td>
            <td width="150" colspan="2"><input name="username" id="login_name" class="inputbox" value="admin" size="20"></td>
          </tr>
          <tr>
            <td height="35"><span class="login_txt"> 密　码：</span></td>
            <td colspan="2"><input class="inputbox" type="password" size="20" name="password" id="login_pwd" value="admin@999"></td>
          </tr>
          <tr>
            <td height="35" ><span class="login_txt">验证码：</span></td>
            <td colspan="2">
            	<input class="inputbox" style="width:50px;" name="verify" id="verify" type="text" value="" maxLength="4">
            	<img id="verifyImg" SRC="<?php echo U('Admin/Public/verify');?>" onclick='this.src=this.src+"?"+Math.random()' BORDER="0" ALT="点击刷新验证码" style="cursor:pointer;width:62px;height:22px;margin:3px 0 0 5px;float:left;" align="absmiddle">
            </td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td><input name="Submit" type="submit" class="button" id="Submit" value="登 陆"> </td>
            <td><input name="cs" type="reset" class="button" id="cs" value="取 消"></td>
          </tr>
        </table>
        <br>
    </form>
    </div>
    <div style="text-align: center; position: absolute; bottom: 20px; width:100%; font-size: 10px; color: #171819;">为了您更好的体验本系统，建议您使用IE8.0浏览器，或者使用chrome,firefox等浏览器</div>
</body>
</html>