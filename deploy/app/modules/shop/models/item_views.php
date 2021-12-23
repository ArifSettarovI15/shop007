<?php

class ShopItemViewsColumns extends DbDataColumns {

	private $id;
	private $item_id;
	private $sessionhash;
	private $time;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);
		$this->setSessionhash();
		$this->getSessionhash()->setName('sessionhash');
		$this->getSessionhash()->setType(TYPE_STR);

		$this->setTime();
		$this->getTime()->setName('time');
		$this->getTime()->setType(TYPE_STR);


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
	public function getItemId() {
		return $this->item_id;
	}

	private function setItemId(  ) {
		$this->item_id = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getSessionhash() {
		return $this->sessionhash;
	}


	private function setSessionhash( ) {
		$this->sessionhash = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTime() {
		return $this->time;
	}

	private function setTime( ) {
		$this->time = new DbColumn();
	}


}


class ShopItemViewsModel extends DbDataModel {

	/**
	 * @var  ShopItemViewsColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopItemViewsColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_item_views`');
		$this->setTableItemPrefix('siv_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopItemViewsColumns();
		$this->columns_update=new ShopItemViewsColumns();
	}
}

class ShopItemViews extends  DbData
{

	/**
	 * @var  ShopItemViewsModel $model
	 */
	public $model;

	/**
	 * @var $model ShopItemViewsModel
	 */
	public function CreateModel () {
		$this->model=new ShopItemViewsModel();
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