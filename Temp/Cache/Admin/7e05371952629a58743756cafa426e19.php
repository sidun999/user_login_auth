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
				系统环境检测
			</span>
    </div>
    <div class="main_content margintop36">
        <table id="main_form" cellpadding="0" cellspacing="0">
            <tr>
                <td width="150">主机名 (IP：端口)：</td>
                <td><?php echo $_SERVER['SERVER_NAME'].' ('.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].')' ?></td>
                <td width="150">程序目录：</td>
                <td><?php echo (C("web_path")); ?></td>
            </tr>
            <tr>
                <td>Web服务器：</td>
                <td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
                <td>PHP 运行方式：</td>
                <td><?php echo PHP_SAPI ?></td>
            </tr>
            <tr>
                <td>PHP版本：</td>
                <td><?php echo PHP_VERSION ?></td>
                <td>MySQL 版本：</td>
                <td><?php if(function_exists("mysql_close")) { echo mysql_get_client_info(); } else { echo '不支持'; } ?></td>
            </tr>
            <tr>
                <td>GD库版本：</td>
                <td><?php if(function_exists('gd_info')) { $gd=gd_info();echo $gd['GD Version']; } else { echo "不支持"; } ?></td>
                <td>最大上传限制：</td>
                <td><?php if(ini_get('file_uploads')) { echo ini_get('upload_max_filesize'); } else { echo '<span style="color:red">Disabled</span>'; } ?></td>
            </tr>
            <tr>
                <td>最大执行时间：</td>
                <td><?php echo ini_get('max_execution_time') ?>秒</td>
                <td>采集函数检测：</td>
                <td><?php if(ini_get('allow_url_fopen')) { echo '支持'; } else { echo '<span style="color:red">不支持</span>'; } ?></td>
            </tr>
        </table>
    </div>

    </div>
</div>
</body>
</html>