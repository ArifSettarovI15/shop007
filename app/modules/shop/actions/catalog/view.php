<?php
$Main->user->PagePrivacy();


$cat = $ShopClass->cats->GetItemByUrl($Main->GPC['cat_url']);
if (!$cat['cat_id']) {
    $Main->error->PageNotFound();
}
$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
$ShopClass->cats->model->SetJoinImage( 'icon', $ShopClass->cats->model->GetTableItemName( 'icon' ) );
$ShopClass->cats->model->setOrderByWithColumn( 'sort' );
$ShopClass->cats->model->setOrderWay( 'ASC' );
$cats= $ShopClass->cats->GetList();

$cats = $ShopClass->cats->MakeTree( $cat['cat_id'], $cats );

$childs = $ShopClass->cats->GetAllCatsIds($cats, $cat['cat_id']);

$cats_all = array(
    $cat['cat_id']
);

if ($childs and count($childs) > 0)
    $cats_all = array_merge($cats_all, $childs);


$parents = $ShopClass->cats->GetParentCatsIds($cats, $cat['cat_id']);
$parents[] = $cat['cat_id'];

$tree=$ShopClass->cats->MakeUiTree2($cats,0, $parents);



$Paging = new ClassPaging($Main, 12, false, false);


$Paging->template = 'frontend/components/paging/paging.twig';
$Paging->template2 = 'frontend/components/paging/paging.twig';
$Paging->template3 = 'frontend/components/paging/paging.twig';

$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName() . '.*');
$ShopClass->products->model->SetJoinCats();
$ShopClass->products->model->columns_where->getCatId()->inValues($cats_all);
$ShopClass->products->model->columns_where->getStatus()->setValue(true);
$ShopClass->products->model->setStart($Paging->sql_start);
$ShopClass->products->model->setCount($Paging->per_page);

$Paging->total =$ShopClass->products->GetTotal();
$Paging->data = $ShopClass->products->GetList(1);


$breadcrumbs=array();
$breadcrumbs[]=array(
    'title'=>'Каталог',
    'link'=>BASE_URL.'/catalog/'
);$breadcrumbs[]=array(
    'title'=>$cat['cat_title'],
    'link'=>BASE_URL.'/'.$cat['cat_url'].'/'
);

$Main->template->SetPageAttributes(
    array(
        'title'=>$cat['cat_title'],
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>$cat['cat_title'],
        'page_class'=>'page-catalog',
        'active'=>'shop'
    )
);


$Paging->Display('frontend/components/items_list/items-list-table.twig', [
    'cats_tree' => $tree,
    ]);