/**
 * 日期选择控件
 * @returns {undefined}
 */
~(function() {
	jQuery.fn.date = function() {
		this.map(function() {
			var obj = this;
			var yearSelect, monthSelect, daySelect, closeBtn, br;
			var displayContainer = document.createElement('div');
			displayContainer.innerHTML = '<br />';
			with (displayContainer.style) {
				position = 'fixed';
				bottom = top = 0;
				padding = '5%';
				width = '100%';
				textAlign = 'center';
				lineHeight = '3em';
				zIndex = '99999';
				background = 'rgba(0,0,0,.8)';
			}
			if (obj.value) {
				var curDate = new Date(Date.parse(obj.value));
				curDate = new Date(curDate.getFullYear(), curDate.getMonth() + 1, curDate.getDate());
			} else {
				var curDate = new Date();
			}
			function getYearRang() {
				var date = new Date().getFullYear();
				return [date, date - 100];
			}
			function getMonthRang() {
				return [12, 1];
			}
			function getDayRang() {
				return [new Date(curDate.getFullYear(), curDate.getMonth(), 0).getDate(), 1];
			}
			function createSelect(rang, selected) {
				var select = document.createElement('select');
				for (var i = rang[0]; i >= rang[1]; i--) {
					var option = document.createElement('option');
					with (option.style) {
						padding = 0;
						margin = 0;
						fontSize = '12px';
						height = '1em';
						lineHeight = '1em';
					}
					option.value = option.innerHTML = i;
					if (selected === i)
						option.selected = true;
					select.appendChild(option);
				}
				select.onchange = _change;
				with (select.style) {
					width = '30%';
					display = 'inline-block';
					height = '30px';
					lineHeight = '1em';
					textAlign = 'center';
					zoom = 1;

				}
				return select;
			}
			function init() {
				try {
					displayContainer.removeChild(yearSelect);
					displayContainer.removeChild(monthSelect);
					displayContainer.removeChild(daySelect);
					displayContainer.removeChild(br);

					displayContainer.removeChild(closeBtn);
				} catch (e) {
				}
				yearSelect = createSelect(getYearRang(), curDate.getFullYear());
				monthSelect = createSelect(getMonthRang(), curDate.getMonth());
				daySelect = createSelect(getDayRang(), curDate.getDate());
				displayContainer.appendChild(yearSelect);
				displayContainer.appendChild(monthSelect);
				displayContainer.appendChild(daySelect);
				displayContainer.appendChild(br);
				displayContainer.appendChild(closeBtn);
				yearSelect.focus();
			}
			function _change() {
				var y = yearSelect.value;
				var m = monthSelect.value;
				var d = daySelect.value;
				curDate = new Date(y, m, d);
				obj.value = curDate.getFullYear() + '-' + (curDate.getMonth()) + '-' + curDate.getDate()
				init();
			}
			br = document.createElement('br');
			closeBtn = document.createElement('button');
			closeBtn.innerHTML = '确 认';
			closeBtn.className = 'btn btn-sm btn-blue';

			with (closeBtn.style) {
				width = '150px';
				marginTop = '40px';
				padding = '10px';
				fontSize = '16px';
				fontWeight = '7000';
			}
			closeBtn.onclick = function() {
				_change();
				document.body.removeChild(displayContainer);
			};
			this.onclick = function() {
				init();
				document.body.appendChild(displayContainer);
				yearSelect.focus();
			};
		});
	};
})(jQuery);