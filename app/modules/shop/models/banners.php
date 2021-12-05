<?php

class ShopBannersColumns extends DbDataColumns {

	private $id;
	private $status;
	private $photo_id;
	private $cat_id;
	private $url;
	private $pos;


	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setStatus();
		$this->getStatus()->setName('status');
		$this->getStatus()->setType(TYPE_BOOL);

		$this->setCatId();
		$this->getCatId()->setName('cat_id');
		$this->getCatId()->setType(TYPE_UINT);

		$this->setUrl();
		$this->getUrl()->setName('url');
		$this->getUrl()->setType(TYPE_STR);

		$this->setPhotoId();
		$this->getPhotoId()->setName('photo_id');
		$this->getPhotoId()->setType(TYPE_UINT);

		$this->setPos();
		$this->getPos()->setName('pos');
		$this->getPos()->setType(TYPE_UINT);

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
	public function getCatId() {
		return $this->cat_id;
	}

	private function setCatId( ) {
		$this->cat_id =new DbColumn();
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
	public function getPhotoId() {
		return $this->photo_id;
	}

	private function setPhotoId( ) {
		$this->photo_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPos() {
		return $this->pos;
	}

	private function setPos() {
		$this->pos = new DbColumn();
	}
}


class ShopBannersModel extends DbDataModel {

	/**
	 * @var  ShopBannersColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopBannersColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_categories_banners`');
		$this->setTableItemPrefix('banner_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopBannersColumns();
		$this->columns_update=new ShopBannersColumns();
	}

	public function JoinCats() {
		$this->setSelectField(' shop_categories.cat_title ');
		$this->setJoin(' LEFT JOIN shop_categories ON shop_categories_banners.banner_cat_id=shop_categories.cat_id ');
	}

}

class ShopBanners extends  DbData
{

	/**
	 * @var  ShopBannersModel $model
	 */
	public $model;

	/**
	 * @var $model ShopBannersModel
	 */
	public function CreateModel () {
		$this->model=new ShopBannersModel();
	}


	public function GetItemById ($id){
		$this->CreateModel();

		$this->model->setSelectField($this->model->getTableName().'.*');
		$this->model->SetJoinImage('icon',$this->model->GetTableItemName('photo_id'));

		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem();
	}


	public function PrepareData ($result_item,$full=0) {
		$result_item=$this->registry->files->FilePrepare($result_item,'icon_');
		$result_item['banner_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_');
		$result_item['banner_image_url'] = $this->registry->files->GetImageUrl($result_item,'large',0,'icon_');

		return $result_item;
	}
}
