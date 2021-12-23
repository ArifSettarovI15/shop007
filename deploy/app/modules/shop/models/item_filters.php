<?php

class ShopItemFiltersColumns extends DbDataColumns {

	private $id;
	private $item_id;
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

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);

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


class ShopItemFiltersModel extends DbDataModel {

	/**
	 * @var  ShopItemFiltersColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopItemFiltersColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_items_filters`');
		$this->setTableItemPrefix('sif_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopItemFiltersColumns();
		$this->columns_update=new ShopItemFiltersColumns();
	}

	public function SetJoinSpravValues() {
		$this->setSelectField(' core_sprav_values.* ');
		$this->setSelectField(' shop_items_filters.* ');
		$this->setJoin(' LEFT JOIN `core_sprav_values` ON '.$this->GetTableItemName('svid').'=`core_sprav_values`.`svid`');
	}

	public function SetJoinSprav() {
		$this->setSelectField(' core_sprav.* ');
		$this->setJoin(' INNER JOIN `core_sprav` ON `core_sprav_values`.`sprav_id`=`core_sprav`.`sprav_id` and `core_sprav`.`sprav_status`=1');
	}
}

class ShopItemFilters extends  DbData
{

	/**
	 * @var  ShopItemFiltersModel $model
	 */
	public $model;

	/**
	 * @var $model ShopItemFiltersModel
	 */
	public function CreateModel () {
		$this->model=new ShopItemFiltersModel();
	}

	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}

	public function GetValuesList2 ($item_id,$full=0) {

		$this->CreateModel();
		$this->model->SetJoinSpravValues();
		if ($full) {
			$this->model->SetJoinSprav();
		}
		$this->model->setOrderBy('sprav_sort');
		$this->model->columns_where->getItemId()->setValue($item_id);
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
			$array[$result_item['sif_sprav_id']][]=$result_item;

		}

		return $array;
	}

	public function GetValuesList ($item_id,$full=0) {

		$this->CreateModel();
		$this->model->SetJoinSpravValues();

			$this->model->SetJoinSprav();

		$this->model->setOrderBy('sprav_sort');
		if (is_array($item_id)) {
			$this->model->columns_where->getItemId()->inValues($item_id);
			$this->model->setGroupBy('svid');
		}
		else {
			$this->model->columns_where->getItemId()->setValue($item_id);
		}


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
				$array[$result_item['sif_sprav_id']][$result_item['svid']]=$result_item;
			}


		}

		return $array;
	}


	public function GetValuesListF ($data_info,$full=0,$sub=array()) {
		if (count($sub)>0) {

		}
		else {
			$sub=array($data_info['item_id']);
		}
		$data=$this->GetValuesList ($sub,$full);
		$array=array();

		foreach ($data as $item) {
			$key='';
			$values=array();
			$values2=array();
			foreach ($item as $t) {
				if ($t['svid_status']  and
				    (
					    ($data_info['item_is_model'] and $t['sprav_object_id']==1)
					    or    ($data_info['item_is_model']==0)
				    )) {

					$key=$t['sprav_title'];
					$values[]=$t['svid_title'];
					$values2[]=$t['svid'];
				}

			}
			if ($key and count($values)>0) {
				$array[$key]=array(
					'text'=>implode(', ', $values),
					'values'=>$values2
				);
			}

		}

		return $array;
	}
    public function getFilteredItemIds($svids=array()){
	    $this->CreateModel();
	    $this->model->setSelectField($this->model->getTableName().".sif_id, ".$this->model->getTableName().".sif_item_id");
//	    $this->model->setSelectField($this->model->getTableName().".sif_item_id");
//	    $this->model->addWhereCustom("sif_svid IN (".$this->db->sql_prepare(implode(', ',$svids)).')');
	    $this->model->columns_where->getSvid()->inValues($svids);
        $this->model->setGroupBy('sif_item_id');
        $this->model->setHaving('HAVING COUNT(DISTINCT sif_svid) = '.$this->db->sql_prepare(count($svids)));
        $ids = array();
        $result =  $this->GetList();
        foreach ($result as $res){
            $ids[]=(int)$res['sif_item_id'];
        }
        return $ids;
    }

}
