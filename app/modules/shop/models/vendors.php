<?php

class ShopVendorsColumns extends DbDataColumns {

	private $id;
	private $status;
	private $title;
	private $url;
	private $photo_id;
	private $photo_id2;
	private $meta_title;
	private $meta_keywords;
	private $meta_desc;
	private $text_id;
	private $vendor_pop;
	private $new;
	private $minus;
	private $letter;
	private $alias;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setStatus();
		$this->getStatus()->setName('status');
		$this->getStatus()->setType(TYPE_BOOL);

		$this->setTitle();
		$this->getTitle()->setName('name');
		$this->getTitle()->setType(TYPE_STR);

		$this->setUrl();
		$this->getUrl()->setName('url');
		$this->getUrl()->setType(TYPE_STR);


		$this->setPhotoId();
		$this->getPhotoId()->setName('icon');
		$this->getPhotoId()->setType(TYPE_UINT);

		$this->setPhotoId2();
		$this->getPhotoId2()->setName('bg');
		$this->getPhotoId2()->setType(TYPE_UINT);

		$this->setMetaTitle();
		$this->getMetaTitle()->setName('meta_title');
		$this->getMetaTitle()->setType(TYPE_STR);

		$this->setMetaKeywords();
		$this->getMetaKeywords()->setName('meta_keywords');
		$this->getMetaKeywords()->setType(TYPE_STR);

		$this->setMetaDesc();
		$this->getMetaDesc()->setName('meta_desc');
		$this->getMetaDesc()->setType(TYPE_STR);


		$this->setTextId();
		$this->getTextId()->setName('text_id');
		$this->getTextId()->setType(TYPE_UINT);

		$this->setVendorPop();
		$this->getVendorPop()->setName('pop');
		$this->getVendorPop()->setType(TYPE_BOOL);

		$this->setMinus();
		$this->getMinus()->setName('minus');
		$this->getMinus()->setType(TYPE_BOOL);

		$this->setNew();
		$this->getNew()->setName('new');
		$this->getNew()->setType(TYPE_BOOL);

		$this->setLetter();
		$this->getLetter()->setName('letter');
		$this->getLetter()->setType(TYPE_STR);

		$this->setAlias();
		$this->getAlias()->setName('alias');
		$this->getAlias()->setType(TYPE_STR);

	}
	/**
	 * @return DbColumn
	 */
	public function getId() {
		return $this->id;
	}

	public function setId() {
		$this->id=new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getStatus() {
		return $this->status;
	}

	public function setStatus( ) {
		$this->status=new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTitle() {
		return $this->title;
	}

	public function setTitle( ) {
		$this->title =new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getUrl() {
		return $this->url;
	}

	public function setUrl(  ) {
		$this->url =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPhotoId() {
		return $this->photo_id;
	}

	public function setPhotoId( ) {
		$this->photo_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTextId() {
		return $this->text_id;
	}


	public function setTextId( ) {
		$this->text_id = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getMetaTitle() {
		return $this->meta_title;
	}

	public function setMetaTitle( ) {
		$this->meta_title = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getMetaKeywords() {
		return $this->meta_keywords;
	}

	public function setMetaKeywords(  ) {
		$this->meta_keywords = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getMetaDesc() {
		return $this->meta_desc;
	}


	public function setMetaDesc(  ) {
		$this->meta_desc = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPhotoId2() {
		return $this->photo_id2;
	}

	public function setPhotoId2( ) {
		$this->photo_id2 = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getVendorPop() {
		return $this->vendor_pop;
	}

	public function setVendorPop(  ) {
		$this->vendor_pop = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getLetter() {
		return $this->letter;
	}

	private function setLetter(  ) {
		$this->letter = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getNew() {
		return $this->new;
	}


	private function setNew() {
		$this->new = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAlias() {
		return $this->alias;
	}


	private function setAlias( ) {
		$this->alias = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getMinus() {
		return $this->minus;
	}

	private function setMinus() {
		$this->minus = new DbColumn();
	}
}


class ShopVendorsModel extends DbDataModel {

	/**
	 * @var  ShopVendorsColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopVendorsColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_vendors`');
		$this->setTableItemPrefix('vendor_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopVendorsColumns();
		$this->columns_update=new ShopVendorsColumns();
	}
	public function innerProducts() {
		$this->setJoin(' INNER JOIN  shop_items ON shop_vendors.vendor_id=shop_items.`item_vendor_id` and shop_items.item_status=1 
		INNER JOIN `shop_categories` ON shop_items.item_cat_id=`shop_categories`.`cat_id` and `shop_categories`.cat_status=1 
		');
	}

	public function JoinImages () {
		$this->SetJoinImage('icon',$this->GetTableItemName('icon'));
	}
	public function JoinBg () {
		$this->SetJoinImage('bg',$this->GetTableItemName('bg'));
	}
	public function innerNews() {
		$this->setSelectField('COUNT(content_id) as count');
		$this->setJoin(' 
		INNER JOIN  core_content ON shop_vendors.vendor_id=core_content.`content_vendor_id` and core_content.content_status=1 
		');
	}
}

class ShopVendors extends  DbData
{

	private $aliases=false;

	/**
	 * @var  ShopVendorsModel $model
	 */
	public $model;

	/**
	 * @var $model ShopVendorsModel
	 */
	public function CreateModel () {
		$this->model=new ShopVendorsModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}

	public function PrepareData ($result_item,$full=0) {

		$result_item=$this->registry->files->FilePrepare($result_item,'icon_');
		$result_item=$this->registry->files->FilePrepare($result_item,'bg_');
		$result_item['vendor_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_');
		$result_item['vendor_bg_url'] = $this->registry->files->GetImageUrl($result_item,'large',0,'bg_');
		$result_item['vendor_full_url'] = BASE_URL.'/brands/'.$result_item['vendor_url'].'/';
		if ($full==1) {
			$result_item['vendor_full_text'] = $this->registry->text->GetText($result_item['vendor_text_id']);
		}
		$result_item['cat_full_url'] = BASE_URL.'/'.$result_item['cat_url'].'/';

		return $result_item;
	}

	public function GetAliases() {
		if ($this->aliases==false) {
			$this->CreateModel();
			$this->model->columns_where->getAlias()->notValue('');
			$list=$this->GetList();

			foreach ($list as $item) {
				if ($item['vendor_alias']!='') {
					$parts=explode(',',$item['vendor_alias']);
					foreach ($parts as $part) {
						$key=trim(mb_strtolower($part));
						$this->aliases[$key]=array(
							'id'=>$item['vendor_id'],
							'name'=>$item['vendor_name']
						);
					}
				}
			}
		}
	}


	public function replaceBrand($value) {
		$this->GetAliases();
		$key=trim(mb_strtolower($value));
		if (isset($this->aliases[$key])) {
			return $this->aliases[$key]['name'];
		}

		return $value;
	}

}
