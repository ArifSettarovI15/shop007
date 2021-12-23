<?php
$Main->user->PagePrivacy();
if ($Main->GPC['ajax']) {
	$error='';
	$Main->input->clean_array_gpc('r', array(
		'name'=>TYPE_STR,
		'phone'=>TYPE_STR,
		'email'=>TYPE_STR,
		'time'=>TYPE_STR,
		'comment'=>TYPE_STR
	));

	if ($Main->GPC['phone']=='' or strlen($Main->GPC['phone'])<7) {
		$error='Введите телефон';
		$array['error_field']='phone';
	}
	else {
		if ($Main->GPC['action']=='process_callback2') {
			$title='Обратная связь';
		}
		else {
			$title='Обратный звонок';
		}

		$mail_to=$Main->template->global_vars['fields']['about']['email_notify'];


		if ($mail_to!='') {
			$content = $Main->template->Render('frontend/components/callback/email.twig',
				array(
					'title' => $title,
					'name' => $Main->GPC['name'],
					'phone' => $Main->GPC['phone'],
					'city' => $Main->GPC['city'],
					'email' => $Main->GPC['email'],
					'comment' => $Main->GPC['comment'],
					'time' => $Main->GPC['time']
				)
			);

			$body = $Main->template->Render('static/email_callback.html.twig',
				array(
					'title' => $title,
					'content' => $content
				)
			);

			$users=$Main->user->GetUsers(
				array(
					'user_role_id'=>2,
					'status'=>1
				)
			);
			$ShopClass->notify_admin->CreateModel();
			$ShopClass->notify_admin->model->columns_update->getTitle()->setValue($title);
			$ShopClass->notify_admin->model->columns_update->getText()->setValue($content);

			foreach ($users as $user) {
				$ShopClass->notify_admin->model->columns_update->getUserId()->setValue($user['user_id']);
				$ShopClass->notify_admin->Insert();
			}


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
			$array['result']=$Main->template->Render('frontend/components/modal-recall/modal-recall2.twig');
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
$Main->error->AccessDenied();
