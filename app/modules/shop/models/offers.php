<?php

class ShopOffersColumns extends DbDataColumns {

	private $id;
	private $article;
	private $code;
	private $status;
	private $item_id;
	private $title;
	private $price;
	private $price_sale;
	private $price_opt;
	private $price_opt_vip;
	private $price_fakt;
	private $diam;
	private $weight;
	private $amount;
	private $amount_opt;
	private $amount_nal;
	private $amount_nal_opt;
	private $key;
	private $icon;
	private $source_url;
	private $group;
	private $url;
	private $short_title;
	private $price_before;
	private $price_opt_before;
	private $price_opt_vip_before;
	private $offer_1c;
	private $sort;
	private $string;
	private $search;

	private $sort_tyres_feo;
	private $sort_tyres_evpa;
	private $sort_tyres_simf;
	private $sort_wheels_feo;
	private $sort_wheels_evpa;
	private $sort_wheels_simf;
	private $offer_item_id;
	private $offer_is_decoration;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setArticle();
		$this->getArticle()->setName('article');
		$this->getArticle()->setType(TYPE_STR);

		$this->setStatus();
		$this->getStatus()->setName('status');
		$this->getStatus()->setType(TYPE_BOOL);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);

		$this->setTitle();
		$this->getTitle()->setName('title');
		$this->getTitle()->setType(TYPE_STR);

		$this->setPrice();
		$this->getPrice()->setName('price');
		$this->getPrice()->setType(TYPE_UINT);

		$this->setPriceSale();
		$this->getPriceSale()->setName('price_sale');
		$this->getPriceSale()->setType(TYPE_UINT);

		$this->setPriceOpt();
		$this->getPriceOpt()->setName('price_opt');
		$this->getPriceOpt()->setType(TYPE_UINT);

		$this->setPriceOptVip();
		$this->getPriceOptVip()->setName('price_opt_vip');
		$this->getPriceOptVip()->setType(TYPE_UINT);

		$this->setPriceFakt();
		$this->getPriceFakt()->setName('price_fakt');
		$this->getPriceFakt()->setType(TYPE_UINT);

		$this->setWeight();
		$this->getWeight()->setName('weight');
		$this->getWeight()->setType(TYPE_NUM);

		$this->setDiam();
		$this->getDiam()->setName('diam');
		$this->getDiam()->setType(TYPE_NUM);

		$this->setAmount();
		$this->getAmount()->setName('amount');
		$this->getAmount()->setType(TYPE_UINT);

		$this->setAmountOpt();
		$this->getAmountOpt()->setName('amount_opt');
		$this->getAmountOpt()->setType(TYPE_UINT);

		$this->setAmountNal();
		$this->getAmountNal()->setName('amount_nal');
		$this->getAmountNal()->setType(TYPE_UINT);

		$this->setAmountNalOpt();
		$this->getAmountNalOpt()->setName('amount_nal_opt');
		$this->getAmountNalOpt()->setType(TYPE_UINT);

		$this->setKey();
		$this->getKey()->setName('key');
		$this->getKey()->setType(TYPE_STR);

		$this->setIcon();
		$this->getIcon()->setName('icon');
		$this->getIcon()->setType(TYPE_UINT);


		$this->setSourceUrl();
		$this->getSourceUrl()->setName('source_url');
		$this->getSourceUrl()->setType(TYPE_STR);

		$this->setCode();
		$this->getCode()->setName('code');
		$this->getCode()->setType(TYPE_STR);

		$this->setGroup();
		$this->getGroup()->setName('group');
		$this->getGroup()->setType(TYPE_STR);

		$this->setUrl();
		$this->getUrl()->setName('url');
		$this->getUrl()->setType(TYPE_STR);

		$this->setShortTitle();
		$this->getShortTitle()->setName('short_title');
		$this->getShortTitle()->setType(TYPE_STR);

		$this->setPriceBefore();
		$this->getPriceBefore()->setName('price_before');
		$this->getPriceBefore()->setType(TYPE_UINT);

		$this->setPriceOptBefore();
		$this->getPriceOptBefore()->setName('price_opt_before');
		$this->getPriceOptBefore()->setType(TYPE_UINT);

		$this->setPriceOptVipBefore();
		$this->getPriceOptVipBefore()->setName('price_opt_vip_before');
		$this->getPriceOptVipBefore()->setType(TYPE_UINT);

		$this->setOffer1c();
		$this->getOffer1c()->setName('1c');
		$this->getOffer1c()->setType(TYPE_STR);

		$this->setOfferItemId();
		$this->getOfferItemId()->setName('item_id');
		$this->getOfferItemId()->setType(TYPE_STR);


		$this->setSort();
		$this->getSort()->setName('sort');
		$this->getSort()->setType(TYPE_UINT);

		$this->setSearch();
		$this->getSearch()->setName('search');
		$this->getSearch()->setType(TYPE_BOOL);

		$this->setString();
		$this->getString()->setName('string');
		$this->getString()->setType(TYPE_STR);

		$this->setSortTyresEvpa();
		$this->getSortTyresEvpa()->setName('sort_tyres_evpa');
		$this->getSortTyresEvpa()->setType(TYPE_NUM);

		$this->setSortTyresFeo();
		$this->getSortTyresFeo()->setName('sort_tyres_feo');
		$this->getSortTyresFeo()->setType(TYPE_NUM);

		$this->setSortTyresSimf();
		$this->getSortTyresSimf()->setName('sort_tyres_simf');
		$this->getSortTyresSimf()->setType(TYPE_NUM);

		$this->setSortWheelsEvpa();
		$this->getSortWheelsEvpa()->setName('sort_wheels_evpa');
		$this->getSortWheelsEvpa()->setType(TYPE_NUM);

		$this->setSortWheelsFeo();
		$this->getSortWheelsFeo()->setName('sort_wheels_feo');
		$this->getSortWheelsFeo()->setType(TYPE_NUM);

		$this->setSortWheelsSimf();
		$this->getSortWheelsSimf()->setName('sort_wheels_simf');
		$this->getSortWheelsSimf()->setType(TYPE_NUM);

		$this->setIsDecoration();
		$this->getIsDecoration()->setName('is_decoration');
		$this->getIsDecoration()->setType(TYPE_UINT);

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
	public function getArticle() {
		return $this->article;
	}


	private function setArticle() {
		$this->article = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getStatus() {
		return $this->status;
	}


	private function setStatus(  ) {
		$this->status = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getItemId() {
		return $this->item_id;
	}


	private function setItemId() {
		$this->item_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTitle() {
		return $this->title;
	}

	private function setTitle() {
		$this->title = new DbColumn();
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
	public function getPriceSale() {
		return $this->price_sale;
	}

	private function setPriceSale() {
		$this->price_sale = new DbColumn();
	}
	/**
	 * @return DbColumn
	 */
	public function getOfferItemId() {
		return $this->offer_item_id;
	}

	private function setOfferItemId() {
		$this->offer_item_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriceOpt() {
		return $this->price_opt;
	}


	private function setPriceOpt() {
		$this->price_opt = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAmount() {
		return $this->amount;
	}

	private function setAmount() {
		$this->amount = new DbColumn();
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

	/**
	 * @return DbColumn
	 */
	public function getIcon() {
		return $this->icon;
	}

	private function setIcon() {
		$this->icon = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSourceUrl() {
		return $this->source_url;
	}

	private function setSourceUrl() {
		$this->source_url = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getCode() {
		return $this->code;
	}

	private function setCode() {
		$this->code = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getGroup() {
		return $this->group;
	}


	private function setGroup() {
		$this->group =  new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUrl() {
		return $this->url;
	}

	private function setUrl() {
		$this->url = new DbColumn();
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
	public function getPriceBefore() {
		return $this->price_before;
	}

	private function setPriceBefore() {
		$this->price_before =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getOffer1c() {
		return $this->offer_1c;
	}

	private function setOffer1c() {
		$this->offer_1c = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getSort() {
		return $this->sort;
	}

	private function setSort() {
		$this->sort =  new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAmountNal() {
		return $this->amount_nal;
	}

	private function setAmountNal() {
		$this->amount_nal = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getWeight() {
		return $this->weight;
	}

	private function setWeight() {
		$this->weight = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDiam() {
		return $this->diam;
	}

	private function setDiam() {
		$this->diam = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAmountNalOpt() {
		return $this->amount_nal_opt;
	}

	private function setAmountNalOpt() {
		$this->amount_nal_opt = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriceOptVip() {
		return $this->price_opt_vip;
	}


	private function setPriceOptVip() {
		$this->price_opt_vip =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriceFakt() {
		return $this->price_fakt;
	}


	private function setPriceFakt() {
		$this->price_fakt = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getString() {
		return $this->string;
	}


	private function setString( ) {
		$this->string = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSearch() {
		return $this->search;
	}


	private function setSearch( ) {
		$this->search = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriceOptBefore() {
		return $this->price_opt_before;
	}


	private function setPriceOptBefore() {
		$this->price_opt_before = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPriceOptVipBefore() {
		return $this->price_opt_vip_before;
	}


	private function setPriceOptVipBefore() {
		$this->price_opt_vip_before = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSortTyresFeo() {
		return $this->sort_tyres_feo;
	}

	private function setSortTyresFeo( ) {
		$this->sort_tyres_feo = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSortTyresEvpa() {
		return $this->sort_tyres_evpa;
	}

	private function setSortTyresEvpa() {
		$this->sort_tyres_evpa = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSortWheelsFeo() {
		return $this->sort_wheels_feo;
	}

	private function setSortWheelsFeo() {
		$this->sort_wheels_feo = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSortWheelsEvpa() {
		return $this->sort_wheels_evpa;
	}

	private function setSortWheelsEvpa() {
		$this->sort_wheels_evpa = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getAmountOpt() {
		return $this->amount_opt;
	}

	private function setAmountOpt() {
		$this->amount_opt = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSortTyresSimf() {
		return $this->sort_tyres_simf;
	}

	private function setSortTyresSimf() {
		$this->sort_tyres_simf = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getSortWheelsSimf() {
		return $this->sort_wheels_simf;
	}


	private function setSortWheelsSimf( ) {
		$this->sort_wheels_simf = new DbColumn();
	}
	/**
	 * @return DbColumn
	 */
	public function getIsDecoration() {
		return $this->offer_is_decoration;
	}


	private function setIsDecoration( ) {
		$this->offer_is_decoration = new DbColumn();
	}
}


class ShopOffersModel extends DbDataModel {

	/**
	 * @var  ShopOffersColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOffersColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_offers`');
		$this->setTableItemPrefix('offer_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOffersColumns();
		$this->columns_update=new ShopOffersColumns();
	}
	public function JoinImages () {
		$this->SetJoinImage('icon',$this->GetTableItemName('icon'));
		//$this->SetJoinImage('icon_back',$this->GetTableItemName('icon_back'));
	}

	public function SetJoinProducts() {
		$this->setSelectField(' `shop_items`.*');
		$this->setJoin(' LEFT JOIN `shop_items` ON `shop_items`.item_id= shop_offers.`offer_item_id`
		');
	}
	public function SetInnerFilters($full=0) {
		$this->setSelectFields(array('COUNT(DISTINCT(ff_data.sif_id)) as count','ff_data.*','ff_values.*'));
		/*$this->setJoin(' INNER JOIN `shop_items_filters` ff_data ON '.$this->GetTableItemName('id').'= ff_data.`sif_item_id`
		LEFT JOIN  core_sprav_values ff_values ON ff_data.sif_svid=ff_values.`svid`
		');*/

		$this->setJoin('INNER JOIN `shop_offers_filters` ff_data ON `shop_offers`.`offer_id`= ff_data.`sif_offer_id`
		INNER JOIN  core_sprav_values ff_values ON ff_data.sif_svid=ff_values.`svid` and ff_values.svid_status=1
		');

		if ($full) {
			$this->setJoin('INNER JOIN `core_sprav` ON ff_values.`sprav_id`= core_sprav.`sprav_id`
		');

		}
		$this->setGroupCustom('ff_data.sif_sprav_id,ff_data.sif_svid');
	}

	public function SetJoinFilters($sprav_id) {
		$this->setJoin(' INNER JOIN `shop_offers_filters` filters_data_'.$sprav_id.' ON `shop_offers`.`offer_id`= filters_data_'.$sprav_id.'.`sif_offer_id`
		');
	}

	public function SetInnerCats() {

		$this->setSelectFields(array('COUNT(*) as count','ff_data.*'));
		$this->setSelectField(' parent_data.cat_title as parent_cat_title, parent_data.cat_short_title as parent_cat_short_title ');
		$this->setJoin(' INNER JOIN `shop_categories` ff_data ON item_cat_id= ff_data.`cat_id` and ff_data.cat_status=1
		 INNER JOIN `shop_categories` parent_data ON ff_data.cat_parent_id=parent_data.`cat_id`  and parent_data.cat_status=1 ');
		$this->setGroupCustom('ff_data.cat_id');
	}
	public function SetJoinVendors() {
		$this->setJoin(' LEFT JOIN `shop_vendors`  ON shop_items.item_vendor_id= `shop_vendors`.`vendor_id` and shop_vendors.vendor_status=1
		
		');
	}
	public function SetInnerVendors() {
		$this->setSelectFields(array('COUNT(item_id) as count','`shop_vendors`.*'));
		$this->setJoin(' INNER JOIN `shop_vendors`  ON shop_items.item_vendor_id= `shop_vendors`.`vendor_id` and shop_vendors.vendor_status=1
		
		');
		$this->setGroupCustom('`shop_vendors`.vendor_id');
	}
}

class ShopOffers extends  DbData
{

	/**
	 * @var  ShopOffersModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOffersModel
	 */
	public function CreateModel () {
		$this->model=new ShopOffersModel();
	}

	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->SetJoinsItem($full);
	}
	public function getAsDecoration ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItemSimple();
	}
	public function MakeSearchSql( $q) {
		if ($q) {
			$explode=explode(' ',$q);
			$explode_sql=array();
			$stem=new Lingua_Stem_Ru();
			foreach ($explode as $element) {
				$stem_value=$stem->stem_word($element);
				if ($stem_value!='') {
					$explode_sql[]='(
						'.$this->SqlWherePrepare('like','shop_offers.offer_string',$stem_value).'
					)';
				}
			}

			$like_sql='';
			if (count($explode_sql)>0) {
				$like_sql='('.implode(' AND ',$explode_sql).')';
				$this->model->addWhereCustom($like_sql);
			}
		}

	}
	public function PrepareOffersCount(){
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName().'.offer_id, '.$this->model->getTableName().'.offer_item_id, 
                                                    COUNT(shop_offers.offer_item_id) as count');
        $this->model->columns_where->getItemId()->notValue(0);
        $this->model->setGroupBy('offer_item_id');
        $result = $this->GetList();
        $array = array();
        foreach ($result as $k=>$item) {
            $array[$item['offer_item_id']]= $item['count'];
        }
        return ($array);
    }

	public function PrepareData ($result_item,$full=0) {

		if ($result_item['item_short_title']=='') {
			$result_item['item_short_title']=$result_item['item_title'];
		}
		if ($this->registry->user_info['user_id']) {
			$result_item['offer_amount']=$result_item['offer_amount_opt'];
			$result_item['offer_amount_nal']=$result_item['offer_amount_nal_opt'];
		}
		if (isset($result_item['item_price'])) {
			$result_item['item_amount_zak']=$result_item['item_amount']-$result_item['item_amount_nal'];
			if (in_array($result_item['item_cat_id'],array(1,2))) {
				$pp_price=$result_item['item_price'];
				//$pp_price_before=$result_item['item_price_before'];
			}
			else {
				if ($this->registry->user->checkUserBrandSpecialPrice($result_item['item_vendor_id'])) {
					$pp_price=$result_item[$this->registry->user->getUserBrandSpecialItem($result_item['item_vendor_id'])];
					//$pp_price_before=$result_item[$this->registry->user->getUserBrandSpecialItem($result_item['item_vendor_id']).'_before'];
				}
				else {
					$pp_price=$result_item[$this->registry->shop->getUserGroupItemPrice()];
				//	$pp_price_before=$result_item[$this->registry->shop->getUserGroupItemPrice().'_before'];
				}
			}
			$result_item['item_price']=$pp_price;
			//$result_item['item_price_before']=$pp_price_before;
			//$result_item['item_price']=$this->registry->user->getDiscount($pp_price,$result_item['item_vendor_id']);
		}

		$result_item['offer_price1']=$result_item['offer_price'];
		$result_item['offer_price_opt1']=$result_item['offer_price_opt'];
		$result_item['offer_price_opt_vip1']=$result_item['offer_price_opt_vip'];
		$result_item['offer_price_before1']=$result_item['offer_price_before'];
		$result_item['offer_price_opt_before1']=$result_item['offer_price_opt_before'];
		$result_item['offer_price_opt_vip_before1']=$result_item['offer_price_opt_vip_before'];

		if (isset($result_item['offer_price'])) {
			$result_item['offer_amount_zak']=$result_item['offer_amount']-$result_item['offer_amount_nal'];
			if (in_array($result_item['item_cat_id'],array(1,2))) {
				$pp_price=$result_item['offer_price'];
				$pp_price_before=$result_item['offer_price_before'];
			}
			else {
				if ($this->registry->user->checkUserBrandSpecialPrice($result_item['item_vendor_id'])) {
					$pp_price=$result_item[$this->registry->user->getUserBrandSpecialOffer($result_item['item_vendor_id'])];
					$pp_price_before=$result_item[$this->registry->user->getUserBrandSpecialOffer($result_item['item_vendor_id']).'_before'];
				}
				else {
					$pp_price=$result_item[$this->registry->shop->getUserGroupOfferPrice()];
					$pp_price_before=$result_item[$this->registry->shop->getUserGroupOfferPrice().'_before'];
				}
			}

			$result_item['offer_price']=$pp_price;
			$result_item['offer_price_before']=$pp_price_before;

			//$result_item['offer_price']=$this->registry->user->getDiscount($pp_price,$result_item['item_vendor_id']);

			$result_item['item_price_opt']=$result_item['offer_price_opt'];
			$result_item['item_price_opt_vip']=$result_item['offer_price_opt_vip'];
			$result_item['item_price']=$result_item['offer_price'];

			$result_item['offer_price_f']=format_money($result_item['offer_price']);

			$result_item['percent']=0;
			if ($result_item['offer_price_before']!=0 and $result_item['offer_price_before']!=$result_item['offer_price'] and $result_item['offer_price_before']>$result_item['offer_price']) {
				$result_item['percent'] ='-'.(100-round($result_item['offer_price']/$result_item['offer_price_before']*100)).'%';
			}
			else {
				$result_item['offer_price_before']=0;
			}

		}
		$result_item['offer_short_title_main']=$result_item['offer_short_title'];
		if ($result_item['offer_short_title']=='') {
			$result_item['offer_short_title']=$result_item['offer_title'];
		}
		if ($this->registry->user_info['user_id']) {
			//$result_item['offer_amount_nal']=$result_item['offer_amount_nal_opt'];
			//$result_item['item_amount_nal']=$result_item['item_amount_nal_opt'];
		}
		//$result_item['item_price_before']=$result_item['offer_price_before'];
		//$result_item['offer_price_before']=0;

//		if ($result_item['offer_icon']) {
//			$result_item=$this->registry->files->FilePrepare($result_item,'icon_offer_');
//			$result_item['item_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_offer_');
//		}
//		else {
//			$result_item=$this->registry->files->FilePrepare($result_item,'icon_');
//			$result_item['item_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_');
//		}
            $result_item=$this->registry->files->FilePrepare($result_item,'icon_');
            $result_item['item_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_');

		if ($result_item['cat_url']) {
			$url_parts=explode('/',$result_item['cat_url']);
			$result_item['cat_last_url_part']=$url_parts[count($url_parts)-1];
			$result_item['full_cat_url']=BASE_URL.'/'.$result_item['cat_url'].'/';
		}

		if ($result_item['vendor_url'] ) {
			$result_item['vendor_full_url'] = BASE_URL.'/brands/'.$result_item['vendor_url'].'/';
		}
		if ($result_item['cat_url'] ) {
			$result_item['cat_full_url'] = BASE_URL.'/'.$result_item['cat_url'].'/';
			if ($result_item['vendor_url']) {
				$result_item['cat_vendor_full_url'] = BASE_URL.'/'.$result_item['cat_url'].'/'.$result_item['vendor_url'].'/';
			}

		}

		if ($result_item['item_id']) {

			$result_item['item_full_url'] = BASE_URL.'/goods/'.$result_item['item_id'].'/';



			if ($result_item['cat_url'] and $result_item['item_url'] and $result_item['vendor_url']) {

				$result_item['item_full_url'] = BASE_URL.'/'.trim($result_item['cat_url']).'/'.trim($result_item['item_url']).'.html';
				if ($result_item['offer_url']) {
                    $result_item['offer_url_ok']=true;
					$result_item['offer_full_url'] = BASE_URL.'/'.trim($result_item['cat_url']).'/'.trim($result_item['vendor_url']).'/'.trim($result_item['item_url']).'/'.trim($result_item['offer_url']).'/';
				}
				elseif($result_item['offer_id']) {
					$result_item['offer_full_url'] = BASE_URL.'/'.trim($result_item['cat_url']).'/'.trim($result_item['vendor_url']).'/'.trim($result_item['item_url']).'/id-'.trim($result_item['offer_id']).'/';
				}
			}

			if ($result_item['item_offers_total']<=1) {
				$result_item['offer_full_url']=$result_item['item_full_url'];
			}
			//$result_item['percent']=0;
			if ($result_item['item_price_before']!=0 and $result_item['item_price_before']!=$result_item['item_price'] and $result_item['item_price_before']>$result_item['item_price']) {
				//$result_item['percent'] ='-'.(100-round($result_item['item_price']/$result_item['item_price_before']*100)).'%';
			}
			else {
				$result_item['item_price_before']=0;
			}
		}


		if ($full==1) {
			$text_id=$result_item[$this->model->GetTableItemNameSimple('text_id')];
			if ($text_id) {
				$result_item['item_full_text'] = $this->registry->text->GetText($text_id);
				if (preg_match_all("#<style(.*)</style>#Uis", $result_item['item_full_text'], $res2)) {
					$result_item['item_full_text']=trim(str_replace($res2[0][0],'',$result_item['item_full_text']));
					$result_item['item_full_text']=str_replace('<span class="hide">','<span>',$result_item['item_full_text']);
					$result_item['item_full_text']=str_replace('<a href="#" class="details"><span>Подробнее</span></a>','',$result_item['item_full_text']);
				}

				$result_item['item_full_text']=preg_replace('/<div[^>]+[^>]*>/', '', $result_item['item_full_text']);
				$result_item['item_full_text']=preg_replace('#</div>#', '<br/>', $result_item['item_full_text']);
			}

			$video_id=$result_item[$this->model->GetTableItemNameSimple('video_id')];
			if ($video_id) {
				$result_item['item_full_video'] = $this->registry->text->GetText($video_id);
			}
		}

//		if ($result_item['vendor_icon']) {
//			$result_item=$this->registry->files->FilePrepare($result_item,'vendor_');
//			$result_item['vendor_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'vendor_');
//		}

//		if ($result_item['item_icons_dop']=='') {
//			$result_item['icons']=array();
//		}
//		else {
//			$result_item['icons']=unserialize($result_item['item_icons_dop']);
//		}
//		if ($result_item['item_dop']=='') {
//			$result_item['item_dop']=array();
//		}
		elseif(is_string($result_item['item_dop'])) {
			$result_item['item_dop']=unserialize($result_item['item_dop']);
		}

		if (preg_match_all("#".$result_item['vendor_name']."#Uis", $result_item['item_title'], $res2)==false) {
			$result_item['full_title'] = $result_item['vendor_name'] . ' ' . $result_item['item_title'];
		}
		else {
			$result_item['full_title'] = $result_item['item_title'];
		}

		if ($result_item['item_short_title']) {
				if (preg_match_all("#".$result_item['vendor_name']."#Uis", $result_item['item_short_title'], $res2)==false) {
					$result_item['model_full_title'] = $result_item['vendor_name'] . ' ' . $result_item['item_short_title'];
				}
				else {
					$result_item['model_full_title'] = $result_item['item_short_title'];
				}
		}


		$result_item['full_title2']=$result_item['full_title'];

		if (isset($result_item['offer_title']) and $result_item['offer_title']) {
			$result_item['full_title']=$result_item['offer_title'];
			if ($result_item['item_is_model'] and preg_match_all("#".$result_item['vendor_name']."#Uis", $result_item['full_title'], $res2)==false) {
				$result_item['full_title']=str_ireplace($result_item['item_title'], $result_item['vendor_name'].' '.$result_item['item_title'], $result_item['offer_title']);
			}
		}
		else {
			if ($result_item['item_is_model'] and preg_match_all("#".$result_item['vendor_name']."#Uis", $result_item['full_title'], $res2)==false) {
				$result_item['full_title']=str_ireplace($result_item['item_title'], $result_item['vendor_name'].' '.$result_item['item_title'], $result_item['full_title']);
			}
		}



		if (isset($result_item['offer_amount']) and $result_item['offer_amount']>40) {
			$result_item['offer_amount']='40';
		}
		if (isset($result_item['item_amount']) and $result_item['item_amount']>40) {
			$result_item['item_amount']='40';
		}
		if (isset($result_item['offer_amount_nal']) and $result_item['offer_amount_nal']>40) {
			$result_item['offer_amount_nal']='40';
		}
		if (isset($result_item['item_amount_nal']) and $result_item['item_amount_nal']>40) {
			$result_item['item_amount_nal']='40';
		}
		if (isset($result_item['offer_amount_zak']) and $result_item['offer_amount_zak']>40) {
			$result_item['offer_amount_zak']='40';
		}
		if (isset($result_item['item_amount_zak']) and $result_item['item_amount_zak']>40) {
			$result_item['item_amount_zak']='40';
		}


		/*if ($result_item['offer_id'] and $result_item['item_is_model']) {

		}
		else {
			$result_item['offer_full_url']=$result_item['item_full_url'];
		}*/
		return $result_item;
	}

	public function SetJoinsItem($int=0) {
		$this->model->setJoin(' INNER JOIN `shop_items` ON offer_item_id=`shop_items`.`item_id`');
		$this->model->setJoin(' LEFT JOIN `shop_categories` ON shop_items.item_cat_id=`shop_categories`.`cat_id`');
		$this->model->setJoin(' LEFT JOIN `shop_vendors` ON shop_items.item_vendor_id=`shop_vendors`.`vendor_id`');
		return parent::GetItem($int);
	}

	public function GetItemSimple($int=0) {
		return parent::GetItem($int);
	}

	public function GetTotal() {
		/*$this->model->setJoin(' INNER JOIN `shop_items` ON offer_item_id=`shop_items`.`item_id`');
		$this->model->setJoin(' INNER JOIN `shop_categories` ON shop_items.item_cat_id=`shop_categories`.`cat_id`');
		$this->model->setJoin(' LEFT JOIN `shop_vendors` ON shop_items.item_vendor_id=`shop_vendors`.`vendor_id`');*/
		return parent::GetTotal();
	}
	public function GetList($full=0) {
		if ($full) {
			$this->model->setJoin(' INNER JOIN `shop_items` ON offer_item_id=`shop_items`.`item_id`');
			$this->model->setJoin(' LEFT JOIN `shop_categories` ON shop_items.item_cat_id=`shop_categories`.`cat_id`');
//			$this->model->setJoin(' LEFT JOIN `shop_vendors` ON shop_items.item_vendor_id=`shop_vendors`.`vendor_id`');
		}

		return parent::GetList();
	}
	public function GetListSimple() {
		return parent::GetList();
	}
	public function AddProductPhotos ($item_id,$photos) {
		$this->registry->files->AddFileIdsItems('offer_photos', $item_id,$photos);
		$ids=array();
		foreach ($photos as $p_id ) {
			$ids[]=$p_id;
		}
		$this->registry->files->UpdateFileIdsItemsSort('offer_photos', $item_id,$ids);
	}
    public function getDecorations(){
	    $this->CreateModel();
	    $this->model->setSelectField($this->model->getTableName().".*");
	    $this->model->columns_where->getIsDecoration()->setValue(1);
	    return $this->GetList();
    }
	public function GetOrder ($key) {
		if ($key=='date') {
			$sort=$this->model->columns_where->getId()->getName();
			return $sort;
		}
		elseif ($key=='price') {
			$sort=$this->model->columns_where->getPrice()->getName();
			return $sort;
		}
		elseif ($key=='price2') {
			$sort=$this->model->columns_where->getPrice()->getName();
			return $sort;
		}
		elseif ($key=='views') {
			return 'item_views';
		}
		elseif ($key=='rate') {
			return 'item_rate';
		}
		elseif ($key=='sort') {
			$sort=$this->model->columns_where->getSort()->getName();
			return $sort;
		}
		$sort=$this->model->columns_where->getTitle()->getName();
		return $sort;

	}
	public function SetOrder ($key, $type='item') {
		if ($key=='date') {
			$sort=$this->model->columns_where->getId()->getName();
			$this->model->setOrderByWithColumn($sort);
			$this->model->setOrderWay('DESC');
		}
		elseif ($key=='price') {
			if ($type=='item') {
				$sort = $this->model->columns_where->getPrice()->getName();
				$this->model->setOrderByWithColumn( $sort );
			}
			else {
				$this->model->setOrderBy('shop_offers.offer_price');
			}
			$this->model->setOrderWay( 'DESC' );
		}
		elseif ($key=='price2') {
			if ($type=='item') {
				$sort = $this->model->columns_where->getPrice()->getName();
				$this->model->setOrderByWithColumn( $sort );
			}
			else {
				$this->model->setOrderBy('shop_offers.offer_price');
			}
			$this->model->setOrderWay('ASC');
		}
		elseif ($key=='views') {
			$this->model->setOrderBy('shop_items.item_views');
			$this->model->setOrderWay('DESC');
		}
		elseif ($key=='rate') {
			$this->model->setOrderBy('shop_items.item_rate');
			$this->model->setOrderWay('DESC');
		}
		elseif ($key=='sort') {
			if ($type=='item') {
				$sort=$this->model->columns_where->getSort()->getName();
				$this->model->setOrderByWithColumn($sort);
			}
			else {
				$this->model->setOrderBy('shop_offers.offer_sort');
			}
			$this->model->setOrderWay('ASC');
		}
		elseif ($key=='title') {
			if ($type=='item') {
				$this->model->setOrderBy('shop_vendors.vendor_name, shop_items.item_title');
			}
			else {
				$this->model->setOrderBy('shop_vendors.vendor_name, shop_items.item_title, shop_offers.offer_title');
			}
			$this->model->setOrderWay('ASC');
		}
		elseif ($key=='article') {
			if ($type=='item') {

			}
			else {
				$this->model->setOrderBy('shop_offers.offer_article');
			}
			$this->model->setOrderWay('ASC');
		}
		elseif ($key=='none') {

		}
		else {
			$sort=$this->model->columns_where->getTitle()->getName();
			$this->model->setOrderByWithColumn($sort);
		}

	}
}
