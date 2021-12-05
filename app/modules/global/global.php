<?php



if ($_REQUEST['ulogin_callback']=='oAuthDone') {
	require_once ROOT_DIR.'/app/modules/users/actions/auth/oauth.php';
	exit;
}

$Main->global_data['phone_reg'] = "/^\d[\d\(\)\ -]{4,14}\d$/";
$Main->global_data['email_reg'] = '/^[\w]{1}[\w-\.]*@[\w-]+\.[a-z]{2,4}$/';
if (isset($_COOKIE['mes_cookie'])){
$Main->template->global_vars['mes_cookie'] = $_COOKIE['mes_cookie'];}

$ShopClass->products->GetBasket();

if ($_COOKIE['last_viewed']){
    $Main->template->global_vars['last_views']=$_COOKIE['last_viewed'];
}
$filter_s=array();
$filter_s['key']='info';
$filter_s['order'] = 'sort';
$filter_s['show_order'] = true;

$Main->template->global_vars['fields']['info']=$SettingsClass->GetGroupValues($filter_s);


$filter_options=array();
$filter_options['content_type']='akcii';
$filter_options['akcii_active']=true;
$filter_options['content_thumb3']=true;
$filter_options['order']='sort';
$filter_options['show_order']=true;
$filter_options['skip_date']=true;
$Main->template->global_vars['akcii']=$ContentClass->GetContentList($filter_options,5);


$ShopClass->parts->CreateModel();
$ShopClass->parts->model->setSelectField($ShopClass->parts->model->getTableName().".part_id, ".$ShopClass->parts->model->getTableName().".part_title");
$ShopClass->parts->model->columns_where->getStatus()->setValue(true);
$ShopClass->parts->model->setOrderBy('part_sort');
$ShopClass->parts->model->setCount('6');
$Main->template->global_vars['parts']=$ShopClass->parts->GetList();



$ShopClass->offers->CreateModel();
$ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".offer_price, ".$ShopClass->offers->model->getTableName().".offer_price_sale ");
$ShopClass->offers->model->columns_where->getIsDecoration()->notValue(1);
$ShopClass->offers->model->setOrderBy('offer_price DESC');
$ShopClass->offers->model->setCount(1);
$Main->template->global_vars['max_price']=$ShopClass->offers->GetItem();
$Main->template->global_vars['max_price']=$Main->template->global_vars['max_price']['offer_price'];

$ShopClass->offers->CreateModel();
$ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".offer_price, ".$ShopClass->offers->model->getTableName().".offer_price_sale ");
$ShopClass->offers->model->columns_where->getIsDecoration()->setValue(0);
$ShopClass->offers->model->columns_where->getPriceSale()->notValue(0);
$ShopClass->offers->model->setOrderBy('offer_price_sale ASC');
$ShopClass->offers->model->setCount(1);
$Main->template->global_vars['min_price_sale'] = $ShopClass->offers->GetItem();
$Main->template->global_vars['min_price_sale']=$Main->template->global_vars['min_price_sale']['offer_price_sale'];
$filter_s['key'] = 'payment';
$Main->template->global_vars['delivery'] = $SettingsClass->GetGroupValues($filter_s);

$ShopClass->offers->CreateModel();
$ShopClass->offers->model->setSelectField($ShopClass->offers->model->getTableName().".offer_price, ".$ShopClass->offers->model->getTableName().".offer_price_sale ");
$ShopClass->offers->model->columns_where->getIsDecoration()->setValue(0);
$ShopClass->offers->model->columns_where->getPrice()->notValue(0);
$ShopClass->offers->model->setOrderBy('offer_price ASC');
$ShopClass->offers->model->setCount(1);
$Main->template->global_vars['min_price'] = $ShopClass->offers->GetItem();
$Main->template->global_vars['min_price']=$Main->template->global_vars['min_price']['offer_price'];



if ($Main->template->global_vars['min_price_sale'] and $Main->template->global_vars['min_price_sale']<$Main->template->global_vars['min_price']){
    $Main->template->global_vars['min_price'] = $Main->template->global_vars['min_price_sale'];
}

$url=$_SERVER['REQUEST_URI'];
$parts=explode('page/', $url);
$bb=explode('?', $parts[0]);
$Main->template->global_vars['page_link_main']=BASE_URL.$bb[0];