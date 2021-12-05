<?php
$Main->user->PagePrivacy('admin');
if ($Main->GPC['action']=='update_status') {
	$Main->input->clean_array_gpc('r', array(
		'object_id'=>TYPE_UINT,
		'value'=>TYPE_BOOL
	));
	$array=array();
	$array['status']=true;

	$status=$Main->db->query_write("UPDATE `shop_chat`
		SET chat_status=".$Main->db->sql_prepare($Main->GPC['value'])."
        WHERE chat_id=".$Main->db->sql_prepare($Main->GPC['object_id']));
	if ($status) {
		$array['text']='Статус сообщения обновлен';
	}
	else {
		$array['text']='Ошибка';
	}
	$Main->template->DisplayJson($array);
}



$order_comments=array();
$result=$Main->db->query_read("SELECT *
        FROM `shop_chat`
        WHERE chat_admin=0
        ORDER BY chat_id DESC
        LIMIT 100");
while ($result_item = $Main->db->fetch_array($result))
{
	$order_comments[]=$result_item;
}

$page_name='Чат';
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

$Main->template->Display(array(
	'order_comments'=>$order_comments
));


