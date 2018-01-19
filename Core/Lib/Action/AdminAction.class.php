<?php

/*
 * Admin分组公共类
 */

class AdminAction extends CmsAction {

    public $pageGeneral;
    protected $pageSize = 10;
    public $lastAssign = array();

	public function _initialize() {
        header("Content-type: text/html; charset=utf-8");
		parent::_initialize();

		//D('File')->autoCleanTemp();

		// 后台用户权限检查
		if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
			import('ORG.Util.RBAC');
			RBAC::checkLogin();
			//return;
			if (!RBAC::AccessDecision(GROUP_NAME)) {
				//检查认证识别号
				if (!session(C('USER_AUTH_KEY'))) {
					//跳转到认证网关
					redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
				}
				// 没有权限 抛出错误
				if (C('RBAC_ERROR_PAGE')) {
					// 定义权限错误页面
					redirect(C('RBAC_ERROR_PAGE'));
				} else {
					if (C('GUEST_AUTH_ON')) {
						$this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
					}
					// 提示错误信息
					$this->error(L('_VALID_ACCESS_'));
				}
			}
		}
        $this->lastAssign['ACTION_NAME'] = ACTION_NAME;
        /*$urlParams = $_SERVER['QUERY_STRING'];
        echo $urlParams;exit;*/
	}

    //统一加载数据到模版
    protected function lasttDisplayAssign(){
        foreach($this->lastAssign as $k=>$v){
            $this->assign($k,$v);
        }
    }

    protected function reNameKeyToNumber($oldArray,$keyArray)
    {
        $newArray = array();
        $i = 1;
        foreach($keyArray as $v)
        {
            foreach($oldArray as $k=>$v2)
            {
                $newArray[$k][$i] = $oldArray[$k][$v[1]];

                if($v[1] != 'nodel' && $v[0] != 'checkBox')
                {
                    unset($oldArray[$k][$v[1]]);
                }
                else
                {
                    $newArray[$k][$v[1]] = $oldArray[$k][$v[1]];
                }
            }
            $i += 1;
        }
        return $newArray;
    }
}
