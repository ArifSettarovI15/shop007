<?php

class DeliveryUser {

	/**
	 * @var MainClass;
	 */
	var $registry;
	/**
	 * @var DatabaseClass
	 */
	var $db;

	function __construct(&$registry){
		$this->registry=&$registry;
		$this->db=&$this->registry->db;

	}
	public function DeleteUserAddr($user_id,$id) {
		return $this->db->query_write('DELETE FROM users_delivery
		WHERE delivery_user_id='.$this->db->sql_prepare($user_id).' AND delivery_id='.$this->db->sql_prepare($id));
	}
	public function GetUserAddr($user_id) {
		$result=$this->db->query_read('SELECT * FROM users_delivery
		WHERE delivery_user_id='.$this->db->sql_prepare($user_id));
		$array=array();

		while ($result_item = $this->db->fetch_array($result))
		{
			$array[$result_item['delivery_id']]=$result_item;
		}
		return $array;
	}
	public function GetUserAddrById($id,$user_id) {
		return $this->db->query_first('SELECT * FROM users_delivery
		WHERE delivery_id='.$this->db->sql_prepare($id).' AND delivery_user_id='.$this->db->sql_prepare($user_id));
	}
}
