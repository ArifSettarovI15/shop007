<?php
$Main->user->PagePrivacy('admin');


if ($Main->GPC['action']=='items_sort') {
	$Main->input->clean_array_gpc('r', array(
		'data_sort' => TYPE_ARRAY_UINT,
		'block' => TYPE_UINT
	));
	$pos=0;
	foreach ($Main->GPC['data_sort'] as $item_id) {
		$item_id=intval($item_id);
		$Main->db->query_write("UPDATE shop_block_items 
		SET d_sort=".$Main->db->sql_prepare($pos)."
		WHERE b_block_id=".$Main->db->sql_prepare($Main->GPC['block'])." AND b_item_id=".$Main->db->sql_prepare($item_id));
		$pos++;
	}

	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}
if ($Main->GPC['action']=='delete_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT,
		'block' => TYPE_UINT
	));

	$Main->db->query_write("DELETE FROM shop_block_items 
	WHERE b_block_id=".$Main->db->sql_prepare($Main->GPC['block'])." AND b_item_id=".$Main->db->sql_prepare($Main->GPC['item_id']));
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}

if ($Main->GPC['action']=='add_item') {
	$Main->input->clean_array_gpc('r', array(
		'item_id' => TYPE_UINT,
		'block' => TYPE_UINT
	));

	$check=$Main->db->query_first("SELECT * FROM shop_block_items 
	WHERE b_block_id=".$Main->db->sql_prepare($Main->GPC['block'])." AND b_item_id=".$Main->db->sql_prepare($Main->GPC['item_id']));
	if ($check==false) {
		$Main->db->query_write("INSERT INTO shop_block_items 
		(b_block_id,b_item_id)
		VALUES(
			".$Main->db->sql_prepare($Main->GPC['block']).",
			".$Main->db->sql_prepare($Main->GPC['item_id'])."
		)");
	}
	$Main->template->DisplayJson(array(
		'status'=>true
	));
	exit;
}
if ($Main->GPC['action']=='process_add'  OR $Main->GPC['action']=='process_edit') {

	$Main->input->clean_array_gpc('r', array(
		'block_title' => TYPE_ARRAY
	));

	foreach ($Main->GPC['block_title'] as $block_id=>$block_title) {

		$Main->db->query_write("UPDATE shop_blocks
		SET block_title=".$Main->db->sql_prepare($block_title)."
		WHERE block_id=".$Main->db->sql_prepare($block_id));
	}

	$array['status']=true;
	$array['text'] = 'Значение успешно обновлено';
	$Main->template->DisplayJson($array);
}

$page_name='Блоки на главной';
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
				'title'=>'Блоки на главной'
			)
		),
		'title'=>$page_name
	)
);

$blocks=array();
$result=$Main->db->query_read("SELECT * FROM shop_blocks");
while ($result_item = $Main->db->fetch_array($result))
{
	$ShopClass->products->CreateModel();
	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
	$ShopClass->products->model->setSelectField($ShopClass->products->model->getTableName().'.*');
	$ShopClass->products->model->SetJoinImage('icon',$ShopClass->products->model->GetTableItemName('icon'));
	$ShopClass->products->model->SetJoinBlocks();
	$ShopClass->products->model->setOrderBy('`d_sort`');
	$ShopClass->products->model->addWhereCustom(
		$ShopClass->products->SqlWherePrepare('simple','shop_block_items.b_block_id',$result_item['block_id'])
	);
	$items=$ShopClass->products->GetList();

	$blocks[$result_item['block_id']]=array(
		'info'=>$result_item,
		'items'=>$items
	);
}

$Main->template->Display(array(
		'blocks'=>$blocks
	)
);
