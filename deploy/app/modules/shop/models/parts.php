<?php

class ShopPartsColumns extends DbDataColumns {

	private $id;
	private $cat_id;
	private $title;
	private $short_title;
	private $status;
	private $url;
	private $text_id;
	private $meta_title;
	private $meta_keywords;
	private $meta_desc;
	private $sort;


	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setCatId();
		$this->getCatId()->setName('cat_id');
		$this->getCatId()->setType(TYPE_UINT);

		$this->setShortTitle();
		$this->getShortTitle()->setName('short_title');
		$this->getShortTitle()->setType(TYPE_STR);

		$this->setStatus();
		$this->getStatus()->setName('status');
		$this->getStatus()->setType(TYPE_BOOL);

		$this->setTitle();
		$this->getTitle()->setName('title');
		$this->getTitle()->setType(TYPE_STR);

		$this->setUrl();
		$this->getUrl()->setName('url');
		$this->getUrl()->setType(TYPE_STR);

		$this->setTextId();
		$this->getTextId()->setName('text_id');
		$this->getTextId()->setType(TYPE_UINT);

		$this->setMetaTitle();
		$this->getMetaTitle()->setName('head_title');
		$this->getMetaTitle()->setType(TYPE_STR);

		$this->setMetaKeywords();
		$this->getMetaKeywords()->setName('head_keywords');
		$this->getMetaKeywords()->setType(TYPE_STR);

		$this->setMetaDesc();
		$this->getMetaDesc()->setName('head_desc');
		$this->getMetaDesc()->setType(TYPE_STR);

		$this->setSort();
		$this->getSort()->setName('sort');
		$this->getSort()->setType(TYPE_UINT);

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
	public function getStatus() {
		return $this->status;
	}

	private function setStatus( ) {
		$this->status=new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTitle() {
		return $this->title;
	}

	private function setTitle( ) {
		$this->title =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getCatId() {
		return $this->cat_id;
	}

	private function setCatId() {
		$this->cat_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getShortTitle() {
		return $this->short_title;
	}

	private function setShortTitle() {
		$this->short_title = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getUrl() {
		return $this->url;
	}

	private function setUrl(  ) {
		$this->url =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTextId() {
		return $this->text_id;
	}


	private function setTextId( ) {
		$this->text_id = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getMetaTitle() {
		return $this->meta_title;
	}

	private function setMetaTitle( ) {
		$this->meta_title = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getMetaKeywords() {
		return $this->meta_keywords;
	}

	private function setMetaKeywords(  ) {
		$this->meta_keywords = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getMetaDesc() {
		return $this->meta_desc;
	}


	private function setMetaDesc(  ) {
		$this->meta_desc = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSort() {
		return $this->sort;
	}

	private function setSort() {
		$this->sort = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSale() {
		return $this->sale;
	}

	private function setSale() {
		$this->sale = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSaleMin() {
		return $this->sale_min;
	}

	private function setSaleMin() {
		$this->sale_min = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSaleMax() {
		return $this->sale_max;
	}

	private function setSaleMax() {
		$this->sale_max = new DbColumn();
	}
}


class ShopPartsModel extends DbDataModel {

	/**
	 * @var  ShopPartsColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopPartsColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_parts`');
		$this->setTableItemPrefix('part_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopPartsColumns();
		$this->columns_update=new ShopPartsColumns();
		$this->SetJoinCats();
	}


	public function SetJoinCats() {
		$this->setSelectField('shop_parts.* ');
		$this->setSelectField('shop_categories.cat_url ');
		$this->setJoin(' INNER JOIN  shop_categories ON '.$this->GetTableItemName('cat_id').'=shop_categories.`cat_id` and cat_status=1');

	}
}

class ShopParts extends  DbData
{

	/**
	 * @var  ShopPartsModel $model
	 */
	public $model;

	/**
	 * @var $model ShopPartsModel
	 */
	public function CreateModel () {
		$this->model=new ShopPartsModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}
	public function GetItemByUrl ($url,$full=0){
		$this->CreateModel();
		$this->model->setSelectField($this->model->getTableName().".*");
		$this->model->columns_where->getUrl()->setValue($url);
		return $this->GetItem();
	}


	public function PrepareData ($result_item,$full=0) {
		$result_item['part_full_url']=BASE_URL.'/'.$result_item['cat_url'].'/parts/'.$result_item['part_url'].'/';
		if ($full==1) {
			$result_item['part_text'] = $this->registry->text->GetText($result_item['part_text_id']);
		}
		if ($result_item['part_short_title']=='') {
			$result_item['part_short_title']=$result_item['part_title'];
		}
		return $result_item;
	}
}
