<?php

class ShopBillColumns extends DbDataColumns {

	private $id;
	private $order_id;
	private $time;
	private $name;
	private $phone;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setOrderId();
		$this->getOrderId()->setName('order_id');
		$this->getOrderId()->setType(TYPE_UINT);

		$this->setTime();
		$this->getTime()->setName('time');
		$this->getTime()->setType(TYPE_STR);

		$this->setName();
		$this->getName()->setName('name');
		$this->getName()->setType(TYPE_STR);

		$this->setPhone();
		$this->getPhone()->setName('phone');
		$this->getPhone()->setType(TYPE_STR);

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
	public function getOrderId() {
		return $this->order_id;
	}

	private function setOrderId() {
		$this->order_id = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getTime() {
		return $this->time;
	}

	private function setTime() {
		$this->time = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getName() {
		return $this->name;
	}

	private function setName() {
		$this->name = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPhone() {
		return $this->phone;
	}

	private function setPhone() {
		$this->phone = new DbColumn();
	}


}


class ShopBillModel extends DbDataModel {

	/**
	 * @var  ShopBillColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopBillColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_bills`');
		$this->setTableItemPrefix('bill_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopBillColumns();
		$this->columns_update=new ShopBillColumns();
	}
}

class ShopBill extends  DbData
{

	/**
	 * @var  ShopBillModel $model
	 */
	public $model;

	/**
	 * @var $model ShopBillModel
	 */
	public function CreateModel () {
		$this->model=new ShopBillModel();
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
