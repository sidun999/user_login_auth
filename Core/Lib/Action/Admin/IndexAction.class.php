<?php

/**
 * 系统管理后台入口
 * 
 */
class IndexAction extends AdminAction {

	public function _initialize() {
		parent::_initialize();  //RBAC 验证接口初始化
	}

	public function index() {
		$this->display();
	}

	public function left() {
		$pid = $this->_get('id', intval, 14); //选择子菜单
		$NodeDB = D('RbacNode');
		$datas = $this->left_child_menu($pid);

		$parent_info = $NodeDB->getNode(array('id' => $pid), 'title');
		$sub_menu_html = '';
		foreach ($datas as $key => $_value) {
			$sub_array = $this->left_child_menu($_value['id']);
			$sub_menu_html .= "<li><a href=\"#\" class=\"active\" show='0'>{$_value[title]}</a><ul class=\"menu_ul_second\" style=\"display:none;\">";
			if (is_array($sub_array)) {
				foreach ($sub_array as $value) {
					$href = empty($value['data']) ? 'javascript:void(0)' : $value['data'];
					$sub_menu_html .= "<li><a id='a_{$value[id]}' href=\"{$href}\" target=\"main\"><span></span>{$value[title]}</a></li>";
				}
			}
			$sub_menu_html .= '</ul></li>';
		}

		$this->assign('sub_menu_title', $parent_info['title']);
		$this->assign('sub_menu_html', $sub_menu_html);

		$this->display();
	}

	/**
	 * 按父ID查找菜单子项
	 * @param integer $parentid   父菜单ID  
	 * @param integer $with_self  是否包括他自己
	 */
	private function left_child_menu($pid, $with_self = 0) {
		$pid = intval($pid);

		$username = session('username'); // 用户名
		$roleid = session('roleid');   // 角色ID
		$result = '';
		if ($username == C('SPECIAL_USER')) {  //如果是无视权限限制的用户，则获取所有主菜单
			//$sql = "SELECT `id`,`data`,`title` FROM `tp_node` WHERE ( `status` =1 AND `display`=2 AND `level` <>1 AND `pid`=$pid ) ORDER BY sort DESC";
			$result = D('RbacNode')->field('`id`,`data`,`title`')
					->where('`status` =1 AND `display`=2 AND `level` <>1 AND `pid`=%d', $pid)
					->order('sort DESC')
					->select();
		} else {
			//$sql = "SELECT `tp_node`.`id` as `id` , `tp_node`.`data` as `data`, `tp_node`.`title` as `title` FROM `tp_node`,`tp_access` WHERE `tp_node`.id = `tp_access`.node_id AND `tp_access`.role_id = $roleid AND `tp_node`.`pid` =$pid AND `tp_node`.`status` =1 AND `tp_node`.`display` =2 AND `tp_node`.`level` <>1 ORDER BY `tp_node`.sort DESC";
			$result = M()->table(array(C('DB_PREFIX') . 'rbac_node' => 'n', C('DB_PREFIX') . 'rbac_access' => 'a'))
					->field('`n`.`id` as `id` , `n`.`data` as `data`, `n`.`title` as `title`')
					->where('`n`.id = `a`.node_id AND `a`.role_id =%d AND `n`.`pid` =%d AND `n`.`status` =1 AND `n`.`display` =2 AND `n`.`level` <>1', $roleid, $pid)
					->order('`n`.sort DESC')
					->select();
            //echo M()->getLastSql();exit;
		}
		//$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		//$result = $Model->query($sql);
		$result = (Array) $result;

		if ($with_self) {
			$NodeDB = D('RbacNode');
			$result2[] = $NodeDB->getNode(array('id' => $pid), `id`, `data`, `title`);
			$result = array_merge($result2, $result);
		}
		return $result;
	}

	public function top() {
		$username = session('username'); // 用户名
		$roleid = session('roleid');   // 角色ID
		$result = '';
		if ($username == C('SPECIAL_USER')) {  //如果是无视权限限制的用户，则获取所有主菜单
			//$sql = 'SELECT `id`,`title` FROM `tp_node` WHERE ( `status` =1 AND `display`=1 AND `level`<>1 ) ORDER BY sort DESC';
			$result = D('RbacNode')->field('`id`,`title`')
					->where('`status` =1 AND `display`=1 AND `level`<>1')
					->order('sort DESC')
					->select();
		} else {  //更具角色权限设置，获取可显示的主菜单
			//$sql = "SELECT `tp_node`.`id` as id,`tp_node`.`title` as title FROM `tp_node`,`tp_access` WHERE `tp_node`.id=`tp_access`.node_id AND `tp_access`.role_id=$roleid  AND  `tp_node`.`status` =1 AND `tp_node`.`display`=1 AND (`tp_node`.`level` =0 OR `tp_node`.`level` =2)  ORDER BY `tp_node`.sort DESC";
			$result = M()->table(array(C('DB_PREFIX') . 'rbac_node' => 'n', C('DB_PREFIX') . 'rbac_access' => 'a'))
					->field('`n`.`id` as `id` , `n`.`title` as `title`')
					->where('`n`.id=`a`.node_id AND `a`.role_id=%d  AND `n`.`status` =1 AND `n`.`display`=1 AND (`n`.`level` =0 OR `n`.`level` =2)', $roleid)
					->order('`n`.sort DESC')
					->select();
		}
		//$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		//$main_menu = $Model->query($sql);
		$main_menu = (Array) $result;
		$this->assign('main_menu', $main_menu);
		$this->display();
	}

	public function main() {
		$this->display();
	}

	public function footer() {
		$this->display();
	}

}
