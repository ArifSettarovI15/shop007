<?php

class ShopCatsAksColumns extends DbDataColumns {

	private $cat_id;
	private $also_id;

	public function __construct()
	{
		$this->setCatId();
		$this->getCatId()->setName('cat_id');
		$this->getCatId()->setType(TYPE_UINT);

		$this->setAlsoId();
		$this->getAlsoId()->setName('also_id');
		$this->getAlsoId()->setType(TYPE_UINT);

	}

	/**
	 * @return DbColumn
	 */
	public function getCatId() {
		return $this->cat_id;
	}

	public function setCatId( ) {
		$this->cat_id =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAlsoId() {
		return $this->also_id;
	}

	public function setAlsoId( ) {
		$this->also_id =new DbColumn();
	}

}


class ShopCatsAksModel extends DbDataModel {

	/**
	 * @var  ShopCatsAksColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopCatsAksColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_categories_also`');
		$this->setTableItemPrefix('sca_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopCatsAksColumns();
		$this->columns_update=new ShopCatsAksColumns();
	}

	public function SetJoinCat() {
		$this->setSelectField(' shop_categories.* ');
		$this->setJoin(' INNER JOIN `shop_categories` ON '.$this->GetTableItemName('also_id').'=`shop_categories`.`cat_id` and shop_categories.cat_status=1 ');
	}


}

class ShopCatsAks extends  DbData
{

	/**
	 * @var  ShopCatsAksModel $model
	 */
	public $model;

	/**
	 * @var $model ShopCatsAksModel
	 */
	public function CreateModel () {
		$this->model=new ShopCatsAksModel();
	}


	public function GetAksAll () {

		$this->CreateModel();
		$this->model->setSelectField($this->model->getTableName().'.*');
		$this->model->SetJoinCat();
		$this->model->setOrderBy('`shop_categories`.cat_title');
		$result=$this->GetListSimple();
		$array=array();
		while ($result_item = $this->db->fetch_array($result))
		{
			$array[$result_item['sca_cat_id']][]=$result_item;
		}


		return $array;
	}

	public function GetAksList ($cat_id) {

		$this->CreateModel();
		$this->model->columns_where->getCatId()->setValue($cat_id);
		$this->model->SetJoinCat();
		$this->model->setOrderBy('`shop_categories`.cat_title');
		$result=$this->GetListSimple();
		return $this->ToArray($result);
	}

}