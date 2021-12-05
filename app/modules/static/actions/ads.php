<?php
$Main->user->PagePrivacy('admin');
$options=array(
	'wheels'=>array(
		'cat_id'=>2,
		'type'=>'Диски',
		'type2'=>'Дисков',
		'words'=>array(
			'диски',
			'автодиски',
			'колеса'
		)
	),
	'tyres'=>array(
		'cat_id'=>1,
		'type'=>'Шины',
		'type2'=>'Шин',
		'words'=>array(
			'шины',
			'автошины',
			'резина'
		)
	),
);


$top_cats  = $Main->template->global_vars['menu_cats'];

set_time_limit(0);
ob_start();
$fp = fopen("php://output", 'w');
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

$fields=array(
	'Доп. объявление группы',
	'Мобильное объявление',
	'Тип объявления',
	'Название группы',
	'Тип кампании',
	'Название кампании',
	'Валюта',
	'Фраза (с минус-словами)',
	'Заголовок 1',
	'Заголовок 2',
	'Текст',
	'Ссылка',
	'Отображаемая ссылка',
	'Регион',
	'Ставка',
	'Уточнения'
);
fputcsv($fp, $fields,';');


foreach ($options as $option) {



	$Main->shop->products->CreateModel();
	$Main->shop->products->model->setSelectField('shop_vendors.*,shop_categories.*');
	$Main->shop->products->model->setJoin(' INNER JOIN `shop_vendors`  ON '.$Main->shop->products->model->GetTableItemName('vendor_id').'=  shop_vendors.`vendor_id` and shop_vendors.vendor_status=1 and shop_vendors.vendor_minus=0
    INNER JOIN `shop_categories`  ON shop_items.item_cat_id= shop_categories.`cat_id` and shop_categories.cat_status=1');
	$Main->shop->products->model->setTablePrimaryKey('');
	$Main->shop->products->model->columns_where->getCatId()->setValue( $option['cat_id'] );
	$Main->shop->products->model->columns_where->getStatus()->setValue(true);
	$Main->shop->products->model->setGroupCustom('shop_vendors.vendor_id');
	$data=$Main->shop->products->GetList();

	foreach ($data as $vendor) {
		foreach ($option['words'] as $word) {
			$keyword=$vendor['vendor_name'];
			$keyword=str_ireplace('k&k','КиК', $keyword);

			$fields=array(
				'-',
				'-',
				'Текстово-графическое',
				$option['type'].' '.$vendor['vendor_name'],
				'Текстово-графическая кампания',
				$option['type'].' по брендам',
				'RUB',
				mb_strtolower($word.' '.$keyword),
				$option['type'].' '.$vendor['vendor_name'],
				'Склад в Симферополе',
				'Каталог '.mb_strtolower($option['type2']).' '.$vendor['vendor_name'].' по низким ценам.',
				$vendor['cat_vendor_full_url'],
				'',
				'Симферополь',
				'15',
				''
			);
			fputcsv($fp, $fields,';');
		}



		$Main->shop->products->CreateModel();
		$Main->shop->products->model->setSelectField('shop_items.*,shop_vendors.*,shop_categories.*');
		$Main->shop->products->model->setJoin(' INNER JOIN `shop_vendors`  ON '.$Main->shop->products->model->GetTableItemName('vendor_id').'=  shop_vendors.`vendor_id` and shop_vendors.vendor_status=1 and shop_vendors.vendor_minus=0
    INNER JOIN `shop_categories`  ON shop_items.item_cat_id= shop_categories.`cat_id` and shop_categories.cat_status=1');
		$Main->shop->products->model->setTablePrimaryKey('');
		$Main->shop->products->model->columns_where->getCatId()->setValue( $option['cat_id'] );
		$Main->shop->products->model->columns_where->getVendorId()->setValue( $vendor['vendor_id'] );
		$Main->shop->products->model->columns_where->getisModel()->setValue(true);
		$Main->shop->products->model->columns_where->getStatus()->setValue(true);
		$data2=$Main->shop->products->GetList();


		foreach ($data2 as $item) {
				$title=yandex_safe($item['full_title2']);
				$desc='Купить '.mb_strtolower($option['type']).' '.$item['full_title2'].' по низким ценам.';
				$keyword2=mb_strtolower($title);
				$keyword2=str_replace('+',' ',$keyword2);
				if (mb_strlen($title)<=33 and mb_strlen($desc)<=75) {

					$fields=array(
						'-',
						'-',
						'Текстово-графическое',
						$option['type'].' '.$title,
						'Текстово-графическая кампания',
						$option['type'].' модели',
						'RUB',
						$keyword2,
						$title,
						'Склад в Симферополе',
						$desc,
						$item['item_full_url'],
						'',
						'Симферополь',
						'15',
						''
					);
					fputcsv($fp, $fields,';');
				}


		}

	}



}

fclose($fp);
header("Content-Type:application/csv");
header('Content-Disposition: attachment;filename="import_data.csv"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
exit;
