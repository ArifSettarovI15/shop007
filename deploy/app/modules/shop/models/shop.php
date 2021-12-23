<?php


class ShopClass
{
    /**
     * @var MainClass
     */
    var $registry;
    /**
     * @var DatabaseClass
     */
    var $db;

    /**
     * @var array
     */
    var $lang;

    /**
     * @var array
     */
    var $lang_js;

	/**
	 * @var ShopCats
	 */
    var $cats;
	/**
	 * @var ShopCatsAks
	 */
	var $cats_aks;

	/**
	 * @var ShopCatsFilters
	 */
	var $cats_filters;

	/**
	 * @var ShopVendors
	 */
	var $vendors;

	/**
	 * @var ShopProducts
	 */
	var $products;

	/**
	 * @var ShopItemFilters
	 */
	var $products_filters;

	/**
	 * @var ShopOfferFilters
	 */
	var $offers_filters;

	/**
	 * @var ShopItemViews
	 */
	var $item_views;

	/**
	 * @var ShopSubscribesList
	 */
	var $subscribe_list;

	/**
 * @var ShopSubscribes
 */
	var $subscribe;

	/**
	 * @var ShopFav
	 */
	var $fav;

	/**
	 * @var ShopBasket
	 */
	var $basket;

	/**
	 * @var ShopOrders
	 */
	var $orders;


	/**
	 * @var ShopOrderItems
	 */
	var $order_items;

	/**
	 * @var DeliveryCities
	 */
	var $delivery_cities;

	/**
	 * @var ShopItemParts
	 */
	var $item_parts;

	/**
	 * @var ShopItemParts2
	 */
	var $item_parts2;

	/**
	 * @var ShopParts
	 */
	var $parts;

	var $stem;


	/**
	 * @var ShopNotifyList
	 */
	var $notify_list;

	/**
	 * @var ShopNotify
	 */
	var $notify;


	/**
	 * @var ShopNotifyData
	 */
	var $notify_data;

	/**
	 * @var ShopNotifyAdmin
	 */
	var $notify_admin;

	/**
	 * @var ShopBanners
	 */
	var $banners;

	/**
	 * @var Postav
	 */
	var $postav;

	/**
	 * @var ShopOffers
	 */
	var $offers;

	/**
	 * @var SearchAuto
	 */
	var $search;

	/**
	 * @var ShopBill
	 */
	var $bill;

	/**
	 * @var DeliveryDays
	 */
	var $days;

	/**
	 * @var DeliveryUser
	 */
	var $delivery_user;

	/**
	 * @var ShopOrderHistory
	 */
	var $order_history;

	/**
	 * @var ShopOrdersDel
	 */
	var $order_del;

	/**
	 * @var ShopOrdersDelItem
	 */
	var $order_del_item;


	/**
	 * @var TigerFaqs
	 */
	var $faqs;

	/**
	 * @var TigerFaqsList
	 */
	var $faqs_list;


    /**
     * @var ItemDecorations
     */
    var $item_decor;

	/**
	 * @var ShopReviews
	 */
	var $reviews;

	/**
	 * @var ShopCallbacks
	 */
	var $callbacks;



	public function __construct(&$registry)
    {

	    $this->stem=new Lingua_Stem_Ru();

        $this->registry =& $registry;
        $this->db =& $this->registry->db;

	    require_once 'cats.php';
	    require_once 'cats_aks.php';
	    require_once 'cats_filters.php';
	    require_once 'vendors.php';
	    require_once 'products.php';
	    require_once 'item_filters.php';
	    require_once 'offers_filters.php';
	    require_once 'item_parts.php';
	    require_once 'item_parts2.php';
	    require_once 'item_views.php';
	    require_once 'subscribes_list.php';
	    require_once 'subscribes.php';
	    require_once 'fav.php';
	    require_once 'basket.php';
	    require_once 'orders.php';
	    require_once 'order_items.php';
	    require_once 'DeliveryCities.php';
	    require_once 'parts.php';
	    require_once 'notify_list.php';
	    require_once 'notify.php';
	    require_once 'notify_data.php';
	    require_once 'banners.php';
	    require_once 'notify_admin.php';
	    require_once 'postav.php';
	    require_once 'offers.php';
	    require_once 'SearchAuto.php';
	    require_once 'bills.php';
	    require_once 'delivery_days.php';
	    require_once 'delivery_user.php';
	    require_once 'OrderHistory.php';
	    require_once 'order_del.php';
	    require_once 'order_del_items.php';
	    require_once 'faqs.php';
	    require_once 'faqs_list.php';
	    require_once 'reviews.php';
	    require_once 'callbacks.php';
	    require_once 'item_decorations.php';

        $this->cats=new ShopCats($registry);
	    $this->cats_aks=new ShopCatsAks($registry);
	    $this->cats_filters=new ShopCatsFilters($registry);
	    $this->vendors=new ShopVendors($registry);
	    $this->products=new ShopProducts($registry);
	    $this->products_filters=new ShopItemFilters($registry);
	    $this->offers_filters=new ShopOfferFilters($registry);
	    $this->item_views=new ShopItemViews($registry);
	    $this->subscribe_list=new ShopSubscribesList($registry);
	    $this->subscribe=new ShopSubscribes($registry);
	    $this->fav=new ShopFav($registry);
	    $this->basket=new ShopBasket($registry);
	    $this->orders=new ShopOrders($registry);
	    $this->order_items=new ShopOrderItems($registry);
	    $this->delivery_cities=new DeliveryCities($registry);
	    $this->parts=new ShopParts($registry);
	    $this->item_parts=new ShopItemParts($registry);
	    $this->item_parts2=new ShopItemParts2($registry);
	    $this->notify_list=new ShopNotifyList($registry);
	    $this->notify=new ShopNotify($registry);
	    $this->notify_data=new ShopNotifyData($registry);
	    $this->banners=new ShopBanners($registry);
	    $this->notify_admin=new ShopNotifyAdmin($registry);
	    $this->postav=new Postav($registry);
	    $this->offers=new ShopOffers($registry);
	    $this->search=new SearchAuto($registry);
	    $this->bill=new ShopBill($registry);
	    $this->days=new DeliveryDays($registry);
	    $this->delivery_user=new DeliveryUser($registry);
	    $this->order_history=new ShopOrderHistory($registry);
	    $this->order_del=new ShopOrdersDel($registry);
	    $this->order_del_item=new ShopOrdersDelItem($registry);
	    $this->faqs=new TigerFaqs($registry);
	    $this->faqs_list=new TigerFaqsList($registry);
	    $this->reviews=new ShopReviews($registry);
	    $this->callbacks=new ShopCallbacks($registry);
	    $this->item_decor=new ItemDecorations($registry);
    }


    // Settings

	function GetPayments (){
		return array(
			'online'=>array(
				'title'=> 'Перевод на карту',
				'desc'=>'Оплата заказа банковской картой онлайн.'
			),
			'cash'=>array(
				'title'=> 'Оплата при получении заказа',
				'desc'=>'Оплата заказа наличными курьеру при доставке или продавцу в магазине при самовывозе.'
			),
//			'bill'=>array(
//				'title'=> 'Переводом через банк (счет на оплату)',
//				'desc'=>'Только для юридических лиц'
//			)
		);
	}

	function GetDeliveryMethods (){
		return array(
			'dostavkaplus'=>array(
				'title'=>'Доставка по адресу',
				'desc'=>'Безопасная доставка в любой город полуострова Крым'
			),
			'surprise'=>array(
				'title'=>'Сделать сюрпиз',
				'desc'=>'Вы можете посмотреть и забрать свой заказ из нашего шоу-рума в Симферополе'
			),
			'pickup'=>array(
				'title'=>'Самовывоз',
				'desc'=>'Вы можете посмотреть и забрать свой заказ из нашего шоу-рума в Симферополе'
			),
			/*'cdek'=>array(
				'title'=>'Доставка ТК СДЭК до склада',
				'desc'=>'Безопасная доставка в любой город полуострова Крым'
			)*/
		);
	}


    function GetCurrentOrderStatus ($status_id){
        $ids=array();
        if ($status_id==1) {
            $ids=array(
                $status_id,2,6,9
            );
        }

        $statuses=$this->GetOrderStatus();
        $good=array();

        foreach ($statuses as $key=>$status) {
            if (in_array($key,$ids)) {
                $good[$key]=$status;
            }
        }
        return $good;
    }

	function GetOrderGroups () {
		return array (
			0=>array(
				'title'=>'Все',
				'items'=>array(
					1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11
				)
			),
			3=>array(
				'title'=>'Активные',
				'items'=>array(
					2, 3, 4, 5, 6, 7, 8, 9, 10
				)
			),
			1=>array(
				'title'=>'Черновик',
				'items'=>array(
					1
				)
			),
			/*2=>array(
				'title'=>'Резерв',
				'items'=>array(
					11
				)
			),*/
			4=>array(
				'title'=>'Архив',
				'items'=>array(
					2, 3, 4, 5, 6, 7, 8, 9, 10, 11
				)
			)
		);
	}


	function getOrderActiveStatus() {
    	return array(4,5,6,7,8);
	}

	function GetOrderStatus () {
        return array (
//	        '1'=>array(
//		        'title'=>'Черновик',
//		        'group_id'=>1,
//		        'color'=>'#ffe57f'
//	        ),
	        '2'=>array(
		        'title'=>'Ожидает обработки',
		        'group_id'=>3,
		        'color'=>'#ffe57f'
	        ),
	        '3'=>array(
		        'title'=>'В обработке',
		        'group_id'=>3,
		        'color'=>'#7fcc7f'
	        ),
	        '4'=>array(
		        'title'=>'Ожидает оплаты',
		        'group_id'=>3,
		        'color'=>'#7fcc7f'
	        ),
	        '5'=>array(
		        'title'=>'Сборка заказа',
		        'group_id'=>3,
		        'color'=>'#7fcc7f'
	        ),
	        '6'=>array(
		        'title'=>'Готов',
		        'group_id'=>3,
		        'color'=>'#7fcc7f'
	        ),
//	        '7'=>array(
//		        'title'=>'Отгружено',
//		        'group_id'=>3,
//		        'color'=>'#7fcc7f'
//	        ),
	        '8'=>array(
		        'title'=>'Доставлено',
		        'group_id'=>3,
		        'color'=>'#0bcaf0'
	        ),
	        '9'=>array(
		        'title'=>'Получен клиентом',
		        'group_id'=>3,
		        'color'=>'#0bcaf0'
	        ),
	        /*'9'=>array(
		        'title'=>'Резерв',
		        'group_id'=>2,
		        'color'=>'#7fcc7f'
	        ),*/
	        '10'=>array(
		        'title'=>'Отмена',
		        'group_id'=>3,
		        'color'=>'#f44336'
	        ),
	        '11'=>array(
		        'title'=>'Возврат',
		        'group_id'=>3,
		        'color'=>'#f44336'
	        ),
	        '12'=>array(
		        'title'=>'Удален',
		        'group_id'=>3,
		        'color'=>'#f44336'
	        )
        );
    }

    function GetProductsCountEnd ($total) {
        return getNumEnding($total,
            array(
                'товар',
                'товара',
                'товаров'
            ));
    }

    /*
     * Comments
     */
	public function GetComments ($options, $count=10, $start_page=0) {
		$options['object_name']='shop_item';
		$dop_cat='';
		if ($options['cat_id']) {
			$dop_cat=' AND shop_categories.cat_id='.$this->db->sql_prepare($options['cat_id']);
		}
		$join=' INNER JOIN shop_items ON core_comments.comment_object_id=shop_items.item_id 
		INNER JOIN shop_vendors ON shop_items.item_vendor_id=shop_vendors.vendor_id 
		INNER JOIN shop_categories ON shop_items.item_cat_id=shop_categories.cat_id '.$dop_cat.'
		 LEFT JOIN core_files as icon_data ON shop_items.item_icon=icon_data.file_id';

		$select=' icon_data.file_sizes as icon_file_sizes, icon_data.file_folder as icon_file_folder, icon_data.file_name as icon_file_name ';

		$data=$this->registry->comments->GetComments($options, $count, $start_page,$join, $select);

		$new_data=array();
		foreach ($data as $d) {
			$d['count_end']=getNumEnding($d['item_comments'],
				array(
					'отзыв',
					'отзыва',
					'отзывов'
				));

			$d=$this->products->PrepareData($d);

			if ($d['comment_data']) {
				$d['data'] = json_decode($d['comment_data'],true);
			}
			$new_data[]=$d;
		}

		return $new_data;
	}

	public function GetCommentsTotal ($options) {
		$options['object_name']='shop_item';

		$dop_cat='';
		if ($options['cat_id']) {
			$dop_cat=' AND shop_categories.cat_id='.$this->db->sql_prepare($options['cat_id']);
		}
		$join=' INNER JOIN shop_items ON core_comments.comment_object_id=shop_items.item_id 
		INNER JOIN shop_vendors ON shop_items.item_vendor_id=shop_vendors.vendor_id 
		INNER JOIN shop_categories ON shop_items.item_cat_id=shop_categories.cat_id '.$dop_cat;
		return $this->registry->comments->GetCommentsTotal($options,$join);
	}


    function LogParser($text) {
        file_put_contents(ROOT_DIR.'/uploads/tmp/parser.log',date('d.m.Y H:i:s').' '.$text.'
',FILE_APPEND );
    }


    function SendNewOrder($title,$from_array,$to_array,$content,$type='text/html'){
        /**
         * @var \Swift_Mime_Message $message
         */
        $message = Swift_Message::newInstance($title)
            ->setFrom($from_array)
            ->setTo($to_array)
            ->setBody($content, $type)
        ;

	    try{
		    $result = $this->registry->mailer->send($message);
	    }catch(\Swift_TransportException $e){
		    $response = $e->getMessage() ;
	    }
    }

    function SortCats ($cats) {
        usort($cats, function ($a, $b)
        {
            if ($a['cat_short_title'] == $b['cat_short_title']) {
                return 0;
            }
            return ($a['cat_short_title'] < $b['cat_short_title']) ? -1 : 1;
        });
        return $cats;
    }

    function SendUpdateOrderEmail ($order_id,$status_id) {
        if ($status_id!=7) {
            $order_info=$this->orders->GetItemById($order_id);
            $order_items=$this->products->GetOrderItems($order_id);;
            $statuses=$this->GetOrderStatus();
            $payments=$this->GetPayments();
            $delivery=$this->GetDeliveryMethods();

            $delivery_data = array(
                'title' => $delivery[$order_info['order_delivery']]['title'],
                'city' => $order_info['order_delivery_city_id'],
                'street' => $order_info['order_delivery_street'],
                'house' => $order_info['order_delivery_house'],
                'flat' => $order_info['order_delivery_flat']
            );


	        $content = $this->registry->template->Render('shop/order/new_order_email.html.twig',
		        array(
			        'title' => 'Заказ #' . $order_info['order_id'],
			        'info' => $order_info,
			        'items' => $order_items,
			        'order_id' => $order_id,
			        'payments' => $payments,
			        'delivery_cost' => $order_info['order_delivery_cost'],
			        'delivery_cost_user' => $order_info['order_user_delivery_cost'],
			        'delivery_data' => $delivery_data,
			        'total' => $order_info['order_items_cost'],
			        'total_cost' => $order_info['order_total_cost'],
			        'statuses'=>$statuses,
			        'bonus_payment'=>$order_info['order_bonus_payment'],
			        'user_promo_sum'=>$order_info['order_promo_sum']
		        )
	        );
            if ($order_info['order_user_email']) {
                $from_array = array(
	                $this->registry->config['system']['email_addr'] => $this->registry->template->global_vars['fields']['about']['about_name']
                );
                $to_array = array(
                    $order_info['order_user_email'] => ($order_info['order_user_lastname'] . ' ' . $order_info['order_user_name'])
                );
                $this->SendNewOrder('Заказ #' . $order_info['order_id'] . ': '.$statuses[$order_info['order_status']]['title'], $from_array, $to_array, $content);
            }

        }
    }

    function GetCities () {
        $array=array(
            '1'=>array(
                'city_name'=>'Алушта'
            ),
            '2'=>array(
                'city_name'=>'Армянск'
            ),
            '3'=> array(
                'city_name'=>'Бахчисарай'
            ),
            '4'=>array(
                'city_name'=>'Вилино'
            ),
            '5'=>array(
                'city_name'=>'Джанкой'
            ),
            '6'=>array(
                'city_name'=>'Евпатория'
            ),
            '7'=>array(
                'city_name'=>'Керчь'
            ),
            '8'=>array(
                'city_name'=>'Красногвардейское'
            ),
            '9'=>array(
                'city_name'=>'Красноперекопск'
            ),
            '10'=>array(
                'city_name'=>'Ленино'
            ),
            '11'=>array(
                'city_name'=>'Раздольное'
            ),
            '12'=>array(
                'city_name'=>'Судак'
            ),
            '13'=>array(
                'city_name'=>'Феодосия'
            ),
            '14'=>array(
                'city_name'=>'Черноморское'
            ),
            '15'=>array(
                'city_name'=>'Щёлкино'
            ),
            '16'=>array(
                'city_name'=>'Симферополь'
            ),
            '17'=>array(
                'city_name'=>'Севастополь'
            ),
            '18'=>array(
                'city_name'=>'Ялта'
            ),
            '19'=>array(
                'city_name'=>'Саки'
            ),
            '20'=>array(
                'city_name'=>'Белогорск'
            )
        );

        usort($array, function ($a, $b)
        {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        });
        return $array;
    }


    public function getAdv () {
	    $filter_s                           = array();
	    $filter_s['show_order']             = true;
	    $filter_s['key']                    = 'adv';
	    return $this->registry->settings->GetGroupValues( $filter_s );
    }

    public function getCur() {
		$data=array();
		$file=ROOT_DIR.'/uploads/tmp/cur.dat';
		if (file_exists($file)) {
			$content=file_get_contents($file);
			$data=json_decode($content, true);
		}

		return $data;
    }
	public function getCurValue($name) {
		$name=strtoupper($name);
		$cur=false;

		$data=$this->getCur();
		if (isset($data[$name])) {
			return $data[$name];
		}

		return $cur;
	}


	public function getLastViews($count=12) {
		$this->products->CreateModel();
		$this->products->model->setSelectField($this->products->model->getTableName().'.*');
		$this->products->model->SetJoinAll ();
		$this->products->model->SetJoinLastViews();
		$this->products->model->addWhereCustom( $this->products->SqlWherePrepare( 'simple', 'siv_sessionhash', $this->registry->user_info['sessionhash'] ) );
		$this->products->model->setCount( $count );
		$this->products->model->setOrderBy( 'shop_item_views.siv_time' );
		$this->products->model->setOrderWay( 'DESC' );
		return $this->products->GetList();
	}

	public function setDopPhotos ($item_id) {
		$images=$this->registry->files->GetFileIdsItems('product_photos', $item_id);
		$images=array_slice($images,0,2);
		$array=array();
		foreach ($images as $ii) {
			$array[]=$ii['file_name'];
		}

		$this->registry->shop->products->CreateModel();
		$this->registry->shop->products->model->columns_update->getDop()->setValue(serialize($array));
		$this->registry->shop->products->model->columns_where->getId()->setValue($item_id);
		$this->registry->shop->products->Update();
	}
	function PrepareArticle( $string ) {
		return preg_replace( '/[^A-Za-z0-9а-яА-Я]/u', '', $string );
	}
	function ArticleForCompare( $string ) {
		return mb_strtolower($this->PrepareArticle($string));
	}
	private function sendOilRequest($name,$params){
		$empty=true;
		$data='';
		$params=json_encode($params);
		$file=ROOT_DIR.'/app/data/oil/'.$name.'_'.md5($params).'.dat';
		if (
			file_exists($file)
		) {
			$data=file_get_contents($file);
			if ($data!='') {
				$empty=false;
			}
		}

		if ($empty) {
			$data=load_url('https://my.alleya-group.ru/oilapi/lmoilapiajax.php',array(
				'post'=>array(
					'data'=>$params
				)
			));
			file_put_contents($file, $data);
		}
		$data=json_decode($data,true);
		return $data;
	}
	private function sendFreezeRequest($name,$dop=''){
		$empty=true;
		$data='';

		$file=ROOT_DIR.'/app/data/freeze/'.$name.'_'.md5($dop).'.dat';
		if (
		file_exists($file)
		) {
			$data=file_get_contents($file);
			if ($data!='') {
				$empty=false;
			}
		}

		if ($empty) {
			$url='https://www.cool-stream.ru/include/ajax/get_new_selection2.php';
			if ($dop) {
				$url.='?'.$dop;
			}
			$data=load_url($url);

		//	file_put_contents($file, $data);
		}


		return $data;
	}

	private function sendExistRequest($name,$url){
		$empty=true;
		$data='';

		$file=ROOT_DIR.'/app/data/filters/'.$name.'_'.md5($url).'.dat';
		if (
		file_exists($file)
		) {
			$data=file_get_contents($file);
			if ($data!='') {
				$empty=false;
			}
		}

		if ($empty) {
			$data=load_url($url);
			file_put_contents($file, $data);
		}

		return $data;
	}
	private function sendTo4kiRequest($url, $save_name=false){

		$save_name=md5($url);

		$file=ROOT_DIR.'/app/data/oil/to4ki_'.$save_name.'.dat';
		if (file_exists($file)) {
			$data=file_get_contents($file);
		}
		else {
			$data=load_url($url);
			file_put_contents($file, $data);
		}
		$data=json_decode($data,true);
		return $data;
	}

	public function getOilBrands($id=1) {
		$params=array(
			'clid'=>"7cf35d4485e7d0cb38892a94d95e7442",
			"operation"=>"makes",
			"id"=>$id,
			"text"=>""
		);
		$data=$this->sendOilRequest('makes',$params);

		$data=$data[0]['data'];
		$brands=array();
		if (is_array($data)){
			foreach ($data as $key=>$value) {
				if ( strpos( $value, "(CHN)") ===false) {
					$brands[$key]=$value;
				}
			}
		}

		return $brands;
	}
	public function getFreezeBrands() {
		$brands=array();
		$data=$this->sendFreezeRequest('brands','');
		preg_match_all( "#name=\"marka\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option  value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[1][$key]]=$res2[2][$key];
		}

		return $brands;
	}
	public function getFiltersBrands() {
		$brands=array();
		$content=$this->sendExistRequest('brands','https://www.exist.ru/Catalog/Global/Cars');
		preg_match_all( "#<a href=\"/Catalog/Global/Cars/(.*)\">(.*)</a></li>#Us", $content, $res3 );
		foreach ($res3[1] as $key=>$a) {
			$b1=urldecode($res3[2][$key]);
			$b2=urldecode($res3[1][$key]);
			$brands[$b2]=$b1;
		}

		return $brands;
	}
	public function getOilModels($id) {
		$params=array(
			'clid'=>"7cf35d4485e7d0cb38892a94d95e7442",
			"operation"=>"models",
			"id"=>$id,
			"text"=>""
		);

		$data=$this->sendOilRequest('models',$params);
		$data=$data[0]['data'];
		return $data;
	}
	public function getFiltersModels($id) {
		$data=$this->sendExistRequest('models','https://www.exist.ru/Catalog/Global/Cars/'.$id.'?all=1');

		$brands=array();
		preg_match_all( "#<div class=\"car-info__description\">(.*)</div></div>#Us", $data, $res );

		foreach ($res[1] as $key=>$a) {


			if (preg_match_all( "#<a href=\"/Catalog/Global/Cars/".$id."/(.*)\">(.*)</a>#Us", $a, $res2 )) {

				preg_match_all( "#<a href=\"/Catalog/Global/Cars/".$id."/(.*)\">(.*)</a>#Us", $a, $res2 );
				$title=$res2[2][0];
				$key=urldecode($res2[1][0]);

				if (preg_match_all( "#<div class=\"car-info__car-models\">(.*)</div>#Us", $a, $res2 )) {
					$title.=' '.$res2[1][0];
				}

				$hh=explode('<div class="car-info__car-years">',$a);
				if (count($hh)>1) {
					$title.=' ('.strip_tags($hh[1]).')';
				}

				$brands[$key]=$title;
			}
		}

		return $brands;
	}
	public function getFreezeModels($id) {
		$data=$this->sendFreezeRequest('models','marka='.$id.'&template_name=catalog');

		$brands=array();
		preg_match_all( "#name=\"model\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option  value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[1][$key]]=$res2[2][$key];
		}

		return $brands;
	}
	public function getTo4kiData($id, $year) {
		$url='https://www.4tochki.ru/index/callback/getResults.php?_id='.$id.'&year='.$year;
		$data=$this->sendTo4kiRequest($url, 1);

		$file=ROOT_DIR.'/app/data/oil/to4ki_data_'.$data['slug_auto'].'.dat';
		if (file_exists($file)==false) {
			file_put_contents($file, json_encode($data));
		}
		return $data;
	}
	public function getTo4kiModels($id) {
		$data=$this->sendTo4kiRequest('https://www.4tochki.ru/index/callback/getmodels.php?_id='.$id.'&year=%D0%93%D0%BE%D0%B4');
		return $data;
	}

	public function getTo4kiYears($id) {
		$data=$this->sendTo4kiRequest('https://www.4tochki.ru/index/callback/getmodifications.php?_id='.$id.'&year=%D0%93%D0%BE%D0%B4');
		return $data;
	}
	public function getTo4kiMod($id, $year) {

		$data=$this->sendTo4kiRequest('https://www.4tochki.ru/index/callback/getyears.php?_id='.$id.'&year='.$year);
		return $data;
	}


	public function getOilModelTypes($id) {
		$params=array(
			'clid'=>"7cf35d4485e7d0cb38892a94d95e7442",
			"operation"=>"types",
			"id"=>$id,
			"text"=>""
		);
		$data=$this->sendOilRequest('types',$params);
		$data=$data[0]['data'];
		return $data;
	}
	public function getFreezeFuel($vendor, $model, $mod, $year) {
		$data=$this->sendFreezeRequest('types','marka='.$vendor.'&model='.$model.'&gen='.$mod.'&year='.$year.'&template_name=catalog');
		$brands=array();
		preg_match_all( "#name=\"type2\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option(.*)value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[2][$key]]=$res2[3][$key];
		}
		return $brands;
	}
	public function getFreezeVolume($vendor, $model, $mod, $year, $fuel) {
		$data=$this->sendFreezeRequest('types','marka='.$vendor.'&model='.$model.'&gen='.$mod.'&year='.$year.'&type2='.$fuel.'&template_name=catalog');
		$brands=array();
		preg_match_all( "#name=\"volume\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option(.*)value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[2][$key]]=$res2[3][$key];
		}
		return $brands;
	}
	public function getFreezePower($vendor, $model, $mod, $year, $fuel, $volume) {
		$data=$this->sendFreezeRequest('types','marka='.$vendor.'&model='.$model.'&gen='.$mod.'&year='.$year.'&type2='.$fuel.'&volume='.$volume.'&template_name=catalog');
		$brands=array();
		preg_match_all( "#name=\"power\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option(.*)value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[2][$key]]=$res2[3][$key];
		}
		return $brands;
	}
	public function getFiltersPower($vendor, $model, $mod, $year, $fuel, $volume) {
		$data=$this->sendExistRequest('types','https://www.exist.ru/Catalog/Global/Cars/'.$vendor.'/'.$model);
		$brands=array();
		preg_match_all( "#<tr onclick=\"geturlEx(.*)</tr>#Us", $data, $res2 );


		$pos=array();
		preg_match_all( "#scope=\"col\">(.*)</th>#Us", $data, $res3 );
		$index=0;
		foreach ($res3[1] as $hh) {
			$pos[$hh]= $index;
			$index++;
		}


		foreach ($res2[1] as $a) {
			preg_match_all( "#'>(.*)</a>#Us", $a, $res3 );
			preg_match_all( "#<td>(.*)</td>#Us", $a, $res33 );
			$yy=strip_tags($res33[1][$pos['Даты выпуска']]);
			$ff=$res33[1][$pos['Тип двиг.']];
			$vv=$res33[1][$pos['Объем двиг. л']];

			if ($mod==$res3[1][0] and $year==$yy and $fuel==$ff and $volume==$vv) {
				if (isset($pos['Мощность, л.с.'])){
					preg_match_all( "#/Catalog/Global/Cars/".$vendor."/".$model."/(.*)/#Us", $a, $tt );


					$bb=$res33[1][$pos['Мощность, л.с.']];
					$brands[$tt[1][0]]=$bb;
				}

			}
		}
		return $brands;
	}
	public function getFreezeYears($vendor, $model, $mod) {
		$data=$this->sendFreezeRequest('types','marka='.$vendor.'&model='.$model.'&gen='.$mod.'&template_name=catalog');
		$brands=array();
		preg_match_all( "#name=\"year\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option(.*)value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[2][$key]]=$res2[3][$key];
		}
		return $brands;
	}
	public function getFiltersVolume($vendor, $model, $mod, $year, $fuel) {
		$data=$this->sendExistRequest('types','https://www.exist.ru/Catalog/Global/Cars/'.$vendor.'/'.$model);
		$brands=array();
		preg_match_all( "#<tr onclick=\"geturlEx(.*)</tr>#Us", $data, $res2 );


		$pos=array();
		preg_match_all( "#scope=\"col\">(.*)</th>#Us", $data, $res3 );
		$index=0;
		foreach ($res3[1] as $hh) {
			$pos[$hh]= $index;
			$index++;
		}


		foreach ($res2[1] as $a) {
			preg_match_all( "#'>(.*)</a>#Us", $a, $res3 );
			preg_match_all( "#<td>(.*)</td>#Us", $a, $res33 );
			$yy=strip_tags($res33[1][$pos['Даты выпуска']]);
			$ff=$res33[1][$pos['Тип двиг.']];


			if ($mod==$res3[1][0] and $year==$yy and $fuel==$ff) {
				if (isset($pos['Объем двиг. л'])){

					$bb=$res33[1][$pos['Объем двиг. л']];
					$brands[$bb]=$bb;
				}

			}

		}
		return $brands;
	}
	public function getFiltersFuel($vendor, $model, $mod, $year) {
		$data=$this->sendExistRequest('types','https://www.exist.ru/Catalog/Global/Cars/'.$vendor.'/'.$model);
		$brands=array();
		preg_match_all( "#<tr onclick=\"geturlEx(.*)</tr>#Us", $data, $res2 );


		$pos=array();
		preg_match_all( "#scope=\"col\">(.*)</th>#Us", $data, $res3 );
		$index=0;
		foreach ($res3[1] as $hh) {
			$pos[$hh]= $index;
			$index++;
		}
		foreach ($res2[1] as $a) {
			preg_match_all( "#'>(.*)</a>#Us", $a, $res3 );
			preg_match_all( "#<td>(.*)</td>#Us", $a, $res33 );
			$yy=strip_tags($res33[1][$pos['Даты выпуска']]);

			if ($mod==$res3[1][0] and $year==$yy) {
				if (isset($pos['Тип двиг.'])){
					preg_match_all( "#<td>(.*)</td>#Us", $a, $res3 );
					$bb=$res3[1][$pos['Тип двиг.']];
					$brands[$bb]=$bb;
				}

			}

		}
		return $brands;
	}

	public function getFiltersYears($vendor, $model, $mod) {
		$data=$this->sendExistRequest('types','https://www.exist.ru/Catalog/Global/Cars/'.$vendor.'/'.$model);
		$brands=array();
		preg_match_all( "#<tr onclick=\"geturlEx(.*)</tr>#Us", $data, $res2 );


		$pos=array();
		preg_match_all( "#scope=\"col\">(.*)</th>#Us", $data, $res3 );
		$index=0;
		foreach ($res3[1] as $hh) {
			$pos[$hh]= $index;
			$index++;
		}
		foreach ($res2[1] as $a) {
			preg_match_all( "#'>(.*)</a>#Us", $a, $res3 );

			if ($mod==$res3[1][0]) {

				if (isset($pos['Даты выпуска'])){
					preg_match_all( "#<td>(.*)</td>#Us", $a, $res3 );
					$bb=strip_tags($res3[1][$pos['Даты выпуска']]);
					$brands[$bb]=$bb;
				}

			}

		}
		return $brands;
	}



	public function getFreezeModelTypes($vendor, $model) {
		$data=$this->sendFreezeRequest('types','marka='.$vendor.'&model='.$model.'&template_name=catalog');
		$brands=array();
		preg_match_all( "#name=\"gen\">(.*)</select>#Us", $data, $res );

		preg_match_all( "#<option(.*)value=\"(.*)\">(.*)</option>#Us", $res[1][0], $res2 );
		foreach ($res2[1] as $key=>$a) {
			$brands[$res2[2][$key]]=$res2[3][$key];
		}
		return $brands;
	}
	public function getFiltersModelTypes($vendor, $model) {
		$data=$this->sendExistRequest('types','https://www.exist.ru/Catalog/Global/Cars/'.$vendor.'/'.$model);
		$brands=array();

		preg_match_all( "#<td><a href='/Catalog/Global/Cars/".$vendor."/".$model."/(.*)/\?r=1'>(.*)</a></td>#Us", $data, $res2 );

		$pos=array();
		preg_match_all( "#scope=\"col\">(.*)</th>#Us", $data, $res3 );
		$index=0;
		foreach ($res3[1] as $hh) {
			$pos[$hh]= $index;
			$index++;
		}

		preg_match_all( "#<tr onclick=\"geturlEx(.*)</tr>#Us", $data, $res22 );
		foreach ($res22[1] as $key=>$a) {

			preg_match_all( "#<td>(.*)</td>#Us", $a, $res33 );



			$yy=strip_tags($res33[1][$pos['Даты выпуска']]);
			$ff=$res33[1][$pos['Тип двиг.']];
			$vv=$res33[1][$pos['Объем двиг. л']];
			$jj=$res33[1][$pos['Мощность, л.с.']];

			$title=$res2[2][$key].' (';
			if ($ff) {
				$title.=$ff.', ';
			}
			if ($vv) {
				$title.=$vv.'л, ';
			}
			if ($jj) {
				$title.=$jj.' л.с.';
			}
			/*if ($yy) {
				$title.=$yy;
			}*/
			$title.=')';

			preg_match_all( "#/Catalog/Global/Cars/".$vendor."/".$model."/(.*)/#Us", $a, $tt );
			$brands[$tt[1][0]]=$title;
		}
		asort($brands);

		return $brands;
	}
	public function getOilData($id) {
		$params=array(
			'clid'=>"7cf35d4485e7d0cb38892a94d95e7442",
			"operation"=>"recommendations",
			"id"=>$id,
			"text"=>""
		);
		$data=$this->sendOilRequest('recommendations',$params);
		$data=$data[0]['data'];
		return $data;
	}
	public function getFreezeData($url) {

		$content=load_url($url);

		$data=array();

		preg_match_all( "#<div class=\"name left\"><a href=\"(.*)\">#Us", $content, $res );
		foreach ($res[1] as $a) {
			$data[]='https://www.cool-stream.ru'.$a;
		}
		return $data;
	}

	public function getCarModels($vendor) {
		$array=array();
		$result=$this->db->query_read('SELECT * FROM shop_car_models WHERE car_vendor='.$this->db->sql_prepare($vendor).' ORDER BY car_model');
		while ($result_item = $this->db->fetch_array($result))
		{
			$array[translit_url_safe($result_item['car_model'])]=$result_item;
		}
		return $array;
	}


	public function checkSearchSpeed() {
		$this->db->log_errors=false;
		$result=$this->db->query_read('SELECT * FROM core_search WHERE search_user_session='.$this->db->sql_prepare($this->registry->user_info['sessionhash']));
		while ($result_item = $this->db->fetch_array($result))
		{
			$this->db->kill($result_item['search_thread_id']);
			$this->db->query_write('DELETE FROM core_search WHERE search_id='.$this->db->sql_prepare($result_item['search_id']));
		}
		$this->db->query_write('INSERT INTO core_search (search_thread_id,search_user_session)
		VALUES(
			'.$this->db->sql_prepare($this->db->getThreadId()).',
			'.$this->db->sql_prepare($this->registry->user_info['sessionhash']).'
		)');
		$this->db->log_errors=true;
	}



	public function getUserGroupItemPrice() {
		return $this->getItemPriceById($this->registry->user_profile['profile_price_id']);
	}

	public function getItemPriceById($id) {
		if ($id==3) {
			return 'item_price_fakt';
		}
		elseif ($id==2) {
			return 'item_price_opt_vip';
		}
		elseif ($id==1) {
			return 'item_price_opt';
		}
		else {
			return 'item_price';
		}
	}

	public function getOfferPriceById($id) {
		if ($id==3) {
			return 'offer_price_fakt';
		}
		elseif ($id==2) {
			return 'offer_price_opt_vip';
		}
		elseif ($id==1) {
			return 'offer_price_opt';
		}
		else {
			return 'offer_price';
		}
	}

	public function getUserGroupOfferPrice() {
		return $this->getOfferPriceById($this->registry->user_profile['profile_price_id']);
	}

	public function getCarsUrl() {
		$cars=$this->getCars();
		$new=array();
		foreach ($cars as $name) {
			$new[translit_url_safe($name)]=$name;
		}

		return $new;
	}
	public function getCars() {
		return array(
			80=>'Acura',
			81=>'Alfa Romeo',
			244=>'Alpina',
			82=>'Aston Martin',
			83=>'Audi',
			84=>'Bentley',
			85=>'BMW',
			86=>'Brilliance',
			87=>'Buick',
			88=>'Cadillac',
			89=>'Changan',
			90=>'Chery',
			91=>'Chevrolet',
			92=>'Chrysler',
			93=>'Citroen',
			94=>'Daewoo',
			95=>'Daihatsu',
			96=>'Datsun',
			97=>'Dodge',
			154=>'Dongfeng',
			246=>'DW Hover',
			98=>'FAW',
			99=>'Ferrari',
			100=>'Fiat',
			101=>'Ford',
			245=>'Foton',
			102=>'Geely',
			242=>'Genesis',
			103=>'GMC',
			104=>'Great Wall',
			155=>'Hafei',
			105=>'Haima',
			239=>'Haval',
			106=>'Honda',
			107=>'Hummer',
			108=>'Hyundai',
			109=>'Infiniti',
			110=>'Isuzu',
			111=>'Iveco',
			247=>'JAC',
			112=>'Jaguar',
			113=>'Jeep',
			114=>'Kia',
			248=>'Lamborghini',
			115=>'Lancia',
			116=>'Land Rover',
			117=>'Lexus',
			118=>'Lifan',
			119=>'Lincoln',
			120=>'Lotus',
			121=>'Maserati',
			122=>'Maybach',
			123=>'Mazda',
			124=>'Mercedes',
			125=>'Mercury',
			126=>'MG',
			127=>'Mini',
			128=>'Mitsubishi',
			129=>'Nissan',
			156=>'Oldsmobile',
			130=>'Opel',
			131=>'Peugeot',
			132=>'Pontiac',
			133=>'Porsche',
			241=>'Ravon',
			134=>'Renault',
			135=>'Rolls Royce',
			136=>'Rover',
			137=>'Saab',
			138=>'Saturn',
			139=>'Scion',
			140=>'Seat',
			141=>'Skoda',
			142=>'Smart',
			143=>'Ssang Yong',
			144=>'Subaru',
			145=>'Suzuki',
			158=>'Tesla',
			146=>'Toyota',
			147=>'Volkswagen',
			148=>'Volvo',
			149=>'ZAZ',
			240=>'Zotye',
			243=>'ВАЗ',
			151=>'ГАЗ',
			157=>'Москвич',
			152=>'ТаГАЗ',
			153=>'УАЗ',
		);
	}


	public function catCities() {
		return array(
			array(
				'title'=>'Алушта',
				'title2'=>'Алуште',
				'url'=>'alushta'
			),
			array(
				'title'=>'Ялта',
				'title2'=>'Ялте',
				'url'=>'yalta'
			),
			array(
				'title'=>'Севастополь',
				'title2'=>'Севастополе',
				'url'=>'sevastopol'
			),
			array(
				'title'=>'Бахчисарай',
				'title2'=>'Бахчисарае',
				'url'=>'bahchisaraj'
			),
			array(
				'title'=>'Керчь',
				'title2'=>'Керчи',
				'url'=>'kerch'
			),
			array(
				'title'=>'Судак',
				'title2'=>'Судаке',
				'url'=>'sudak'
			),
			array(
				'title'=>'Феодосия',
				'title2'=>'Феодосии',
				'url'=>'feodosija'
			),
			array(
				'title'=>'Красноперекопск',
				'title2'=>'Красноперекопске',
				'url'=>'krasnoperekopsk'
			),
			array(
				'title'=>'Армянск',
				'title2'=>'Армянске',
				'url'=>'armjansk'
			),
			array(
				'title'=>'Джанкой',
				'title2'=>'Джанкое',
				'url'=>'dzhankoj'
			),
			array(
				'title'=>'Евпатория',
				'title2'=>'Евпатории',
				'url'=>'evpatorija'
			),
			array(
				'title'=>'Красногвардейское',
				'title2'=>'Красногвардейском',
				'url'=>'krasnogvardejskoe'
			),
			array(
				'title'=>'Ленино',
				'title2'=>'Ленино',
				'url'=>'lenino'
			),
			array(
				'title'=>'Раздольное',
				'title2'=>'Раздольном',
				'url'=>'razdolnoe'
			),
			array(
				'title'=>'Черноморское',
				'title2'=>'Черноморском',
				'url'=>'chernomorskoe'
			),
			array(
				'title'=>'Щёлкино',
				'title2'=>'Щёлкино',
				'url'=>'schjolkino'
			),
			/*array(
				'title'=>'Симферополь',
				'title2'=>'Симферополе',
				'url'=>'simferopol'
			),*/
			array(
				'title'=>'Саки',
				'title2'=>'Саках',
				'url'=>'saki'
			),
			array(
				'title'=>'Белогорск',
				'title2'=>'Белогорске',
				'url'=>'belogorsk'
			)
		);
	}

	public function sklon_tovar($number){
        $words = ['товар', 'товара', 'товаров'];
        $cases = array(2, 0, 1, 1, 1, 2);
        return $words[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
    }
}
