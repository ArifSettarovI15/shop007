<?php

class ShopOrdersDelColumns extends DbDataColumns {

	private $id;
	private $city_id;
	private $addr;
	private $user_id;
	private $date;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setCityId();
		$this->getCityId()->setName('city_id');
		$this->getCityId()->setType(TYPE_UINT);

		$this->setAddr();
		$this->getAddr()->setName('addr');
		$this->getAddr()->setType(TYPE_STR);

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);

		$this->setDate();
		$this->getDate()->setName('date');
		$this->getDate()->setType(TYPE_STR);

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
	public function getCityId() {
		return $this->city_id;
	}

	private function setCityId() {
		$this->city_id = new DbColumn();
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
	public function getDate() {
		return $this->date;
	}

	private function setDate() {
		$this->date = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAddr() {
		return $this->addr;
	}

	private function setAddr() {
		$this->addr = new DbColumn();
	}
}


class ShopOrdersDelModel extends DbDataModel {

	/**
	 * @var  ShopOrdersDelColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOrdersDelColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_order_delivery`');
		$this->setTableItemPrefix('delivery_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOrdersDelColumns();
		$this->columns_update=new ShopOrdersDelColumns();
	}

	public function SetJoinCities() {
		$this->setSelectField('*');
		$this->setJoin(' LEFT JOIN `shop_delivery_cities` ON `shop_order_delivery`.delivery_city_id= shop_delivery_cities.`city_id`
		');

	}
}

class ShopOrdersDel extends  DbData
{

	/**
	 * @var  ShopOrdersDelModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOrdersDelModel
	 */
	public function CreateModel () {
		$this->model=new ShopOrdersDelModel();
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
