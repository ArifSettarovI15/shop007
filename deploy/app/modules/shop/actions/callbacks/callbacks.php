<?php

$Main->user->PagePrivacy();

if ($Main->GPC['action'] == 'process_callback') {
    $Main->input->clean_array_gpc(
        'r',
        [
            'name'  => TYPE_STR,
            'phone' => TYPE_STR,
            'rules' => TYPE_BOOL,
        ]
    );
    if (!$Main->GPC['rules']){
        $error = 'Вы не приняли условия передачи информации';
    }
    if ($Main->GPC['name'] == '') {
        $error = 'Введите имя';
    }
    if ($Main->GPC['phone'] == '' or strlen($Main->GPC['phone']) < 11) {
        $error = 'Введите корректный номер телефона';
    }
    $Main->GPC['phone'] = preg_replace('/[^0-9]/', '', $Main->GPC['phone']);
    if (!preg_match($Main->global_data['phone_reg'], $Main->GPC['phone'])) {
        $error = 'Введите корректный номер телефона';
    }
    if ($error == '') {

        $ShopClass->callbacks->CreateModel();
        $ShopClass->callbacks->model->columns_update->getName()->setValue($Main->GPC['name']);
        $ShopClass->callbacks->model->columns_update->getPhone()->setValue($Main->GPC['phone']);
        $result = $ShopClass->callbacks->Insert();
        if (!$result) {
            $error = 'Не удалось обработать ваши данные, пожалуйста позвоните нам по номеру указанному на странице';
        } else {

            $mail_to = $Main->template->global_vars['fields']['info']['email_notify'];
            $title = 'Обратный звонок';
            $body = $Main->template->Render(
                'static/email_write.twig',
                [
                    'type'    => 'callback',
                    'title'   => $title,
                    'name'    => $Main->GPC['name'],
                    'email'   => $Main->GPC['email'],
                    'phone'   => $Main->GPC['phone'],
                    'comment' => $Main->GPC['comment'],
                ]
            );


            $aa = [$Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['info']['info_name']];

            $message = (new Swift_Message($title))
                ->setFrom($aa)
                ->setTo([$mail_to])
                ->setBody($body, 'text/html');

            try {
                $result = $Main->mailer->send($message);
            } catch (\Swift_TransportException $e) {
                $response = $e->getMessage();
            }


            $html = $Main->template->Render('frontend/components/modal-8/modal-8.twig', array('content' => '8-3'));
            $Main->template->DisplayJson(['status' => true, 'html' => $html]);
            exit;
        }
    } else {
        if (is_array($error)) {
            $error = $error[0];
        }
        $Main->template->DisplayJson(['status' => false, 'text' => $error]);
        exit;
    }
}

$Main->error->PageNotFound();
