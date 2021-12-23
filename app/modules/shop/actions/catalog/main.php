<?php
$Main->user->PagePrivacy();

$breadcrumbs=array();
$breadcrumbs[]=array(
    'title'=>'Каталог',
    'link'=>BASE_URL.'/catalog/'
);


$Main->template->SetPageAttributes(
    array(
        'title'=>'Каталог товаров',
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>'Каталог товаров',
        'page_class'=>'page-catalog',
        'active'=>'shop'
    )
);


$Main->user->PagePrivacy();

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
$ShopClass->cats->model->SetJoinImage( 'icon', $ShopClass->cats->model->GetTableItemName( 'icon' ) );
$ShopClass->cats->model->setOrderByWithColumn( 'sort' );
$ShopClass->cats->model->setOrderWay( 'ASC' );
$cats= $ShopClass->cats->GetList();
$cats = $ShopClass->cats->MakeTree( 0, $cats );
$tree=$ShopClass->cats->MakeUiTree2($cats,0);


$Paging = new ClassPaging($Main, 12, false, false);

$Paging->template = 'frontend/components/paging/paging.twig';
$Paging->template2 = 'frontend/components/paging/paging.twig';
$Paging->template3 = 'frontend/components/paging/paging.twig';

$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
$ShopClass->products->model->setStart($Paging->sql_start);
$ShopClass->products->model->setCount($Paging->per_page);
$Paging->total = $ShopClass->products->GetTotal();
$Paging->data = $ShopClass->products->GetList();
$variables['cats_tree'] = $tree;
$Paging->Display('frontend/components/items_list/items-list-table.twig', ['cats_tree'=>$tree]);
