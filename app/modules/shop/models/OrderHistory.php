<?php

class ShopOrderHistoryColumns extends DbDataColumns {

	private $id;
	private $order_id;
	private $order_status_id;
	private $notify;
	private $comment;
	private $time;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setOrderId();
		$this->getOrderId()->setName('order_id');
		$this->getOrderId()->setType(TYPE_UINT);

		$this->setOrderStatusId();
		$this->getOrderStatusId()->setName('order_status_id');
		$this->getOrderStatusId()->setType(TYPE_UINT);

		$this->setNotify();
		$this->getNotify()->setName('notify');
		$this->getNotify()->setType(TYPE_BOOL);

		$this->setComment();
		$this->getComment()->setName('comment');
		$this->getComment()->setType(TYPE_STR);

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
	public function getOrderId() {
		return $this->order_id;
	}

	private function setOrderId(  ) {
		$this->order_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getOrderStatusId() {
		return $this->order_status_id;
	}


	private function setOrderStatusId() {
		$this->order_status_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getNotify() {
		return $this->notify;
	}


	private function setNotify() {
		$this->notify = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getComment() {
		return $this->comment;
	}


	private function setComment() {
		$this->comment = new DbColumn();
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

}


class ShopOrderHistoryModel extends DbDataModel {

	/**
	 * @var  ShopOrderHistoryColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOrderHistoryColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_orders_history`');
		$this->setTableItemPrefix('h_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOrderHistoryColumns();
		$this->columns_update=new ShopOrderHistoryColumns();
	}

}

class ShopOrderHistory extends  DbData
{

	/**
	 * @var  ShopOrderHistoryModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOrderHistoryModel
	 */
	public function CreateModel () {
		$this->model=new ShopOrderHistoryModel();
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
