<?php

class ShopOfferFiltersColumns extends DbDataColumns {

	private $id;
	private $offer_id;
	private $svid;
	private $value;
	private $sprav_id;
	private $price;
	private $up;
	private $auto;

	public function __construct()
	{

		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setOfferId();
		$this->getOfferId()->setName('offer_id');
		$this->getOfferId()->setType(TYPE_UINT);

		$this->setSvid();
		$this->getSvid()->setName('svid');
		$this->getSvid()->setType(TYPE_UINT);

		$this->setValue();
		$this->getValue()->setName('value');
		$this->getValue()->setType(TYPE_STR);

		$this->setSpravId();
		$this->getSpravId()->setName('sprav_id');
		$this->getSpravId()->setType(TYPE_UINT);

		$this->setPrice();
		$this->getPrice()->setName('price');
		$this->getPrice()->setType(TYPE_UINT);

		$this->setUp();
		$this->getUp()->setName('up');
		$this->getUp()->setType(TYPE_BOOL);

		$this->setAuto();
		$this->getAuto()->setName('auto');
		$this->getAuto()->setType(TYPE_BOOL);
	}

	/**
	 * @return DbColumn
	 */
	public function getOfferId() {
		return $this->offer_id;
	}

	private function setOfferId(  ) {
		$this->offer_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSvid() {
		return $this->svid;
	}


	private function setSvid(  ) {
		$this->svid = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getId() {
		return $this->id;
	}

	private function setId(  ) {
		$this->id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getValue() {
		return $this->value;
	}

	private function setValue( ) {
		$this->value = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSpravId() {
		return $this->sprav_id;
	}

	private function setSpravId(  ) {
		$this->sprav_id = new DbColumn();
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
	public function getUp() {
		return $this->up;
	}

	private function setUp() {
		$this->up = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAuto() {
		return $this->auto;
	}

	private function setAuto( ) {
		$this->auto = new DbColumn();
	}
}


class ShopOfferFiltersModel extends DbDataModel {

	/**
	 * @var  ShopOfferFiltersColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOfferFiltersColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_offers_filters`');
		$this->setTableItemPrefix('sif_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOfferFiltersColumns();
		$this->columns_update=new ShopOfferFiltersColumns();
	}

	public function SetJoinSpravValues() {
		$this->setSelectField(' core_sprav_values.* ');
		$this->setSelectField(' shop_offers_filters.* ');
		$this->setJoin(' LEFT JOIN `core_sprav_values` ON '.$this->GetTableItemName('svid').'=`core_sprav_values`.`svid`');
	}
	public function SetJoinSprav() {
		$this->setSelectField(' core_sprav.* ');
		$this->setJoin(' LEFT JOIN `core_sprav` ON `core_sprav_values`.`sprav_id`=`core_sprav`.`sprav_id`');
	}
}

class ShopOfferFilters extends  DbData
{

	/**
	 * @var  ShopOfferFiltersModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOfferFiltersModel
	 */
	public function CreateModel () {
		$this->model=new ShopOfferFiltersModel();
	}

	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


	public function GetValuesList ($offer_id,$full=0) {

		$this->CreateModel();
		$this->model->SetJoinSpravValues();

		$this->model->SetJoinSprav();

		$this->model->setOrderBy('sprav_sort');
		$this->model->columns_where->getOfferId()->setValue($offer_id);
		$result=$this->GetListSimple();

		$array=array();
		while ($result_item = $this->db->fetch_array($result))
		{
			$result_item=$this->PrepareData($result_item);
			if ($result_item['sprav_status'] and $result_item['svid_status'] and (
					$result_item['sprav_id']
			    OR
			    $result_item['sif_value']
				)
			) {
				$array[$result_item['sif_sprav_id']][]=$result_item;
			}


		}

		return $array;
	}


	public function GetValuesListF ($offer_info,$full=0) {
		$data=$this->GetValuesList ($offer_info['offer_id'],$full);
		$array=array();

		foreach ($data as $item) {
			$eng='';
			$key='';
			$values=array();
			$values2=array();
			foreach ($item as $t) {
				$key=$t['sprav_title'];
				$eng=$t['sprav_name'];
				$values[]=$t['svid_title'];
				$values2[]=$t['svid'];
			}
			if ($key and count($values)>0) {
				$array[$key]=array(
					'text'=>implode(', ', $values),
					'values'=>$values2,
					'eng'=>$eng
				);
			}

		}

		return $array;
	}
}
