<?php
$Main->user->PagePrivacy();

if ($Main->GPC['ajax']) {

	if ( $Main->GPC['action'] == 'get_car_link' ) {
		$Main->input->clean_array_gpc('r', array(
			'mod' => TYPE_STR,
			'year' => TYPE_STR,
			'type' => TYPE_STR
		));

			if ($Main->GPC['mod']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите модификацию';
			}
			else {
				$array['status'] = true;

				$html='';
				$data=$ShopClass->getTo4kiData($Main->GPC['mod'],$Main->GPC['year'] );
				$array['redirect'] = BASE_URL.'/search/by_auto/'.$Main->GPC['type'].'/'.$data['slug_auto'].'/';
			}


		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_model' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'type' => TYPE_STR
		));
		if ($Main->GPC['type']=='oil' or $Main->GPC['type']=='moto' or $Main->GPC['type']=='lodo') {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getOilModels($Main->GPC['vendor']);
				foreach ($models as $model_id=>$model) {
					$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
				}
				$array['html'] = $html;
			}
		}
		elseif ($Main->GPC['type']=='freeze') {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getFreezeModels($Main->GPC['vendor']);
				foreach ($models as $model_id=>$model) {
					$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
				}
				$array['html'] = $html;
			}
		}
		elseif ($Main->GPC['type']=='filters') {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getFiltersModels($Main->GPC['vendor']);
				foreach ($models as $model_id=>$model) {
					$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
				}
				$array['html'] = $html;
			}
		}
		else {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getTo4kiModels($Main->GPC['vendor']);
				foreach ($models as $model) {
					$html.='<div class="form-select__item" data-value="'.$model['id'].'"><span>'.$model['name'].'</span></div>';
				}
				$array['html'] = $html;
			}
		}

		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_filters' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'key' => TYPE_STR,
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['key']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите мощность';
		}
		else {
			$empty=true;
			$array['status'] = true;
			$key=md5($Main->GPC['key']);
			$file=ROOT_DIR.'/app/data/filters/data_'.$key.'.dat';
			$items=array();
			//if (file_exists($file)==false) {

				$types=array(
					//Фильтр воздушный двигателя
					'https://www.exist.ru/Catalog/Global/Parts.aspx?i='.$Main->GPC['key'].'&id=12F00000_8',
					//Фильтр масляный двигателя
					'https://www.exist.ru/Catalog/Global/Parts.aspx?i='.$Main->GPC['key'].'&id=12F00000_7',
					//Фильтр топливный
					'https://www.exist.ru/Catalog/Global/Parts.aspx?i='.$Main->GPC['key'].'&id=12F00000_9',
					//Фильтр салона
					'https://www.exist.ru/Catalog/Global/Parts.aspx?i='.$Main->GPC['key'].'&id=12F00000_424',
				);

				foreach ($types as $url) {
					$content=load_url('https://crimea-drive.ru/t.php?q=495ui3496y54iojy&url='.base64_encode($url));
					preg_match_all( "#<div class=\"art\">(.*)</div>#Us", $content, $res3 );
					foreach ($res3[1] as $a ) {
						$a=$ShopClass->ArticleForCompare($a);
						$items[$a]=$a;
					}
				}
				preg_match_all( "#<h1 class=\"car-info__car-name\">(.*)</h1>#Us", $content, $res3 );


				$data=array(
					'title'=>$res3[1][0],
					'items'=>$items
				);
				file_put_contents($file, json_encode($data));
		//	}
			$array['redirect']=BASE_URL.'/search/by_auto/filters/'.$Main->GPC['key'].'/';

		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_freeze' ) {
	$Main->input->clean_array_gpc('r', array(
		'vendor' => TYPE_STR,
		'car' => TYPE_STR,
		'mod' => TYPE_STR,
		'year' => TYPE_STR,
		'fuel' => TYPE_STR,
		'volume' => TYPE_STR,
		'power' => TYPE_STR,
		'title' => TYPE_STR
	));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['mod']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите модификацию';
		}
		elseif ($Main->GPC['year']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите год';
		}
		elseif ($Main->GPC['fuel']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите тип топлива';
		}
		elseif ($Main->GPC['volume']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите объем';
		}
		elseif ($Main->GPC['power']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите мощность';
		}
		else {
			$empty=true;
			$array['status'] = true;
			$key=md5($Main->GPC['vendor'].$Main->GPC['car'].$Main->GPC['mod'].$Main->GPC['year'].$Main->GPC['fuel'].$Main->GPC['volume'].$Main->GPC['power']);
			$file=ROOT_DIR.'/app/data/freeze/data_'.$key.'.dat';

			if (file_exists($file)==false) {
				$url='https://www.cool-stream.ru/catalog/selection/?marka='.$Main->GPC['vendor'].'&model='.$Main->GPC['car'].'&gen='.$Main->GPC['mod'].'&year='.$Main->GPC['year'].'&type2='.$Main->GPC['fuel'].'&volume='.$Main->GPC['volume'].'&power='.$Main->GPC['power'];
				$urls=$ShopClass->getFreezeData($url);
				$data=array(
					'title'=>$Main->GPC['title'],
					'urls'=>$urls
				);
				file_put_contents($file, json_encode($data));
			}
			$array['redirect']=BASE_URL.'/search/by_auto/freeze/'.$Main->GPC['vendor'].'/'.$Main->GPC['car'].'/'.$Main->GPC['mod'].'/'.$Main->GPC['year'].'/'.$Main->GPC['fuel'].'/'.$Main->GPC['volume'].'/'.$Main->GPC['power'].'/';

		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_power' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'mod' => TYPE_STR,
			'year' => TYPE_STR,
			'fuel' => TYPE_STR,
			'volume' => TYPE_STR
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['mod']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите модификацию';
		}
		elseif ($Main->GPC['year']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите год';
		}
		elseif ($Main->GPC['fuel']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите тип топлива';
		}
		elseif ($Main->GPC['volume']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите объем';
		}
		else {
			$array['status'] = true;

			$html='';
			if ($Main->GPC['type']=='filters') {
				$models = $ShopClass->getFiltersPower( $Main->GPC['vendor'], $Main->GPC['car'], $Main->GPC['mod'], $Main->GPC['year'], $Main->GPC['fuel'], $Main->GPC['volume'] );
			}
			else {
				$models = $ShopClass->getFreezePower( $Main->GPC['vendor'], $Main->GPC['car'], $Main->GPC['mod'], $Main->GPC['year'], $Main->GPC['fuel'], $Main->GPC['volume'] );
			}
			foreach ($models as $model_id=>$model) {
				$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
			}
			$array['html'] = $html;
		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_volume' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'mod' => TYPE_STR,
			'year' => TYPE_STR,
			'fuel' => TYPE_STR,
			'type' => TYPE_STR
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['mod']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите модификацию';
		}
		elseif ($Main->GPC['year']=='' and $Main->GPC['type']=='freeze') {
			$array['status'] = false;
			$array['text'] = 'Выберите год';
		}
		elseif ($Main->GPC['fuel']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите тип топлива';
		}
		else {
			$array['status'] = true;

			$html='';
			if ($Main->GPC['type']=='filters') {
				$models=$ShopClass->getFiltersVolume($Main->GPC['vendor'],$Main->GPC['car'],$Main->GPC['mod'],$Main->GPC['year'],$Main->GPC['fuel']);
			}
			else {
				$models=$ShopClass->getFreezeVolume($Main->GPC['vendor'],$Main->GPC['car'],$Main->GPC['mod'],$Main->GPC['year'],$Main->GPC['fuel']);
			}

			foreach ($models as $model_id=>$model) {
				$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
			}
			$array['html'] = $html;
		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_fuel' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'mod' => TYPE_STR,
			'year' => TYPE_STR,
			'type' => TYPE_STR
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['mod']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите модификацию';
		}
		elseif ($Main->GPC['year']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите год';
		}
		else {
			$array['status'] = true;

			$html='';
			if ($Main->GPC['type']=='filters') {
				$models=$ShopClass->getFiltersFuel($Main->GPC['vendor'],$Main->GPC['car'],$Main->GPC['mod'],$Main->GPC['year']);
			}
			else {
				$models=$ShopClass->getFreezeFuel($Main->GPC['vendor'],$Main->GPC['car'],$Main->GPC['mod'],$Main->GPC['year']);
			}

			foreach ($models as $model_id=>$model) {
				$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
			}
			$array['html'] = $html;
		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_year3' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'mod' => TYPE_STR
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['mod']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите модификацию';
		}
		else {
			$array['status'] = true;

			$html='';
			$models=$ShopClass->getFiltersYears($Main->GPC['vendor'],$Main->GPC['car'],$Main->GPC['mod']);
			foreach ($models as $model_id=>$model) {
				$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
			}
			$array['html'] = $html;
		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_year2' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'mod' => TYPE_STR
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		elseif ($Main->GPC['mod']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите модификацию';
		}
		else {
			$array['status'] = true;

			$html='';
			$models=$ShopClass->getFreezeYears($Main->GPC['vendor'],$Main->GPC['car'],$Main->GPC['mod']);
			foreach ($models as $model_id=>$model) {
				$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
			}
			$array['html'] = $html;
		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_year' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR
		));
		if ($Main->GPC['vendor']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите производителя';
		}
		elseif ($Main->GPC['car']=='') {
			$array['status'] = false;
			$array['text'] = 'Выберите марку';
		}
		else {
			$array['status'] = true;

			$html='';
			$models=$ShopClass->getTo4kiYears($Main->GPC['car']);
			foreach ($models as $model) {
				$html.='<div class="form-select__item" data-value="'.$model['name'].'"><span>'.$model['name'].'</span></div>';
			}
			$array['html'] = $html;
		}
		$Main->template->DisplayJson($array);
	}
	elseif ( $Main->GPC['action'] == 'get_car_mod' ) {
		$Main->input->clean_array_gpc('r', array(
			'vendor' => TYPE_STR,
			'car' => TYPE_STR,
			'year' => TYPE_STR,
			'type' => TYPE_STR
		));

		if ($Main->GPC['type']=='oil'  or $Main->GPC['type']=='moto' or $Main->GPC['type']=='lodo') {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			elseif ($Main->GPC['car']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите марку';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getOilModelTypes($Main->GPC['car']);
				foreach ($models as $model_id=>$model) {
					$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
				}
				$array['html'] = $html;
			}
		}
		elseif ($Main->GPC['type']=='freeze') {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			elseif ($Main->GPC['car']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите марку';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getFreezeModelTypes($Main->GPC['vendor'], $Main->GPC['car']);
				foreach ($models as $model_id=>$model) {
					$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
				}
				$array['html'] = $html;
			}
		}
		elseif ($Main->GPC['type']=='filters') {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			elseif ($Main->GPC['car']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите марку';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getFiltersModelTypes($Main->GPC['vendor'], $Main->GPC['car']);
				foreach ($models as $model_id=>$model) {
					$html.='<div class="form-select__item" data-value="'.$model_id.'"><span>'.$model.'</span></div>';
				}
				$array['html'] = $html;
			}
		}
		else {
			if ($Main->GPC['vendor']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите производителя';
			}
			elseif ($Main->GPC['car']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите марку';
			}
			elseif ($Main->GPC['year']=='') {
				$array['status'] = false;
				$array['text'] = 'Выберите год выпуска';
			}
			else {
				$array['status'] = true;

				$html='';
				$models=$ShopClass->getTo4kiMod($Main->GPC['car'],$Main->GPC['year']);
				foreach ($models as $model) {
					$html.='<div class="form-select__item" data-value="'.$model['id'].'"><span>'.$model['name'].'</span></div>';
				}
				$array['html'] = $html;
			}
		}

		$Main->template->DisplayJson($array);
	}else {
		$Main->input->clean_array_gpc('r', array(
			'q' => TYPE_STR,
			'type' => TYPE_STR
		));
		$array = array(
			'status' => true
		);
		if ($Main->GPC['q'] != '') {
			//$ShopClass->checkSearchSpeed();
			$ShopClass->offers->CreateModel();

			$ShopClass->offers->model->setJoin('  INNER JOIN `shop_items` ON `shop_offers`.`offer_item_id`=`shop_items`.`item_id`
			LEFT JOIN `shop_vendors` ON shop_items.item_vendor_id=`shop_vendors`.`vendor_id`
            LEFT JOIN `shop_categories` ON shop_items.item_cat_id=`shop_categories`.`cat_id`');

			$ShopClass->offers->model->columns_where->getSearch()->setValue(true);
			$ShopClass->offers->MakeSearchSql(trim($Main->GPC['q']));
			$total=$ShopClass->offers->GetTotal();


			$ShopClass->offers->model->setTablePrimaryKey('');
			$ShopClass->offers->model->setSelectField('shop_items.item_url,shop_categories.cat_url,shop_items.item_id,  shop_offers.*, shop_items.*');
			$ShopClass->offers->model->setSelectField(' `shop_vendors`.vendor_name, `shop_vendors`.vendor_url');
			$ShopClass->offers->model->SetJoinImage('icon','shop_items.item_icon');
			$ShopClass->offers->model->SetJoinImage('icon_offer','shop_offers.offer_icon');
			$ShopClass->offers->model->setCount(20);
			$ShopClass->offers->model->setStart(0);
			$list=$ShopClass->offers->GetList();


			$template='frontend/components/search-block/search-drop.twig';
			if ($Main->GPC['type']=='temp') {
				$template='frontend/components/search-block/temp.twig';
			}
			$array['html'] = $Main->template->Render($template,
				array(
					'items' => $list,
					'total' => $total,
					'q' => $Main->GPC['q'],
					'hide_label'=>1
				)
			);
		} else {
			$array['status'] = false;
			$array['text'] = 'Введите текст для поиска';
		}
		$Main->template->DisplayJson($array);
	}
}

$Main->error->AccessDenied();
