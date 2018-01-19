<?php 
class RbacUserModel extends RelationModel {

	//自动完成
	protected $_auto = array ( 
		array('password','md5',1,'function'),	//新增时
		array('last_login_time','time',1,'function'), 	//新增时
		array('last_login_ip','127.0.0.1'), 	//新增时
		array('last_location','新建用户'), 	//新增时
	);

	//自动验证
	protected $_validate=array(
		array('username','require','用户名称必须！',1,'',3),
		array('username','','用户名称已经存在！',1,'unique',3), // 新增修改时候验证username字段是否唯一
	);
	
	//关联关系
	protected $_link = array(
		'Weixin'=>array(
				'mapping_type'  =>HAS_MANY,
				'class_name'    =>'Weixin',
				'foreign_key'	=>'id',
				'mapping_name'	=>'weixin',
		),
		'Article'=>array(
				'mapping_type'  =>HAS_MANY,
				'class_name'    =>'Article',
				'foreign_key'	=>'id',
				'mapping_name'	=>'article',
		),
		'RbacUserInfo'=>array(
				'mapping_type'  =>HAS_ONE,
				'class_name'    =>'RbacUserInfo',
				'foreign_key'	=>'id',
				'mapping_name'	=>'userinfo',
		),
	);

	/**
	 * 获取所有用户信息
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 */
	public function getAllUser($where = '' , $order = 'id  ASC', $limit='') {
		return $this->where($where)->order($order)->limit($limit)->select();
	}

	/**
	 * 获取单个用户信息
	 * @param string $where
	 * @param string $field
	 * @return mixed
	 */
	public function getUser($where = '',$field = '*') {
		return $this->field($field)->where($where)->find();
	}

	/**
	 * 删除用户
	 * @param string|array $where
	 * @return boolean
	 */
	public function delUser($where) {
		if($where){
			return $this->where($where)->save(array('isdelete'=>1));
		}else{
			return false;
		}
	}

	/**
	 * 更新用户
	 * @param array $data
	 * @return boolean
	 */
	public function upUser($data) {
		if($data){
			return $this->save($data);
		}else{
			return false;
		}
	}

    /**
     * 检查用户名
     * @param string $username
     * @param number $user_id
     * @return mixed|boolean
     */
    public function check_name($username,$user_id=0){
        if($user_id){   //编辑时查询
            $map['id']  = array('neq',$user_id);
            $map['username']  = array('eq',$username);
        }else{  // 新增是查询
            $map['username']  = array('eq',$username);
        }
        return $this->where($map)->find();
    }

    /**
     * 输出key为用户ID的数组
     * @param int $RoleId   //分组ID，为0则不限制
     * @param int $Status   //是否启用的用户，为
     */
    public function GetKeyUser($RoleId=0,$Status=-1){
        ($RoleId == 0) or $Map['role']=$RoleId;
        ($Status == -1) or $Map['status']=$Status;
        $List = $this->where($Map)->field('id,username,uname')->select();
        foreach($List as $k=>$v){
            $ListResult[$v['id']] = $v;
        }
        return $ListResult;
    }

}