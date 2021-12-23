<?php

class NotifyListColumns extends DbDataColumns {

	private $id;
	private $title;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setTitle();
		$this->getTitle()->setName('title');
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


class NotifyListModel extends DbDataModel {

	/**
	 * @var  NotifyListColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  NotifyListColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_notify_list`');
		$this->setTableItemPrefix('notify_list_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new NotifyListColumns();
		$this->columns_update=new NotifyListColumns();
	}
}

class ShopNotifyList extends  DbData
{

	/**
	 * @var  NotifyListModel $model
	 */
	public $model;

	/**
	 * @var $model NotifyListModel
	 */
	public function CreateModel () {
		$this->model=new NotifyListModel();
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
