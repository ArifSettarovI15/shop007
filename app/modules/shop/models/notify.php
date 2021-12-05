<?php

class ShopNotifyColumns extends DbDataColumns {

	private $id;
	private $list_id;
	private $user_id;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setListId();
		$this->getListId()->setName('list_id');
		$this->getListId()->setType(TYPE_UINT);

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);


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
	public function getUserId() {
		return $this->user_id;
	}

	private function setUserId() {
		$this->user_id = new DbColumn();
	}

}


class ShopNotifyModel extends DbDataModel {

	/**
	 * @var  ShopNotifyColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopNotifyColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_notify`');
		$this->setTableItemPrefix('notify_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopNotifyColumns();
		$this->columns_update=new ShopNotifyColumns();
	}
}

class ShopNotify extends  DbData
{

	/**
	 * @var  ShopNotifyModel $model
	 */
	public $model;

	/**
	 * @var $model ShopNotifyModel
	 */
	public function CreateModel () {
		$this->model=new ShopNotifyModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}


	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


}
