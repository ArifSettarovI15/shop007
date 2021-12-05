<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='sort_table') {
    $Main->input->clean_array_gpc('r', array(
        'data_sort' => TYPE_ARRAY_UINT
    ));

    $pos=0;
	$ShopClass->cats->CreateModel();

    foreach ($Main->GPC['data_sort'] as $line_key) {
	    $ShopClass->cats->model->columns_where->getId()->setValue($line_key);
	    $ShopClass->cats->model->columns_update->getSort()->setValue($pos);
	    $ShopClass->cats->Update();
        $pos++;
    }

    $array['status']=true;
    $array['text']='Позиции обновлены';
    $Main->template->DisplayJson($array);
}


if ($Main->GPC['action']=='get_sub_select') {
    $Main->input->clean_array_gpc('r', array(
        'parent_id' => TYPE_UINT
    ));
    $array=array();


	$ShopClass->cats->CreateModel();
    $ShopClass->cats->model->setOrderByWithColumn('short_title');
	$cats=$ShopClass->cats->GetList();
    $CatsMenu=$ShopClass->cats->MakeTree(0,$cats);
    if ($CatsMenu) {
    	$html=$ShopClass->cats->GetCatsNestedSelect($Main->GPC['parent_id'],$CatsMenu);
    	if ($Main->GPC['parent_id']>0) {
		    $html.=$ShopClass->cats->MakeSelect($CatsMenu, 0, $Main->GPC['parent_id']);
	    }
        $array['html'] =$html;
    }
    $Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='delete') {
    $Main->input->clean_array_gpc('r', array(
        'object_id' => TYPE_UINT
    ));

    $cat_info=$ShopClass->cats->GetItemById($Main->GPC['object_id']);

    $ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getId()->setValue($Main->GPC['object_id']);
    $status=$ShopClass->cats->Delete();

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Объект успешно удален';
    }
    else {
        $array['text']='Ошибка удаления объекта';
    }
    $Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='update_badge_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL,
		'type_id'=>TYPE_STR,
		'cat_id'=>TYPE_UINT
	));

	$status=false;
	if ($Main->GPC['type_id']=='top' or $Main->GPC['type_id']=='new') {
		$ShopClass->cats->CreateModel();
		$ShopClass->cats->model->columns_where->getId()->setValue($Main->GPC['object_id']);
		if ($Main->GPC['type_id']=='top') {
			$ShopClass->cats->model->columns_update->getTop()->setValue($Main->GPC['value']);
		}
		elseif ($Main->GPC['type_id']=='new') {
			$ShopClass->cats->model->columns_update->getNew()->setValue($Main->GPC['value']);
		}
		$status=$ShopClass->cats->Update();
	}

	$array=array();
	$array['status']=$status;
	if ($status) {
		$array['text']='Категория обновлена';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}

if ($Main->GPC['action']=='update_status') {
    $Main->input->clean_array_gpc('r', array(
        'object_id'=>TYPE_UINT,
        'value'=>TYPE_BOOL
    ));

    $cat_info=$ShopClass->cats->GetItemById($Main->GPC['object_id']);


	$ShopClass->cats->CreateModel();
    $cats=$ShopClass->cats->GetList();
    $CatsMenu=$ShopClass->cats->MakeTree(0,$cats);
    $cats_ids=$ShopClass->cats->GetAllCatsIds($CatsMenu,$cat_info['cat_id']);

	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getId()->setValue($Main->GPC['object_id']);
	$ShopClass->cats->model->columns_update->getStatus()->setValue($Main->GPC['value']);

	$status=$ShopClass->cats->Update();
    foreach ($cats_ids as $id){
	    $ShopClass->cats->model->columns_where->getId()->setValue($id);
        $status=$ShopClass->cats->Update();
    }

    $array=array();
    $array['status']=$status;
    if ($status) {
        $array['text']='Статус категории и ее дочерних обновлен';
    }
    else {
        $array['text']='Ошибка';
    }
    $Main->template->DisplayJson($array);
}




/////////////////////////////////
$Main->input->clean_array_gpc('r', array(
    'cat_title' => TYPE_STR,
    'cat_url' => TYPE_STR,
    'cat_id' => TYPE_UINT,
    'cat_top' => TYPE_NUM,
    'cat_new' => TYPE_NUM,
    'cat_parent_id' => TYPE_INT,
    'cat_status' => TYPE_NUM,
    'order' => TYPE_STR,
    'sort_filter'=>TYPE_BOOL
));

$variables=array();

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setOrderByWithColumn('title');
$ShopClass->cats->model->setOrderWay('ASC');
$CatsMenu=$ShopClass->cats->GetList();
$CatsMenu=$ShopClass->cats->MakeTree(0,$CatsMenu);
$variables['cats_select']=$ShopClass->cats->MakeSelect($CatsMenu,0,0);

$page_name='Категории';
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
                'title'=>$page_name
            )
        ),
        'title'=>$page_name
    )
);

$Paging =new ClassPaging($Main,20,false,false);
$Paging->show_per_page=true;


$ShopClass->cats->CreateModel();

if ($Main->GPC_exists['cat_id'] and $Main->GPC['cat_id']>0){

	$ShopClass->cats->model->columns_where->getId()->setValue($Main->GPC['cat_id']);
}

if ($Main->GPC_exists['cat_status'] and $Main->GPC['cat_status']!=-1){
	$ShopClass->cats->model->columns_where->getStatus()->setValue($Main->GPC['cat_status']);
	$variables['cat_status']=$Main->GPC['cat_status'];
}
else {
	$variables['cat_status']=-1;
}
if ($Main->GPC_exists['cat_top'] and $Main->GPC['cat_top']!=-1){
	if ($Main->GPC['cat_top']==0) {
		$ShopClass->cats->model->columns_where->getTop()->setValue(0);
	}
	else {
		$ShopClass->cats->model->columns_where->getTop()->notValue(0);
	}
}
else {
	$variables['cat_top']=-1;
}
if ($Main->GPC_exists['cat_new'] and $Main->GPC['cat_new']!=-1){
	if ($Main->GPC['cat_new']==0) {
		$ShopClass->cats->model->columns_where->getNew()->setValue(0);
	}
	else {
		$ShopClass->cats->model->columns_where->getNew()->notValue(0);
	}
}
else {
	$variables['cat_top']=-1;
}
if ($Main->GPC_exists['cat_title'] and $Main->GPC['cat_title']!=''){
	$ShopClass->cats->model->columns_where->getTitle()->setValue($Main->GPC['cat_title']);
	$ShopClass->cats->model->columns_where->getTitle()->setSearch(true);
}

if ($Main->GPC_exists['cat_parent_id'] and ($Main->GPC['cat_parent_id']>0 OR $Main->GPC['cat_parent_id']==-1)){
	if ($Main->GPC['cat_parent_id']==-1) {
		$Main->GPC['cat_parent_id']=0;
	}
	$ShopClass->cats->model->columns_where->getParentId()->setValue($Main->GPC['cat_parent_id']);
}

if ($Main->GPC_exists['cat_url'] and $Main->GPC['cat_url']!=''){
	$ShopClass->cats->model->columns_where->getUrl()->setValue($Main->GPC['cat_url']);
	$ShopClass->cats->model->columns_where->getUrl()->setSearch(true);
}

$Paging->total=$ShopClass->cats->GetTotal();

$ShopClass->cats->model->setSelectField($ShopClass->cats->model->getTableName().'.*');
$ShopClass->cats->model->SetJoinImage('icon',$ShopClass->cats->model->GetTableItemName('icon'));
$ShopClass->cats->model->SetJoinParent();


$ShopClass->cats->model->setCount($Paging->per_page);
$ShopClass->cats->model->setStart($Paging->sql_start);
if ($Main->GPC_exists['order']){
	$key=$ShopClass->cats->SetOrder($Main->GPC['order']);
	$variables['order']=$key;
}
else {
	$title=$ShopClass->cats->model->columns_where->getShortTitle()->getName();
	$ShopClass->cats->model->setOrderByWithColumn($ShopClass->cats->model->columns_where->getShortTitle()->getName());
	$variables['order']=$title;
}


$Paging->data=$ShopClass->cats->GetList();
$Paging->Display('shop/manage/cats_table.html.twig',$variables);
