<?php 
class RbacNodeModel extends Model {

	//自动验证
	protected $_validate=array(
		array('title','require','菜单名称必须！',1,'',3),
		array('name','require','节点名称必须！',1,'',3),
	);

	/**
	 * 获取所有节点信息
	 * @param string $where
	 * @param string $order
	 */
	public function getAllNode($where = '' , $order = 'sort DESC') {
		return $this->where($where)->order($order)->select();
	}

	/**
	 * 获取单个节点信息
	 * @param string $where
	 * @param string $field
	 * @return mixed
	 */
	public function getNode($where = '',$field = '*') {
		return $this->field($field)->where($where)->find();
	}

	/**
	 * 删除节点
	 * @param string|array $where
	 * @return mixed|boolean
	 */
	public function delNode($where) {
		if($where){
			return $this->where($where)->delete();
		}else{
			return false;
		}
	}

	/**
	 * 更新节点
	 * @param array $data
	 * @return boolean
	 */
	public function upNode($data) {
		if($data){
			return $this->save($data);
		}else{
			return false;
		}
	}

	/**
	 * 子节点
	 * @param number $id
	 */
	public function childNode($id){
		return $this->where(array('pid'=>$id))->select();
	}

}