<?php

/**
 * @var $Main
 * @see $Main
 *
 * @var $SettingsClass
 * @see $SettingsClass
 *
 * @var $ShopClass
 * @see $SeeClass
*/

$Main->user->PagePrivacy();

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
$ShopClass->cats->model->SetJoinImage( 'icon', $ShopClass->cats->model->GetTableItemName( 'icon' ) );
$ShopClass->cats->model->setOrderByWithColumn( 'sort' );
$ShopClass->cats->model->setOrderWay( 'ASC' );
$cats= $ShopClass->cats->GetList();
$cats = $ShopClass->cats->MakeTree( 0, $cats );
$tree=$ShopClass->cats->MakeUiTree2($cats,0);
$cat_first = array_values($cats['levels'][0])[0];
$cat_first = $ShopClass->cats->GetItemById($cat_first['cat_id'], 1);

$cats_all = array(
    $cat_first['cat_id']
);
//All child cats
$childs = $ShopClass->cats->GetAllCatsIds($cats, $cat_first['cat_id']);
if ($childs and count($childs) > 0)
    $cats_all = array_merge($cats_all, $childs);


//All parent cats
$parent_cats = $ShopClass->cats->GetParentCats($cats, $cat_first['cat_id']);

if ($parent_cats) {
    $parent_cats = array_reverse($parent_cats);

    foreach ($parent_cats as $cat) {
        if ($top_cat == false) {
            $top_cat = $cat['cat_id'];
        }
        if ($cat['cat_title']) {
            $breadcrumbs[] = array(
                'title' => $cat['cat_title'],
                'link' => $cat['full_cat_url']
            );
        }

    }
} else {
    $top_cat = $cat_first['cat_id'];
}


$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName() . '.*');
$ShopClass->products->model->SetJoinCats();
$ShopClass->products->model->columns_where->getCatId()->inValues($cats_all);
$ShopClass->products->model->columns_where->getStatus()->setValue(true);
$ShopClass->products->model->setCount(12);
$items = $ShopClass->products->GetList(1);

$filter_s = [];
$filter_s['key'] = 'skills';
$filter_s['sort'] = 'sort';
$filter_s['show_sort'] = true;
$skills = $Main->settings->GetGroupValues($filter_s);
$filter_s = [];
$filter_s['key'] = 'about';
$about = $Main->settings->GetGroupValues($filter_s);
$page_name = 'Главная';
$Main->template->SetPageAttributes(
    [
        'title'    => $page_name,
        'keywords' => '',
        'desc'     => '',
    ],
    [
        'breadcrumbs' => [
            [
                'title' => $page_name,
            ],
        ],
        'active'=>'shop'
    ]
);

$Main->template->Display(array(
    'cats_tree' => $tree,
    'items' => $items,
    'skills' => $skills,
    'about' => $about,
));
