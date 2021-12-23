<?php

if ($Main->GPC['action'] == "get_review") {
    $Main->input->clean_array_gpc('r', ['id' => TYPE_UINT]);
    if (!$Main->GPC['id']) {
        $Main->error->ObjectNotFound();
    } else {
        $review = $ShopClass->reviews->GetItemById($Main->GPC['id']);
        if (!$review) {
            $Main->error->ObjectNotFound();
        } else {
            $array['status'] = true;
            $array['html'] = $Main->template->Render('frontend/components/modal-4/modal-4.twig', ['review' => $review]);
            $Main->template->DisplayJson($array);
        }
    }
    $Main->error->PageNotFound();
}


if ($Main->GPC["action"] == 'process_review') {
    $Main->input->clean_array_gpc(
        'r',
        [
            'email'     => TYPE_STR,
            'name'      => TYPE_STR,
            'item_id'   => TYPE_UINT,
            'feed_text' => TYPE_STR,
            'rating'    => TYPE_UINT,
            'file_id'   => TYPE_UINT,
            'rules'   => TYPE_BOOL,
        ]
    );
    if (!$Main->GPC['rules']){
        $Main->template->DisplayJson(array('status'=>false, "text"=>"Вы не приняли уловия передачи информации"));
    }
    if ($Main->GPC['file_id']) {
        $file = intval($Main->GPC['file_id']);
    } else {
        $file = 0;
    }


    $error = '';

    if ($error) {
        $Main->template->DisplayJson(['status' => false, 'text' => $error]);
    } else {
        $ShopClass->reviews->CreateModel();
        $ShopClass->reviews->model->columns_update->getUEmail()->setValue($Main->GPC["email"]);
        $ShopClass->reviews->model->columns_update->getPhoto()->setValue($file);
        $ShopClass->reviews->model->columns_update->getUName()->setValue($Main->GPC["name"]);
        $ShopClass->reviews->model->columns_update->getItemId()->setValue($Main->GPC["item_id"]);
        $ShopClass->reviews->model->columns_update->getComment()->setValue($Main->GPC["feed_text"]);
        $ShopClass->reviews->model->columns_update->getRating()->setValue($Main->GPC['rating']);
        $id = $ShopClass->reviews->Insert();
        if (!$id){
            $array['status'] = true;
            $array['text'] = "Не удалось сохранить отзыв, пожалуйста попробуйте позже";
        }
        else{
            $array['status'] = true;
            $array['html'] = $Main->template->Render('frontend/components/modal-8/modal-8.twig', ['content' => '8-2']);

            $item_data = $ShopClass->products->GetItemById($Main->GPC["item_id"]);
            $title = 'Новый отзыв';
            $mail_to = $Main->template->global_vars['fields']['info']['email_notify'];
            $body = $Main->template->Render(
                'static/email_write.twig',
                [
                    'title'   => $title,
                    'name'    => $Main->GPC['name'],
                    'item_name'   => $item_data['item_title'],
                    'feed_text'   => $Main->GPC['feed_text'],
                    'rating' => $Main->GPC['rating'],
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
        }
        $Main->template->DisplayJson($array);
        exit;
    }
}
$Main->error->PageNotFound();
