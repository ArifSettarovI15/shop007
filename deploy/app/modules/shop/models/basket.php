<?php

class ShopBasketColumns extends DbDataColumns {

	private $id;
	private $item_id;
	private $sessionhash;
	private $user_id;
	private $price;
	private $count;

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

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);

		$this->setPrice();
		$this->getPrice()->setName('price');
		$this->getPrice()->setType(TYPE_UINT);

		$this->setCount();
		$this->getCount()->setName('count');
		$this->getCount()->setType(TYPE_UNUM);
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
	public function getUserId() {
		return $this->user_id;
	}

	private function setUserId( ) {
		$this->user_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPrice() {
		return $this->price;
	}

	private function setPrice( ) {
		$this->price = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getCount() {
		return $this->count;
	}

	private function setCount( ) {
		$this->count = new DbColumn();
	}
}


class ShopBasketModel extends DbDataModel {

	/**
	 * @var  ShopBasketColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopBasketColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_item_basket`');
		$this->setTableItemPrefix('basket_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopBasketColumns();
		$this->columns_update=new ShopBasketColumns();
	}
}

class ShopBasket extends  DbData
{

	/**
	 * @var  ShopBasketModel $model
	 */
	public $model;

	/**
	 * @var $model ShopBasketModel
	 */
	public function CreateModel () {
		$this->model=new ShopBasketModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}


	public function PrepareData ($result_item,$full=0) {

		return $result_item;
	}


	public function UpdateUserHash() {
		$this->CreateModel();
		$this->model->columns_where->getUserId()->setValue(0);
		$this->model->columns_where->getSessionhash()->setValue($this->registry->user_info['sessionhash']);
		$list=$this->GetList();
		if ($list) {
			foreach ($list as $item) {
				$this->CreateModel();
				$this->model->columns_where->getUserId()->setValue($this->registry->user_info['user_id']);
				$this->model->columns_where->getItemId()->setValue($item['basket_item_id']);
				$check=$this->GetItem();
				if ($check==false) {
					$this->CreateModel();
					$this->model->columns_update->getUserId()->setValue($this->registry->user_info['user_id']);
					$this->model->columns_where->getId()->setValue($item['basket_id']);
					$this->Update();
				}
				else {
					$this->CreateModel();
					$this->model->columns_update->getCount()->setValue($check['basket_count']+$item['basket_count']);
					$this->model->columns_where->getId()->setValue($check['basket_id']);
					$this->Update();

					$this->CreateModel();
					$this->model->columns_where->getId()->setValue($check['basket_id']);
					$this->Delete();
				}
			}
		}
	}



}
