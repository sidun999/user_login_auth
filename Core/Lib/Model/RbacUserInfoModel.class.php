<?php 
/**
 * 用户信息模型
 */
class RbacUserInfoModel extends RelationModel {

	//自动完成
	protected $_auto = array (
		array('edit_time','time',3,'function'),
	);

	//自动验证
	/*protected $_validate=array(
		array('id','require','用户id必须！',1,'unique',3),
	);*/
	
	//关联关系
	protected $_link = array(
		'User'=>array(
				'mapping_type'  =>BELONGS_TO,
				'class_name'    =>'User',
				'foreign_key'	=>'id',
				'mapping_name'	=>'user',
		),
	);

	/**
	 * 获取单个用户信息
	 * @param string $where
	 * @param string $field
	 * @return array
	 */
	public function getInfo($where = '',$field = '*') {
		return $this->field($field)->where($where)->find();
	}

	/**
	 * 更新用户信息
	 * @param array $data
	 * @return boolean
	 */
	public function upInfo($data) {
		if($data){
			return $this->save($data);
		}else{
			return false;
		}
	}

}