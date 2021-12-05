<?php

class ShopOrderItemsColumns extends DbDataColumns {

	private $id;
	private $order_id;
	private $item_id;
	private $item_price;
	private $item_count;
	private $setup;
	private $price;

	private $title;
	private $article;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setOrderId();
		$this->getOrderId()->setName('order_id');
		$this->getOrderId()->setType(TYPE_UINT);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);

		$this->setItemPrice();
		$this->getItemPrice()->setName('item_price');
		$this->getItemPrice()->setType(TYPE_UINT);

		$this->setItemCount();
		$this->getItemCount()->setName('item_count');
		$this->getItemCount()->setType(TYPE_UINT);

		$this->setSetup();
		$this->getSetup()->setName('item_setup');
		$this->getSetup()->setType(TYPE_BOOL);

		$this->setPrice();
		$this->getPrice()->setName('item_price');
		$this->getPrice()->setType(TYPE_UINT);

		$this->setTitle();
		$this->getTitle()->setName('name');
		$this->getTitle()->setType(TYPE_STR);

		$this->setArticle();
		$this->getArticle()->setName('article');
		$this->getArticle()->setType(TYPE_STR);

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
	public function getItemId() {
		return $this->item_id;
	}


	private function setItemId( ) {
		$this->item_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getItemPrice() {
		return $this->item_price;
	}

	private function setItemPrice( ) {
		$this->item_price = new DbColumn();
	}



	/**
	 * @return DbColumn
	 */
	public function getItemCount() {
		return $this->item_count;
	}

	private function setItemCount( ) {
		$this->item_count = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSetup() {
		return $this->setup;
	}

	private function setSetup() {
		$this->setup = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPrice() {
		return $this->price;
	}

	private function setPrice() {
		$this->price = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTitle() {
		return $this->title;
	}


	private function setTitle() {
		$this->title = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getArticle() {
		return $this->article;
	}

	private function setArticle() {
		$this->article = new DbColumn();
	}


}


class ShopOrderItemsModel extends DbDataModel {

	/**
	 * @var  ShopOrderItemsColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOrderItemsColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_item_order`');
		$this->setTableItemPrefix('oid_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOrderItemsColumns();
		$this->columns_update=new ShopOrderItemsColumns();
	}

}

class ShopOrderItems extends  DbData
{

	/**
	 * @var  ShopOrderItemsModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOrderItemsModel
	 */
	public function CreateModel () {
		$this->model=new ShopOrderItemsModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}


	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


	public function getOrderSum($order_id) {
		$this->CreateModel();
		$this->model->columns_where->getOrderId()->setValue( $order_id);
		$list=$this->GetList();

		$total=0;
		foreach ($list as $item) {
			$total=$total+$item['oid_item_price']*$item['oid_item_count'];
		}
		return $total;
	}

}
