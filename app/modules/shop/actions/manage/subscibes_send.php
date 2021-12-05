<?php
$Main->user->PagePrivacy('admin');

$data_info=array();


if ($Main->GPC['action']=='process_send') {
	$Main->input->clean_array_gpc('r', array(
		'title' => TYPE_STR,
		'list' => TYPE_ARRAY,
		'text'=>TYPE_STR
	));

	$error='';
	$array=array();

	if ($Main->GPC['text']=='') {
		$error='Введите текст  Email';
	}
	elseif ($Main->GPC['title']=='') {
		$error='Введите название Email';
	}
	elseif (count($Main->GPC['list'])==0) {
		$error='Выберите категорию';
	}
	else {
		$ShopClass->subscribe->CreateModel();
		$ShopClass->subscribe->model->setSelectField($ShopClass->subscribe->model->getTableName().'.*');
		$ShopClass->subscribe->model->columns_where->getListId()->inValues($Main->GPC['list']);
		$ShopClass->subscribe->model->SetLists();
		$ShopClass->subscribe->model->setGroupBy('subscribe_email');
		$list=$ShopClass->subscribe->GetList();


		foreach ($list as $item) {
			$to_array = array(
				$item['subscribe_email']
			);

			$content = $Main->template->Render('emails/subscribe.twig',
				array(
					'title' => $Main->GPC['title'],
					'email_content'=>$Main->GPC['text'],
					'email'=>$item['subscribe_email']
				)
			);

			$from_array = array(
				$Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['about']['about_name']
			);
			/**
			 * @var \Swift_Mime_Message $message
			 */
			$message = Swift_Message::newInstance($Main->GPC['title'])
			                        ->setFrom($from_array)
									->setTo($to_array)
			                        ->setBody($content, 'text/html')
			;


			try{
				$result = $Main->mailer->send($message);
			}catch(\Swift_TransportException $e){
				$response = $e->getMessage() ;
			}
		}

	}


	if ($error!='') {
		$array['status']=false;
		$array['text']=$error;
	}
	else {
		$array['text']='Готово';
		$array['status']=true;
	}
	$Main->template->DisplayJson($array);
}


$page_name='Отправить';

$ShopClass->subscribe_list->CreateModel();
$ShopClass->subscribe_list->model->setOrderByWithColumn('subscribe_email');
$list=$ShopClass->subscribe_list->GetList();


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
				'title'=>'Рассылка',
				'link'=>BASE_URL.'/manager/shop/subscribes/'
			),
			array(
				'title'=>'Отправить'
			),
		),
		'title'=>$page_name
	)
);


$Main->template->Display(array(
		'info'=>$data_info,
		'list'=>$list,
		'list2'=>$s_list,
		'edit'=>$edit
	)
);