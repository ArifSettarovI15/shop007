<?php

class DeliveryDaysColumns extends DbDataColumns {

	private $id;
	private $city_id;
	private $go_day;
	private $priem_day;
	private $priem_time;


	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setCityId();
		$this->getCityId()->setName('city_id');
		$this->getCityId()->setType(TYPE_UINT);

		$this->setGoDay();
		$this->getGoDay()->setName('go_day');
		$this->getGoDay()->setType(TYPE_UINT);

		$this->setPriemDay();
		$this->getPriemDay()->setName('priem_day');
		$this->getPriemDay()->setType(TYPE_UINT);

		$this->setPriemTime();
		$this->getPriemTime()->setName('priem_time');
		$this->getPriemTime()->setType(TYPE_UINT);
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
		$this->city_id =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getGoDay() {
		return $this->go_day;
	}

	private function setGoDay() {
		$this->go_day = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriemDay() {
		return $this->priem_day;
	}


	private function setPriemDay() {
		$this->priem_day = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriemTime() {
		return $this->priem_time;
	}

	private function setPriemTime() {
		$this->priem_time = new DbColumn();
	}
}


class DeliveryDaysModel extends DbDataModel {

	/**
	 * @var  DeliveryDaysColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  DeliveryDaysColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_delivery`');
		$this->setTableItemPrefix('delivery_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new DeliveryDaysColumns();
		$this->columns_update=new DeliveryDaysColumns();
	}
	public function SetJoinCity() {
		$this->setSelectField(' * ');
		$this->setJoin(' LEFT JOIN shop_delivery_cities ON '.$this->GetTableItemName('city_id').'=shop_delivery_cities.`city_id` ');
	}
}

class DeliveryDays extends  DbData
{

	/**
	 * @var  DeliveryDaysModel $model
	 */
	public $model;

	/**
	 * @var $model DeliveryDaysModel
	 */
	public function CreateModel () {
		$this->model=new DeliveryDaysModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}

	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


	public function getDeliveryDays() {
		$this->CreateModel();
		$this->model->setOrderBy('delivery_title');
		return $this->GetList();
	}

	public function getDays(){
		return array(
			1=>'Понедельник',
			2=>'Вторник',
			3=>'Среда',
			4=>'Четверг',
			5=>'Пятница',
			6=>'Суббота',
			7=>'Воскресенье',
		);
	}

	public function getTime(){
		return array(
			1=>'10:30',
			2=>'16:00',
		);
	}


	public function getGroups(){
		return array(
			1=>'Симферополь',
			2=>'Ялта',
			3=>'Федосия-Керчь',
			4=>'Севастополь',
			5=>'Евпатория',
			6=>'Север',
		);
	}

	public function dayNames(){
		return array(
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday',
		);
	}

	public function getDayName($id){
		return $this->dayNames()[$id-1];
	}
}
