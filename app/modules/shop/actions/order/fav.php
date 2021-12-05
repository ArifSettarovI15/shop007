<?php
$Main->user->PagePrivacy();

$error='';
$fav_info=array();
$Main->input->clean_array_gpc('r', array(
	'nal' => TYPE_UINT
));
$array=array();
$show_items=false;
if ($Main->GPC['action']=='delete2') {
	$Main->GPC['action']='delete';
	$show_items=true;
}




if ($Main->GPC['action']=='delete' OR  $Main->GPC['action']=='add') {
    $Main->input->clean_array_gpc('r', array(
        'item_id' => TYPE_UINT
    ));
    $error='';

	$ShopClass->products->CreateModel();
	$ShopClass->products->model->columns_where->getId()->setValue($Main->GPC['item_id']);
	$item_info=$ShopClass->products->GetItem();
    if ($item_info==false) {
        $error = 'Такой товар не существует';
    }
	if ($error=='') {
		if ($Main->user_info['user_id'] or $Main->user_info['sessionhash']) {
			$ShopClass->fav->CreateModel();
			if ($Main->user_info['user_id']) {
				$ShopClass->fav->model->columns_where->getUserId()->setValue($Main->user_info['user_id']);
			}
			else {
				$ShopClass->fav->model->columns_where->getSessionhash()->setValue($Main->user_info['sessionhash']);
			}

			$ShopClass->fav->model->columns_where->getItemId()->setValue($Main->GPC['item_id']);
			$fav_info=$ShopClass->fav->GetItem();
		}
	}
}

if ($Main->GPC['action']=='add') {
    if ($error=='') {
    	if ($fav_info) {
		    $error = 'Такой товар уже добавлен в избранное';
	    }
	    else {
		    $ShopClass->fav->CreateModel();
		    $ShopClass->fav->model->columns_update->getItemId()->setValue($Main->GPC['item_id']);
		    $ShopClass->fav->model->columns_update->getUserId()->setValue($Main->user_info['user_id']);
		    $ShopClass->fav->model->columns_update->getSessionhash()->setValue($Main->user_info['sessionhash']);
		    $ShopClass->fav->Insert();
		    $array['text'] = 'Товар добавлен в избранное';
		    $array['added']=1;
	    }
    }

}
if ($Main->GPC['action']=='delete_all') {
	if ($Main->user_info['user_id'] or $Main->user_info['sessionhash']) {
		$ShopClass->fav->CreateModel();
		if ( $Main->user_info['user_id'] ) {
			$ShopClass->fav->model->columns_where->getUserId()->setValue( $Main->user_info['user_id'] );
		} elseif ( $Main->user_info['sessionhash'] ) {
			$ShopClass->fav->model->columns_where->getSessionhash()->setValue( $Main->user_info['sessionhash'] );
		}

		$ShopClass->fav->Delete();
	}

	$array['text']    = 'Список избранного очищен';
	$array['deleted'] = 1;

}
if ($Main->GPC['action']=='delete') {
    if ($error=='') {
	    if ($fav_info==false) {
		    $error = 'Такого товара нет в избранном';
	    }
	    else {
		    $ShopClass->fav->CreateModel();
		    $ShopClass->fav->model->columns_where->getId()->setValue( $fav_info['fav_id'] );
		    $ShopClass->fav->Delete();
		    $array['text']    = 'Товар удален из избранного';
		    $array['deleted'] = 1;
	    }
    }
}

if ($Main->GPC['action']=='delete'  OR $Main->GPC['action']=='delete_all'  OR $Main->GPC['action']=='add') {
    if ($error!='') {
        $array['status']=false;
        $array['text']=$error;
    }
    else {
	    if ($Main->user_info['user_id'] or $Main->user_info['sessionhash']) {
		    $ShopClass->fav->CreateModel();
		    if ( $Main->user_info['user_id'] ) {
			    $ShopClass->fav->model->columns_where->getUserId()->setValue( $Main->user_info['user_id'] );
		    } else {
			    $ShopClass->fav->model->columns_where->getSessionhash()->setValue( $Main->user_info['sessionhash'] );
		    }
		    $total = $ShopClass->fav->GetTotal();

		    $fav_items = array();
		    $ShopClass->products->CreateModel();
		    $ShopClass->products->model->setSelectField( $ShopClass->products->model->getTableName() . '.*' );
		    $ShopClass->products->model->SetJoinCats();
		    $ShopClass->products->model->SetJoinImage( 'icon', $ShopClass->products->model->GetTableItemName( 'icon' ) );
		    $ShopClass->products->model->SetJoinVendors();
		    $ShopClass->products->model->SetJoinFav();
		    $ShopClass->products->model->columns_where->getStatus()->setValue( true );
		    if ( $Main->user_info['user_id'] ) {
			    $ShopClass->products->model->addWhereCustom(
				    $ShopClass->products->SqlWherePrepare( 'simple', 'fav_user_id', $Main->user_info['user_id'] )
			    );
		    } else {
			    $ShopClass->products->model->addWhereCustom(
				    $ShopClass->products->SqlWherePrepare( 'simple', 'fav_sessionhash', $Main->user_info['sessionhash'] )
			    );
		    }
		    $ShopClass->fav->model->setCount( 16 );
		    $ShopClass->products->model->setOrderBy( 'fav_id' );
		    $ShopClass->products->model->setOrderWay( 'DESC' );
		    $fav_items = $ShopClass->products->GetList();
	    }

	    $ShopClass->fav->SetGlobalFav();
	    $array['count']=$total;
        $array['status']=true;
	    $array['result']=$Main->template->Render('frontend/components/list/list.twig',array(
	    	'items'=>$fav_items,
		    'link'=>BASE_URL.'/fav/',
		    'style_white'=>1,
		    'type'=>'fav'
	    ));
    }
    if ($show_items!=true and $Main->GPC['action']!='delete_all') {
	    $Main->template->DisplayJson($array);
    }

}



$page_name='Избранное';


$Paging =new ClassPaging($Main,16,true,false);
$Paging->show_per_page=true;

$ShopClass->products->CreateModel();
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
$ShopClass->products->model->SetJoinCats();
$ShopClass->products->model->SetJoinVendors();
$ShopClass->products->model->SetJoinFav();
$ShopClass->products->model->SetJoinImage('icon',$ShopClass->products->model->GetTableItemName('icon'));
$ShopClass->products->model->columns_where->getStatus()->setValue(true);
if ($Main->user_info['user_id']) {
	$ShopClass->products->model->addWhereCustom(
		$ShopClass->products->SqlWherePrepare('simple','fav_user_id',$Main->user_info['user_id'])
	);}
else {
	$ShopClass->products->model->addWhereCustom(
		$ShopClass->products->SqlWherePrepare('simple','fav_sessionhash',$Main->user_info['sessionhash'])
	);
}
if ($Main->GPC['nal']>0) {
	$ShopClass->products->model->columns_where->getAmount()->notValue(0);
}
$ShopClass->products->model->setOrderBy('fav_id');
$ShopClass->products->model->setOrderWay('DESC');
$list=$ShopClass->products->GetList();
$groups=array();
foreach ($list as $item) {
	$groups[$item['item_cat_id']]['list'][]=$item;
	$groups[$item['item_cat_id']]['title']=$item['cat_title'];
}

if ($show_items or $Main->GPC['action']=='delete_all') {
	$array['html']=$Main->template->Render(
		'frontend/components/fav/list.twig',
		array(
			'groups'=>$groups,
			'items'=>$list,
			'list_name'=>'fav-list'
		));
	$Main->template->DisplayJson($array);
}

$Main->template->SetPageAttributes(
	array(
		'title'=>$page_name,
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>array(
			array(
				'title'=>$page_name,
				'total'=>$Paging->total,
				'total_before'=>'Всего'
			)
		),
		'title'=>$page_name,
		'page_class'=>'page-cat'
	)
);



if ($Main->GPC['ajax']) {
	$Main->template->DisplayJson(array(
		'status'=>true,
		'html'=>$Main->template->Render(
			'frontend/components/fav/list.twig',
			array(
				'groups'=>$groups,
				'items'=>$list,
				'list_name'=>'fav-list'
			)
		)
	));
}
else {
	$Main->template->Display(
		array(
			'groups'=>$groups,
			'items'=>$list,
			'list_name'=>'fav-list'
		)
	);
}

