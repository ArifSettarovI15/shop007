<?php

class ShopItemPartsColumns extends DbDataColumns {

	private $id;
	private $item_id;
	private $svid;
	private $value;
	private $sprav_id;
	private $key;

	public function __construct()
	{

		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);

		$this->setSvid();
		$this->getSvid()->setName('svid');
		$this->getSvid()->setType(TYPE_UINT);

		$this->setValue();
		$this->getValue()->setName('value');
		$this->getValue()->setType(TYPE_STR);

		$this->setKey();
		$this->getKey()->setName('key');
		$this->getKey()->setType(TYPE_STR);

		$this->setSpravId();
		$this->getSpravId()->setName('sprav_id');
		$this->getSpravId()->setType(TYPE_UINT);
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
	public function getKey() {
		return $this->key;
	}

	private function setKey() {
		$this->key = new DbColumn();
	}
}


class ShopItemPartsModel extends DbDataModel {

	/**
	 * @var  ShopItemPartsColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopItemPartsColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_items_parts`');
		$this->setTableItemPrefix('sif_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopItemPartsColumns();
		$this->columns_update=new ShopItemPartsColumns();
	}

	public function SetJoinSpravValues() {
		$this->setSelectField(' core_sprav_values.* ');
		$this->setSelectField(' shop_items_parts.* ');
		$this->setJoin(' LEFT JOIN `core_sprav_values` ON '.$this->GetTableItemName('svid').'=`core_sprav_values`.`svid`');
	}
	public function SetJoinSprav() {
		$this->setSelectField(' core_sprav.* ');
		$this->setJoin(' LEFT JOIN `core_sprav` ON `core_sprav_values`.`sprav_id`=`core_sprav`.`sprav_id`');
	}
}

class ShopItemParts extends  DbData
{

	/**
	 * @var  ShopItemPartsModel $model
	 */
	public $model;

	/**
	 * @var $model ShopItemPartsModel
	 */
	public function CreateModel () {
		$this->model=new ShopItemPartsModel();
	}

	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


	public function GetValuesList ($item_id,$full=0) {

		$this->CreateModel();
		$this->model->SetJoinSpravValues();
		if ($full) {
			$this->model->SetJoinSprav();
		}
		$this->model->columns_where->getItemId()->setValue($item_id);
		$this->model->columns_where->getSpravId()->notValue(0);
		$result=$this->GetListSimple();
		$array=array();
		while ($result_item = $this->db->fetch_array($result))
		{
			$result_item=$this->PrepareData($result_item);
			if ((
				    $result_item['sprav_id'] and $result_item['svid_status']
			    )
			    OR
			    $result_item['sif_value']
			) {

			}
			if ($result_item['sif_sprav_id']>0) {
				$array[$result_item['sif_sprav_id']][]=$result_item;
			}
		}

		return $array;
	}
	public function GetValuesList2 ($item_id, $prepare=false) {

		$this->CreateModel();
		$this->model->columns_where->getItemId()->setValue($item_id);
		$this->model->columns_where->getSpravId()->setValue(0);
		$result=$this->GetListSimple();
		$array=array();
		while ($result_item = $this->db->fetch_array($result))
		{
			if ($prepare) {
				if ($result_item['sif_svid']) {
					$array[$result_item['sif_key']][]=$result_item['sif_svid'];
				}
				else {
					$array[$result_item['sif_key']]=$result_item['sif_value'];
				}
			}
			else {
				$array[$result_item['sif_key']][]=$result_item;
			}

		}

		return $array;
	}
}
