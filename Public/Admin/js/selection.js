	var relPressSel,pressSel;
	
	// 判断select选项中 是否存在Value="paraValue"的Item        
	function selectIsExitItem(objSelect, objItemValue) {
	    var isExit = false;
	    for (var i = 0; i < objSelect.options.length; i++) {
	        if (objSelect.options[i].value == objItemValue) {
	            isExit = true;
	            break;
	        }
	    }    
	    return isExit;
	}
	// 向select选项中 加入一个Item  
	function addItemToSelect(objSelect, objItemText, objItemValue, objItemTitle) {
	    //判断是否存在
	    if (selectIsExitItem(objSelect, objItemValue)) {
	        alert("该Item的Value值已经存在");
	    } else {
	        var varItem = new Option(objItemText, objItemValue);
	        objSelect.options.add(varItem);
	        if (objItemTitle) {
	        	var i = objSelect.options.length-1;
	        	objSelect.options[i].title = objItemTitle;
	        }
	        return true;
	    }
	}
	// 获得select选中的项
	function getSelectedItemFromSelect(objSelect) {
		var items = [];
	    var length = objSelect.options.length - 1;
	    for (var i = 0; i <= length; i++) {
	        if (objSelect[i].selected == true) {
	            items[items.length] = {
	            	value : objSelect.options[i].value,
	            	text : objSelect.options[i].text
	            }
	        }
	    }
		if (items.length == 1) {
			return items[0];
		} else if(items.length == 0) {
			return false;
		} else {
			return items;
		}
	}
	// 删除select中选中的项    
	function removeSelectedItemFromSelect(objSelect) {
	    var length = objSelect.options.length - 1;
	    for (var i = length; i >= 0; i--) {
	        if (objSelect[i].selected == true) {
	            objSelect.options[i] = null;
	        }
	    }
	}
	// 改变select选中的项
	function chgItem(target, selected){
		var child = getSelectedItemFromSelect(selected);
		if(!child) return false;
		if (!child.length) {
			addItemToSelect(target, child.text, child.value);
		} else {
			for (k in child) {
				addItemToSelect(target, child[k].text, child[k].value);
			}
		}
		removeSelectedItemFromSelect(selected);
	}
	// 获取选中项的值
	function getSelIds(selected){
		var child = getSelectedItemFromSelect(selected);
		if(!child.length) {
			child = child.value;
		} else {
			var c = [];
			for (k in child) {
				c[c.length] = child[k].value;
			}
			child = c;
		}
		return child;
	}