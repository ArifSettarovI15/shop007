<?php
set_time_limit(0);
/**
 * API_KEY 51a76ae4-9fe9-44dc-8206-021012504a20
 * https://restapi.moedelo.org/stock/api/v1/nomenclature

*/



$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://restapi.moedelo.org/stock/api/v1/nomenclature',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'md-api-key: 51a76ae4-9fe9-44dc-8206-021012504a20'
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$response = json_decode($response);
$response = $response->ResourceList;
$cats = [];
foreach($response as $item){
    if ($item->Id == 13483078 or $item->Id == 13555973 or $item->ParentNomenclatureId == 13483078 or $item->ParentNomenclatureId == 13555973 or $item->Id == 13483079){
        continue;
    }
    if ($item->ParentNomenclatureId == 13483079){
        $item->ParentNomenclatureId = 0;
    }
    $ShopClass->cats->CreateModel();
    $ShopClass->cats->model->columns_where->getId()->setValue($item->Id);
    $cat =$ShopClass->cats->GetItem();
    $ShopClass->cats->model->columns_update->getParentId()->setValue($item->ParentNomenclatureId);
    $ShopClass->cats->model->columns_update->getTitle()->setValue($item->Name);
    $ShopClass->cats->model->columns_update->getUrl()->setValue(translit_url_safe($item->Name));
    if ($cat){
        $ShopClass->cats->model->columns_where->getId()->setValue($cat['cat_id']);
        $ShopClass->cats->Update();
    }else{
        $ShopClass->cats->model->columns_update->getId()->setValue($item->Id);
        $ShopClass->cats->Insert();
    }
    $cats[] = $item->Id;
}
$ShopClass->cats->CreateModel();
$ShopClass->cats->model->addWhereCustom('cat_id NOT IN '.$Main->db->sql_prepare($cats) );
$res = $ShopClass->cats->Delete();

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://restapi.moedelo.org/stock/api/v1/good?pageSize=5000',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'md-api-key: 51a76ae4-9fe9-44dc-8206-021012504a20'
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$response = json_decode($response);
$response = $response->ResourceList;

$items = [];
foreach ($response as $product){
    $cat = $ShopClass->cats->GetItemById($product->NomenclatureId);
    if ($cat['cat_id']){
        $ShopClass->products->CreateModel();
        $ShopClass->products->model->columns_where->getId()->setValue($product->Id);
        $item = $ShopClass->products->GetItem();
        if (!$item or !$item['item_icon']){
            $item['item_icon'] = '';
        }
        $file_name = getItemImage($product->Id, $item['item_icon']);

        $ShopClass->products->CreateModel();
        $ShopClass->products->model->columns_update->getTitle()->setValue($product->Name);
        $ShopClass->products->model->columns_update->getCatId()->setValue($product->NomenclatureId);
        $ShopClass->products->model->columns_update->getUrl()->setValue(translit_url_safe($product->Name));
        $ShopClass->products->model->columns_update->getArticle()->setValue(translit_url_safe($product->Article));
        $ShopClass->products->model->columns_update->getPhotoId()->setValue($file_name);
        $ShopClass->products->model->columns_update->getShortText()->setValue($product->Comment);
        $ShopClass->products->model->columns_update->getPrice()->setValue($product->SalePrice);

        if ($item['item_id']){
            $ShopClass->products->model->columns_where->getId()->setValue($item['item_id']);
            $ShopClass->products->Update();
            $items[] = $product->Id;
        }else{
            $ShopClass->products->model->columns_update->getId()->setValue($product->Id);
            $ShopClass->products->Insert();
            $items[] = $product->Id;
        }
    }

}

$ShopClass->products->CreateModel();
$ShopClass->products->model->addWhereCustom('item_id NOT IN '.$Main->db->sql_prepare($items));
$res = $ShopClass->products->Delete();
exit;

function getItemImage($id, $filename =''){
    global $Main;
    $curl2 = curl_init();
    curl_setopt_array($curl2, array(
        CURLOPT_URL => 'https://restapi.moedelo.org/stock/api/v1/good/'.$id.'/image?imageSize=2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'md-api-key: 51a76ae4-9fe9-44dc-8206-021012504a20'
        ),
    ));

    $image = curl_exec($curl2);
    if (!$filename)
        $filename = time().'.jpg';
    if ($image) {
        $Main->files->current_module = 'shop';
        $Main->files->upload_folder = 'products';
        $file_path = ROOT_DIR . '/uploads/images/products/medium/';
        if (!file_exists($file_path)) {
            if (!file_exists(ROOT_DIR . '/uploads/')) {
                mkdir(ROOT_DIR . '/uploads/');
            }
            if (!file_exists(ROOT_DIR . '/uploads/images/')) {
                mkdir(ROOT_DIR . '/uploads/images/');
            }
            if (!file_exists(ROOT_DIR . '/uploads/images/products/')) {
                mkdir(ROOT_DIR . '/uploads/images/products/');
            }
            if (!file_exists(ROOT_DIR . '/uploads/images/products/medium/')) {
                mkdir(ROOT_DIR . '/uploads/images/products/medium/');
            }
        }
        $file_path .= $filename;
        $file = fopen($file_path, 'w+');
        fwrite($file, $image);
        fclose($file);
        return $filename;

    }else{
        return '';
    }
}