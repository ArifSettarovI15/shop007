<?php
$Main->user->PagePrivacy('admin');

$real_content_type=$Main->GPC['content_type'];
if ($Main->GPC['content_type']=='') {
    $Main->GPC['content_type']='pages';
}


$photo_input_image='content_image';

$photo_input_thumb='content_thumb';


$photo_input2='content_media';
$edit=0;
$data_info=array();
if($Main->GPC['do']=='edit' OR $Main->GPC['action']=='process_edit'){
    $edit=1;
    $data_info=$ContentClass->GetContentById($Main->GPC['content_id'],1);
    $Main->GPC['content_type']=$data_info['content_type'];
	$real_content_type=$Main->GPC['content_type'];
    if ($data_info) {

    }
    else {
        $Main->error->PageNotFound();
    }
}

if ($Main->GPC['action']=='items_sort') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT
	));
	$ContentClass->UpdateContentItemsSort($Main->GPC['content_id'],$Main->GPC['data_sort']);

	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}
if ($Main->GPC['action']=='delete_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));

	$ContentClass->DeleteContentItem ($Main->GPC['content_id'],$Main->GPC['item_id']);
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='add_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT
	));
	if ($ContentClass->CheckContentItem ($Main->GPC['content_id'],$Main->GPC['item_id'])==false) {
		$ContentClass->AddContentItem ($Main->GPC['content_id'],$Main->GPC['item_id']);
	}
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='process_add' OR $Main->GPC['action']=='process_edit') {


    $Main->input->clean_array_gpc('r', array(
        'content_title' => TYPE_STR,
        'content_time' => TYPE_STR,
        'content_time_end'=>TYPE_STR,
        'content_cat' => TYPE_UINT,
        'content_url' => TYPE_STR,
        'content_status'=>TYPE_BOOL,
        'content_short' => TYPE_STR,
        'content_dop' => TYPE_STR,
        'text'=>TYPE_STR,
        'meta_title'=>TYPE_STR,
        'meta_keywords'=>TYPE_STR,
        'meta_desc'=>TYPE_STR,
        'content_id'=>TYPE_UINT,
        'template_name'=>TYPE_STR,
        'content_tyres_a'=>TYPE_BOOL,
        'vendor_id'=>TYPE_UINT,
        'content_tyres_d'=>TYPE_ARRAY,
        'share_position'=>TYPE_BOOL,
        $photo_input_image=> TYPE_UINT,
        $photo_input2 => TYPE_ARRAY_UINT,
        $photo_input_thumb => TYPE_UINT
    ));

    $photo__image=intval($Main->GPC[$photo_input_image]);
    $media=$Main->GPC[$photo_input2];
    $photo__thumb=intval($Main->GPC[$photo_input_thumb]);

    if ($Main->GPC['content_time']) {
        $time=strtotime($Main->GPC['content_time']);
    }
    else {
        $time=TIMENOW;
    }

	if ($Main->GPC['content_time_end']) {
		$time_end=strtotime($Main->GPC['content_time_end']);
	}
	else {
		$time_end=0;
	}

    $date=date("Ymd",$time);
    if ($Main->GPC['content_type']=='news' or $Main->GPC['content_type']=='articles') {
        if ($Main->GPC['action']=='process_add') {
            $c_date=TIMENOW;
        }
        else {
            $c_date=$data_info['content_time'];
        }
        $content_url=date("Y",$c_date).'/'.date("m",$c_date).'/'.date("d",$c_date).'/'.$Main->GPC['content_url'];
    }
    else {
        $content_url=$Main->GPC['content_url'];
    }


    $data=$ContentClass->GetContentByUrl($content_url);
    $error='';
    if ($data and $data['content_id']!=$Main->GPC['content_id']) {
        $error='Страница с таким адрес уже существует';
    }
    elseif ($Main->GPC['content_title']=='') {
        $error='Введите название';
        $array['error_field'] = 'content_title';
    }
    elseif ($content_url=='') {
        $error='Введите URL';
        $array['error_field'] = 'content_url';
    }

    if ($error!='') {
        $array['status'] = false;
        $array['text']=$error;
    }
    else {
        $array['status'] = true;

        $text_id=$Main->text->SaveText($data_info['content_text_id'], $Main->GPC['text']);

        if ($Main->GPC['action']=='process_edit') {
            $ContentClass->UpdateContent($Main->GPC['content_id'],$Main->GPC['content_status'],$Main->GPC['content_title'],
	            $content_url,$Main->GPC['content_type'],$Main->GPC['content_short'],$Main->GPC['meta_title'],$Main->GPC['meta_keywords'],
	            $Main->GPC['meta_desc'], $text_id,$photo__image,$photo__thumb,$Main->GPC['content_cat'],$Main->GPC['template_name'],$time,
	            $Main->GPC['vendor_id'],$Main->GPC['share_position'],$Main->GPC['content_dop'],$time_end);
            $array['text'] = 'Контент успешно обновлен';
            $id=$Main->GPC['content_id'];

        }
        else {
            $id=$ContentClass->AddContent($Main->GPC['content_status'],$Main->GPC['content_title'],$content_url,$Main->GPC['content_type'],
	            $Main->GPC['content_short'],$Main->GPC['meta_title'],$Main->GPC['meta_keywords'],$Main->GPC['meta_desc'], $text_id,
	            $photo__image,$photo__thumb,$time,$date,$Main->GPC['content_cat'],$Main->GPC['template_name'],$Main->GPC['vendor_id'],$Main->GPC['share_position'],$Main->GPC['content_dop'],$time_end);
            $array['text'] = 'Контент успешно добавлен';
        }
	    $Main->files->AddFileIdsItems('news_media', $id,$media);
	    $ids=array();
	    foreach ($media as $p_id ) {
		    $ids[]=$p_id;
	    }
	    $Main->files->UpdateFileIdsItemsSort('news_media', $id,$media);

	    $array['redirect']=BASE_URL.'/manager/content/edit/'.$id.'/';
    }
    $Main->template->DisplayJson($array);
}


if ($edit==1) {
    $a_name='Редактировать';
}
else {
    $a_name='Добавить';
}


$breadcrumbs=array();
$child_content=1;
$breadcrumbs[]=array(
    'title'=>'Контент',
    'link'=>BASE_URL.'/manager/content/'
);
if ($real_content_type=='pages'){
    $page_name='Страницы';
}
elseif ($real_content_type=='news'){
    $page_name='Новости';
}
elseif ($real_content_type=='articles'){
	$page_name='Статьи';
}
else {
    $page_name='Контент';
    $child_content=0;
}


    $breadcrumbs[]=array(
        'title'=>$page_name,
        'link'=>BASE_URL.'/manager/content/'.$real_content_type.'/'
    );

$breadcrumbs[]=array(
    'title'=>$a_name
);
$page_name=$a_name.' контент';
$Main->template->SetPageAttributes(
    array(
        'title'=>$page_name,
        'keywords'=>'',
        'desc'=>''
    ),
    array(
        'breadcrumbs'=>$breadcrumbs,
        'title'=>$page_name
    )
);

$cats=array();
if ($Main->GPC['content_type']=='news' or $Main->GPC['content_type']=='articles') {
	$cats=$ContentClass->GetNewsCats($Main->GPC['content_type']);
}

$image_data_image=array(
	'input_name'=>$photo_input_image,
	'files'=>array(
		array(
			'file_id'=>$data_info['content_thumb_id'],
			'icon_url'=>$data_info['img_url']
		)
	),
	'module'=>'content',
	'show_select_image'=>false,
	'title'=>'Фото контента',
	'folder'=>'content/'.$Main->GPC['content_type']
);
$image_data2=array(
    'input_name'=>$photo_input2,
    'files'=>$Main->files->GetFileIdsItems('news_media', $data_info['content_id']),
    'module'=>'shop',
    'show_select_image'=>true,
    'title'=>'Медиа товаров',
    'folder'=>'products_media',
    'multiple'=>true,
    'sort_name'=>'news_media'
);

$image_data_thumb=array(
    'input_name'=>$photo_input_thumb,
    'files'=>array(
        array(
            'file_id'=>$data_info['content_thumb_id3'],
            'icon_url'=>$data_info['thumb_url']
        )
    ),
    'module'=>'content',
    'show_select_image'=>false,
    'title'=>'Фото контента',
    'folder'=>'content/'.$Main->GPC['content_type']
);


$templates=$ContentClass->GetTemplatesList();


$ShopClass->vendors->CreateModel();
$ShopClass->vendors->model->columns_where->getStatus()->setValue(true);
$ShopClass->vendors->model->setSelectField($ShopClass->vendors->model->getTableName().'.*');
$ShopClass->vendors->model->setOrderByWithColumn($ShopClass->vendors->model->columns_where->getTitle()->getName());
$brands=$ShopClass->vendors->GetList();


$ShopClass->products->CreateModel();
$ShopClass->products->model->columns_where->getStatus()->setValue(true);
$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
$ShopClass->products->model->SetJoinImage('icon',$ShopClass->products->model->GetTableItemName('icon'));
$ShopClass->products->model->SetJoinContent();
$ShopClass->products->model->SetJoinVendors();
$ShopClass->products->model->setOrderBy('`sort`');
$ShopClass->products->model->addWhereCustom(
	$ShopClass->products->SqlWherePrepare('simple','content_items.content_id',$data_info['content_id'])
);
$content_items=$ShopClass->products->GetList();

$Main->template->Display(array(
        'info'=>$data_info,
        'edit'=>$edit,
        'content_type'=>$Main->GPC['content_type'],
        'image_data_image'=>$image_data_image,
        'image_data2'=>$image_data2,
        'image_data_thumb'=>$image_data_thumb,
        'cats'=>$cats,
        'templates'=>$templates,
		'brands'=>$brands,
		'content_items'=>$content_items
    )
);
