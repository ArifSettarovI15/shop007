<?php
$Main->user->PagePrivacy();

if ($Main->GPC['action']=='process_write') {
	$error='';
	$Main->input->clean_array_gpc('r', array(
		'write_type'=>TYPE_STR,
		'name'=>TYPE_STR,
		'email'=>TYPE_STR,
		'phone'=>TYPE_STR,
		'city'=>TYPE_STR,
		'shop'=>TYPE_STR,
		'person'=>TYPE_STR,
		'comment'=>TYPE_STR
	));

	if ($Main->GPC['phone']=='' or strlen($Main->GPC['phone'])<7) {
		$error='Введите телефон';
		$array['error_field']='phone';
	}
	elseif ($Main->GPC['email']!='' and is_valid_email($Main->GPC['email'])==false) {
		$error='Введите корректный Email';
		$array['error_field']='email';
	}
	else {
		$title='Обратная связь';

		$mail_to=$Main->template->global_vars['fields']['about']['email_notify'];


		if ($mail_to!='') {

			$body = $Main->template->Render('static/email_write.twig',
				array(
					'title' => $title,
					'write_type' => $Main->GPC['write_type'],
					'name' => $Main->GPC['name'],
					'email' => $Main->GPC['email'],
					'phone' => $Main->GPC['phone'],
					'city' => $Main->GPC['city'],
					'shop' => $Main->GPC['shop'],
					'person' => $Main->GPC['person'],
					'comment' => $Main->GPC['comment']
				)
			);

			/**
			 * @var \Swift_Mime_Message $message
			 */
			$message = Swift_Message::newInstance($title)
			                        ->setFrom(array($Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['about']['about_name']))
			                        ->setTo(array($mail_to))
			                        ->setBody($body, 'text/html');

			try{
				$result = $Main->mailer->send($message);
			}catch(\Swift_TransportException $e){
				$response = $e->getMessage() ;
			}

			//$array['text'] = 'Наш менеджер свяжется с Вами в ближайшее время';
			$array['result']=$Main->template->Render('frontend/components/modal-recall/modal-recall3.twig');
		}
		else {
			$error = 'Ошибка';
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

$breadcrumbs=array();
$breadcrumbs[]=array(
	'title'=>'Контакты'
);

$Main->template->SetPageAttributes(
	array(
		'title'=>'Контакты',
		'keywords'=>'',
		'desc'=>''
	),
	array(
		'breadcrumbs'=>$breadcrumbs,
		'title'=>'Контакты',
		'page_class'=>'page-contacts'
	)
);

$filter_s=array();
$filter_s['key']='contacts';
$filter_s['show_order']=true;
$fields=$SettingsClass->GetGroupValues($filter_s);

$filter_s=array();
$filter_s['show_order']=true;
$filter_s['key']='banners';
$banners=$SettingsClass->GetGroupValues($filter_s);



$Main->template->Display(
	array(
		'fields'=>$fields,
		'banners'=>$banners,
		'last_views'=>$ShopClass->getLastViews()
	));
