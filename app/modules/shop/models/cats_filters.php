<?php

class ShopCatsFiltersColumns extends DbDataColumns {

	private $category_id;
	private $sprav_id;
	private $sort;

	public function __construct()
	{

		$this->setCategoryId();
		$this->getCategoryId()->setName('category_id');
		$this->getCategoryId()->setType(TYPE_UINT);

		$this->setSpravId();
		$this->getSpravId()->setName('sprav_id');
		$this->getSpravId()->setType(TYPE_UINT);

		$this->setSort();
		$this->getSort()->setName('sort');
		$this->getSort()->setType(TYPE_UINT);
	}


	/**
	 * @return DbColumn
	 */
	public function getCategoryId() {
		return $this->category_id;
	}

	private function setCategoryId(  ) {
		$this->category_id = new DbColumn();
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
	public function getSort() {
		return $this->sort;
	}

	private function setSort(  ) {
		$this->sort = new DbColumn();
	}

}


class ShopCatsFiltersModel extends DbDataModel {

	/**
	 * @var  ShopCatsFiltersColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopCatsFiltersColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_categories_filters`');
		$this->setTableItemPrefix('scf_');
		$this->columns_where=new ShopCatsFiltersColumns();
		$this->columns_update=new ShopCatsFiltersColumns();
	}

	public function SetJoinCat() {
		$this->setSelectField(' shop_categories.* ');
		$this->setJoin(' INNER JOIN `shop_categories` ON '.$this->GetTableItemName('category_id').'=`shop_categories`.`cat_id` and shop_categories.cat_status=1 ');
	}

	public function SetJoinSprav() {
		$this->setSelectField(' core_sprav.* ');
		$this->setJoin(' INNER JOIN `core_sprav` ON '.$this->GetTableItemName('sprav_id').'=`core_sprav`.`sprav_id` and core_sprav.sprav_status=1 and core_sprav.sprav_filter=1 ');
	}
	public function SetJoinSpravOption() {
		$this->setSelectField(' core_sprav.* ');
		$this->setJoin(' INNER JOIN `core_sprav` ON '.$this->GetTableItemName('sprav_id').'=`core_sprav`.`sprav_id` and core_sprav.sprav_status=1 and core_sprav.sprav_option=1 ');
	}
	public function SetJoinSpravAll() {
		$this->setSelectField(' core_sprav.* ');
		$this->setJoin(' INNER JOIN `core_sprav` ON '.$this->GetTableItemName('sprav_id').'=`core_sprav`.`sprav_id` and core_sprav.sprav_status=1 ');
	}
}

class ShopCatsFilters extends  DbData
{

	/**
	 * @var  ShopCatsFiltersModel $model
	 */
	public $model;

	/**
	 * @var $model ShopCatsFiltersModel
	 */
	public function CreateModel () {
		$this->model=new ShopCatsFiltersModel();
	}

	public function PrepareData ($result_item,$full=0) {
		if ($result_item['sprav_label']=='') {
			$result_item['sprav_label']=$result_item['sprav_title'];
		}
		return $result_item;
	}

	public function GetCatOptionsList ($cat_id) {

		$this->CreateModel();
		$this->model->columns_where->getCategoryId()->setValue($cat_id);
		$this->model->SetJoinCat();
		$this->model->SetJoinSpravOption();
		$this->model->setOrderByWithColumn('sort');
		$array=$this->GetList();
		return $array;
	}
	public function GetCatFiltersList ($cat_id) {

		$this->CreateModel();
		$this->model->columns_where->getCategoryId()->setValue($cat_id);
		$this->model->SetJoinCat();
		$this->model->SetJoinSprav();
		$this->model->setOrderByWithColumn('sort');
		$array=$this->GetList();
		return $array;
	}
	public function GetCatAllList ($cat_id) {

		$this->CreateModel();
		if (is_array($cat_id)) {
			$this->model->columns_where->getCategoryId()->inValues($cat_id);
		}
		else {
			$this->model->columns_where->getCategoryId()->setValue($cat_id);
		}
		$this->model->SetJoinCat();
		$this->model->SetJoinSpravAll();
		$this->model->setOrderByWithColumn('sort');
		$array=$this->GetList();
		return $array;
	}


	public function GetSpravOptionsList ($cats,$named=false) {

		$this->CreateModel();
		$this->model->columns_where->getCategoryId()->inValues($cats);
		$this->model->SetJoinSpravOption();
		$this->model->setOrderByWithColumn('sort');
		$array=$this->GetList();
		if ($named) {
			$array_new=array();
			foreach ($array as $a) {
				$array_new[$a['sprav_name']]=$a;
			}
			$array=$array_new;
		}
		return $array;
	}
	public function GetSpravFiltersList ($cats, $order='sprav_sort') {
		$this->CreateModel();
		$this->model->setSelectField(' shop_categories_filters.* ');
		$this->model->columns_where->getCategoryId()->inValues($cats);
		$this->model->setTablePrimaryKey('sprav_id');
		$this->model->SetJoinSprav();
		$this->model->setOrderBy($order);
		$array=$this->GetList();
		return $array;
	}
}
