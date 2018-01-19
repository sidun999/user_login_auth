//js 页面模板
var Template = {
	filter : function(array) {
		var temp = [];
		for (var i = 0, l = array.length; i < l; i++) {
			!(/#>/.test(array[i]) || array[i] === undefined) && temp.push(array[i]);
		}
		return temp;
	},
	parse : function(id) {
		var temp, body = [];
		var tpl = document.getElementById(id).text;
		tpl = tpl
				.replace(/[\r\t\n]/g, '')
				.replace(/\"/g, '\\\"')
				.replace(/\{\{/g, '\"+(')
				.replace(/\}\}/g, '||"")+\"');
		temp = tpl.split(/(?=<#)|(#>)/);
		temp = this.filter(temp);
		for (var i = 0, l = temp.length; i < l; i++) {
			if (new RegExp('^<#').test(temp[i])) {
				body.push(temp[i].replace(/^<#\s*(.*)/g,'$1\n').replace(/\\n/g,''));
			} else {
				body.push('\ttemp.push(\"' + temp[i].replace(/\n|\t/g,'') + '\");\n');
			}
		}
		return body.join('');
	},
	compile : function(id, data) {
		var script = 'var temp=[];\n with(data){\n' + this.parse(id) + '\n}\n var compiled=temp.join("");';
		eval(script);
		return compiled;
	}
}

// parse date
function getDate(tm) {
	var date = new Date(parseInt(tm) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");
	return date.split(' ')[0];
}

// parse json string
function getJson(data) {
	try {
		return eval('(' + data + ')');
	} catch(e) {
		alert('parse json error：' + e);
		return false;
	}
}

// parse xml string
function getXml(xml) {
	var xmlStrDoc = null;
	if (window.DOMParser) { // Mozilla Explorer
		parser = new DOMParser();
		xmlStrDoc = parser.parseFromString(xml, "text/xml");
	} else { // Internet Explorer
		xmlStrDoc = new ActiveXObject("Microsoft.XMLDOM");
		xmlStrDoc.async = "false";
		xmlStrDoc.loadXML(xml);
	}
	return xmlStrDoc;
}