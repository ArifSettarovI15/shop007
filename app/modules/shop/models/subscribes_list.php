<?php

class ShopSubscribesListColumns extends DbDataColumns {

	private $id;
	private $title;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setTitle();
		$this->getTitle()->setName('name');
		$this->getTitle()->setType(TYPE_STR);

	}
	/**
	 * @return DbColumn
	 */
	public function getId() {
		return $this->id;
	}

	public function setId() {
		$this->id=new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTitle() {
		return $this->title;
	}

	public function setTitle( ) {
		$this->title =new DbColumn();
	}
}


class ShopSubscribesListModel extends DbDataModel {

	/**
	 * @var  ShopSubscribesListColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopSubscribesListColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_subscribes_list`');
		$this->setTableItemPrefix('subscribe_list_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopSubscribesListColumns();
		$this->columns_update=new ShopSubscribesListColumns();
	}
}

class ShopSubscribesList extends  DbData
{

	/**
	 * @var  ShopSubscribesListModel $model
	 */
	public $model;

	/**
	 * @var $model ShopSubscribesListModel
	 */
	public function CreateModel () {
		$this->model=new ShopSubscribesListModel();
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