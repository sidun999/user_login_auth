<?php

/**
 * 打印输出数据到文件
 * 
 * @param type $data 需要打印的数据
 * @param type $replace 是否要替换打印
 * @param string $pathname 打印输出文件位置
 * @author zoujingli <cxphp@qq.com>
 */
function p($data, $replace = false, $pathname = NULL) {
	is_array($data) or $data = array($data);
	is_null($pathname) && $pathname = RUNTIME_PATH . date('Ymd') . '_print.txt';
	if ($replace) {
		file_put_contents($pathname, print_r($data, TRUE));
	} else {
		file_put_contents($pathname, print_r($data, TRUE), FILE_APPEND);
	}
}

//get处理
function getrr($arr) {
	$rr = $_GET['_URL_'][$arr];
	return $rr;
}

// 数组保存到文件
function arr2file($filename, $arr = '') {
	if (is_array($arr)) {
		$con = var_export($arr, true);
	} else {
		$con = $arr;
	}
	$con = "<?php\nreturn $con;\n?>"; //\n!defined('IN_MP') && die();\nreturn $con;\n
	write_file($filename, $con);
}

function mkdirss($dirs, $mode = 0777) {
	if (!is_dir($dirs)) {
		mkdirss(dirname($dirs), $mode);
		return @mkdir($dirs, $mode);
	}
	return true;
}

function write_file($l1, $l2 = '') {
	$dir = dirname($l1);
	if (!is_dir($dir)) {
		mkdirss($dir);
	}
	return @file_put_contents($l1, $l2);
}

function read_file($l1) {
	return @file_get_contents($l1);
}

// 转换成JS
function t2js($l1, $l2 = 1) {
	$I1 = str_replace(array("\r", "\n"), array('', '\n'), addslashes($l1));
	return $l2 ? "document.write(\"$I1\");" : $I1;
}

//utf8转gbk
function u2g($str) {
	return iconv("UTF-8", "GBK", $str);
}

//gbk转utf8
function g2u($str) {
	return iconv("GBK", "UTF-8//ignore", $str);
}

//获取当前地址栏URL
function http_url() {
	return htmlspecialchars("http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]);
}

//获得某天前的最后一秒时间戳
function xtime($day) {
	$day = intval($day);
	return mktime(23, 59, 59, date("m"), date("d") - $day, date("y"));
}

// 获取相对目录
function get_base_path($filename) {
	$base_path = $_SERVER['PHP_SELF'];
	$base_path = substr($base_path, 0, strpos($base_path, $filename));
	return $base_path;
}

// 获取相对路径
function get_base_url($baseurl, $url) {
	if ("#" == $url) {
		return "";
	} elseif (FALSE !== stristr($url, "http://")) {
		return $url;
	} elseif ("/" == substr($url, 0, 1)) {
		$tmp = parse_url($baseurl);
		return $tmp["scheme"] . "://" . $tmp["host"] . $url;
	} else {
		$tmp = pathinfo($baseurl);
		return $tmp["dirname"] . "/" . $url;
	}
}

//输入过滤 同时去除连续空白字符可参考扩展库的remove_xss
function get_replace_input($str, $rptype = 0) {
	$str = stripslashes($str);
	$str = htmlspecialchars($str);
	$str = get_replace_nb($str);
	return addslashes($str);
}

//去除换行
function get_replace_nr($str) {
	$str = str_replace(array("<nr/>", "<rr/>"), array("\n", "\r"), $str);
	return trim($str);
}

//去除连续空格
function get_replace_nb($str) {
	$str = str_replace("&nbsp;", ' ', $str);
	$str = str_replace("　", ' ', $str);
	$str = ereg_replace("[\r\n\t ]{1,}", ' ', $str);
	return trim($str);
}

//去除所有标准的HTML代码
function get_replace_html($str, $start = 0, $length, $charset = "utf-8", $suffix = false) {
	return msubstr(eregi_replace('<[^>]+>', '', ereg_replace("[\r\n\t ]{1,}", ' ', get_replace_nb($str))), $start, $length, $charset, $suffix);
}

//判断是否属于当前模块
function check_model($modelname) {
	if (strtolower(MODULE_NAME) == $modelname) {
		return 1;
	}
	return 0;
}

// 获取广告调用地址
function get_cms_ads($str, $charset = "utf-8") {
	return '<script type="text/javascript" src="' . C('web_path') . C('web_adsensepath') . '/' . $str . '.js" charset="utf-8"></script>';
}

// 获取标题颜色
function get_color_title($str, $color) {
	if (empty($color)) {
		return $str;
	} else {
		return '<font color="' . $color . '">' . $str . '</font>';
	}
}

// 获取时间颜色
function get_color_date($type = 'Y-m-d H:i:s', $time, $color = 'red') {
	if ($time > xtime(1)) {
		return '<font color="' . $color . '">' . date($type, $time) . '</font>';
	} else {
		return date($type, $time);
	}
}

//生成字母前缀
function get_letter($s0) {
	$firstchar_ord = ord(strtoupper($s0{0}));
	if (($firstchar_ord >= 65 and $firstchar_ord <= 91)or ( $firstchar_ord >= 48 and $firstchar_ord <= 57))
		return $s0{0};
	$s = iconv("UTF-8", "gb2312", $s0);
	$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	if ($asc >= -20319 and $asc <= -20284)
		return "A";
	if ($asc >= -20283 and $asc <= -19776)
		return "B";
	if ($asc >= -19775 and $asc <= -19219)
		return "C";
	if ($asc >= -19218 and $asc <= -18711)
		return "D";
	if ($asc >= -18710 and $asc <= -18527)
		return "E";
	if ($asc >= -18526 and $asc <= -18240)
		return "F";
	if ($asc >= -18239 and $asc <= -17923)
		return "G";
	if ($asc >= -17922 and $asc <= -17418)
		return "H";
	if ($asc >= -17417 and $asc <= -16475)
		return "J";
	if ($asc >= -16474 and $asc <= -16213)
		return "K";
	if ($asc >= -16212 and $asc <= -15641)
		return "L";
	if ($asc >= -15640 and $asc <= -15166)
		return "M";
	if ($asc >= -15165 and $asc <= -14923)
		return "N";
	if ($asc >= -14922 and $asc <= -14915)
		return "O";
	if ($asc >= -14914 and $asc <= -14631)
		return "P";
	if ($asc >= -14630 and $asc <= -14150)
		return "Q";
	if ($asc >= -14149 and $asc <= -14091)
		return "R";
	if ($asc >= -14090 and $asc <= -13319)
		return "S";
	if ($asc >= -13318 and $asc <= -12839)
		return "T";
	if ($asc >= -12838 and $asc <= -12557)
		return "W";
	if ($asc >= -12556 and $asc <= -11848)
		return "X";
	if ($asc >= -11847 and $asc <= -11056)
		return "Y";
	if ($asc >= -11055 and $asc <= -10247)
		return "Z";
	return 0;
}

/**
 * 根据文件后缀获取mime类型
 * @param  string $ext 文件后缀
 * @return string      mime类型
 */
function get_mime_type($ext) {
	static $mime_types = array(
		'apk'		 => 'application/vnd.android.package-archive',
		'3gp'		 => 'video/3gpp',
		'ai'		 => 'application/postscript',
		'aif'		 => 'audio/x-aiff',
		'aifc'		 => 'audio/x-aiff',
		'aiff'		 => 'audio/x-aiff',
		'asc'		 => 'text/plain',
		'atom'		 => 'application/atom+xml',
		'au'		 => 'audio/basic',
		'avi'		 => 'video/x-msvideo',
		'bcpio'		 => 'application/x-bcpio',
		'bin'		 => 'application/octet-stream',
		'bmp'		 => 'image/bmp',
		'cdf'		 => 'application/x-netcdf',
		'cgm'		 => 'image/cgm',
		'class'		 => 'application/octet-stream',
		'cpio'		 => 'application/x-cpio',
		'cpt'		 => 'application/mac-compactpro',
		'csh'		 => 'application/x-csh',
		'css'		 => 'text/css',
		'dcr'		 => 'application/x-director',
		'dif'		 => 'video/x-dv',
		'dir'		 => 'application/x-director',
		'djv'		 => 'image/vnd.djvu',
		'djvu'		 => 'image/vnd.djvu',
		'dll'		 => 'application/octet-stream',
		'dmg'		 => 'application/octet-stream',
		'dms'		 => 'application/octet-stream',
		'doc'		 => 'application/msword',
		'dtd'		 => 'application/xml-dtd',
		'dv'		 => 'video/x-dv',
		'dvi'		 => 'application/x-dvi',
		'dxr'		 => 'application/x-director',
		'eps'		 => 'application/postscript',
		'etx'		 => 'text/x-setext',
		'exe'		 => 'application/octet-stream',
		'ez'		 => 'application/andrew-inset',
		'flv'		 => 'video/x-flv',
		'gif'		 => 'image/gif',
		'gram'		 => 'application/srgs',
		'grxml'		 => 'application/srgs+xml',
		'gtar'		 => 'application/x-gtar',
		'gz'		 => 'application/x-gzip',
		'hdf'		 => 'application/x-hdf',
		'hqx'		 => 'application/mac-binhex40',
		'htm'		 => 'text/html',
		'html'		 => 'text/html',
		'ice'		 => 'x-conference/x-cooltalk',
		'ico'		 => 'image/x-icon',
		'ics'		 => 'text/calendar',
		'ief'		 => 'image/ief',
		'ifb'		 => 'text/calendar',
		'iges'		 => 'model/iges',
		'igs'		 => 'model/iges',
		'jnlp'		 => 'application/x-java-jnlp-file',
		'jp2'		 => 'image/jp2',
		'jpe'		 => 'image/jpeg',
		'jpeg'		 => 'image/jpeg',
		'jpg'		 => 'image/jpeg',
		'js'		 => 'application/x-javascript',
		'kar'		 => 'audio/midi',
		'latex'		 => 'application/x-latex',
		'lha'		 => 'application/octet-stream',
		'lzh'		 => 'application/octet-stream',
		'm3u'		 => 'audio/x-mpegurl',
		'm4a'		 => 'audio/mp4a-latm',
		'm4p'		 => 'audio/mp4a-latm',
		'm4u'		 => 'video/vnd.mpegurl',
		'm4v'		 => 'video/x-m4v',
		'mac'		 => 'image/x-macpaint',
		'man'		 => 'application/x-troff-man',
		'mathml'	 => 'application/mathml+xml',
		'me'		 => 'application/x-troff-me',
		'mesh'		 => 'model/mesh',
		'mid'		 => 'audio/midi',
		'midi'		 => 'audio/midi',
		'mif'		 => 'application/vnd.mif',
		'mov'		 => 'video/quicktime',
		'movie'		 => 'video/x-sgi-movie',
		'mp2'		 => 'audio/mpeg',
		'mp3'		 => 'audio/mpeg',
		'mp4'		 => 'video/mp4',
		'mpe'		 => 'video/mpeg',
		'mpeg'		 => 'video/mpeg',
		'mpg'		 => 'video/mpeg',
		'mpga'		 => 'audio/mpeg',
		'ms'		 => 'application/x-troff-ms',
		'msh'		 => 'model/mesh',
		'mxu'		 => 'video/vnd.mpegurl',
		'nc'		 => 'application/x-netcdf',
		'oda'		 => 'application/oda',
		'ogg'		 => 'application/ogg',
		'ogv'		 => 'video/ogv',
		'pbm'		 => 'image/x-portable-bitmap',
		'pct'		 => 'image/pict',
		'pdb'		 => 'chemical/x-pdb',
		'pdf'		 => 'application/pdf',
		'pgm'		 => 'image/x-portable-graymap',
		'pgn'		 => 'application/x-chess-pgn',
		'pic'		 => 'image/pict',
		'pict'		 => 'image/pict',
		'png'		 => 'image/png',
		'pnm'		 => 'image/x-portable-anymap',
		'pnt'		 => 'image/x-macpaint',
		'pntg'		 => 'image/x-macpaint',
		'ppm'		 => 'image/x-portable-pixmap',
		'ppt'		 => 'application/vnd.ms-powerpoint',
		'ps'		 => 'application/postscript',
		'qt'		 => 'video/quicktime',
		'qti'		 => 'image/x-quicktime',
		'qtif'		 => 'image/x-quicktime',
		'ra'		 => 'audio/x-pn-realaudio',
		'ram'		 => 'audio/x-pn-realaudio',
		'ras'		 => 'image/x-cmu-raster',
		'rdf'		 => 'application/rdf+xml',
		'rgb'		 => 'image/x-rgb',
		'rm'		 => 'application/vnd.rn-realmedia',
		'roff'		 => 'application/x-troff',
		'rtf'		 => 'text/rtf',
		'rtx'		 => 'text/richtext',
		'sgm'		 => 'text/sgml',
		'sgml'		 => 'text/sgml',
		'sh'		 => 'application/x-sh',
		'shar'		 => 'application/x-shar',
		'silo'		 => 'model/mesh',
		'sit'		 => 'application/x-stuffit',
		'skd'		 => 'application/x-koan',
		'skm'		 => 'application/x-koan',
		'skp'		 => 'application/x-koan',
		'skt'		 => 'application/x-koan',
		'smi'		 => 'application/smil',
		'smil'		 => 'application/smil',
		'snd'		 => 'audio/basic',
		'so'		 => 'application/octet-stream',
		'spl'		 => 'application/x-futuresplash',
		'src'		 => 'application/x-wais-source',
		'sv4cpio'	 => 'application/x-sv4cpio',
		'sv4crc'	 => 'application/x-sv4crc',
		'svg'		 => 'image/svg+xml',
		'swf'		 => 'application/x-shockwave-flash',
		't'			 => 'application/x-troff',
		'tar'		 => 'application/x-tar',
		'tcl'		 => 'application/x-tcl',
		'tex'		 => 'application/x-tex',
		'texi'		 => 'application/x-texinfo',
		'texinfo'	 => 'application/x-texinfo',
		'tif'		 => 'image/tiff',
		'tiff'		 => 'image/tiff',
		'tr'		 => 'application/x-troff',
		'tsv'		 => 'text/tab-separated-values',
		'txt'		 => 'text/plain',
		'ustar'		 => 'application/x-ustar',
		'vcd'		 => 'application/x-cdlink',
		'vrml'		 => 'model/vrml',
		'vxml'		 => 'application/voicexml+xml',
		'wav'		 => 'audio/x-wav',
		'wbmp'		 => 'image/vnd.wap.wbmp',
		'wbxml'		 => 'application/vnd.wap.wbxml',
		'webm'		 => 'video/webm',
		'wml'		 => 'text/vnd.wap.wml',
		'wmlc'		 => 'application/vnd.wap.wmlc',
		'wmls'		 => 'text/vnd.wap.wmlscript',
		'wmlsc'		 => 'application/vnd.wap.wmlscriptc',
		'wmv'		 => 'video/x-ms-wmv',
		'wrl'		 => 'model/vrml',
		'xbm'		 => 'image/x-xbitmap',
		'xht'		 => 'application/xhtml+xml',
		'xhtml'		 => 'application/xhtml+xml',
		'xls'		 => 'application/vnd.ms-excel',
		'xml'		 => 'application/xml',
		'xpm'		 => 'image/x-xpixmap',
		'xsl'		 => 'application/xml',
		'xslt'		 => 'application/xslt+xml',
		'xul'		 => 'application/vnd.mozilla.xul+xml',
		'xwd'		 => 'image/x-xwindowdump',
		'xyz'		 => 'chemical/x-xyz',
		'zip'		 => 'application/zip'
	);

	return isset($mime_types[$ext]) ? $mime_types[$ext] : 'application/octet-stream';
}

/**
 * 判断是否为微信内置浏览器
 * @return boolean
 */
function is_weixin() {
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
		return true;
	}
	return false;
}

/**
 * 判断是否为手机浏览器
 * @return boolean
 */
function is_wap() {
	$regex_match = "/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
	$regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
	$regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
	$regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
	$regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
	$regex_match.=")/i";

	return isset($_SERVER['HTTP_X_WAP_PROFILE']) or
			isset($_SERVER['HTTP_PROFILE']) or
			preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}

/**
 * 计算两个日期之间的时间
 * @param string $start_date
 * @param string $end_date
 * @return array
 */
function date_interval($start_date, $end_date) {
	//检查两个日期大小，默认前小后大，如果前大后小则交换位置以保证前小后大
	if (strtotime($start_date) > strtotime($end_date))
		list($start_date, $end_date) = array($end_date, $start_date);
	$start = strtotime($start_date);
	$stop = strtotime($end_date);
	$extend = ($stop - $start) / 86400;
	$result['extends'] = $extend;

	$result['days'] = $extend;
	$result['weeks'] = floor($extend / 7);
	$result['months'] = round($extend / 30);
	$result['years'] = floor($extend / 365);
	/*
	  if($extend < 7){                //如果小于7天直接返回天数
	  $result['daily'] = $extend;
	  }elseif($extend <= 31){        //小于28天则返回周数，由于闰年2月满足了
	  if($stop == strtotime($a.'+1 month')){
	  $result['monthly'] = 1;
	  }else{
	  $w = floor($extend/7);
	  $d = ($stop-strtotime($a.'+'.$w.' week'))/86400;
	  $result['weekly']  = $w;
	  $result['daily']   = $d;
	  }
	  }else{
	  $y = floor($extend/365);
	  if($y >= 1){                //如果超过一年
	  $start = strtotime($a . '+' . $y . 'year');
	  $a     = date('Y-m-d', $start);
	  //判断是否真的已经有了一年了，如果没有的话就开减
	  if($start > $stop){
	  $a = date('Y-m-d', strtotime($a . '-1 month'));
	  $m = 11;
	  $y--;
	  }
	  $extend = ($stop-strtotime($a))/86400;
	  }
	  if(isset($m)){
	  $w = floor($extend/7);
	  $d = $extend-$w*7;
	  }else{
	  $m = isset($m)?$m:round($extend/30);
	  $a = date('Y-m-d', $start);
	  $stop >= strtotime($a . '+' . $m . 'month') ? $m : $m--;
	  if($stop >= strtotime($a . '+' . $m . 'month')){
	  $d = $w = ($stop-strtotime($a.'+'.$m.'month'))/86400;
	  $w = floor($w/7);
	  $d = $d-$w*7;
	  }
	  }
	  $result['yearly']  = $y;
	  $result['monthly'] = $m;
	  $result['weekly']  = $w;
	  $result['daily']   = isset($d) ? $d : null;
	  } */
	return array_filter($result);
}

/**
 * 数字转中文数字
 * @param number $num
 * @param string $mode
 * @return string
 */
function ch_num($num, $mode = true) {
	$char = array("〇", "一", "二", "三", "四", "五", "六", "七", "八", "九");
	$dw = array("", "十", "百", "千", "", "万", "亿", "兆");
	$dec = "点";
	$retval = "";

	if ($mode)
		preg_match_all("/^0*(/d*)/.?(/d*)/", $num, $ar);
	else
		preg_match_all("/(/d*)/.?(/d*)/", $num, $ar);

	if ($ar[2][0] != "")
		$retval = $dec . ch_num($ar[2][0], false); //如果有小数，先递归处理小数 

	if ($ar[1][0] != "") {
		$str = strrev($ar[1][0]);
		for ($i = 0; $i < strlen($str); $i++) {
			$out[$i] = $char[$str[$i]];
			if ($mode) {
				$out[$i] .= $str[$i] != "0" ? $dw[$i % 4] : "";
				if ($str[$i] + $str[$i - 1] == 0)
					$out[$i] = "";
				if ($i % 4 == 0)
					$out[$i] .= $dw[4 + floor($i / 4)];
			}
		}
		$retval = join("", array_reverse($out)) . $retval;
	}
	return $retval;
}

/**
 * 获取汉字首拼音
 * @param string $s0
 * @return string|NULL
 */
function getfirstchar($s0) {
	$fchar = ord($s0{0});
	if ($fchar >= ord("A") and $fchar <= ord("z"))
		return strtoupper($s0{0});
	$s1 = iconv("UTF-8", "gb2312", $s0);
	$s2 = iconv("gb2312", "UTF-8", $s1);
	if ($s2 == $s0) {
		$s = $s1;
	} else {
		$s = $s0;
	}
	$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	if ($asc >= -20319 and $asc <= -20284)
		return "A";
	if ($asc >= -20283 and $asc <= -19776)
		return "B";
	if ($asc >= -19775 and $asc <= -19219)
		return "C";
	if ($asc >= -19218 and $asc <= -18711)
		return "D";
	if ($asc >= -18710 and $asc <= -18527)
		return "E";
	if ($asc >= -18526 and $asc <= -18240)
		return "F";
	if ($asc >= -18239 and $asc <= -17923)
		return "G";
	if ($asc >= -17922 and $asc <= -17418)
		return "H";
	if ($asc >= -17417 and $asc <= -16475)
		return "J";
	if ($asc >= -16474 and $asc <= -16213)
		return "K";
	if ($asc >= -16212 and $asc <= -15641)
		return "L";
	if ($asc >= -15640 and $asc <= -15166)
		return "M";
	if ($asc >= -15165 and $asc <= -14923)
		return "N";
	if ($asc >= -14922 and $asc <= -14915)
		return "O";
	if ($asc >= -14914 and $asc <= -14631)
		return "P";
	if ($asc >= -14630 and $asc <= -14150)
		return "Q";
	if ($asc >= -14149 and $asc <= -14091)
		return "R";
	if ($asc >= -14090 and $asc <= -13319)
		return "S";
	if ($asc >= -13318 and $asc <= -12839)
		return "T";
	if ($asc >= -12838 and $asc <= -12557)
		return "W";
	if ($asc >= -12556 and $asc <= -11848)
		return "X";
	if ($asc >= -11847 and $asc <= -11056)
		return "Y";
	if ($asc >= -11055 and $asc <= -10247)
		return "Z";
	return null;
}

/**
 * 获取文字首拼音字符串
 * @param string $zh
 */
function pinyin($zh) {
	$ret = "";
	$s1 = iconv("UTF-8", "gb2312", $zh);
	$s2 = iconv("gb2312", "UTF-8", $s1);
	if ($s2 == $zh) {
		$zh = $s1;
	}
	for ($i = 0; $i < strlen($zh); $i++) {
		$s1 = substr($zh, $i, 1);
		$p = ord($s1);
		if ($p > 160) {
			$s2 = substr($zh, $i++, 2);
			$ret .= getfirstchar($s2);
		} else {
			$ret .= $s1;
		}
	}
	return $ret;
}

/* 字符串截取，支持中文和其他编码
  +----------------------------------------------------------
 * @static
 * @access public
  +----------------------------------------------------------
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
  +----------------------------------------------------------
 * @return string
  +----------------------------------------------------------
 */

function cn_msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists("mb_substr")) {
		if ($suffix)
			return mb_substr($str, $start, $length, $charset) . "...";
		else
			return mb_substr($str, $start, $length, $charset);
	}
	elseif (function_exists('iconv_substr')) {
		if ($suffix)
			return iconv_substr($str, $start, $length, $charset) . "...";
		else
			return iconv_substr($str, $start, $length, $charset);
	}
	$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$slice = join("", array_slice($match[0], $start, $length));
	if ($suffix)
		return $slice . "…";
	return $slice;
}
