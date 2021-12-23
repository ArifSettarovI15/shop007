<?php

$status=false;
if ($Main->GPC['ajax'] OR $_REQUEST['ulogin_callback']=='oAuthDone') {
	if ($_REQUEST['ulogin_token']) {
		$_REQUEST['token']=$_REQUEST['ulogin_token'];
	}
	if ($_REQUEST['token']) {
		$result = file_get_contents('http://ulogin.ru/token.php?token=' . $_REQUEST['token'] .
		                            '&host=' . $_SERVER['HTTP_HOST']);
		$data = $result ? json_decode($result, true) : array();


		if (!empty($data) and !isset($data['error'])){
			$login=md5($data['identity']);

			$info = $Main->user->GetUserByLogin($login);
			if ($info==false) {

				$lastname=$data['last_name'];
				$name=$data['first_name'];
				$email=$data['email'];
				$phone=$data['phone'];
				$photo=$data['photo_big'];
				if ($photo=='') {
					$photo=$data['photo'];
				}

				$password=GenerateName();

				$profile_data=array(
					'profile_name'=>$name,
					'profile_lastname'=>$lastname,
					'profile_phone'=>$phone
				);

				$register_data = $Main->user->SaveUser(
					$current_user_id,
					$login,
					$password,
					$password,
					$email,
					$profile_data,
					false,
					1
				);

				$oauth=$data['identity'];
				$user_id=intval($register_data['user_id']);

				if (intval($user_id)>0) {
					$Main->user->UpdateOauth($user_id,$oauth);
				}
			}
			else {
				$user_id=intval($info["user_id"]);
			}

			if (intval($user_id)>0) {

				$info = $Main->user->GetUserById($user_id);
				$Main->user->UpdateUserSession($Main->user_info['sessionhash'],$user_id);
				$Main->user_info = $info;
				$Main->template->global_vars['user_info']=$Main->user->PrepareUserTemplate($info);
				$Main->user_profile=$Main->user->GetUserProfile($info['user_id']);
				$Main->template->global_vars['user_profile']=$Main->user_profile;
				$ShopClass->basket->UpdateUserHash();
				$ShopClass->fav->UpdateUserHash();
				$status=true;
			}

		}
	}

	if ($status){
		$text='';
	}
	else{
		$text='Ошибка авторизации';
	}

	if ($_REQUEST['ulogin_callback']=='oAuthDone') {
		$page=$_SERVER['REQUEST_URI'];
		$page=explode('?',$page);
		header('Location: '.$page[0]);
		exit;
	}
	else {
		$Main->template->DisplayJson(
			array(
				'status'=>$status,
				'text'=>$text
			)
		);
	}


}

exit;
