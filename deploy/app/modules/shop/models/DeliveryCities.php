<?php

class DeliveryCitiesColumns extends DbDataColumns {

	private $id;
	private $status;
	private $title;
	private $url;
	private $text_id;
	private $photo_id;
	private $meta_title;
	private $meta_keywords;
	private $meta_desc;
	private $price;
	private $cat;
	private $show;
	private $related;
	private $meta_title2;
	private $city_group_id;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

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

		$this->setPrice();
		$this->getPrice()->setName('price');
		$this->getPrice()->setType(TYPE_UINT);

		$this->setPhotoId();
		$this->getPhotoId()->setName('icon');
		$this->getPhotoId()->setType(TYPE_UINT);

		$this->setMetaTitle();
		$this->getMetaTitle()->setName('head_title');
		$this->getMetaTitle()->setType(TYPE_STR);

		$this->setMetaKeywords();
		$this->getMetaKeywords()->setName('head_keywords');
		$this->getMetaKeywords()->setType(TYPE_STR);

		$this->setMetaDesc();
		$this->getMetaDesc()->setName('head_desc');
		$this->getMetaDesc()->setType(TYPE_STR);

		$this->setMetaTitle2();
		$this->getMetaTitle2()->setName('meta_title2');
		$this->getMetaTitle2()->setType(TYPE_STR);

		$this->setCat();
		$this->getCat()->setName('cat');
		$this->getCat()->setType(TYPE_UINT);

		$this->setShow();
		$this->getShow()->setName('show');
		$this->getShow()->setType(TYPE_BOOL);

		$this->setRelated();
		$this->getRelated()->setName('related');
		$this->getRelated()->setType(TYPE_UINT);

		$this->setCityGroupId();
		$this->getCityGroupId()->setName('group_id');
		$this->getCityGroupId()->setType(TYPE_UINT);
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
	public function getPrice() {
		return $this->price;
	}

	private function setPrice(  ) {
		$this->price = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getShow() {
		return $this->show;
	}


	private function setShow( ) {
		$this->show = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getCat() {
		return $this->cat;
	}

	private function setCat() {
		$this->cat = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getRelated() {
		return $this->related;
	}


	private function setRelated() {
		$this->related = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getMetaTitle2() {
		return $this->meta_title2;
	}

	private function setMetaTitle2() {
		$this->meta_title2 = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getCityGroupId() {
		return $this->city_group_id;
	}

	private function setCityGroupId() {
		$this->city_group_id = new DbColumn();
	}
}


class DeliveryCitiesModel extends DbDataModel {

	/**
	 * @var  DeliveryCitiesColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  DeliveryCitiesColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_delivery_cities`');
		$this->setTableItemPrefix('city_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new DeliveryCitiesColumns();
		$this->columns_update=new DeliveryCitiesColumns();
	}

}

class DeliveryCities extends  DbData
{

	/**
	 * @var  DeliveryCitiesModel $model
	 */
	public $model;

	/**
	 * @var $model DeliveryCitiesModel
	 */
	public function CreateModel () {
		$this->model=new DeliveryCitiesModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		if ($full) {
			$this->model->setSelectField($this->model->getTableName().'.*');
			$this->model->SetJoinImage('icon',$this->model->GetTableItemName('icon'));
		}
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}
	public function GetItemByUrl ($url,$full=0){
		$this->CreateModel();
		if ($full) {
			$this->model->setSelectField($this->model->getTableName().'.*');
			$this->model->SetJoinImage('icon',$this->model->GetTableItemName('icon'));
		}
		$this->model->columns_where->getUrl()->setValue($url);
		return $this->GetItem($full);
	}

	public function PrepareData ($result_item,$full=0) {
		$result_item=$this->registry->files->FilePrepare($result_item,'icon_');
		$result_item['city_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_');
		$url_parts=explode('/',$result_item['city_url']);
		$result_item['city_last_url_part']=$url_parts[count($url_parts)-1];
		$result_item['city_full_url']=BASE_URL.'/delivery/'.$result_item['city_url'].'/';
		$result_item['city_short_url']='/delivery/'.$result_item['city_url'].'/';
		if ($full==1) {
			$result_item['city_text'] = $this->registry->text->GetText($result_item['city_text_id']);
		}
		if ($result_item['cat_url']) {
			$result_item['full_cat_url']=BASE_URL.'/'.$result_item['cat_url'].'/';
		}
		return $result_item;
	}


	public function getDeliveryCities($all=false) {
		$this->CreateModel();
		if ($all==false) {
			$this->model->columns_where->getStatus()->setValue(true);
		}
		$this->model->setOrderBy('city_title');
		return $this->GetList();
	}


	public function csv_to_array($filename='', $delimiter=';')
	{
		$array=array();
		if (($handle = fopen($filename, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
				$array[] = $data;
			}
			fclose($handle);
		}
		return $array;
	}

	public function getCdekCities () {
		$data=$this->csv_to_array($_SERVER['DOCUMENT_ROOT'].'/app/data/cdek.csv');
		$cities=array();

		foreach ($data as $item) {
			$cities[$item[0]]=array(
				'id'=>$item[0],
				'title'=>$item[1]
			);

		}
		return $cities;
	}
}
