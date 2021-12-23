<?php


$headers = getallheaders();

$response=array();

$Main->db->query_write('INSERT INTO shop_pay_log (log_data) VALUES('.$Main->db->sql_prepare(serialize($_POST)).')');

$s = hash_hmac('sha256', file_get_contents("php://input"), 'xxx', true);
$hash=base64_encode($s);

if ($_REQUEST['do']=='order_check04040') {

    if (intval($_POST['InvoiceId'])==0) {
        $response['code']=10;
    }
    elseif ($hash != $headers['Content-HMAC']){
        $response['code']=13;
    }
    else {
        $order_info=$ShopClass->orders->GetItemById($_POST['InvoiceId']);

        if ($order_info==false) {
            $response['code']=13;
        }
        elseif ($order_info['payment_status']!=0) {
            $response['code']=13;
        }
        elseif (intval($_POST['PaymentAmount'])!=intval($order_info['order_total_cost'])) {
            $response['code']=12;
        }
        else {
            $response['code']=0;
        }
    }

    echo json_encode($response);
    exit;
}
elseif ($_REQUEST['do']=='order_pay04040') {
    if (intval($_POST['InvoiceId'])==0) {
        $response['code']=10;
    }
    elseif ($hash != $headers['Content-HMAC']){
        $response['code']=13;
    }
    else {
        $order_info=$ShopClass->orders->GetItemById($_POST['InvoiceId']);

        if ($order_info==false) {
            $response['code']=13;
        }
        elseif ($order_info['payment_status']!=0) {
            $response['code']=13;
        }
        elseif (intval($_POST['PaymentAmount'])!=intval($order_info['order_total_cost'])) {
            $response['code']=12;
        }
        elseif ($_POST['OperationType']!='Payment') {
            $response['code']=12;
        }
        elseif ($_POST['Status']!='Completed') {
            $response['code']=12;
        }
        else {
            $response['code']=0;

            $Main->db->query_write("UPDATE `shop_orders`
         SET `order_payment_status`=1,
		 `order_payment_time`=".$Main->db->sql_prepare(time()).",
		 `order_payment_invoiceId`=".$Main->db->sql_prepare($_POST['TransactionId']).",
		 `order_payment_date`=".$Main->db->sql_prepare($_POST['DateTime']).",
		 `order_payment_type`=".$Main->db->sql_prepare($_POST['CardType']).",
		 `order_status`=5
         WHERE `order_id`=".$Main->db->sql_prepare($order_info['order_id']));

            $from_array = array(
                $Main->config['system']['email_addr'] => $Main->template->global_vars['fields']['about']['about_name']
            );
            $to_array = array(
                $Main->template->global_vars['fields']['about']['email_notify']
            );

            /**
             * @var \Swift_Mime_Message $message
             */
            $message = Swift_Message::newInstance('Заказ #'.$order_info['order_id'].' оплачен!')
                ->setFrom($from_array)
                ->setTo($to_array)
                ->setBody('Заказ #'.$order_info['order_id'].' оплачен!')
            ;

            try{
                $result = $Main->mailer->send($message);
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
            }
        }
    }

    echo json_encode($response);
    exit;
}
else {
    echo '112';
}
