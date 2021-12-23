<?php

class ShopOrdersDelItemColumns extends DbDataColumns {

	private $id;
	private $del_id;
	private $item_id;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setDelId();
		$this->getDelId()->setName('del_id');
		$this->getDelId()->setType(TYPE_UINT);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);


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


	private function setItemId() {
		$this->item_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDelId() {
		return $this->del_id;
	}

	private function setDelId() {
		$this->del_id = new DbColumn();
	}
}


class ShopOrdersDelItemModel extends DbDataModel {

	/**
	 * @var  ShopOrdersDelItemColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOrdersDelItemColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_order_delivery_items`');
		$this->setTableItemPrefix('od_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOrdersDelItemColumns();
		$this->columns_update=new ShopOrdersDelItemColumns();
	}

}

class ShopOrdersDelItem extends  DbData
{

	/**
	 * @var  ShopOrdersDelItemModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOrdersDelItemModel
	 */
	public function CreateModel () {
		$this->model=new ShopOrdersDelItemModel();
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
