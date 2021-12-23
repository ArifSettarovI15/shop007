<?php
$Main->user->PagePrivacy('admin');

require_once 'i_import.php';
$photo_input='offer_icon';

$edit=0;
//if ($Main->GPC['action']=='process_edit' && $Main->GPC['do']!='edit') {
//    $Main->input->clean_array_gpc('r', array(
//        'id' => TYPE_UINT
//    ));
//}

if (isset($Main->GPC['item_id'])==false) {
    $Main->input->clean_array_gpc('r', array(
        'item_id' => TYPE_UINT
    ));
}

if ($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit') {

    $edit=1;
    $ShopClass->offers->CreateModel();
    $ShopClass->offers->model->setSelectField('*');
    $ShopClass->offers->model->columns_where->getId()->setValue($Main->GPC['id']);
    $ShopClass->offers->model->SetJoinImage('icon_offer', $ShopClass->offers->model->GetTableItemNameSimple('icon'));
    $data_info=$ShopClass->offers->GetItem();
    if ($data_info) {

    }
    else {
        $Main->error->ObjectNotFound();
    }

    $ShopClass->products->CreateModel();
    $ShopClass->products->model->columns_where->getId()->setValue($data_info['offer_item_id']);
    $item_info=$ShopClass->products->GetItem(1);

//    if ($item_info) {
//
//    }
//    else {
//        $Main->error->ObjectNotFound();
//    }
}


if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {
    $Main->input->clean_array_gpc('r', array(
        'offer_id' => TYPE_UINT,
        'offer_url'=>TYPE_STR,
        'offer_title' => TYPE_STR,
        'offer_article' => TYPE_STR,
        'offer_key' => TYPE_STR,
        'offer_short_title' => TYPE_STR,
        'offer_1c' => TYPE_STR,
        'offer_price' => TYPE_UINT,
        'offer_price_sale' => TYPE_UINT,
        'item_id' => TYPE_UINT,
        'offer_weight' => TYPE_NUM,
        'offer_diam' => TYPE_NUM,
        $photo_input => TYPE_UINT
    ));

    $photo_id=intval($Main->GPC[$photo_input]);

    $error='';
    $array=array();

    $check_article=false;


    $check_url=false;
    if ($Main->GPC['item_url']) {
        $ShopClass->offers->CreateModel();

        $ShopClass->offers->model->columns_where->getId()->setValue($item_info['item_id']);
        $ShopClass->offers->model->columns_where->getUrl()->setValue($Main->GPC['offer_url']);
        $ShopClass->offers->model->columns_where->getId()->notValue($Main->GPC['offer_id']);

        $check_url=$ShopClass->offers->GetItem();
    }

    if ($Main->GPC['offer_title']=='' and $Main->GPC['offer_short_title']=='') {
        $error='Введите название или краткое название';
        $array['error_field']='offer_title,offer_short_title';
    }
    elseif ($check_url) {
        $error='Товар с таким url уже существует';
        $array['error_field']='offer_url';
    }
    else{

        $ShopClass->offers->CreateModel();
        $ShopClass->offers->model->columns_update->getArticle()->setValue($Main->GPC['offer_article']);
        $ShopClass->offers->model->columns_update->getIcon()->setValue($photo_id);
        $ShopClass->offers->model->columns_update->getTitle()->setValue($Main->GPC['offer_title']);
        $ShopClass->offers->model->columns_update->getShortTitle()->setValue($Main->GPC['offer_short_title']);
        $ShopClass->offers->model->columns_update->getUrl()->setValue($Main->GPC['offer_url']);
        $ShopClass->offers->model->columns_update->getKey()->setValue($Main->GPC['offer_key']);
        $ShopClass->offers->model->columns_update->getPrice()->setValue($Main->GPC['offer_price']);
        $ShopClass->offers->model->columns_update->getPriceSale()->setValue($Main->GPC['offer_price_sale']);
        $ShopClass->offers->model->columns_update->getPriceBefore()->setValue($Main->GPC['offer_price']);
        $ShopClass->offers->model->columns_update->getWeight()->setValue(0);
        $ShopClass->offers->model->columns_update->getIsDecoration()->setValue(1);
        $ShopClass->offers->model->columns_update->getDiam()->setValue(0);

        if ($Main->GPC['action'] == 'process_edit') {
            $id=$Main->GPC['offer_id'];
            $ShopClass->offers->model->columns_where->getId()->setValue($Main->GPC['offer_id']);
            $result=$ShopClass->offers->Update();

            if ($result ) {
                $array['status'] = true;
                $array['text'] = 'Значение успешно обновлено';
            } else {
                $array['text'] = 'Ошибка обновления';
            }

        } else {
            $ShopClass->offers->model->columns_update->getItemId()->setValue($Main->GPC['item_id']);
            $id=$ShopClass->offers->Insert();

            $array['text'] = 'Значение успешно добавлено';
            $array['status'] = true;
            $array['redirect'] = '/manager/shop/decorations/edit/'.$id.'/';
        }

    }


    if ($error!='') {
        $array['status']=false;
        $array['text']=$error;
    }
    else {
        $array['status']=true;
    }
    $Main->template->DisplayJson($array);
}

if ($edit==1) {
    $a_name='Редактировать';
}
else {
    $a_name='Добавить';
}

$page_name=$a_name.' оффер';
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>array(
            array(
                'title'=>'Магазин',
                'link'=>BASE_URL.'/manager/shop/'
            ),
            array(
                'title'=>'Офферы',
                'link'=>BASE_URL.'/manager/shop/offers/'
            ),
            array(
                'title'=>$a_name
            ),
        ),
        'title'=>$page_name
    )
);

$image_data1=array(
    'input_name'=>$photo_input,
    'files'=>array(
        array(
            'file_id'=>$data_info['offer_icon'],
            'icon_url'=>$data_info['item_icon_url']
        )
    ),
    'module'=>'shop',
    'show_select_image'=>true,
    'title'=>'Фото товаров',
    'folder'=>'offers'
);


$item_filter_values=array();
$filter_values=array();
$all_cats=array();
$sprav_filters=array();
$sprav_ids=array();
$parent_cats=array();
$top_cat=false;
if ($item_info) {
    $all_cats=$ShopClass->cats->GetParentAllCatsIds($item_info['item_cat_id'],$CatsMenu);
    $sprav_filters=$ShopClass->cats_filters->GetSpravOptionsList($all_cats, true);

    $sprav_ids=array();
    foreach ($sprav_filters as $sprav) {
        $sprav_ids[]=$sprav['sprav_id'];
    }

    $filter_values=$Main->sprav->GetSpravValues(array(
                                                    'svid_status'=>1,
                                                    'spravs'=>$sprav_ids,
                                                    'group_array'=>'sprav_id',
                                                    'hide_join'=>true
                                                ));

    $item_filter_values=$ShopClass->offers_filters->GetValuesList($data_info['offer_id']);
}



$Main->template->Display(array(
                             'value' => $array['value'],
                             'item_id' => $array['item_id'],
                             'item_info' => $item_info,
                             'info'=>$data_info,
                             'edit'=>$edit,
                             'image_data1'=>$image_data1,
                             'sprav_filters'=>$sprav_filters,
                             'filter_values'=>$filter_values,
                             'item_filter_values'=>$item_filter_values
                         )
);
