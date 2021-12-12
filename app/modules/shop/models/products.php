<?php

class ShopProductsColumns extends DbDataColumns
{

    private $id;
    private $is_model;
    private $cat_id;
    private $status;
    private $vendor_id;
    private $title;
    private $short_title;
    private $url;
    private $amount;
    private $amount_nal;
    private $amount_nal_opt;
    private $price;
    private $price_before;
    private $short_text;
    private $text_id;
    private $composition_id;
    private $video_id;
    private $comments;
    private $photo_id;
    private $photo_id2;
    private $rate;
    private $views;
    private $sale;
    private $new;
    private $hit;
    private $badge;
    private $offers;
    private $dop;
    private $offers_total;
    private $meta_title;
    private $meta_keywords;
    private $meta_desc;
    private $icons_dop;
    private $up;
    private $sort;
    private $time;
    private $article;
    private $sale_percent;

    private $parent_id;
    private $has_child;
    private $item_price_opt;
    private $source_url;
    private $item_price_opt_before;
    private $item_price_opt_vip;
    private $item_price_opt_vip_before;

    private $sort_tyres_feo;
    private $sort_tyres_evpa;
    private $sort_wheels_feo;
    private $sort_wheels_evpa;

    private $last_zero;


    public function __construct()
    {

        $this->setId();
        $this->getId()->setName('id');
        $this->getId()->setType(TYPE_UINT);

        $this->setCatId();
        $this->getCatId()->setName('cat_id');
        $this->getCatId()->setType(TYPE_UINT);

        $this->setStatus();
        $this->getStatus()->setName('status');
        $this->getStatus()->setType(TYPE_BOOL);

        $this->setVendorId();
        $this->getVendorId()->setName('vendor_id');
        $this->getVendorId()->setType(TYPE_UINT);

        $this->setTitle();
        $this->getTitle()->setName('title');
        $this->getTitle()->setType(TYPE_STR);

        $this->setShortTitle();
        $this->getShortTitle()->setName('short_title');
        $this->getShortTitle()->setType(TYPE_STR);

        $this->setUrl();
        $this->getUrl()->setName('url');
        $this->getUrl()->setType(TYPE_STR);

        $this->setAmount();
        $this->getAmount()->setName('amount');
        $this->getAmount()->setType(TYPE_UINT);

        $this->setAmountNal();
        $this->getAmountNal()->setName('amount_nal');
        $this->getAmountNal()->setType(TYPE_UINT);

        $this->setAmountNalOpt();
        $this->getAmountNalOpt()->setName('amount_nal_opt');
        $this->getAmountNalOpt()->setType(TYPE_UINT);

        $this->setPrice();
        $this->getPrice()->setName('price');
        $this->getPrice()->setType(TYPE_STR);

        $this->setPriceBefore();
        $this->getPriceBefore()->setName('price_before');
        $this->getPriceBefore()->setType(TYPE_UINT);

        $this->setShortText();
        $this->getShortText()->setName('short_text');
        $this->getShortText()->setType(TYPE_STR);

        $this->setArticle();
        $this->getArticle()->setName('article');
        $this->getArticle()->setType(TYPE_STR);

        $this->setTextId();
        $this->getTextId()->setName('text_id');
        $this->getTextId()->setType(TYPE_UINT);

        $this->setCompositionId();
        $this->getCompositionId()->setName('composition_id');
        $this->getCompositionId()->setType(TYPE_UINT);

        $this->setVideoId();
        $this->getVideoId()->setName('video_id');
        $this->getVideoId()->setType(TYPE_UINT);

        $this->setComments();
        $this->getComments()->setName('comments');
        $this->getComments()->setType(TYPE_UINT);

        $this->setPhotoId();
        $this->getPhotoId()->setName('icon');
        $this->getPhotoId()->setType(TYPE_STR);

        $this->setPhotoId2();
        $this->getPhotoId2()->setName('icon_back');
        $this->getPhotoId2()->setType(TYPE_UINT);

        $this->setRate();
        $this->getRate()->setName('rate');
        $this->getRate()->setType(TYPE_UNUM);

        $this->setViews();
        $this->getViews()->setName('views');
        $this->getViews()->setType(TYPE_UINT);

        $this->setSale();
        $this->getSale()->setName('sale');
        $this->getSale()->setType(TYPE_BOOL);

        $this->setNew();
        $this->getNew()->setName('new');
        $this->getNew()->setType(TYPE_BOOL);

        $this->setHit();
        $this->getHit()->setName('hit');
        $this->getHit()->setType(TYPE_BOOL);

        $this->setBadge();
        $this->getBadge()->setName('badge');
        $this->getBadge()->setType(TYPE_BOOL);

        $this->setMetaTitle();
        $this->getMetaTitle()->setName('head_title');
        $this->getMetaTitle()->setType(TYPE_STR);

        $this->setMetaKeywords();
        $this->getMetaKeywords()->setName('head_keywords');
        $this->getMetaKeywords()->setType(TYPE_STR);

        $this->setMetaDesc();
        $this->getMetaDesc()->setName('head_desc');
        $this->getMetaDesc()->setType(TYPE_STR);

        $this->setUp();
        $this->getUp()->setName('up');
        $this->getUp()->setType(TYPE_BOOL);

        $this->setSort();
        $this->getSort()->setName('sort');
        $this->getSort()->setType(TYPE_UINT);

        $this->setTime();
        $this->getTime()->setName('time');
        $this->getTime()->setType(TYPE_STR);


        $this->setIsModel();
        $this->getIsModel()->setName('is_model');
        $this->getIsModel()->setType(TYPE_BOOL);

        $this->setParentId();
        $this->getParentId()->setName('parent_id');
        $this->getParentId()->setType(TYPE_UINT);

        $this->setHasChild();
        $this->getHasChild()->setName('has_child');
        $this->getHasChild()->setType(TYPE_BOOL);

        $this->setOffers();
        $this->getOffers()->setName('offers');
        $this->getOffers()->setType(TYPE_UINT);

        $this->setItemPriceOpt();
        $this->getItemPriceOpt()->setName('price_opt');
        $this->getItemPriceOpt()->setType(TYPE_UINT);

        $this->setSourceUrl();
        $this->getSourceUrl()->setName('source_url');
        $this->getSourceUrl()->setType(TYPE_STR);

        $this->setIconsDop();
        $this->getIconsDop()->setName('icons_dop');
        $this->getIconsDop()->setType(TYPE_STR);

        $this->setDop();
        $this->getDop()->setName('dop');
        $this->getDop()->setType(TYPE_STR);


        $this->setOffersTotal();
        $this->getOffersTotal()->setName('offers_total');
        $this->getOffersTotal()->setType(TYPE_UINT);

        $this->setItemPriceOptBefore();
        $this->getItemPriceOptBefore()->setName('price_opt_before');
        $this->getItemPriceOptBefore()->setType(TYPE_UINT);

        $this->setItemPriceOptVip();
        $this->getItemPriceOptVip()->setName('price_opt_vip');
        $this->getItemPriceOptVip()->setType(TYPE_UINT);

        $this->setItemPriceOptVipBefore();
        $this->getItemPriceOptVipBefore()->setName('price_opt_vip_before');
        $this->getItemPriceOptVipBefore()->setType(TYPE_UINT);


        $this->setSortTyresEvpa();
        $this->getSortTyresEvpa()->setName('sort_tyres_evpa');
        $this->getSortTyresEvpa()->setType(TYPE_NUM);

        $this->setSortTyresFeo();
        $this->getSortTyresFeo()->setName('sort_tyres_feo');
        $this->getSortTyresFeo()->setType(TYPE_NUM);

        $this->setSortWheelsEvpa();
        $this->getSortWheelsEvpa()->setName('sort_wheels_evpa');
        $this->getSortWheelsEvpa()->setType(TYPE_NUM);

        $this->setSortWheelsFeo();
        $this->getSortWheelsFeo()->setName('sort_wheels_feo');
        $this->getSortWheelsFeo()->setType(TYPE_NUM);

        $this->setLastZero();
        $this->getLastZero()->setName('last_zero');
        $this->getLastZero()->setType(TYPE_UINT);

        $this->setSalePercent();
        $this->getSalePercent()->setName('sale_percent');
        $this->getSalePercent()->setType(TYPE_UINT);

    }

    /**
     * @return DbColumn
     */
    public function getId()
    {
        return $this->id;
    }

    private function setId()
    {
        $this->id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getOffersTotal()
    {
        return $this->offers_total;
    }

    private function setOffersTotal()
    {
        $this->offers_total = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getStatus()
    {
        return $this->status;
    }

    private function setStatus()
    {
        $this->status = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getTitle()
    {
        return $this->title;
    }

    private function setTitle()
    {
        $this->title = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getUrl()
    {
        return $this->url;
    }

    private function setUrl()
    {
        $this->url = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getArticle()
    {
        return $this->article;
    }

    private function setArticle()
    {
        $this->article = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSalePercent()
    {
        return $this->sale_percent;
    }

    private function setSalePercent()
    {
        $this->sale_percent = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getPhotoId()
    {
        return $this->photo_id;
    }

    private function setPhotoId()
    {
        $this->photo_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getPhotoId2()
    {
        return $this->photo_id2;
    }

    private function setPhotoId2()
    {
        $this->photo_id2 = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getTextId()
    {
        return $this->text_id;
    }


    private function setTextId()
    {
        $this->text_id = new DbColumn();
    }

    public function getCompositionId()
    {
        return $this->composition_id;
    }


    private function setCompositionId()
    {
        $this->composition_id = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    private function setMetaTitle()
    {
        $this->meta_title = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    private function setMetaKeywords()
    {
        $this->meta_keywords = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getMetaDesc()
    {
        return $this->meta_desc;
    }


    private function setMetaDesc()
    {
        $this->meta_desc = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    private function setCatId()
    {
        $this->cat_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getVendorId()
    {
        return $this->vendor_id;
    }

    private function setVendorId()
    {
        $this->vendor_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getAmount()
    {
        return $this->amount;
    }

    private function setAmount()
    {
        $this->amount = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getPrice()
    {
        return $this->price;
    }


    private function setPrice()
    {
        $this->price = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getPriceBefore()
    {
        return $this->price_before;
    }


    private function setPriceBefore()
    {
        $this->price_before = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getComments()
    {
        return $this->comments;
    }


    private function setComments()
    {
        $this->comments = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getRate()
    {
        return $this->rate;
    }

    private function setRate()
    {
        $this->rate = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getViews()
    {
        return $this->views;
    }

    private function setViews()
    {
        $this->views = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSale()
    {
        return $this->sale;
    }

    private function setSale()
    {
        $this->sale = new DbColumn();;
    }

    /**
     * @return DbColumn
     */
    public function getNew()
    {
        return $this->new;
    }


    private function setNew()
    {
        $this->new = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getHit()
    {
        return $this->hit;
    }

    private function setHit()
    {
        $this->hit = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getBadge()
    {
        return $this->badge;
    }


    private function setBadge()
    {
        $this->badge = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getShortText()
    {
        return $this->short_text;
    }

    private function setShortText()
    {
        $this->short_text = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getShortTitle()
    {
        return $this->short_title;
    }

    private function setShortTitle()
    {
        $this->short_title = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getUp()
    {
        return $this->up;
    }


    private function setUp()
    {
        $this->up = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSort()
    {
        return $this->sort;
    }

    private function setSort()
    {
        $this->sort = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getVideoId()
    {
        return $this->video_id;
    }

    private function setVideoId()
    {
        $this->video_id = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getTime()
    {
        return $this->time;
    }

    private function setTime()
    {
        $this->time = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getisModel()
    {
        return $this->is_model;
    }

    private function setIsModel()
    {
        $this->is_model = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    private function setParentId()
    {
        $this->parent_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getHasChild()
    {
        return $this->has_child;
    }

    private function setHasChild()
    {
        $this->has_child = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getOffers()
    {
        return $this->offers;
    }


    private function setOffers()
    {
        $this->offers = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getItemPriceOpt()
    {
        return $this->item_price_opt;
    }

    private function setItemPriceOpt()
    {
        $this->item_price_opt = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    private function setSourceUrl()
    {
        $this->source_url = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getIconsDop()
    {
        return $this->icons_dop;
    }

    private function setIconsDop()
    {
        $this->icons_dop = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getDop()
    {
        return $this->dop;
    }

    private function setDop()
    {
        $this->dop = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getAmountNal()
    {
        return $this->amount_nal;
    }


    private function setAmountNal()
    {
        $this->amount_nal = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getAmountNalOpt()
    {
        return $this->amount_nal_opt;
    }

    private function setAmountNalOpt()
    {
        $this->amount_nal_opt = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getItemPriceOptBefore()
    {
        return $this->item_price_opt_before;
    }


    private function setItemPriceOptBefore()
    {
        $this->item_price_opt_before = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getItemPriceOptVip()
    {
        return $this->item_price_opt_vip;
    }

    private function setItemPriceOptVip()
    {
        $this->item_price_opt_vip = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getItemPriceOptVipBefore()
    {
        return $this->item_price_opt_vip_before;
    }

    private function setItemPriceOptVipBefore()
    {
        $this->item_price_opt_vip_before = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getSortTyresFeo()
    {
        return $this->sort_tyres_feo;
    }

    private function setSortTyresFeo()
    {
        $this->sort_tyres_feo = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSortTyresEvpa()
    {
        return $this->sort_tyres_evpa;
    }

    private function setSortTyresEvpa()
    {
        $this->sort_tyres_evpa = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSortWheelsFeo()
    {
        return $this->sort_wheels_feo;
    }

    private function setSortWheelsFeo()
    {
        $this->sort_wheels_feo = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSortWheelsEvpa()
    {
        return $this->sort_wheels_evpa;
    }

    private function setSortWheelsEvpa()
    {
        $this->sort_wheels_evpa = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getLastZero()
    {
        return $this->last_zero;
    }

    private function setLastZero()
    {
        $this->last_zero = new DbColumn();
    }
}


class ShopProductsModel extends DbDataModel
{

    /**
     * @var  ShopProductsColumns $columns_where
     */
    public $columns_where;
    /**
     * @var  ShopProductsColumns $columns_update
     */
    public $columns_update;


    public function InitDop()
    {
        $this->setTableName('`shop_items`');
        $this->setTableItemPrefix('item_');
        $this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
        $this->columns_where = new ShopProductsColumns();
        $this->columns_update = new ShopProductsColumns();
    }

    public function SetJoinVendors($simple = false)
    {
        if ($simple) {

            $this->setSelectField(' `shop_vendors`.*');
            $this->setJoin(' LEFT JOIN `shop_vendors` ON ' . $this->GetTableItemName('vendor_id') . '=`shop_vendors`.`vendor_id` ');
        } else {
            $prefix = 'vendor';
            $this->setSelectField(' `shop_vendors`.*, ' . $prefix . '_data.file_sizes as ' . $prefix . '_file_sizes, ' . $prefix . '_data.file_folder as ' . $prefix . '_file_folder, ' . $prefix . '_data.file_name as ' . $prefix . '_file_name ');
            $this->setJoin(' LEFT JOIN `shop_vendors` ON ' . $this->GetTableItemName('vendor_id') . '=`shop_vendors`.`vendor_id` 
		 LEFT JOIN `core_files` ' . $prefix . '_data ON `shop_vendors`.vendor_icon=' . $prefix . '_data.`file_id` ');
        }

    }

    public function SetJoinCats2()
    {
        $this->setSelectField(' `shop_categories`.*');
        $this->setJoin(' LEFT JOIN `shop_categories` ON ' . $this->GetTableItemName('cat_id') . '=`shop_categories`.`cat_id`');
    }

    public function SetJoinCats($public = true)
    {
        $this->setSelectField(' `shop_categories`.*');
        $this->setJoin(' LEFT JOIN `shop_categories` ON ' . $this->GetTableItemName('cat_id') . '=`shop_categories`.`cat_id`');

        /*if ($public) {
            $this->setJoin(' LEFT JOIN `shop_categories` ON '.$this->GetTableItemName('cat_id').'=`shop_categories`.`cat_id` and `shop_categories`.cat_status=1 ');
        }
        else {
            $this->setJoin(' LEFT JOIN `shop_categories` ON '.$this->GetTableItemName('cat_id').'=`shop_categories`.`cat_id`');
        }*/
    }

    public function SetJoinStyles()
    {

    }

    public function SetJoinContent()
    {
        $this->setJoin(' INNER JOIN `content_items` ON ' . $this->GetTableItemName('id') . '= content_items.`item_id`
		');
    }

    public function SetJoinCities()
    {
        $this->setJoin(' INNER JOIN `shop_items_cities` ON ' . $this->GetTableItemName('id') . '= shop_items_cities.`item_id`
		INNER JOIN `shop_delivery_cities` ON shop_items_cities.`city_id`= shop_delivery_cities.`city_id` and city_status=1
		');
    }

    public function SetJoinBlocks()
    {
        $this->setJoin(' INNER JOIN `shop_block_items` ON ' . $this->GetTableItemName('id') . '= shop_block_items.`b_item_id`
		');
    }

    public function SetJoinAlso()
    {
        $this->setJoin(' INNER JOIN `shop_items_also` ON ' . $this->GetTableItemName('id') . '= shop_items_also.`item_related_id`
		INNER JOIN `shop_items` as related_items ON shop_items_also.`item_id`= related_items.`item_id` and related_items.item_status=1
		');
    }

    public function SetJoinParts2()
    {
        $this->setJoin(' INNER JOIN `shop_items_parts2` ON ' . $this->GetTableItemName('id') . '= shop_items_parts2.`item_id`');
    }

    public function SetJoinFilters($sprav_id)
    {
        /*$this->setJoin(' INNER JOIN `shop_items_filters` filters_data_'.$sprav_id.' ON '.$this->GetTableItemName('id').'= filters_data_'.$sprav_id.'.`sif_item_id`
        ');*/
        $this->setJoin(' INNER JOIN `shop_offers_filters` filters_data_' . $sprav_id . ' ON `shop_offers`.`offer_id`= filters_data_' . $sprav_id . '.`sif_offer_id`
		');
    }

    public function SetJoinItemFilters($sprav_id)
    {
        /*$this->setJoin(' INNER JOIN `shop_items_filters` filters_data_'.$sprav_id.' ON '.$this->GetTableItemName('id').'= filters_data_'.$sprav_id.'.`sif_item_id`
        ');*/
        $this->setJoin(' INNER JOIN `shop_items_filters` filters_data_' . $sprav_id . ' ON `shop_items`.`item_id`= filters_data_' . $sprav_id . '.`sif_item_id`
		');
    }

    public function SetInnerStyles()
    {

    }

    public function SetInnerVendors()
    {
        $this->setSelectFields(array('COUNT(item_id) as count', '`shop_vendors`.*'));
        $this->setJoin(' INNER JOIN `shop_vendors`  ON ' . $this->GetTableItemName('vendor_id') . '= `shop_vendors`.`vendor_id` and shop_vendors.vendor_status=1
		
		');
        $this->setGroupCustom('`shop_vendors`.vendor_id');
    }

    public function SetInnerCompare()
    {
        $this->setSelectField('
		compare_data
		'
        );
        $this->setJoin(' INNER JOIN `shop_parser_compare` ON ' . $this->GetTableItemName('id') . '= shop_parser_compare.`compare_item_id`');
        $this->setGroupCustom('shop_items.item_id');
    }


    public function SetInnerCats()
    {

        $this->setSelectFields(array('COUNT(item_id) as count', 'ff_data.*'));
        $this->setSelectField(' parent_data.cat_title as parent_cat_title, parent_data.cat_short_title as parent_cat_short_title ');
        $this->setJoin(' INNER JOIN `shop_categories` ff_data ON ' . $this->GetTableItemName('cat_id') . '= ff_data.`cat_id` and ff_data.cat_status=1
		 INNER JOIN `shop_categories` parent_data ON ff_data.cat_parent_id=parent_data.`cat_id`  and parent_data.cat_status=1 ');
        $this->setGroupCustom('ff_data.cat_id');
    }

    public function SetInnerItemFilters()
    {
        $this->setSelectFields(array('COUNT(DISTINCT(ff_data.sif_id)) as count', 'ff_data.*', 'ff_values.*'));
        $this->setJoin(' INNER JOIN `shop_items_filters` ff_data ON ' . $this->GetTableItemName('id') . '= ff_data.`sif_item_id`
		INNER JOIN  core_sprav_values ff_values ON ff_data.sif_svid=ff_values.`svid` and ff_values.svid_status=1
		');

        $this->setGroupCustom('ff_data.sif_sprav_id,ff_data.sif_svid');
    }

    public function SetInnerFilters()
    {
        $this->setSelectFields(array('COUNT(DISTINCT(ff_data.sif_id)) as count', 'ff_data.*', 'ff_values.*'));
        /*$this->setJoin(' INNER JOIN `shop_items_filters` ff_data ON '.$this->GetTableItemName('id').'= ff_data.`sif_item_id`
        LEFT JOIN  core_sprav_values ff_values ON ff_data.sif_svid=ff_values.`svid`
        ');*/

        $this->setJoin('INNER JOIN `shop_offers_filters` ff_data ON `shop_offers`.`offer_id`= ff_data.`sif_offer_id`
		INNER JOIN  core_sprav_values ff_values ON ff_data.sif_svid=ff_values.`svid` and ff_values.svid_status=1
		');


        $this->setGroupCustom('ff_data.sif_sprav_id,ff_data.sif_svid');
    }

    public function SetJoinFav()
    {
        $this->setJoin(' INNER JOIN `shop_item_fav` ON ' . $this->GetTableItemName('id') . '= shop_item_fav.`fav_item_id`
		');
    }

    public function SetJoinBasket()
    {

        $this->setSelectField(' `shop_item_basket`.*, `shop_items`.*');
        $this->setJoin(' 
		LEFT JOIN `shop_item_basket` ON shop_item_basket.`basket_item_id` = `shop_items`.`item_id`
		');
    }

    public function SetJoinOffers()
    {
        $this->setSelectField('shop_offers.*');
        $this->setJoin('LEFT JOIN shop_offers ON shop_items.item_id=shop_offers.offer_item_id');
    }

    public function SetJoinMinPriceOffer()
    {
        $this->setSelectField('offer.*');
        $this->setJoin('LEFT JOIN shop_offers offer ON offer.offer_id = ( 
                                        SELECT shop_offers.offer_id FROM shop_offers
                                        WHERE shop_items.item_id = shop_offers.offer_item_id
                                        ORDER BY offer.offer_sort
                                        LIMIT 1)');


    }


    public function SetJoinOrderItems()
    {
        $this->setSelectField(' `shop_item_order`.*');
        $this->setJoin(' LEFT JOIN `shop_offers` ON `shop_offers`.offer_id
		LEFT JOIN `shop_item_order` ON `shop_offers`.offer_id= shop_item_order.`oid_item_id`
		');
        $this->setSelectField(' `shop_categories`.*');
        $this->setJoin(' LEFT JOIN `shop_categories` ON ' . $this->GetTableItemName('cat_id') . '=`shop_categories`.`cat_id`');
        $this->SetJoinImage('icon', $this->GetTableItemName('icon'));
        $this->SetJoinImage('icon_offer', 'shop_offers.offer_icon');
    }

    public function SetJoinDeliveryItems()
    {
        $this->setSelectField(' `shop_item_order`.*');
        $this->setJoin(' LEFT JOIN `shop_offers` ON `shop_items`.item_id= shop_offers.`offer_item_id`
		LEFT JOIN `shop_item_order` ON `shop_offers`.offer_id= shop_item_order.`oid_item_id`
		LEFT JOIN `shop_order_delivery_items` ON `shop_item_order`.oid_id= shop_order_delivery_items.`od_item_id`
		');;
        $this->setSelectField(' `shop_categories`.*');
        $this->setJoin(' INNER JOIN `shop_categories` ON ' . $this->GetTableItemName('cat_id') . '=`shop_categories`.`cat_id`');
        $this->SetJoinImage('icon', $this->GetTableItemName('icon'));
        $this->SetJoinImage('icon_offer', 'shop_offers.offer_icon');
    }


    public function SetJoinLastViews()
    {
        $this->setJoin(' INNER JOIN `shop_item_views` ON ' . $this->GetTableItemName('id') . '= shop_item_views.`siv_item_id`
		');
    }

    public function SetJoinAll($status = true)
    {
        $this->SetJoinVendors();
        $this->SetJoinCats();
        $this->JoinImages();
        if ($status) {
            //$this->addWhereCustom("`shop_vendors`.vendor_status=1");
        }

    }

    public function JoinImages()
    {
        $this->SetJoinImage('icon', $this->GetTableItemName('icon'));

        //$this->SetJoinImage('icon_back',$this->GetTableItemName('icon_back'));
    }
}

class ShopProducts extends DbData
{

    /**
     * @var  ShopProductsModel $model
     */
    public $model;

    /**
     * @var $model ShopProductsModel
     */
    public function CreateModel()
    {
        $this->model = new ShopProductsModel();
    }

    public function GetItemById($id, $full = 0)
    {
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName() . '.*');
        $this->model->SetJoinAll();
        $this->model->columns_where->getId()->setValue($id);
        return $this->GetItem($full);
    }


    public function PrepareData($result_item, $full = 0)
    {
        $result_item['offer_short_title_main'] = $result_item['offer_short_title'];
        if ($result_item['offer_short_title'] == '') {
            $result_item['offer_short_title'] = $result_item['offer_title'];
        }
        if ($this->registry->user_info['user_id']) {
            $result_item['offer_amount_nal'] = $result_item['offer_amount_nal_opt'];
            $result_item['item_amount_nal'] = $result_item['item_amount_nal_opt'];
        }

        if ($result_item['item_icon']) {
            $result_item['item_icon_url'] = BASE_URL . '/uploads/images/products/medium/' . $result_item['item_icon'];
        } else {
            $result_item['item_icon_url'] = BASE_URL . '/assets/images/core/no-photo.png';
        }

        if ($result_item['cat_url']) {
            $url_parts = explode('/', $result_item['cat_url']);
            $result_item['cat_last_url_part'] = $url_parts[count($url_parts) - 1];
            $result_item['full_cat_url'] = BASE_URL . '/' . $result_item['cat_url'] . '/';
        }


        if ($result_item['cat_url']) {
            $result_item['cat_full_url'] = BASE_URL . '/' . $result_item['cat_url'] . '/';
            if ($result_item['vendor_url']) {
                $result_item['cat_vendor_full_url'] = BASE_URL . '/' . $result_item['cat_url'] . '/' . $result_item['vendor_url'] . '/';
            }

        }

        if ($result_item['item_id']) {

            $result_item['item_full_url'] = BASE_URL . '/' . $result_item['cat_url'] . '/' . $result_item['item_url'] . '.html';
            if ($result_item['offer_id']) {
                $result_item['offer_full_url'] = $result_item['item_full_url'] . 'id-' . trim($result_item['offer_id']) . '/';
            }


            if ($result_item['cat_url'] and $result_item['item_url'] and $result_item['vendor_url']) {
                $result_item['item_full_url'] = BASE_URL . '/' . trim($result_item['cat_url']) . '/' . trim($result_item['vendor_url']) . '/' . trim($result_item['item_url']) . '/';
                if ($result_item['offer_url']) {
                    $result_item['offer_full_url'] = BASE_URL . '/' . trim($result_item['cat_url']) . '/' . trim($result_item['vendor_url']) . '/' . trim($result_item['item_url']) . '/' . trim($result_item['offer_url']) . '/';
                } elseif ($result_item['offer_id']) {
                    $result_item['offer_full_url'] = BASE_URL . '/' . trim($result_item['cat_url']) . '/' . trim($result_item['vendor_url']) . '/' . trim($result_item['item_url']) . '/id-' . trim($result_item['offer_id']) . '/';
                }
            }
            $result_item['percent'] = 0;
            if ($result_item['item_price_before'] != 0 and $result_item['item_price_before'] != $result_item['item_price'] and $result_item['item_price_before'] > $result_item['item_price']) {
                //$result_item['percent'] ='-'.(100-round($result_item['item_price']/$result_item['item_price_before']*100)).'%';
            } else {
                $result_item['item_price_before'] = 0;
            }
        }


        if ($full == 1) {
            $text_id = $result_item[$this->model->GetTableItemNameSimple('text_id')];
            if ($text_id) {
                $result_item['item_full_text'] = $this->registry->text->GetText($text_id);
                if (preg_match_all("#<style(.*)</style>#Uis", $result_item['item_full_text'], $res2)) {
                    $result_item['item_full_text'] = trim(str_replace($res2[0][0], '', $result_item['item_full_text']));
                    $result_item['item_full_text'] = str_replace('<span class="hide">', '<span>', $result_item['item_full_text']);
                    $result_item['item_full_text'] = str_replace('<a href="#" class="details"><span>Подробнее</span></a>', '', $result_item['item_full_text']);
                }

                $result_item['item_full_text'] = preg_replace('/<div[^>]+[^>]*>/', '', $result_item['item_full_text']);
                $result_item['item_full_text'] = preg_replace('#</div>#', '<br/>', $result_item['item_full_text']);
            }

            $video_id = $result_item[$this->model->GetTableItemNameSimple('video_id')];
            if ($video_id) {
                $result_item['item_full_video'] = $this->registry->text->GetText($video_id);
                $key = $this->getYouTubeKey($result_item['item_full_video']);
                if ($key) {
                    $result_item['item_full_video'] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $key . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                }
            }
            $composition_id = $result_item[$this->model->GetTableItemNameSimple('composition_id')];
            if ($composition_id) {
                $result_item['item_full_composition'] = $this->registry->text->GetText($composition_id);
                if (preg_match_all("#<style(.*)</style>#Uis", $result_item['item_full_composition'], $res2)) {
                    $result_item['item_full_composition'] = trim(str_replace($res2[0][0], '', $result_item['item_full_composition']));
                    $result_item['item_full_composition'] = str_replace('<span class="hide">', '<span>', $result_item['item_full_composition']);
                    $result_item['item_full_composition'] = str_replace('<a href="#" class="details"><span>Подробнее</span></a>', '', $result_item['item_full_composition']);
                }

                $result_item['item_full_text'] = preg_replace('/<div[^>]+[^>]*>/', '', $result_item['item_full_text']);
                $result_item['item_full_text'] = preg_replace('#</div>#', '<br/>', $result_item['item_full_text']);
            }
        }

        if ($result_item['vendor_icon']) {
            $result_item = $this->registry->files->FilePrepare($result_item, 'vendor_');
            $result_item['vendor_icon_url'] = $this->registry->files->GetImageUrl($result_item, 'medium', 0, 'vendor_');
        }

        if ($result_item['item_icons_dop'] == '') {
            $result_item['icons'] = array();
        } else {
            $result_item['icons'] = unserialize($result_item['item_icons_dop']);
        }
        if ($result_item['item_dop'] == '') {
            $result_item['item_dop'] = array();
        } elseif (is_string($result_item['item_dop'])) {
            $result_item['item_dop'] = unserialize($result_item['item_dop']);
        }

        if (preg_match_all("#" . $result_item['vendor_name'] . "#Uis", $result_item['item_title'], $res2) == false) {
            $result_item['full_title'] = $result_item['vendor_name'] . ' ' . $result_item['item_title'];
        } else {
            $result_item['full_title'] = $result_item['item_title'];
        }

        if (preg_match_all("#" . $result_item['vendor_name'] . "#Uis", $result_item['item_short_title'], $res2) == false) {
            $result_item['model_full_title'] = $result_item['vendor_name'] . ' ' . $result_item['item_short_title'];
        } else {
            $result_item['model_full_title'] = $result_item['item_short_title'];
        }

        $result_item['full_title2'] = $result_item['full_title'];

        if (isset($result_item['offer_title']) and $result_item['offer_title']) {
            $result_item['full_title'] = $result_item['offer_title'];
            if ($result_item['item_is_model'] and preg_match_all("#" . $result_item['vendor_name'] . "#Uis", $result_item['full_title'], $res2) == false) {
                $result_item['full_title'] = str_ireplace($result_item['offer_title'], $result_item['vendor_name'] . ' ' . $result_item['offer_title'], $result_item['offer_title']);
            }
        } else {
            if ($result_item['item_is_model'] and preg_match_all("#" . $result_item['vendor_name'] . "#Uis", $result_item['full_title'], $res2) == false) {
                $result_item['full_title'] = str_ireplace($result_item['item_title'], $result_item['vendor_name'] . ' ' . $result_item['item_title'], $result_item['full_title']);
            }
        }


        if (isset($result_item['offer_amount']) and $result_item['offer_amount'] > 40) {
            $result_item['offer_amount'] = '40';
        }
        if (isset($result_item['item_amount']) and $result_item['item_amount'] > 40) {
            $result_item['item_amount'] = '40';
        }
        if (isset($result_item['offer_amount_nal']) and $result_item['offer_amount_nal'] > 40) {
            $result_item['offer_amount_nal'] = '40';
        }
        if (isset($result_item['item_amount_nal']) and $result_item['item_amount_nal'] > 40) {
            $result_item['item_amount_nal'] = '40';
        }
        if (isset($result_item['offer_amount_zak']) and $result_item['offer_amount_zak'] > 40) {
            $result_item['offer_amount_zak'] = '40';
        }
        if (isset($result_item['item_amount_zak']) and $result_item['item_amount_zak'] > 40) {
            $result_item['item_amount_zak'] = '40';
        }


        /*if ($result_item['offer_id'] and $result_item['item_is_model']) {

        }
        else {
            $result_item['offer_full_url']=$result_item['item_full_url'];
        }*/
        return $result_item;
    }


    public function getYouTubeKey($desc)
    {
        $youtube_key = '';

        if (preg_match_all("#youtube.com/embed/(.*)\"#Us", $desc, $res6)) {
            $jj = explode('&', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $jj = explode('?', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $youtube_key = $res6[1][0];
        } elseif (preg_match_all("#https://youtu.be/([[a-zA-Z0-9-_./]*)\"#Us", $desc, $res6)) {
            $jj = explode('&', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $jj = explode('?', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $youtube_key = $res6[1][0];
        } elseif (preg_match_all("#youtube.com/v/(.*)\"#Us", $desc, $res6)) {
            $jj = explode('&', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $jj = explode('?', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $youtube_key = $res6[1][0];
        } elseif (preg_match_all("#youtube.com/embed/(.*)'#Us", $desc, $res6)) {
            $jj = explode('&', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $jj = explode('?', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $youtube_key = $res6[1][0];
        } elseif (preg_match_all("#youtube.com/v/(.*)'#Us", $desc, $res6)) {
            $jj = explode('&', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $jj = explode('?', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $youtube_key = $res6[1][0];
        } elseif (preg_match_all("#youtu.be/(.*)'#Us", $desc, $res6)) {
            $jj = explode('&', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $jj = explode('?', $res6[1][0]);
            $res6[1][0] = $jj[0];
            $youtube_key = $res6[1][0];
        }

        return $youtube_key;
    }

    public function setOffersCount($offers = array())
    {
        if (count($offers)) {

            $product_ids = array_keys($offers);

            foreach ($offers as $product_id => $offer_count) {
                $this->CreateModel();
                $this->model->columns_where->getId()->setValue($product_id);
                $this->model->columns_update->getOffers()->setValue($offer_count);
                $this->model->columns_update->getOffersTotal()->setValue($offer_count);
                $this->Update();
            }

        }
    }

    public function SetOrder($key, $type = 'item')
    {
        if ($key == 'date') {
            $sort = $this->model->columns_where->getId()->getName();
            $this->model->setOrderByWithColumn($sort);
            $this->model->setOrderWay('DESC');
        } elseif ($key == 'price') {
            if ($type == 'item') {
                $sort = $this->model->columns_where->getPrice()->getName();
                $this->model->setOrderByWithColumn($sort);
            } else {
                $this->model->setOrderBy('shop_offers.offer_price');
            }
            $this->model->setOrderWay('DESC');
        } elseif ($key == 'price2') {
            if ($type == 'item') {
                $sort = $this->model->columns_where->getPrice()->getName();
                $this->model->setOrderByWithColumn($sort);
            } else {
                $this->model->setOrderBy('shop_offers.offer_price');
            }
            $this->model->setOrderWay('ASC');
        } elseif ($key == 'views') {
            $sort = $this->model->columns_where->getViews()->getName();
            $this->model->setOrderByWithColumn($sort);
            $this->model->setOrderWay('DESC');
        } elseif ($key == 'rate') {
            $sort = $this->model->columns_where->getRate()->getName();
            $this->model->setOrderByWithColumn($sort);
            $this->model->setOrderWay('DESC');
        } elseif ($key == 'sort') {
            if ($type == 'item') {
                $sort = $this->model->columns_where->getSort()->getName();
                $this->model->setOrderByWithColumn($sort);
            } else {
                $this->model->setOrderBy('shop_offers.offer_sort');
            }
            $this->model->setOrderWay('ASC');
        } elseif ($key == 'title') {
            if ($type == 'item') {
                $this->model->setOrderBy('shop_vendors.vendor_name, shop_items.item_title');
            } else {
                $this->model->setOrderBy('shop_vendors.vendor_name, shop_items.item_title, shop_offers.offer_title');
            }
            $this->model->setOrderWay('ASC');
        } elseif ($key == 'article') {
            if ($type == 'item') {

            } else {
                $this->model->setOrderBy('shop_offers.offer_article');
            }
            $this->model->setOrderWay('ASC');
        } elseif ($key == 'none') {

        } else {
            $sort = $this->model->columns_where->getTitle()->getName();
            $this->model->setOrderByWithColumn($sort);
        }

    }

    public function GetOrder($key)
    {
        if ($key == 'date') {
            $sort = $this->model->columns_where->getId()->getName();
            return $sort;
        } elseif ($key == 'price') {
            $sort = $this->model->columns_where->getPrice()->getName();
            return $sort;
        } elseif ($key == 'price2') {
            $sort = $this->model->columns_where->getPrice()->getName();
            return $sort;
        } elseif ($key == 'views') {
            $sort = $this->model->columns_where->getViews()->getName();
            return $sort;
        } elseif ($key == 'rate') {
            $sort = $this->model->columns_where->getRate()->getName();
            return $sort;
        } elseif ($key == 'sort') {
            $sort = $this->model->columns_where->getSort()->getName();
            return $sort;
        }
        $sort = $this->model->columns_where->getTitle()->getName();
        return $sort;

    }

    public function AddProductPhotos($item_id, $photos)
    {
        $this->registry->files->AddFileIdsItems('product_photos', $item_id, $photos);
        $ids = array();
        foreach ($photos as $p_id) {
            $ids[] = $p_id;
        }
        $this->registry->files->UpdateFileIdsItemsSort('product_photos', $item_id, $ids);
    }

    public function GetAlsoItems($item_id)
    {

        $this->CreateModel();
        $this->model->columns_where->getStatus()->setValue(true);
        $this->model->setTablePrimaryKey('');
        $this->model->setSelectField($this->model->getTableName() . '.*');
        $this->model->SetJoinImage('icon', $this->model->GetTableItemName('icon'));
        $this->model->SetJoinAlso();
        $this->model->SetJoinCats();
        $this->model->setOrderBy('`sort`');
        $this->model->addWhereCustom(
            $this->SqlWherePrepare('simple', 'shop_items_also.item_id', $item_id)
        );
        return $this->GetList();
    }

    public function GetCommentsItems($cat_id = 0, $count = 20)
    {
        $top_cats = $this->registry->template->global_vars['menu_cats'];

        $cats_all = array();

        if ($cat_id > 0) {
            $cats_all[] = $cat_id;
            $cats_all = array_merge($cats_all, $this->registry->shop->cats->GetAllCatsIds($top_cats, $cat_id));
        }


        $this->CreateModel();
        $this->model->columns_where->getStatus()->setValue(true);
        $this->model->setTablePrimaryKey('');
        $this->model->setSelectField($this->model->getTableName() . '.*');
        $this->model->SetJoinCats();
        $this->model->columns_where->getHasChild()->setValue(false);
        $this->model->SetJoinVendors();
        $this->model->setOrderBy('`item_comments`');
        $this->model->setOrderWay('DESC');
        $this->model->setCount($count);
        if (count($cats_all) > 0) {
            $this->model->columns_where->getCatId()->inValues($cats_all);
        }
        return $this->GetList();
    }

    public function GetPopItems($cat_id)
    {
        $top_cats = $this->registry->template->global_vars['menu_cats'];

        $cats_all = array(
            $cat_id
        );

        $cats_all = array_merge($cats_all, $this->registry->shop->cats->GetAllCatsIds($top_cats, $cat_id));
        $this->CreateModel();
        $this->model->columns_where->getStatus()->setValue(true);
        $this->model->setTablePrimaryKey('');
        $this->model->setSelectField($this->model->getTableName() . '.*');
        $this->model->SetJoinImage('icon', $this->model->GetTableItemName('icon'));
        $this->model->columns_where->getPhotoId()->notValue(0);
        $this->model->SetJoinCats();
        $this->model->columns_where->getHasChild()->setValue(false);
        $this->model->SetJoinVendors();
        $this->model->setOrderBy('`item_sort`');
        $this->model->setCount(20);
        if (count($cats_all) > 0) {
            $this->model->columns_where->getCatId()->inValues($cats_all);
        }
        return $this->GetList();
    }

    public function GetParts2Items($part_id)
    {

        $this->CreateModel();
        $this->model->columns_where->getStatus()->setValue(true);
        $this->model->setTablePrimaryKey('');
        $this->model->setSelectField($this->model->getTableName() . '.*');
        $this->model->SetJoinImage('icon', $this->model->GetTableItemName('icon'));
        $this->model->SetJoinCats();
        $this->model->SetJoinParts2();
        $this->model->columns_where->getHasChild()->setValue(false);
        $this->model->addWhereCustom(
            $this->SqlWherePrepare('simple', 'shop_items_parts2.part_id', $part_id)
        );
        return $this->GetList();
    }

    public function GetParts2Ids($part_id)
    {
        $data = array();
        $result = $this->db->query_read('SELECT shop_items_parts2.item_id FROM shop_items_parts2
		INNER JOIN shop_items ON shop_items_parts2.item_id=shop_items.item_id and shop_items.item_status=1
		WHERE part_id=' . $this->db->sql_prepare($part_id));
        while ($result_item = $this->db->fetch_array($result)) {
            $data[] = $result_item['item_id'];
        }
        return $data;
    }


    public function GetAlsoCatItems($cat_id)
    {
        $this->registry->shop->cats_aks->CreateModel();
        $this->registry->shop->cats_aks->model->columns_where->getCatId()->setValue($cat_id);
        $result = $this->registry->shop->cats_aks->GetListSimple();

        $result = $this->registry->shop->cats_aks->ToArray($result);

        $this->registry->shop->cats->CreateModel();
        $this->registry->shop->cats->model->columns_where->getStatus()->setValue(true);
        $cats = $this->registry->shop->cats->GetList();
        $CatsMenu = $this->registry->shop->cats->MakeTree(0, $cats);

        $cats = array();
        foreach ($result as $item) {
            if ($item['sca_also_id'] > 0) {
                $cats[] = $item['sca_also_id'];
                $cats = array_merge($cats, $this->registry->shop->cats->GetAllCatsIds($CatsMenu, $item['sca_also_id']));
            }
        }

        if (count($cats) > 0) {
            $this->CreateModel();
            $this->model->columns_where->getStatus()->setValue(true);
            $this->model->setTablePrimaryKey('');
            $this->model->setSelectField($this->model->getTableName() . '.*');
            $this->model->SetJoinImage('icon', $this->model->GetTableItemName('icon'));
            $this->model->SetJoinCats();
            $this->model->columns_where->getCatId()->inValues($cats);
            $this->model->columns_where->getPhotoId()->notValue(0);
            $this->model->columns_where->getOffersTotal()->notValue(0);
            $this->model->columns_where->getPrice()->notValue(0);
            $this->model->columns_where->getAmount()->notValue(0);
            $this->model->setOrderBy('`item_sort`');
            $this->model->setCount(24);
            $data = $this->GetList();

            shuffle($data);
            $data = array_slice($data, 0, 12);
            return $data;
        } else {
            return array();
        }


    }

    public function AddItemComment($shop_item_id, $status, $user_id, $author, $text, $p_time, $rank, $comment_data = array())
    {
        return $this->registry->comments->AddComment('shop_item', $shop_item_id, $status, $user_id, $author, $text, $p_time, $rank, $comment_data);
    }

    public function MakeSearchSql($q)
    {
        if ($q) {
            $explode = explode(' ', $q);
            $explode_sql = array();
            $stem = new Lingua_Stem_Ru();
            foreach ($explode as $element) {
                $stem_value = $stem->stem_word($element);
                if ($stem_value != '') {
                    $explode_sql[] = '(
						' . $this->SqlWherePrepare('like', 'shop_offers.offer_string', $stem_value) . '
					)';
                }
            }

            $like_sql = '';
            if (count($explode_sql) > 0) {
                $like_sql = '(' . implode(' AND ', $explode_sql) . ')';
                $this->model->addWhereCustom($like_sql);
            }
        }

    }

    public function MakeSearchSql2($q)
    {
        if ($q) {
            $explode = explode(' ', $q);
            $explode_sql = array();
            $stem = new Lingua_Stem_Ru();
            foreach ($explode as $element) {
                $stem_value = $stem->stem_word($element);
                if ($stem_value != '') {
                    $explode_sql[] = '(
						' . $this->SqlWherePrepare('like', 'shop_vendors.vendor_name', $stem_value) . ' OR
							' . $this->SqlWherePrepare('like', 'shop_items.item_title', $stem_value) . '
					)';
                }
            }

            $like_sql = '';
            if (count($explode_sql) > 0) {
                $like_sql = '(' . implode(' AND ', $explode_sql) . ')';
                $this->model->addWhereCustom($like_sql);
            }
        }

    }

    function GetBasket()
    {
        $items = array();
        if ($this->registry->user_info['user_id'] or $this->registry->user_info['sessionhash']) {
            $this->CreateModel();
            $this->model->setSelectField('shop_items.*, `shop_item_basket`.*');
            $this->model->setJoin('LEFT JOIN `shop_item_basket` ON shop_item_basket.`basket_item_id` = `shop_items`.`item_id`');
            if ($this->registry->user_info['user_id']) {
                $this->model->addWhereCustom(
                    $this->SqlWherePrepare('simple', '`shop_item_basket`.basket_user_id', $this->registry->user_info['user_id'])
                );
            } else {
                $this->model->addWhereCustom(
                    $this->SqlWherePrepare('simple', '`shop_item_basket`.basket_sessionhash', $this->registry->user_info['sessionhash'])
                );
            }
            $this->model->addWhereCustom("basket_id");
            $this->model->setGroupBy("basket_id");
            $items = $this->GetList();

        }

        $total = 0;
        $sum = 0;

        $new_items = array();

        foreach ($items as $item) {
            $total = $total + $item['basket_count'];
            $item['basket_sub_total'] = $item['basket_count'] * $item['item_price'];
            $sum = $sum + $item['basket_sub_total'];
            $new_items[$item['item_id']] = $item;
        }
        $items = $new_items;

        $this->registry->template->global_vars['basket_total'] = $total;

        $this->registry->template->global_vars['basket_items'] = $items;

        $this->registry->template->global_vars['basket_items_count'] = count($items);
        $this->registry->template->global_vars['basket_sum'] = $sum;


        return array(
            'items' => $items,
            'total' => $total,
            'sum' => $sum
        );
    }

    function GetOrderItems($order_id)
    {
        $this->CreateModel();
        $this->model->setSelectField('`shop_item_order`.*, `shop_items`.*, `shop_offers`.*, `shop_categories`.*');
        $this->model->SetJoinOrderItems();
        $this->model->SetJoinVendors();
        $this->model->addWhereCustom(
            $this->SqlWherePrepare('simple', '`shop_item_order`.oid_order_id', $order_id)
        );

        $this->model->setTablePrimaryKey('oid_id');
        $array = $this->GetList();
        $new = array();

        foreach ($array as $a) {
            $new[] = $this->PrepareData($a);
        }
        return $new;
    }

    function GetOrderItem($order_id, $item_id)
    {
        $this->CreateModel();
        $this->model->setSelectField('`shop_item_order`.*, `shop_items`.*, `shop_offers`.*');
        $this->model->SetJoinOrderItems();
        $this->model->SetJoinVendors();

        $this->model->addWhereCustom(
            $this->SqlWherePrepare('simple', '`shop_item_order`.oid_order_id', $order_id)
        );
        $this->model->addWhereCustom(
            $this->SqlWherePrepare('simple', '`shop_item_order`.oid_item_id', $item_id)
        );

        $array = $this->GetItem();
        if ($array) {
            $array = $this->PrepareData($array);
        }

        return $array;
    }

    function GetDeliveryItems($del_id)
    {
        $this->CreateModel();
        $this->model->setSelectField('`shop_item_order`.*, `shop_items`.*, `shop_offers`.*');
        $this->model->SetJoinDeliveryItems();
        $this->model->SetJoinVendors();

        $this->model->addWhereCustom(
            $this->SqlWherePrepare('simple', '`shop_order_delivery_items`.od_del_id', $del_id)
        );

        $this->model->setTablePrimaryKey('');
        $array = $this->GetList();
        $new = array();

        foreach ($array as $a) {
            $new[] = $this->PrepareData($a);
        }
        return $new;
    }

    public function SetGlobalFav()
    {
        $this->CreateModel();
        $this->model->SetJoinFav();
        $this->model->columns_where->getStatus()->setValue(true);
        if ($this->registry->user_info['user_id']) {
            $this->model->addWhereCustom(
                $this->SqlWherePrepare('simple', 'fav_user_id', $this->registry->user_info['user_id'])
            );
        } elseif ($this->registry->user_info['sessionhash']) {
            $this->model->addWhereCustom(
                $this->SqlWherePrepare('simple', 'fav_sessionhash', $this->registry->user_info['sessionhash'])
            );
        }
        $this->registry->template->global_vars['fav_total'] = $this->GetTotal();

        /*$this->CreateModel();

        $this->model->SetJoinFav();
        $this->model->setSelectField($this->model->getTableName().'.*');
        $this->model->SetJoinCats();
        $this->model->SetJoinVendors();
        $this->model->SetJoinImage('icon',$this->model->GetTableItemName('icon'));
        $this->model->columns_where->getStatus()->setValue( true );
        if ( $this->registry->user_info['user_id'] ) {
            $this->model->addWhereCustom(
                $this->SqlWherePrepare( 'simple', 'fav_user_id', $this->registry->user_info['user_id'] )
            );
        } else {
            $this->model->addWhereCustom(
                $this->SqlWherePrepare( 'simple', 'fav_sessionhash', $this->registry->user_info['sessionhash'] )
            );
        }
        $this->registry->template->global_vars['fav_items'] = $this->GetList();*/
    }

    function CheckCityItem($item_id, $city_id)
    {
        return $this->db->query_first("SELECT *
    	FROM shop_items_cities
    	WHERE item_id=" . $this->db->sql_prepare($item_id) . ' AND city_id=' . $this->db->sql_prepare($city_id));
    }

    function DeleteCityItem($item_id, $city_id)
    {
        return $this->db->query_write("DELETE FROM shop_items_cities
    	WHERE item_id=" . $this->db->sql_prepare($item_id) . ' AND city_id=' . $this->db->sql_prepare($city_id));
    }

    function AddCityItem($item_id, $city_id)
    {
        $this->db->query_write("INSERT INTO `shop_items_cities`
                (`item_id`,`city_id`)
                VALUES (
                " . $this->db->sql_prepare($item_id) . ",
                " . $this->db->sql_prepare($city_id) . "
                )
          ");
    }

    function UpdateCityItemsSort($city_id, $files)
    {
        $pos = 0;
        foreach ($files as $id) {
            $id = intval($id);
            $this->UpdateCityItemSort($city_id, $id, $pos);
            $pos++;
        }
    }

    function UpdateCityItemSort($city_id, $item_id, $pos)
    {
        return $this->db->query_write("UPDATE `shop_items_cities`
         SET `sort`=" . $this->db->sql_prepare($pos) . "
         WHERE  `item_id`=" . $this->db->sql_prepare($item_id) . " AND city_id=" . $this->db->sql_prepare($city_id));
    }

    function CheckParts2Item($part_id, $item_id)
    {
        return $this->db->query_first("SELECT *
    	FROM shop_items_parts2
    	WHERE part_id=" . $this->db->sql_prepare($part_id) . ' AND item_id=' . $this->db->sql_prepare($item_id));
    }

    function CheckAlsoItem($item_id, $also_id)
    {
        return $this->db->query_first("SELECT *
    	FROM shop_items_also
    	WHERE item_id=" . $this->db->sql_prepare($item_id) . ' AND item_related_id=' . $this->db->sql_prepare($also_id));
    }

    function DeleteAlsoItem($item_id, $also_id)
    {
        return $this->db->query_write("DELETE FROM shop_items_also
    	WHERE item_id=" . $this->db->sql_prepare($item_id) . ' AND item_related_id=' . $this->db->sql_prepare($also_id));
    }

    function DeleteParts2Item($part_id, $item_id)
    {
        return $this->db->query_write("DELETE FROM shop_items_parts2
    	WHERE part_id=" . $this->db->sql_prepare($part_id) . ' AND item_id=' . $this->db->sql_prepare($item_id));
    }

    function AddParts2Item($part_id, $item_id)
    {
        $this->db->query_write("INSERT INTO `shop_items_parts2`
                (`part_id`,`item_id`)
                VALUES (
                " . $this->db->sql_prepare($part_id) . ",
                " . $this->db->sql_prepare($item_id) . "
                )
          ");
    }

    function AddAlsoItem($item_id, $also_id)
    {
        $this->db->query_write("INSERT INTO `shop_items_also`
                (`item_id`,`item_related_id`)
                VALUES (
                " . $this->db->sql_prepare($item_id) . ",
                " . $this->db->sql_prepare($also_id) . "
                )
          ");
    }

    function UpdateAlsoItemsSort($item_id, $files)
    {
        $pos = 0;
        foreach ($files as $also_id) {
            $also_id = intval($also_id);
            $this->UpdateAlsoItemSort($item_id, $also_id, $pos);
            $pos++;
        }
    }

    function UpdateAlsoItemSort($item_id, $also_id, $pos)
    {
        return $this->db->query_write("UPDATE `shop_items_also`
         SET `sort`=" . $this->db->sql_prepare($pos) . "
         WHERE  `item_id`=" . $this->db->sql_prepare($item_id) . " AND item_related_id=" . $this->db->sql_prepare($also_id));
    }

    function TopVendors($cat_id)
    {
        $this->registry->cache->init();
        $array = $this->registry->cache->get('TopVendors_' . $cat_id);
        if ($array) {
            $array = unserialize($array);
        } else {
            $top_cats = $this->registry->template->global_vars['menu_cats'];
            $cats_all = array(
                $cat_id
            );
            $cats_all = array_merge($cats_all, $this->registry->shop->cats->GetAllCatsIds($top_cats, $cat_id));
            $this->CreateModel();
            $this->model->setSelectField('shop_vendors.*,shop_categories.*,  SUM(item_id) as views_sum, bg_data.file_sizes as bg_file_sizes, bg_data.file_folder as bg_file_folder, bg_data.file_name as bg_file_name');
            $this->model->setJoin(' INNER JOIN `shop_vendors`  ON ' . $this->model->GetTableItemName('vendor_id') . '= shop_vendors.`vendor_id` and shop_vendors.vendor_status=1 and shop_vendors.vendor_minus=0
                LEFT JOIN `core_files` bg_data ON `shop_vendors`.vendor_bg=bg_data.`file_id`
                INNER JOIN `shop_categories`  ON shop_items.item_cat_id= shop_categories.`cat_id` and shop_categories.cat_status=1');
            $this->model->setGroupCustom('shop_vendors.vendor_id');
            $this->model->setHaving(' HAVING COUNT(item_id)>0 ');
            $this->model->columns_where->getPrice()->notValue(0);
            $this->model->columns_where->getAmount()->notValue(0);
            $this->model->setCount(30);
            $this->model->setOrderBy('views_sum');
            $this->model->setOrderWay('DESC');
            $this->model->setTablePrimaryKey('');
            if (count($cats_all) > 0) {
                $this->model->columns_where->getCatId()->inValues($cats_all);
            }
            $data = $this->GetList();
            $array = array();
            foreach ($data as $result_item) {
                $result_item = $this->registry->files->FilePrepare($result_item, 'bg_');
                $result_item['vendor_bg_url'] = $this->registry->files->GetImageUrl($result_item, 'medium', 0, 'bg_');
                $array[] = $result_item;
            }
            $this->registry->cache->set('TopVendors_' . $cat_id, serialize($array), 48);
        }
        return $array;
    }

    public function getLastViews()
    {
        if ($_COOKIE['last_viewed']) {
            $ids = explode(',', json_decode($_COOKIE['last_viewed']));
            $this->CreateModel();
            $this->model->setSelectField($this->model->getTableName() . ".*, shop_categories.cat_url");
            $this->model->SetJoinImage('icon', $this->model->GetTableItemName('icon'));
            $this->model->columns_where->getId()->inValues($ids);
            $this->model->SetJoin('LEFT JOIN shop_categories ON shop_items.item_cat_id = shop_categories.cat_id');
            return $this->GetList();
        }

    }

    public function getCategories()
    {
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName() . ".item_id, " . $this->model->getTableName() . ".item_cat_id");
        $result = $this->GetList();

        foreach ($result as $k => $result_item) {
            $result[$k] = $result_item['item_cat_id'];
        }
        return $result;
    }
}
