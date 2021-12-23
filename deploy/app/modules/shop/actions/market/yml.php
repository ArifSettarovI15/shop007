<?php

set_time_limit(0);

$Main->user->PagePrivacy();
$csv_file=ROOT_DIR.'/market/ya_sprav_34564577.csv';
$outstream = fopen($csv_file, "wb");


$fp = fopen(ROOT_DIR.'/market/export257.csv', 'w');
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

$fields=array(
	'Производитель',
	'Наименование',
	'Описание',
	'Количество',
	'Цена (руб.)',
	'img'
);
fputcsv($fp, $fields,';');

$ShopClass->cats->CreateModel();
$ShopClass->cats->model->columns_where->getStatus()->setValue( true );
$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
$ShopClass->cats->model->setOrderByWithColumn( 'title' );
$ShopClass->cats->model->setOrderWay( 'ASC' );
$data= $ShopClass->cats->GetList();

$cats=array();
foreach ($data as $item){
	$cats[$item['cat_id']]=$item;
}


$ShopClass->offers->CreateModel();
$ShopClass->offers->model->columns_where->getSearch()->setValue(true);
$products=$ShopClass->offers->GetList();

$offers_a=array();
$offers='';
$offers_a2=array();
$offers2='';
foreach ($products as $product) {

	$ShopClass->products->CreateModel();
	$ShopClass->products->model->setSelectField('*');
	$ShopClass->products->model->SetJoinAll(false);
	$ShopClass->products->model->setJoin('  INNER JOIN `shop_offers` ON `shop_items`.`item_id`= `shop_offers`.`offer_item_id`');
	$ShopClass->products->model->SetJoinImage('icon_offer','shop_offers.offer_icon');
	$ShopClass->products->model->columns_where->getStatus()->setValue(true);
	$ShopClass->products->model->addWhereCustom("`shop_vendors`.vendor_status=1");
	$ShopClass->products->model->addWhereCustom(' shop_offers.offer_id='.intval($product['offer_id']));
	$product=$ShopClass->products->GetItem(1);

	if ($product and isset($cats[$product['item_cat_id']]) and $product['offer_amount']>0 and $product['offer_price']>0) {

		$full_title=$product['full_title'];
		if ($product['item_cat_id']==1) {
			$full_title='Автомобильная шина '.$product['full_title'];
		}
		elseif ($product['item_cat_id']==2) {
			$full_title='Колесный диск '.$product['full_title'];
		}

		$availble="false";
		if ($product['offer_amount_nal']>0) {
			$availble="true";
		}

		$image='';
		$img_url='';
		if ($product['offer_icon']) {
			$img_url=$product['icon_offer_sizes_url']['original'];
			$image='<picture>'.$img_url.'</picture>';
		}
		elseif ($product['item_icon']) {
			$img_url=$product['icon_sizes_url']['original'];
			$image='<picture>'.$img_url.'</picture>';
		}

		$attr='';
		$options=$ShopClass->offers_filters->GetValuesListF($product,1);
		foreach ($options as $option_key=>$option_value) {
			$attr.='<param name="'.htmlspecialchars($option_key).'">'.htmlspecialchars($option_value['text']).'</param>';
		}

		if ($product['item_cat_id']!=1 and $product['item_cat_id']!=2) {
			$fields=array(
				$product['vendor_name'],
				$product['offer_article'],
				$product['full_title'],
				$product['offer_amount_opt'],
				$product['offer_price_opt'],
				$img_url
			);
			fputcsv($fp, $fields,';');
		}

		if (isset($offers_a[$product['offer_full_url']])==false) {
			$qq='<offer id="' . $product['offer_id'] . '" available="' . $availble . '">
      <url>' . $product['offer_full_url'] . '</url>
      <price>' . $product['offer_price'] . '</price>
      <currencyId>RUR</currencyId>
      <categoryId>' . $product['item_cat_id'] . '</categoryId>
      ' . $image . '
      <store>' . $availble . '</store>
      <delivery>true</delivery>
      <pickup>true</pickup>
      <name>' . htmlspecialchars( $full_title ) . '</name>
      <vendor>' . htmlspecialchars( $product['vendor_name'] ) . '</vendor>
      <description><![CDATA[
' . strip_tags( $product['item_full_text'], '<h3><ul><li><p><br/>' ) . '
]]></description>
      <manufacturer_warranty>true</manufacturer_warranty>
      '.$attr.'
    </offer>';
			$offers .= $qq;
			$offers_a[$product['offer_full_url']]=1;
			if (in_array($product['item_cat_id'],array(1,2,30,9,10,65))==false) {
				$offers2 .= $qq;
				$offers_a2[$product['offer_full_url']]=1;
			}

			if ($product['offer_amount_nal']) {
				fputcsv($outstream, array(
					$product['cat_title'],
					htmlspecialchars($product['full_title']),
					'',
					intval($product['offer_price']),
					$img_url,
					'Нет',
					'Да'
				), ';');
			}

		}
	}
}
fclose($fp);
$content=$Main->template->RenderDefault(
    array(
	    'offers'=>$offers,
	    'cats'=>$cats
    )
);

$content2=$Main->template->RenderDefault(
	array(
		'offers'=>$offers2,
		'cats'=>$cats
	)
);
file_put_contents(ROOT_DIR.'/market/ya_market_729.xml',$content );
file_put_contents(ROOT_DIR.'/market/ya_market_short_729.xml',$content2 );
fclose($outstream);




$all_cc_array=array(
	1,2,3
);

foreach ($all_cc_array as $aaa) {
	$ShopClass->cats->CreateModel();
	$ShopClass->cats->model->columns_where->getStatus()->setValue( true );
	$ShopClass->cats->model->setSelectField( $ShopClass->cats->model->getTableName() . '.*' );
	$ShopClass->cats->model->setOrderByWithColumn( 'title' );
	$ShopClass->cats->model->setOrderWay( 'ASC' );
	$data= $ShopClass->cats->GetList();

	$cats=array();
	foreach ($data as $item){
		if ($item['cat_id']==1 or $item['cat_id']==2) {
			if ($aaa==$item['cat_id']) {
				$cats[$item['cat_id']]=$item;
			}
		}
		elseif($aaa==3) {
			$cats[$item['cat_id']]=$item;
		}
	}


	$ShopClass->offers->CreateModel();
	$ShopClass->offers->model->columns_where->getStatus()->setValue(1);
	$ShopClass->offers->model->columns_where->getAmount()->notValue(0);
	$ShopClass->offers->model->columns_where->getPrice()->notValue(0);
	$products=$ShopClass->offers->GetList();

	$offers_a=array();
	$offers='';
	$offers_a2=array();
	$offers2='';
	foreach ($products as $product) {

		$ShopClass->products->CreateModel();
		$ShopClass->products->model->setSelectField('*');
		$ShopClass->products->model->SetJoinAll(false);
		$ShopClass->products->model->setJoin('  INNER JOIN `shop_offers` ON `shop_items`.`item_id`= `shop_offers`.`offer_item_id`');
		$ShopClass->products->model->SetJoinImage('icon_offer','shop_offers.offer_icon');
		$ShopClass->products->model->columns_where->getStatus()->setValue(true);
		$ShopClass->products->model->addWhereCustom("`shop_vendors`.vendor_status=1");
		$ShopClass->products->model->addWhereCustom(' shop_offers.offer_id='.intval($product['offer_id']));
		$product=$ShopClass->products->GetItem(1);

		if ($product and isset($cats[$product['item_cat_id']]) and $product['offer_amount']>0 and $product['offer_price']>0) {
			$ggg=0;

			if ($product['item_cat_id']==1 or $product['item_cat_id']==2) {
				if ($aaa==$product['item_cat_id']) {
					$ggg=1;
				}
			}
			elseif($aaa==3) {
				$ggg=1;
			}

			if ($ggg) {

				$full_title=$product['full_title'];
				if ($product['item_cat_id']==1) {
					$full_title='Автомобильная шина '.$product['full_title'];
				}
				elseif ($product['item_cat_id']==2) {
					$full_title='Колесный диск '.$product['full_title'];
				}

				$availble="false";
				if ($product['offer_amount_nal']>0) {
					$availble="true";
				}

				$image='';
				$img_url='';
				if ($product['offer_icon']) {
					$img_url=$product['icon_offer_sizes_url']['original'];
					$image='<picture>'.$img_url.'</picture>';
				}
				elseif ($product['item_icon']) {
					$img_url=$product['icon_sizes_url']['original'];
					$image='<picture>'.$img_url.'</picture>';
				}

				$attr='';
				$options=$ShopClass->offers_filters->GetValuesListF($product,1);
				foreach ($options as $option_key=>$option_value) {
					$attr.='<param name="'.htmlspecialchars($option_key).'">'.htmlspecialchars($option_value['text']).'</param>';
				}

				if (isset($offers_a[$product['offer_full_url']])==false) {
					$qq='<offer id="' . $product['offer_id'] . '" available="' . $availble . '">
      <url>' . $product['offer_full_url'] . '</url>
      <price>' . $product['offer_price'] . '</price>
      <currencyId>RUR</currencyId>
      <categoryId>' . $product['item_cat_id'] . '</categoryId>
      ' . $image . '
      <store>' . $availble . '</store>
      <delivery>true</delivery>
      <pickup>true</pickup>
      <name>' . htmlspecialchars( $full_title ) . '</name>
      <vendor>' . htmlspecialchars( $product['vendor_name'] ) . '</vendor>
      <description><![CDATA[
' . strip_tags( $product['item_full_text'], '<h3><ul><li><p><br/>' ) . '
]]></description>
      <manufacturer_warranty>true</manufacturer_warranty>
      '.$attr.'
    </offer>';
					$offers .= $qq;
					$offers_a[$product['offer_full_url']]=1;
					if (in_array($product['item_cat_id'],array(1,2,30,9,10,65))==false) {
						$offers2 .= $qq;
						$offers_a2[$product['offer_full_url']]=1;
					}

					if ($product['offer_amount_nal']) {
						fputcsv($outstream, array(
							$product['cat_title'],
							htmlspecialchars($product['full_title']),
							'',
							intval($product['offer_price']),
							$img_url,
							'Нет',
							'Да'
						), ';');
					}

				}
			}

		}
	}

	$content=$Main->template->RenderDefault(
		array(
			'offers'=>$offers,
			'cats'=>$cats
		)
	);

	file_put_contents(ROOT_DIR.'/market/ya_market_729_'.$aaa.'.xml',$content );
}






