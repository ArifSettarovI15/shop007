<?php

class ShopSubscribesColumns extends DbDataColumns {

	private $id;
	private $list_id;
	private $email;
	private $user_id;
	private $type;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setListId();
		$this->getListId()->setName('list_id');
		$this->getListId()->setType(TYPE_UINT);

		$this->setEmail();
		$this->getEmail()->setName('email');
		$this->getEmail()->setType(TYPE_STR);

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);

		$this->setType();
		$this->getType()->setName('type');
		$this->getType()->setType(TYPE_STR);


	}
	/**
	 * @return DbColumn
	 */
	public function getId() {
		return $this->id;
	}

	private function setId() {
		$this->id=new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getListId() {
		return $this->list_id;
	}

	private function setListId( ) {
		$this->list_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getEmail() {
		return $this->email;
	}

	private function setEmail( ) {
		$this->email =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserId() {
		return $this->user_id;
	}

	private function setUserId() {
		$this->user_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getType() {
		return $this->type;
	}

	private function setType() {
		$this->type = new DbColumn();
	}

}


class ShopSubscribesModel extends DbDataModel {

	/**
	 * @var  ShopSubscribesColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopSubscribesColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_subscribes`');
		$this->setTableItemPrefix('subscribe_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopSubscribesColumns();
		$this->columns_update=new ShopSubscribesColumns();
	}
	public function SetLists() {
		$this->setSelectField(' group_concat(`shop_subscribes_list`.subscribe_list_name separator  \',\') as `list_names` ');
		$this->setJoin(' INNER JOIN `shop_subscribes_list` ON '.$this->GetTableItemName('list_id').'=`shop_subscribes_list`.`subscribe_list_id`');
	}
}

class ShopSubscribes extends  DbData
{

	/**
	 * @var  ShopSubscribesModel $model
	 */
	public $model;

	/**
	 * @var $model ShopSubscribesModel
	 */
	public function CreateModel () {
		$this->model=new ShopSubscribesModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}


	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}

	public function AddEmail( $email ) {
		if (is_valid_email($email)) {
			$this->CreateModel();
			$this->model->columns_where->getListId()->setValue(4);
			$this->model->columns_where->getEmail()->setValue($email);
			$check=$this->GetItem();
			if ($check==false) {
				$this->CreateModel();
				$this->model->columns_update->getListId()->setValue(4);
				$this->model->columns_update->getEmail()->setValue($email);
				$this->Insert();
			}
		}
	}


}
