~(function(w) {

	var validate = function() {
		validate.init();
		this.$forms = null;
	};

	/**
	 * 消息显示
	 * @param {type} $obj
	 * @param {type} type
	 * @returns {undefined}
	 */
	validate.show = function($obj, type) {
		$obj.data('placement', 'bottom');
		if (type === 'error') {
			$obj.tooltip('show');
			$obj.data('check-success', false);
			$obj.css('borderColor', 'red');
		} else if (type === 'success') {
			$obj.tooltip('destroy');
			$obj.data('check-success', true);
			$obj.css('borderColor', 'green');
		} else {
			$obj.tooltip('destroy');
			$obj.data('check-success', true);
			$obj.css('borderColor', '#ccc');
		}
	};

	/**
	 * 表单初始化
	 * @returns {undefined}
	 */
	validate.init = function() {
		this.$forms = $('form');
		this.$forms.each(function(i, form) {
			var $form = $(form);
			/* 如里Form已经被实例 直接返回 */
			if ($form.data('validate')) {
				return;
			}
			$form.data('validate', true).data('check-success', true);
			for (j = 0; j < form.elements.length; j++) {

				var $in = $(form.elements[j]);

				$in.data('required', $in.attr('required')).removeAttr('required');
				$in.data('pattern', $in.attr('pattern')).removeAttr('pattern');

				var pattern = $in.data("pattern");
				var required = $in.data("required");

				/* 如果是必填项 */
				if (!!required && !pattern) {
					$in.data("pattern", ".+");
				}

				/* 表格需要检验 */
				if (pattern) {
					$in.data('title', $in.attr('title')).attr('title', '');
					$in.on('keyup', validate.doChange);
					$form.data('check-success', false);
				}

			}
			$form.on('submit', validate.doSubmit);

		});

	};

	/**
	 * 表单元素输入变动监听
	 * @returns {undefined}
	 */
	validate.doChange = function() {
		var $in = $(this);
		var pattern = $in.data("pattern");
		if (pattern === undefined) {
			pattern = '';
		}
		var value = $in.val();
		var required = $in.data("required");
		if (required === undefined) {
			required = '';
		}

		switch (pattern) {
			case 'email':
				pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)+$/i;
				break;
			case 'qq':
				pattern = /^[1-9][0-9]{4,}$/i;
				break;
			case 'id':
				pattern = /^\d{15}(\d{2}[0-9x])?$/i;
				break;
			case 'ip':
				pattern = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/i;
				break;
			case 'zip':
				pattern = /^\d{6}$/i;
				break;
			case 'mobi':
				pattern = /^[0-9]{8,20}$/;
				break;
			case 'phone':
				pattern = /^((\d{3,4})|\d{3,4}-)?\d{7,8}(-\d+)*$/i;
				break;
			case 'url':
				pattern = /^[a-zA-z]+:\/\/(\w+(-\w+)*)(\.(\w+(-\w+)*))+(\/?\S*)?$/i;
				break;
			case 'date':
				pattern = /^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/i;
				break;
			case 'datetime':
				pattern = /^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29) (?:(?:[0-1][0-9])|(?:2[0-3])):(?:[0-5][0-9]):(?:[0-5][0-9])$/i;
				break;
			case 'int':
				pattern = /^\d+$/i;
				break;
			case 'float':
				pattern = /^\d+\.?\d*$/i;
				break;
			default :
				try {
					pattern = eval('/' + pattern + '/i');
				} catch (e) {
					validate.show($in, 'error');
					return false;
				}
		}

		// 如果设置 required 属性 必需验证正则
		if (!!required && (value === '' || value.search(pattern) === -1)) {
			validate.show($in, 'error');
		} else if (!required && value !== '' && value.search(pattern) === -1) {
			validate.show($in, 'error');
		} else if (required === null && value !== '') {
			validate.show($in, 'success');
		} else {
			validate.show($in);
		}
	};

	/**
	 * 数据提交监听
	 * 
	 * @returns {Boolean}
	 */
	validate.doSubmit = function() {
		var $form = $(this).data('check-success', true);
		for (var i = 0; i < this.elements.length; i++) {
			var $ele = $(this.elements[i]);
			$($ele).on('keyup', validate.doChange);
			$($ele).trigger('keyup');
			if ($ele.data('check-success') === false) {
				$form.data('check-success', false);
				$ele.focus();
				break;
			}
		}

		if (!$form.data('check-success')) {
			return false;
		}

		var callbackName = $(this).data('callback');
		callbackName = callbackName || 'validate.autoShow(data)';
		if (!!$form.data('ajax')) {
			validate.lockScreen();
			$.post($form.attr('action'), $form.serialize(), function(data) {
				validate.unLockScreen();
				eval(callbackName);
			}, 'JSON');
			return false;
		} else {
			eval(callbackName);
		}

	};
	validate.lockScreen = function(msg) {
		msg = msg || '数据提交中,请稍候...';
		$('<div id="lock-screen" style="padding:80px 10px;text-align:center;position:fixed;left:0;right:0;top:0;bottom:0;background:rgba(180,180,180,.5)"><h3>' + msg + '</h3></div>').appendTo('body');
	};
	validate.unLockScreen = function() {
		$('#lock-screen').remove();
	};
	validate.autoShow = function(data) {
		if (data.status === 1) {
			//已成功了
			$('body').html('<div class="container"><div class="nav bg_blue ptitle text-center">温馨提示</div><div class="padd_50 well"><p>' + data.info || '数据提交成功' + '</p></div></div>');
			setTimeout(function() {
				if (data.url) {
					window.location.href = data.url;
				} else {
					location.reload();
				}
			}, 2000);
		} else {
			//失败了
			alert(data.info || '数据提交失败，请稍候再试！');
		}
	};
	w.validate = validate;
	setInterval(validate.init, 500);
})(this);
