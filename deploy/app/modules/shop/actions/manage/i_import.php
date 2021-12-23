<?php
function processOffer( $meta, $full=true ) {


	$meta['title']      = str_replace(' ,',',',htmlspecialchars_decode( $meta['title'] ));
	$meta['full_title'] = htmlspecialchars_decode( $meta['full_title'] );
	$meta['short_title'] = htmlspecialchars_decode( $meta['short_title'] );



	global $Main, $ShopClass;
	$offer_info = false;
	$offer_id=0;
	$model_info=false;
	$vendor_info=false;
	$url='';
	$img_url='';
	$vendor_id=0;
	$vendor_name = $ShopClass->vendors->replaceBrand( $meta['brand'] );

	if ($meta['brand']) {
		$ShopClass->vendors->CreateModel();
		$ShopClass->vendors->model->columns_where->getTitle()->setValue( $vendor_name );
		$vendor_info = $ShopClass->vendors->GetItem();

		$url         = translit_url_safe( $vendor_name );
		if ($vendor_info==false) {
			$ShopClass->vendors->CreateModel();
			$ShopClass->vendors->model->columns_where->getUrl()->setValue( $url );
			$vendor_info = $ShopClass->vendors->GetItem();
		}

		if ( $vendor_info ) {
			$vendor_id = $vendor_info['vendor_id'];
		} else {
			$letter = mb_strtoupper( mb_substr( $vendor_name, 0, 1 ) );

			$ShopClass->vendors->CreateModel();
			$ShopClass->vendors->model->columns_update->getTitle()->setValue( $vendor_name );
			$ShopClass->vendors->model->columns_update->getUrl()->setValue( $url );
			$ShopClass->vendors->model->columns_update->getLetter()->setValue( $letter );
			$vendor_id = $ShopClass->vendors->Insert();
		}
	}

	/*if ( $meta['code']  and $offer_info==false) {
		$ShopClass->offers->CreateModel();
		$ShopClass->offers->model->columns_where->getArticle()->setValue( $meta['article'] );
		$ShopClass->offers->model->columns_where->getCode()->setValue( $meta['code'] );
		$offer_info = $ShopClass->offers->GetItemSimple();

	}*/





	if ( $offer_info==false and $vendor_id and $meta['article'] ) {
		$offer_info = $Main->db->query_first('SELECT SQL_NO_CACHE  shop_offers.*
			FROM shop_offers
			INNER JOIN shop_items ON shop_offers.offer_item_id=shop_items.item_id
			WHERE offer_article='.$Main->db->sql_prepare($meta['article']).' AND
			offer_short_title!="" AND item_short_title!="" AND
			item_vendor_id='.$Main->db->sql_prepare($vendor_id).'
			ORDER BY item_id');
	}

	if ( $offer_info==false and $vendor_id and $meta['article'] ) {
		$offer_info = $Main->db->query_first('SELECT SQL_NO_CACHE  shop_offers.*
			FROM shop_offers
			INNER JOIN shop_items ON shop_offers.offer_item_id=shop_items.item_id
			WHERE offer_article='.$Main->db->sql_prepare($meta['article']).' AND
			item_vendor_id='.$Main->db->sql_prepare($vendor_id).'
			ORDER BY item_id');
	}

	if ( $offer_info==false and $meta['1c'] ) {
		$ShopClass->offers->CreateModel();
		$ShopClass->offers->model->columns_where->getArticle()->setValue( $meta['article'] );
		$ShopClass->offers->model->columns_where->getOffer1c()->setValue( $meta['1c'] );
		$offer_info = $ShopClass->offers->GetItemSimple();
	}

	if ( $offer_info ) {
		$offer_id = $offer_info['offer_id'];
		$item_id  = $offer_info['offer_item_id'];

		if ($offer_info['offer_item_id']) {
			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_where->getId()->setValue( $offer_info['offer_item_id'] );
			$model_info = $ShopClass->products->GetItem();
		}

		if ($model_info['item_vendor_id']) {
			$ShopClass->vendors->CreateModel();
			$ShopClass->vendors->model->columns_where->getId()->setValue( $model_info['item_vendor_id'] );
			$vendor_info = $ShopClass->vendors->GetItem();

			if ($vendor_info) {
				$url=$vendor_info['vendor_url'];
			}
		}


		$model_url=$model_info['item_url'];
	}
	else {




		$parent_model_id   = 0;
		$parent_model_info = false;
		if ( $meta['model'] ) {
			$model_name        = $meta['model'];
			$parent_model_name = $model_name;
			if ( $meta['color'] ) {
				$model_name .= ' ' . $meta['color'];
			}
			$model_url        = translit_url_safe( $model_name );
			$parent_model_url = translit_url_safe( $parent_model_name );
		} else {
			$model_name        = $meta['title'];
			$model_url         = '';
			$parent_model_name = $model_name;
			$parent_model_url  = '';
		}

		while (substr($parent_model_url, -1)==',') {
			$parent_model_url=substr($parent_model_url, 0, -1);
		}

		while (substr($model_url, -1)==',') {
			$model_url=substr($model_url, 0, -1);
		}
		while (substr($parent_model_url, -1)=='.') {
			$parent_model_url=substr($parent_model_url, 0, -1);
		}

		while (substr($model_url, -1)=='.') {
			$model_url=substr($model_url, 0, -1);
		}


		if ( $parent_model_name != $model_name ) {
			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_where->getVendorId()->setValue( $vendor_id );
			$ShopClass->products->model->columns_where->getTitle()->setValue( $parent_model_name );
			$parent_model_info = $ShopClass->products->GetItem();
			if ( $parent_model_info ) {
				$parent_model_id = $parent_model_info['item_id'];
				if ( $parent_model_info['item_has_child'] == 0 ) {
					$ShopClass->products->CreateModel();
					$ShopClass->products->model->columns_update->getHasChild()->setValue( true );
					$ShopClass->products->model->columns_where->getId()->setValue( $parent_model_id );
					$ShopClass->products->Update();
				}
			} else {
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getTitle()->setValue( $parent_model_name );
				$ShopClass->products->model->columns_update->getVendorId()->setValue( $vendor_id );
				$ShopClass->products->model->columns_update->getCatId()->setValue( $meta['cat_id'] );
				$ShopClass->products->model->columns_update->getUrl()->setValue( $parent_model_url );
				$parent_model_id = $ShopClass->products->Insert();

				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getisModel()->setValue( true );
				$ShopClass->products->model->columns_update->getHasChild()->setValue( true );
				$ShopClass->products->model->columns_where->getId()->setValue( $parent_model_id );
				$ShopClass->products->Update();
			}
		}

		$img_url = '';
		$full_title = $model_name;
		if ( $meta['full_title'] ) {
			$full_title = $meta['full_title'];
		}

		if ( $model_info==false) {
			$ShopClass->products->CreateModel();
			if ($vendor_id){
				$ShopClass->products->model->columns_where->getVendorId()->setValue( $vendor_id );
			}

			$ShopClass->products->model->columns_where->getTitle()->setValue( $full_title );
			$model_info = $ShopClass->products->GetItem();
		}
		if ( $model_info==false) {
			$ShopClass->products->CreateModel();
			if ($vendor_id){
				$ShopClass->products->model->columns_where->getVendorId()->setValue( $vendor_id );
			}

			$ShopClass->products->model->columns_where->getShortTitle()->setValue( $model_name );
			$model_info = $ShopClass->products->GetItem();
		}

		if ($model_info==false and $meta['source_url']) {
			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_where->getSourceUrl()->setValue( $meta['source_url'] );
			$model_info = $ShopClass->products->GetItem();
		}

		if ( $model_info == false and $model_url ) {
			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_where->getVendorId()->setValue( $vendor_id );
			$ShopClass->products->model->columns_where->getUrl()->setValue( $model_url );
			$model_info = $ShopClass->products->GetItem();
		}

		if ( $model_info ) {
			$item_id = $model_info['item_id'];
		} else {


			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_update->getTitle()->setValue( $full_title );
			$ShopClass->products->model->columns_update->getShortTitle()->setValue( $model_name );
			$ShopClass->products->model->columns_update->getVendorId()->setValue( $vendor_id );
			$ShopClass->products->model->columns_update->getCatId()->setValue( $meta['cat_id'] );
			$ShopClass->products->model->columns_update->getShortText()->setValue( CutHeadText( $meta['short_desc'] ) );
			$ShopClass->products->model->columns_update->getUrl()->setValue( $model_url );
			$ShopClass->products->model->columns_update->getSourceUrl()->setValue( $meta['source_url'] );
			$ShopClass->products->model->columns_update->getParentId()->setValue( $parent_model_id );
			$item_id = $ShopClass->products->Insert();

			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_where->getId()->setValue( $item_id );
			$model_info = $ShopClass->products->GetItem();
		}



		if ( $parent_model_info and $parent_model_info['item_icon'] == 0 and $model_info['item_icon'] ) {
			$ShopClass->products->CreateModel();
			$ShopClass->products->model->columns_update->getPhotoId()->setValue( $model_info['item_icon'] );
			$ShopClass->products->model->columns_where->getId()->setValue( $parent_model_id );
			$ShopClass->products->Update();
		}
	}


	if ($item_id) {
		if ($full) {
			if ( trim($meta['desc'])!='' and $model_info['item_text_id']==0) {
				$text_id = $Main->text->SaveText( 0, $meta['desc'] );
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getTextId()->setValue( $text_id );
				$ShopClass->products->model->columns_where->getId()->setValue( $item_id );
				$ShopClass->products->Update();
			}
			if ( $meta['source_url'] and $model_info['item_source_url'] == '' ) {
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getSourceUrl()->setValue( $meta['source_url'] );
				$ShopClass->products->model->columns_where->getId()->setValue( $item_id );
				$ShopClass->products->Update();
			}
			if ( $meta['model'] and $model_info['item_is_model'] == 0 ) {
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getisModel()->setValue( true );
				$ShopClass->products->model->columns_where->getId()->setValue( $item_id );
				$ShopClass->products->Update();
			}

			if ( $meta['cat_id'] and $model_info['item_cat_id'] != $meta['cat_id'] and $meta['cat_id']>$model_info['item_cat_id']  ) {
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getCatId()->setValue( $meta['cat_id'] );
				$ShopClass->products->model->columns_where->getId()->setValue( $item_id );
				$ShopClass->products->Update();
			}
			if ( $vendor_name and $vendor_info and mb_strtolower($vendor_info['vendor_name']) != mb_strtolower($vendor_name) ) {
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getVendorId()->setValue( true );
				$ShopClass->products->model->columns_where->getId()->setValue( $vendor_info['vendor_id'] );
				$ShopClass->products->Update();
			}

		}

		if ( $meta['img'] and $model_info['item_icon'] == 0 ) {
			$Main->files->current_module = 'products';
			$Main->files->upload_folder  = 'products';
			if ( $model_url ) {
				$img_url = $url . '_' . $model_url;
			}
			$response = $Main->files->UploadExternalImage( $meta['img'], $img_url );

			if ( $response['status'] ) {
				$photo_id = $response['file_id'];
				$ShopClass->products->CreateModel();
				$ShopClass->products->model->columns_update->getPhotoId()->setValue( $photo_id );
				$ShopClass->products->model->columns_where->getId()->setValue( $item_id );
				$ShopClass->products->Update();
			}
		}

		$offer_info=false;

		if ($offer_info==false and $meta['key']) {
			$ShopClass->offers->CreateModel();
			$ShopClass->offers->model->columns_where->getItemId()->setValue( $item_id );
			//$ShopClass->offers->model->columns_where->getArticle()->setValue( $meta['article'] );
			$ShopClass->offers->model->columns_where->getKey()->setValue( $meta['key'] );
			$offer_info = $ShopClass->offers->GetItemSimple();
		}


		if ( $offer_info ) {
			$offer_id = $offer_info['offer_id'];
		} else {
			if ($meta['short_title']) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_where->getItemId()->setValue( $item_id );
				//$ShopClass->offers->model->columns_where->getArticle()->setValue( $meta['article'] );
				$ShopClass->offers->model->columns_where->getShortTitle()->setValue( $meta['short_title'] );
				$offer_info = $ShopClass->offers->GetItemSimple();
			}
			if ( $offer_info==false and $vendor_id and $meta['article'] ) {
				$offer_info = $Main->db->query_first('SELECT SQL_NO_CACHE  shop_offers.*
			FROM shop_offers
			INNER JOIN shop_items ON shop_offers.offer_item_id=shop_items.item_id
			WHERE offer_article='.$Main->db->sql_prepare($meta['article']).' AND
			offer_short_title!="" AND item_short_title!="" AND
			item_vendor_id='.$Main->db->sql_prepare($vendor_id).'
			ORDER BY item_id');
			}


			if ( $offer_info==false and $vendor_id and $meta['article'] ) {
				$offer_info = $Main->db->query_first('SELECT SQL_NO_CACHE  shop_offers.*
			FROM shop_offers
			INNER JOIN shop_items ON shop_offers.offer_item_id=shop_items.item_id
			WHERE offer_article='.$Main->db->sql_prepare($meta['article']).' AND
			item_vendor_id='.$Main->db->sql_prepare($vendor_id).'
			ORDER BY item_id');
			}

			if ( $offer_info==false) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_where->getArticle()->setValue( $meta['article'] );
				$ShopClass->offers->model->columns_where->getItemId()->setValue( $item_id );
				$ShopClass->offers->model->columns_where->getKey()->setValue( $meta['key'] );
				$offer_info = $ShopClass->offers->GetItemSimple();
			}

			if ( $offer_info==false and $meta['1c'] ) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_where->getArticle()->setValue( $meta['article'] );
				$ShopClass->offers->model->columns_where->getOffer1c()->setValue( $meta['1c'] );
				$offer_info = $ShopClass->offers->GetItemSimple();
			}


			if ($offer_info) {
				$offer_id = $offer_info['offer_id'];
			}
			else {

				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getArticle()->setValue( $meta['article'] );
				$ShopClass->offers->model->columns_update->getCode()->setValue( $meta['code'] );
				$ShopClass->offers->model->columns_update->getTitle()->setValue( $meta['title'] );
				$ShopClass->offers->model->columns_update->getShortTitle()->setValue( $meta['short_title'] );
				$ShopClass->offers->model->columns_update->getKey()->setValue( $meta['key'] );
				$ShopClass->offers->model->columns_update->getSourceUrl()->setValue( $meta['source_url'] );
				$ShopClass->offers->model->columns_update->getItemId()->setValue( $item_id );
				$ShopClass->offers->model->columns_update->getOffer1c()->setValue( $meta['1c'] );
				$offer_id = $ShopClass->offers->Insert();

				$offer_info = $ShopClass->offers->GetItem($offer_id);
			}
		}

		if ($offer_info['offer_short_title'] and $meta['offer_url']=='') {
			$meta['offer_url']=translit_url_safe($offer_info['offer_short_title']);
		}

		if ( $meta['offer_url']!=$offer_info['offer_url'] and $offer_info['offer_url'] == '') {
echo '!';
			$ShopClass->offers->CreateModel();
			$ShopClass->offers->model->columns_where->getItemId()->setValue( $item_id );
			$ShopClass->offers->model->columns_where->getUrl()->setValue( $meta['offer_url'] );
			$ShopClass->offers->model->columns_where->getId()->notValue( $offer_id );
			$check_url=$ShopClass->offers->GetItemSimple();

			if ($check_url) {
				$meta['offer_url']=$meta['offer_url'].'-'.$meta['article'];
			}

			if ( $meta['offer_url']!=$offer_info['offer_url']) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getUrl()->setValue( $meta['offer_url'] );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}

		}

		if ($full) {
			if ( $meta['title']!= $model_info['offer_title'] and $meta['1c']) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getTitle()->setValue( $meta['title'] );
				$ShopClass->offers->model->columns_where->getOffer1c()->setValue( $meta['1c'] );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}

			foreach ( $meta['params'] as $key => $params ) {

				if ( is_array( $params ) == false ) {
					$params = array( $params );
				}


				foreach ( $params as $param ) {
					if ( $param != '' ) {
						$param      = trim( $param );
						$sprav_info = $Main->sprav->GetSpravItem(
							array(
								'sprav_name' => $meta['prefix'] . $key
							)
						);
						if ( $sprav_info ) {
							$sprav_id = $sprav_info['sprav_id'];
						} else {
							$sprav_id = $Main->sprav->AddSpravItem(
								$key,
								$meta['prefix'] . $key,
								'',
								'select',
								'',
								'' );
						}

                        if ($sprav_info['sprav_data_type']=='num') {
                            $param=str_replace(',','.',$param);
                            $param=$param*1;
                        }

						$value_info = $Main->sprav->GetSpravValue(
							array(
								'sprav_id'   => $sprav_id,
								'svid_title' => $param,
								'svid_status'=>-1,
								'with_syn'=>true
							)
						);

						if ( $value_info ) {
							$svid = $value_info['svid'];
							if ($value_info['svid_syn_id']) {
								$svid = $value_info['svid_syn_id'];
							}

							if ($value_info['svid_svg']) {
								if ($model_info['item_icons_dop']) {
									$icons=unserialize($model_info['item_icons_dop']);
								}
								else {
									$icons=array();
								}

								if (isset($icons[$value_info['svid_svg']])==false) {
									$icons[$value_info['svid_svg']]=1;
									$ShopClass->products->CreateModel();
									$ShopClass->products->model->columns_where->getId()->setValue($model_info['item_id']);
									$icons=serialize($icons);
									$ShopClass->products->model->columns_update->getIconsDop()->setValue($icons);
									$ShopClass->products->Update();
								}
							}
						} else {
							$svid = $Main->sprav->AddSpravValue(
								$sprav_id,
								$param,
								translit_url_safe( $param ));
						}


						if (
						$offer_id
							//isset( $meta['offer_keys'] ) and in_array( $key, $meta['offer_keys'] )
						) {
							$ShopClass->offers_filters->CreateModel();
							$ShopClass->offers_filters->model->columns_where->getOfferId()->setValue( $offer_id );
							$ShopClass->offers_filters->model->columns_where->getSpravId()->setValue( $sprav_id );
							$ShopClass->offers_filters->model->columns_where->getSvid()->setValue( $svid );
							$ff = $ShopClass->offers_filters->GetItem();

							if ($svid==250) {
								$ShopClass->offers_filters->CreateModel();
								$ShopClass->offers_filters->model->columns_where->getOfferId()->setValue( $offer_id );
								$ShopClass->offers_filters->model->columns_where->getSpravId()->setValue( $sprav_id );
								$ShopClass->offers_filters->model->columns_where->getSvid()->setValue( 14465 );
								$ShopClass->offers_filters->Delete();
							}
							$chhh=false;
							if ($svid==14465) {
								$ShopClass->offers_filters->CreateModel();
								$ShopClass->offers_filters->model->columns_where->getOfferId()->setValue( $offer_id );
								$ShopClass->offers_filters->model->columns_where->getSpravId()->setValue( $sprav_id );
								$ShopClass->offers_filters->model->columns_where->getSvid()->setValue( 250 );
								$chhh = $ShopClass->offers_filters->GetItem();
							}

							if ( $ff == false ) {

								if ($chhh==false) {
									$ShopClass->offers_filters->CreateModel();
									$ShopClass->offers_filters->model->columns_update->getOfferId()->setValue( $offer_id );
									$ShopClass->offers_filters->model->columns_update->getSpravId()->setValue( $sprav_id );
									$ShopClass->offers_filters->model->columns_update->getSvid()->setValue( $svid );
									$ShopClass->offers_filters->model->columns_update->getUp()->setValue(false);
									$ShopClass->offers_filters->model->columns_update->getAuto()->setValue(true);
									$ShopClass->offers_filters->Insert();
								}

							}
							elseif ($chhh==false) {
								$ShopClass->offers_filters->CreateModel();
								$ShopClass->offers_filters->model->columns_update->getUp()->setValue(false);
								$ShopClass->offers_filters->model->columns_where->getOfferId()->setValue( $offer_id );
								$ShopClass->offers_filters->model->columns_where->getSpravId()->setValue( $sprav_id );
								$ShopClass->offers_filters->model->columns_where->getSvid()->setValue( $svid );
								$ShopClass->offers_filters->Update();
							}
						}
						if ($item_id) {
							$ShopClass->products_filters->CreateModel();
							$ShopClass->products_filters->model->columns_where->getItemId()->setValue( $item_id );
							$ShopClass->products_filters->model->columns_where->getSpravId()->setValue( $sprav_id );
							$ShopClass->products_filters->model->columns_where->getSvid()->setValue( $svid );
							$ff = $ShopClass->products_filters->GetItem();
							if ( $ff == false ) {
								$ShopClass->products_filters->CreateModel();
								$ShopClass->products_filters->model->columns_update->getItemId()->setValue( $item_id );
								$ShopClass->products_filters->model->columns_update->getSpravId()->setValue( $sprav_id );
								$ShopClass->products_filters->model->columns_update->getSvid()->setValue( $svid );
								$ShopClass->products_filters->model->columns_update->getUp()->setValue(false);
								$ShopClass->products_filters->model->columns_update->getAuto()->setValue(true);
								$ShopClass->products_filters->Insert();
							}
							else {
								$ShopClass->products_filters->CreateModel();
								$ShopClass->products_filters->model->columns_update->getUp()->setValue(false);
								$ShopClass->products_filters->model->columns_where->getItemId()->setValue( $item_id );
								$ShopClass->products_filters->model->columns_where->getSpravId()->setValue( $sprav_id );
								$ShopClass->products_filters->model->columns_where->getSvid()->setValue( $svid );
								$ShopClass->products_filters->Update();
							}
						}



					}
				}
			}

			/////////////

			if ( $meta['source_url'] and $offer_info['offer_source_url'] == '' ) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getSourceUrl()->setValue( $meta['source_url'] );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}




			if ( $meta['title'] and ($offer_info['offer_title'] == '' or $offer_info['offer_title'] !=$meta['title']) ) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getTitle()->setValue( $meta['title'] );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}

			if ( $meta['short_title'] and ($offer_info['offer_short_title'] == '' or $offer_info['offer_short_title']!=$meta['short_title']) ) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getShortTitle()->setValue( $meta['short_title'] );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}



			if ( $meta['offer_group'] and $offer_info['offer_group'] != $meta['offer_group'] ) {
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getGroup()->setValue( $meta['offer_group'] );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}



		}

		if ( $offer_info['offer_icon']==0 and $meta['offer_img'] ) {
			$Main->files->current_module = 'products';
			$Main->files->upload_folder  = 'products';
			$response                    = $Main->files->UploadExternalImage( $meta['offer_img'] );

			if ( $response['status'] ) {
				$photo_id = $response['file_id'];
				$ShopClass->offers->CreateModel();
				$ShopClass->offers->model->columns_update->getIcon()->setValue( $photo_id );
				$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
				$ShopClass->offers->Update();
			}
		}

		if ( $meta['1c'] and $offer_info['offer_1c'] == '' ) {
			$ShopClass->offers->CreateModel();
			$ShopClass->offers->model->columns_update->getOffer1c()->setValue( $meta['1c'] );
			$ShopClass->offers->model->columns_where->getId()->setValue( $offer_id );
			$ShopClass->offers->Update();
		}
	}















	return $offer_id;
}

function processSklad( $postav_id, $offer_id, $item ) {
	global $Main;
	if ( $offer_id ) {
		$keys = array_keys( $item );
		foreach ( $keys as $key ) {
			$sklad = str_replace( 'rest_', '', $key );
			if ( $sklad != $key ) {
				$item['price_mkrs_rozn'] = $item['price'];

				$check = $Main->db->query_first( 'SELECT * FROM shop_postav_sklad
					WHERE p_postav_id=' . $Main->db->sql_prepare( $postav_id ) . ' AND
					p_sklad_id=' . $Main->db->sql_prepare( $sklad ) );
				if ( $check ) {
					$sklad_id = $check['p_id'];
				} else {
					$Main->db->query_write( 'INSERT INTO shop_postav_sklad (p_postav_id, p_sklad_name, p_sklad_id)
						VALUES(
							' . $Main->db->sql_prepare( $postav_id ) . ',
							' . $Main->db->sql_prepare( $sklad ) . ',
							' . $Main->db->sql_prepare( $sklad ) . '
						)' );
					$sklad_id = $Main->db->insert_id();
				}

				$check = $Main->db->query_first( 'SELECT * FROM shop_postav_offers
					WHERE po_offer_id=' . $Main->db->sql_prepare( $offer_id ) . ' AND
					po_sklad_id=' . $Main->db->sql_prepare( $sklad_id ) );

				$amount = $item[ 'rest_' . $sklad ];
				if ( is_string( $amount ) or intval( $amount ) == 0 ) {
					preg_match_all( '!\d+!', $amount, $matches );
					$amount = $matches[0][0];
				}

				if ( $check ) {
					$Main->db->query_write( 'UPDATE shop_postav_offers
						SET po_price=' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad . '_rozn' ] ) ) . ',
						po_price_opt=' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad ] ) ) . ',
						po_price_opt_vip=' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad ] ) ) . ',
						po_price_fakt=' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad ] ) ) . ',
						po_amount=' . $Main->db->sql_prepare( intval( $amount ) ) . ',
						po_amount_opt=' . $Main->db->sql_prepare( intval( $amount ) ) . ',
						po_up=0
						WHERE po_id=' . $Main->db->sql_prepare( $check['po_id'] ) );
				} else {
					$Main->db->query_write( 'INSERT INTO shop_postav_offers (po_offer_id, po_postav_id, po_sklad_id, po_price,po_price_opt,po_price_opt_vip,po_price_fakt,po_amount,po_amount_opt,po_up)
						VALUES(
							' . $Main->db->sql_prepare( $offer_id ) . ',
							' . $Main->db->sql_prepare( $postav_id ) . ',
							' . $Main->db->sql_prepare( $sklad_id ) . ',
							' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad . '_rozn' ] ) ) . ',
							' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad ] ) ) . ',
								' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad ] ) ) . ',
									' . $Main->db->sql_prepare( intval( $item[ 'price_' . $sklad ] ) ) . ',
							' . $Main->db->sql_prepare( intval( $amount ) ) . ',
							' . $Main->db->sql_prepare( intval( $amount ) ) . ',
							0
						)' );
				}
			}
		}
	}
}

function processSkladAll( $postav_id, $offer_id, $sklad, $amount,$amount_opt, $price, $price_opt,$days=0 ) {
	global $Main;
	if ( $offer_id ) {

				$check = $Main->db->query_first( 'SELECT * FROM shop_postav_sklad
					WHERE p_postav_id=' . $Main->db->sql_prepare( $postav_id ) . ' AND
					p_sklad_id=' . $Main->db->sql_prepare( $sklad ) );
				if ( $check ) {
					$sklad_id = $check['p_id'];
				} else {
					$Main->db->query_write( 'INSERT INTO shop_postav_sklad (p_postav_id, p_sklad_name, p_sklad_id)
						VALUES(
							' . $Main->db->sql_prepare( $postav_id ) . ',
							' . $Main->db->sql_prepare( $sklad ) . ',
							' . $Main->db->sql_prepare( $sklad ) . '
						)' );
					$sklad_id = $Main->db->insert_id();
				}

				$check = $Main->db->query_first( 'SELECT * FROM shop_postav_offers
					WHERE po_offer_id=' . $Main->db->sql_prepare( $offer_id ) . ' AND
					po_sklad_id=' . $Main->db->sql_prepare( $sklad_id ) );


				if ( $check ) {
					$Main->db->query_write( 'UPDATE shop_postav_offers
						SET po_price=' . $Main->db->sql_prepare($price ) . ',
						po_price_opt=' . $Main->db->sql_prepare( $price_opt ) . ',
						po_price_opt_vip=' . $Main->db->sql_prepare( $price_opt ) . ',
						po_price_fakt=' . $Main->db->sql_prepare( $price_opt) . ',
						po_amount=' . $Main->db->sql_prepare( $amount ) . ',
						po_amount_opt=' . $Main->db->sql_prepare( $amount_opt ) . ',
						po_days=' . $Main->db->sql_prepare( $days ) . ',
						po_up=0
						WHERE po_id=' . $Main->db->sql_prepare( $check['po_id'] ) );
				} else {
					$Main->db->query_write( 'INSERT INTO shop_postav_offers (po_offer_id, po_postav_id, po_sklad_id, po_price,po_price_opt,po_price_opt_vip,po_price_fakt,po_amount,po_amount_opt,po_up,po_days)
						VALUES(
							' . $Main->db->sql_prepare( $offer_id ) . ',
							' . $Main->db->sql_prepare( $postav_id ) . ',
							' . $Main->db->sql_prepare( $sklad_id ) . ',
							' . $Main->db->sql_prepare( $price ) . ',
							' . $Main->db->sql_prepare( $price_opt ) . ',
								' . $Main->db->sql_prepare( $price_opt ) . ',
									' . $Main->db->sql_prepare( $price_opt ) . ',
							' . $Main->db->sql_prepare( $amount ) . ',
							' . $Main->db->sql_prepare($amount_opt ) . ',
							0,
							' . $Main->db->sql_prepare($days ) . '
						)' );
				}


	}
}


function processStat() {
	global $Main;

	$Main->db->query_write( 'UPDATE  shop_offers SET offer_up=1' );

	$result = $Main->db->query_read( 'SELECT SQL_NO_CACHE offer_id FROM shop_offers' );
	while ( $result_item = $Main->db->fetch_array( $result ) ) {
		$data = $Main->db->query_first( 'SELECT SQL_NO_CACHE SUM(po_amount) as amount, SUM(po_amount_opt) as amount_opt
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price!=0 and po_amount!=0'  );

		$data2 = $Main->db->query_first( 'SELECT SQL_NO_CACHE SUM(po_amount) as amount
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ) . ' and p_city_id!=0   and p_hide=0 and po_amount!=0' );

		$data3 = $Main->db->query_first( 'SELECT SQL_NO_CACHE SUM(po_amount) as amount, SUM(po_amount_opt) as amount_opt
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE  po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ) . ' and p_show_opt=1   and p_hide=0 and po_amount!=0' );



		$data_1 = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price) as price
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price!=0 and po_amount>=4 and po_postav_id!=1'  );
		if ($data_1 and $data_1['price']) {

		}
		else {
			$data_1 = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price) as price
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price!=0 and po_amount!=0 and po_postav_id!=1'  );
			if ($data_1 and $data_1['price']) {

			}
			else {
				$data_1 = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price) as price
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price!=0 and po_amount!=0'  );
			}
		}


		$data_opt = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price_opt) as price_opt
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price_opt!=0 and po_amount>=4'  );


		if ($data_opt) {

		}
		else {
			$data_opt = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price_opt) as price_opt
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price_opt!=0 and po_amount!=0'  );
		}

		$data_opt_vip = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price_opt_vip) as price_opt_vip
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price_opt_vip!=0 and po_amount!=0'  );

		$data_fakt = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(po_price_fakt) as price_fakt
		FROM shop_postav_offers
		LEFT JOIN shop_postav_sklad ON shop_postav_offers.po_sklad_id=shop_postav_sklad.p_id
		WHERE po_offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ).'  and p_hide=0 and po_price_fakt!=0 and po_amount!=0'  );



		$price=intval( $data_1['price'] );
		$price_opt=intval( $data_opt['price_opt'] );
		$price_opt_vip=intval( $data_opt_vip['price_opt_vip'] );
		$price_fakt=intval( $data_fakt['price_fakt'] );

		if ($price_opt_vip==0) {
			$price_opt_vip=$price_opt;
		}

		if ($price_opt==0) {
			$price_opt_vip=$price;
			$price_opt=$price;
		}

		$Main->db->query_write( 'UPDATE shop_offers 
		SET
		offer_amount=' . $Main->db->sql_prepare((int)$data['amount']) . ',
		offer_amount_opt=' . $Main->db->sql_prepare((int)$data['amount_opt']) . ',
		offer_amount_nal=' . $Main->db->sql_prepare((int)$data2['amount']) . ',
		offer_amount_nal_opt=' . $Main->db->sql_prepare((int)$data3['amount_opt']) . ',
		offer_price=' . $Main->db->sql_prepare( $price ) . ',
		offer_price_opt=' . $Main->db->sql_prepare( $price_opt ) . ',
		offer_price_opt_vip=' . $Main->db->sql_prepare($price_opt_vip) . ',
		offer_price_fakt=' . $Main->db->sql_prepare($price_fakt) . ',
		offer_up=0
		WHERE offer_id=' . $Main->db->sql_prepare( $result_item['offer_id'] ) );
	}

	$Main->db->query_write( 'UPDATE  shop_offers SET offer_amount=0, offer_amount_nal=0 WHERE offer_up=1' );

	$Main->db->query_write( 'UPDATE  shop_items SET item_up=1' );
	$result = $Main->db->query_read( 'SELECT SQL_NO_CACHE item_id,item_has_child FROM shop_items' );
	while ( $result_item = $Main->db->fetch_array( $result ) ) {
		updateItemStat($result_item['item_id']);
	}

	$Main->db->query_write( 'UPDATE  shop_items SET item_amount=0,item_offers=0,item_price=0,item_price_opt=0,item_price_opt_vip=0,item_price_fakt=0  WHERE item_up=1' );
}


function updateItemStat($item_id) {
	global $Main;
	$items_ids=array($item_id);
	$result_item = $Main->db->query_first( 'SELECT SQL_NO_CACHE * FROM shop_items WHERE item_id='.$Main->db->sql_prepare($item_id) );

	if ($result_item['item_has_child']) {
		$items_ids=array();
		$result2 = $Main->db->query_read( 'SELECT SQL_NO_CACHE item_id FROM shop_items WHERE item_parent_id='.$Main->db->sql_prepare($item_id) );
		while ( $result_item2 = $Main->db->fetch_array( $result2 ) ) {
			$items_ids[]=$result_item2['item_id'];
		}
	}

	if (count($items_ids)>0) {
		$data = $Main->db->query_first( 'SELECT SQL_NO_CACHE SUM(offer_amount) as amount, SUM(offer_amount) as amount,  SUM(offer_amount_nal) as amount_nal,  
 			MIN(offer_price) as price, COUNT(offer_id) as offers
			FROM shop_offers
			WHERE offer_item_id='.$Main->db->sql_prepare($item_id) .' AND offer_status=1 AND offer_price!=0' );
//			WHERE offer_item_id IN (' . implode(',',$items_ids) . ') AND offer_status=1 AND offer_price!=0' );

		$data2 = $Main->db->query_first( 'SELECT SQL_NO_CACHE SUM(offer_amount_nal_opt) as amount_nal_opt,
			MIN(offer_price_opt) as price_opt
			FROM shop_offers
			WHERE offer_item_id='.$Main->db->sql_prepare($item_id) .' AND offer_status=1 and offer_price_opt!=0' );
//			WHERE offer_item_id IN (' . implode(',',$items_ids) . ') AND offer_status=1 and offer_price_opt!=0' );


		$data3 = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(offer_price_opt_vip) as price_opt_vip
			FROM shop_offers
			WHERE offer_item_id='.$Main->db->sql_prepare($item_id) .' AND offer_status=1 and offer_price_opt_vip!=0' );
//			WHERE offer_item_id IN (' . implode(',',$items_ids) . ') AND offer_status=1 and offer_price_opt_vip!=0' );

		$data4 = $Main->db->query_first( 'SELECT SQL_NO_CACHE MIN(offer_price_fakt) as price_fakt
			FROM shop_offers
			WHERE offer_item_id='.$Main->db->sql_prepare($item_id) .' AND offer_status=1 and offer_price_fakt!=0' );
//			WHERE offer_item_id IN (' . implode(',',$items_ids) . ') AND offer_status=1 and offer_price_fakt!=0' );

		$bb = $Main->db->query_first( 'SELECT SQL_NO_CACHE *
			FROM shop_items
			WHERE item_id='.$Main->db->sql_prepare( $item_id) );

		if ( (int)$data['offers'] ==0 and (int)$data['amount'] ==0) {
			if ($bb['item_last_zero']==0) {
				$Main->db->query_write( 'UPDATE shop_items 
				SET item_last_zero=' . $Main->db->sql_prepare( time() ) . '
				WHERE item_id=' . $Main->db->sql_prepare( $item_id) );
			}
		}
		else {
			if ($bb['item_last_zero']) {
				$Main->db->query_write( 'UPDATE shop_items 
				SET item_last_zero=0
				WHERE item_id=' . $Main->db->sql_prepare( $item_id) );
			}
		}

		$Main->db->query_write( 'UPDATE shop_items 
			SET item_offers=' . $Main->db->sql_prepare((int)$data['offers']) . ',
			item_price=' . $Main->db->sql_prepare((int)$data['price']) . ',
			item_price_opt=' . $Main->db->sql_prepare((int)$data2['price_opt']) . ',
			item_price_opt_vip=' . $Main->db->sql_prepare((int)$data3['price_opt_vip']) . ',
			item_price_fakt=' . $Main->db->sql_prepare((int)$data4['price_fakt']) . ',
			item_amount=' . $Main->db->sql_prepare((int)$data['amount']) . ',
			item_amount_nal=' . $Main->db->sql_prepare((int)$data['amount_nal']) . ',
			item_amount_nal_opt=' . $Main->db->sql_prepare((int)$data2['amount_nal_opt']) . ',
			item_offers_total=' . $Main->db->sql_prepare((int)$data['offers']) . ',
			item_up=0
			WHERE item_id=' . $Main->db->sql_prepare( $item_id) );
	}
}

function processExist( $article, $simple=false ) {
	global $vendor_name;
	$exist_data    = array();
	$exist_content = load_url( 'https://www.exist.ru/Price/?pcode=' . $article );

	$code='';
	$u='';


	if ($simple==false and  preg_match_all( "#<a href=\"/Price/\?pid=([[a-zA-Z0-9-_./]*)\">([^<]*)<span><b>" . $vendor_name . "</b>&nbsp;([^<]*)" . $article . "</span>#Uis", $exist_content, $res2 ) ) {
		$code          = $res2[1][0];
		$u='https://www.exist.ru/Catalog/Goods/1/1/' . $code;
	}
	elseif ($simple and preg_match_all( "#\"ProductIdEnc\":\"([[a-zA-Z0-9-_./]*)\"#Uis", $exist_content, $res2 ) ) {
		$code          = $res2[1][0];
		$u='https://www.exist.ru/Parts/Float.aspx?pid='.$code;
	}

	if ( $code ) {
		$exist_content = load_url( $u);

		preg_match_all( "#<div><div><span>(.*)</span></div><span(.*)</span></div>#Uis", $exist_content, $res2 );

		$exist_params = array();
		foreach ( $res2[1] as $index => $aa ) {
			$k                 = explode( '<', $res2[1][ $index ] );
			$res2[1][ $index ] = trim( $k[0] );

			$vv=$res2[2][ $index ];
			if (preg_match_all( "#title=\"(.*)\"#Uis",$vv, $res3 )) {

				$vv = trim($res3[1][0] );
				$value = $vv;
			}
			else {

				$vv='<span'.$vv;
				$vv=str_replace('<span>','',$vv);
				$k                 = explode( '<', $vv );
				$vv = trim( $k[0] );

				$hh = explode( '|', $vv );
				if ( count( $hh ) == 1 ) {
					$value = $k[0];
				} else {
					$value = $hh;
				}
			}





			if ($res2[1][ $index ] =='Наименование' and isset($exist_params[ $res2[1][ $index ] ])) {
				$res2[1][ $index ]='Полное наименование';
			}
			$exist_params[ $res2[1][ $index ] ] = $value;
		}

		preg_match_all( "#<div class=\"subtitle\">(.*)</div>#Uis", $exist_content, $res7 );
		$exist_title = $res7[1][0];
		$exist_title = explode( '<', $exist_title );
		$exist_title = trim( $exist_title[0] );

		preg_match_all( "#class=\"fn identifier\">(.*)</h1>#Uis", $exist_content, $res7 );
		$exist_short_title = $res7[1][0];
		$exist_short_title = explode( '<', $exist_short_title );
		$exist_short_title = trim( $exist_short_title[0] );

		preg_match_all( "#<span itemprop=\"description\">(.*)</span>#Uis", $exist_content, $res7 );
		$exist_desc = $res7[1][0];

		preg_match_all( "#<img id=\"ctl00_ctl00_b_b_ctl00_imgMain\" src=\"(.*)\"#Uis", $exist_content, $res7 );
		$exist_img = '';
		if ( $res7[1][0] ) {
			$exist_img = 'https:' . $res7[1][0];
		}

		preg_match_all( "#class=\"mainimage\" rel=\"photo_group\" href=\"(.*)\">#Uis", $exist_content, $res7 );
		$exist_img2 = '';
		if ( $res7[1][0] ) {
			$exist_img2 = 'https:' . $res7[1][0];
		}


		$exist_data = array(
			'params'      => $exist_params,
			'title'       => $exist_title,
			'short_title' => $exist_short_title,
			'desc'        => $exist_desc,
			'img_small'   => $exist_img,
			'img_large'   => $exist_img2
		);
	}

	return $exist_data;
}



function process4TochkiPressure($item, $full=false) {
	$key = '';
	$meta = array(
		'cat_id'  => 30,
		'prefix'  => 'pressure_sensor_',
		'article' => $item['cae'],
		'title'   => $item['name'],
		'key'     => $key,
		'brand'   => $item['brand'],
		'model'   => $item['model'],
		'params'  => array(),
		'img'     => $item['img_big_my']
	);
	if ($item['code']) {
		$meta['article']=$item['code'];
	}

	if ( isset( $item['frequence'] ) ) {
		$meta['params']['frequence'] = $item['frequence'];
	}
	if ( isset( $item['nipple_type'] ) ) {
		$meta['params']['nipple_type'] = $item['nipple_type'];
	}
	if ( isset( $item['is_original'] ) ) {
		$meta['params']['is_original'] = $item['is_original'];
	}
	if ( isset( $item['apply'] ) ) {
		$meta['params']['apply'] = $item['apply'];
	}
	if ( isset( $item['info'] ) ) {
		$meta['params']['info'] = $item['info'];
	}

	$offer_id = processOffer( $meta,$full );
	processSklad( 2, $offer_id, $item );
}

function process4TochkiFastener($item, $full=false) {
	$key = '';
	$meta = array(
		'cat_id'  => 9,
		'prefix'  => 'fastener_',
		'article' => $item['cae'],
		'title'   => $item['name'],
		'key'     => $key,
		'brand'   => $item['brand'],
		'params'  => array(),
		'img'     => $item['img_big_my']
	);
	if ($item['code']) {
		$meta['article']=$item['code'];
	}
	if ( isset( $item['sub_type'] ) ) {
		$meta['params']['sub_type'] = $item['sub_type'];
	}

	$offer_id = processOffer( $meta,$full );
	processSklad( 2, $offer_id, $item );
}

function process4TochkiCamera($item, $full=false) {
	$key = '';
	$meta = array(
		'cat_id'  => 10,
		'prefix'  => 'camera_',
		'article' => $item['cae'],
		'title'   => $item['name'],
		'key'     => $key,
		'brand'   => $item['brand'],
		'params'  => array()
	);
	if ($item['code']) {
		$meta['article']=$item['code'];
	}
	$offer_id = processOffer( $meta,$full );
	processSklad( 2, $offer_id, $item );
}

function process4TochkiTyre($item, $full=false) {
	if ($item['sale']!='Да') {
		if ( $item['width'] ) {
			$item['width'] = $item['width'] * 1;
		}
		if ( $item['height'] ) {
			$item['height'] = $item['height'] * 1;
		}
		if ( $item['diameter'] ) {
			//$item['diameter']=str_replace($item['design'],'',$item['diameter']);
		}
		$key         = $item['width'] . $item['height'] . $item['diameter'] . $item['load_index'] . $item['speed_index'];
		$short_title = $item['width'] . '/' . $item['height'] . $item['diameter'];
		if ( $item['load_index'] or $item['speed_index'] ) {
			$short_title .= ' ' . $item['load_index'] . $item['speed_index'];
		}

		$offer_url   = translit_url_safe( $short_title );
		$offer_group = $item['diameter'];


		$meta = array(
			'cat_id'  => 1,
			'prefix'  => 'tyre_',
			'article' => $item['cae'],
			'title'   => $item['name'],

			'short_title' => $short_title,
			'offer_url'   => $offer_url,
			'offer_group' => $offer_group,

			'key'        => $key,
			'brand'      => $item['brand'],
			'model'      => $item['model'],
			'params'     => array(),
			'img'        => $item['img_big_my'],
			'offer_keys' => array(
				'width',
				'height',
				'diameter',
				'load_index',
				'speed_index'
			)
		);
		if ( $item['code'] ) {
			$meta['article'] = $item['code'];
		}
		if ( isset( $item['width'] ) ) {
			$meta['params']['width'] = $item['width'];
		}
		if ( isset( $item['height'] ) ) {
			$meta['params']['height'] = $item['height'];
		}
		if ( isset( $item['diameter'] ) ) {
			$meta['params']['diameter'] = $item['diameter'];
		}
		if ( isset( $item['load_index'] ) ) {
			$meta['params']['load_index'] = $item['load_index'];
		}
		if ( isset( $item['speed_index'] ) ) {
			$meta['params']['speed_index'] = $item['speed_index'];
		}
		if ( isset( $item['season'] ) ) {
			$meta['params']['season'] = $item['season'];
		}
		if ( isset( $item['tiretype'] ) ) {
			$meta['params']['tiretype'] = $item['tiretype'];
		}
		if ( isset( $item['diameter_out'] ) ) {
			$meta['params']['diameter_out'] = $item['diameter_out'];
		}
		if ( isset( $item['thorn'] ) ) {
			$meta['params']['thorn'] = $item['thorn'];
		} else {
			$meta['params']['thorn'] = 'Без шипов';
		}
		if ( isset( $item['thorn_type'] ) ) {
			$meta['params']['thorn_type'] = $item['thorn_type'];
		}
		if ( isset( $item['tech'] ) ) {
			$meta['params']['tech'] = $item['tech'];
		}
		if ( isset( $item['tonnage'] ) ) {
			$meta['params']['tonnage'] = $item['tonnage'];
		}
		if ( isset( $item['side'] ) ) {
			$meta['params']['side'] = $item['side'];
		}
		if ( isset( $item['runflat'] ) ) {
			$meta['params']['runflat'] = $item['runflat'];
		}
		if ( isset( $item['protection'] ) ) {
			$meta['params']['protection'] = $item['protection'];
		}
		if ( isset( $item['usa'] ) ) {
			$meta['params']['usa'] = $item['usa'];
		}
		if ( isset( $item['omolog'] ) ) {
			$meta['params']['omolog'] = $item['omolog'];
		}
		if ( isset( $item['camera'] ) ) {
			$meta['params']['camera'] = $item['camera'];
		}
		if ( isset( $item['axle'] ) ) {
			$meta['params']['axle'] = $item['axle'];
		}
		if ( isset( $item['softness'] ) ) {
			$meta['params']['softness'] = $item['softness'];
		}
		if ( isset( $item['lenta'] ) ) {
			$meta['params']['lenta'] = $item['lenta'];
		}
		if ( isset( $item['sloy'] ) ) {
			$meta['params']['sloy'] = $item['sloy'];
		}
		if ( isset( $item['marker_color'] ) ) {
			$meta['params']['marker_color'] = $item['marker_color'];
		}
		if ( isset( $item['reinforced'] ) ) {
			$meta['params']['reinforced'] = $item['reinforced'];
		}
		if ( isset( $item['use_type'] ) ) {
			$meta['params']['use_type'] = $item['use_type'];
		}
		if ( isset( $item['protector_img_type'] ) ) {
			$meta['params']['protector_img_type'] = $item['protector_img_type'];
		}
		if ( isset( $item['sale'] ) ) {
			$meta['params']['sale'] = $item['sale'];
		}
		if ( isset( $item['design'] ) ) {
			$meta['params']['design'] = $item['design'];
		}
		if ( isset( $item['is_summer'] ) ) {
			$meta['params']['is_summer'] = $item['is_summer'];
		}
		if ( isset( $item['noise'] ) ) {
			$meta['params']['noise'] = $item['noise'];
		}
		if ( isset( $item['passability'] ) ) {
			$meta['params']['passability'] = $item['passability'];
		}
		if ( isset( $item['comfort'] ) ) {
			$meta['params']['comfort'] = $item['comfort'];
		}
		if ( isset( $item['aquaplaning'] ) ) {
			$meta['params']['aquaplaning'] = $item['aquaplaning'];
		}
		if ( isset( $item['moto_use'] ) ) {
			$meta['params']['moto_use'] = $item['moto_use'];
		}
		if ( isset( $item['wear_index'] ) ) {
			$meta['params']['wear_index'] = $item['wear_index'];
		}
		if ( isset( $item['protector_type'] ) ) {
			$meta['params']['protector_type'] = $item['protector_type'];
		}
		if ( isset( $item['market_model_id'] ) ) {
			$meta['params']['market_model_id'] = $item['market_model_id'];
		}

		$offer_id = processOffer( $meta, $full );
		processSklad( 2, $offer_id, $item );
	}
}


function process4TochkiWheel($item, $full=false) {
	if ($item['sale']!='Да') {
		if ( $item['width'] ) {
			$item['width'] = $item['width'] * 1;
		}

		if ( $item['diameter'] ) {
			$item['diameter'] = $item['diameter'] * 1;
		}
		if ( $item['bolts_count'] ) {
			$item['bolts_count'] = $item['bolts_count'] * 1;
		}
		if ( $item['bolts_spacing'] ) {
			$item['bolts_spacing'] = $item['bolts_spacing'] * 1;
		}

		if ( $item['et'] ) {
			if ( mb_substr( $item['et'], 0, 2 ) == 'ET' ) {
				$item['et'] = mb_substr( $item['et'], 2 );
			}
			$item['et'] = $item['et'] * 1;
		}
		if ( $item['dia'] ) {
			if ( mb_substr( $item['dia'], 0, 1 ) == 'D' ) {
				$item['dia'] = mb_substr( $item['dia'], 1 );
			}
			$item['dia'] = $item['dia'] * 1;
		}
		$key = $item['width'] . $item['diameter'] . $item['bolts_count'] . $item['bolts_spacing'] . $item['et'] . $item['dia'];

		$short_title = $item['width'] . 'x' . $item['diameter'] . "/" . $item['bolts_count'] . 'x' . $item['bolts_spacing'];
		if ( $item['et'] ) {
			$short_title .= ' ET' . $item['et'];
		}
		if ( $item['et'] ) {
			$short_title .= ' D' . $item['dia'];
		}


		$offer_url   = translit_url_safe( $short_title );
		$offer_group = $item['diameter'];

		$meta = array(
			'cat_id'  => 2,
			'prefix'  => 'wheel_',
			'article' => $item['cae'],
			'title'   => $item['name'],
			'key'     => $key,

			'short_title' => $short_title,
			'offer_url'   => $offer_url,
			'offer_group' => $offer_group,

			'brand'      => $item['brand'],
			'model'      => $item['model'],
			'color'      => $item['color'],
			'params'     => array(),
			'img'        => $item['img_big_my'],
			'offer_keys' => array(
				'width',
				'diameter',
				'bolts_count',
				'bolts_spacing',
				'et',
				'dia'
			)
		);
		if ( $item['code'] ) {
			$meta['article'] = $item['code'];
		}
		if ( isset( $item['color'] ) ) {
			$meta['params']['color'] = $item['color'];
		}
		if ( isset( $item['width'] ) ) {
			$meta['params']['width'] = $item['width'];
		}
		if ( isset( $item['diameter'] ) ) {
			$meta['params']['diameter'] = $item['diameter'];
		}
		if ( isset( $item['bolts_count'] ) ) {
			$meta['params']['bolts_count'] = $item['bolts_count'];
		}
		if ( isset( $item['bolts_spacing'] ) ) {
			$meta['params']['bolts_spacing'] = $item['bolts_spacing'];
		}
		if ( isset( $item['bolts_spacing2'] ) ) {
			$meta['params']['bolts_spacing2'] = $item['bolts_spacing2'];
		}
		if ( isset( $item['et'] ) ) {
			$meta['params']['et'] = $item['et'];
		}
		if ( isset( $item['dia'] ) ) {
			$meta['params']['dia'] = $item['dia'];
		}
		if ( isset( $item['avto'] ) ) {
			$meta['params']['avto'] = $item['avto'];
		}
		if ( isset( $item['insert_type'] ) ) {
			$meta['params']['insert_type'] = $item['insert_type'];
		}
		if ( isset( $item['producer'] ) ) {
			$meta['params']['producer'] = $item['producer'];
		}
		if ( isset( $item['logo'] ) ) {
			$meta['params']['logo'] = $item['logo'];
		}
		if ( isset( $item['mount'] ) ) {
			$meta['params']['mount'] = $item['mount'];
		}
		if ( isset( $item['mount_note'] ) ) {
			$meta['params']['mount_note'] = $item['mount_note'];
		}
		if ( isset( $item['userck'] ) ) {
			$meta['params']['userck'] = $item['userck'];
		}
		if ( isset( $item['sale'] ) ) {
			$meta['params']['sale'] = $item['sale'];
		}
		if ( isset( $item['rim_type'] ) ) {
			$meta['params']['rim_type'] = $item['rim_type'];
		}
		if ( isset( $item['market_model_id'] ) ) {
			$meta['params']['market_model_id'] = $item['market_model_id'];
		}

		$offer_id = processOffer( $meta, $full );
		processSklad( 2, $offer_id, $item );
	}
}

function cleanKroad($value) {
	return str_replace('"','',$value);
}

function cleanKroad2($value) {
	return str_replace(',','.',cleanKroad($value));
}
function processKroadWheel($item, $full=false) {
		if ($item['width'] and $item['vendor']) {
			$item['width']= cleanKroad2($item['width'])*1;
			$item['diameter']= cleanKroad2(str_replace('x','',$item['diameter']))*1;
			$item['bolts_count']=cleanKroad2($item['pcd1'])*1;
			$item['bolts_spacing']=cleanKroad2($item['pcd2'])*1;
			$item['et']=cleanKroad2($item['et'])*1;
			$item['dia']=cleanKroad2($item['dia'])*1;

			$article=cleanKroad($item['code']);
			if ($item['vendor_code']) {
				$article=cleanKroad($item['vendor_code']);
			}

			$key = $item['width'] . $item['diameter'] . $item['bolts_count'] . $item['bolts_spacing'] . $item['et'] . $item['dia'];

			$short_title = $item['width'] . 'x'.$item['diameter'] . "/".$item['bolts_count'] . 'x'.$item['bolts_spacing'];
			if ($item['et']) {
				$short_title .= ' ET'.$item['et'];
			}
			if ($item['et']) {
				$short_title.=' D'.$item['dia'];
			}

			$item['name'] = cleanKroad($item['vendor']) . ' ' . cleanKroad($item['model']);
			$color = cleanKroad($item['color']);

			$item['name'].=	' '.$short_title;
			if ($item['color']) {
				$item['name'].=' '.cleanKroad($item['color']);
			}

			$offer_url=translit_url_safe($short_title);
			$offer_group=$item['diameter'];

			$meta = array(
				'cat_id'     => 2,
				'prefix'     => 'wheel_',
				'article'    => $article,
				'title'      => $item['name'],
				'key'        => $key,

				'short_title'      => $short_title,
				'offer_url'      => $offer_url,
				'offer_group'=>$offer_group,

				'brand'      => cleanKroad($item['vendor']),
				'model'      => cleanKroad($item['model']),
				'color'      => $color,
				'params'     => array(),
				'img'        => cleanKroad($item['foto']),
				'offer_keys' => array(
					'width',
					'diameter',
					'bolts_count',
					'bolts_spacing',
					'et',
					'dia'
				)
			);
			if ($item['vendor_code']) {
				$meta['article']=cleanKroad($item['vendor_code']);
			}
			if ( $color ) {
				$meta['params']['color'] = $color;
			}
			if ( isset( $item['width'] ) ) {
				$meta['params']['width'] = $item['width'];
			}
			if ( isset( $item['diameter'] ) ) {
				$meta['params']['diameter'] = $item['diameter'];
			}
			if ( isset( $item['bolts_count'] ) ) {
				$meta['params']['bolts_count'] = $item['bolts_count'];
			}
			if ( isset( $item['bolts_spacing'] ) ) {
				$meta['params']['bolts_spacing'] = $item['bolts_spacing'];
			}

			if ( isset( $item['et'] ) ) {
				$meta['params']['et'] = $item['et'];
			}
			if ( isset( $item['dia'] ) ) {
				$meta['params']['dia'] = $item['dia'];
			}

			if ( $item['type'] ) {
				$meta['params']['rim_type'] = cleanKroad($item['type']);
			}

			$offer_id = processOffer( $meta,$full );


			$amount=cleanKroad(str_replace('>','',$item['rest']))+cleanKroad(str_replace('>','',$item['rest2']))+cleanKroad(str_replace('>','',$item['rest3']));
			$amount_opt=$amount;

			$price = str_replace('.','',$item['price']);
			$price = str_replace(' ','',$price);
			$price = cleanKroad($price);

			$price=preg_replace("/[^0-9]/", "", $price)*1.2/100;
			$price_opt=$price;
			$days=7;

			processSkladAll( 4, $offer_id, 'main', $amount,$amount_opt, $price, $price_opt,$days );
		}


}

function processShinserviceWheel($item, $full=false) {
	$item['sale']=$item['sale']*1;

	if ($item['sale']!=1) {
		$gg           = explode( '/', $item['size'] );

		$item['width']= str_replace( 'J', '', trim( $gg[1] ) ) * 1 ;
		$item['diameter']= trim( $gg[0] ) * 1;
		$item['bolts_count']=$item['bp'];
		$item['bolts_spacing']=$item['pcd'] * 1;
		$item['et']=$item['et'] * 1;
		$item['dia']=$item['centerbore'] * 1;

		$key = $item['width'] . $item['diameter'] . $item['bolts_count'] . $item['bolts_spacing'] . $item['et'] . $item['dia'];

		$short_title = $item['width'] . 'x'.$item['diameter'] . "/".$item['bolts_count'] . 'x'.$item['bolts_spacing'];
		if ($item['et']) {
			$short_title .= ' ET'.$item['et'];
		}
		if ($item['et']) {
			$short_title.=' D'.$item['dia'];
		}
		if ($item['color']) {
			$short_title.=' '.$item['color'];
		}
		$item['name'] = $item['brand'] . ' ' . $item['model'];
		$color = $item['color'];

		$kk = explode( ' / ', $item['type'] );
		if ( count( $kk ) > 1 ) {
			$type = $kk[0];
		} else {
			$type = $kk[0];
		}
		if ( count( $kk ) > 1 ) {
			$color2 = $kk[1];
			//$color=$color2;
		}

		$item['name'].=	' '.( str_replace( 'J', '', trim( $gg[1] ) ) * 1 ) . 'x' . ( trim( $gg[0] ) * 1 ) . '/' . $item['bp'] . 'x' . ( $item['pcd'] * 1 ) . ' ET' . ( $item['et'] * 1 ) . ' D' . ( $item['centerbore'] * 1 );;
		if ($color2) {
			$item['name'].=' '.$color2;
		}

		$offer_url=translit_url_safe($short_title);
		$offer_group=$item['diameter'];

		$meta = array(
			'cat_id'     => 2,
			'prefix'     => 'wheel_',
			'article'    => $item['sku'],
			'title'      => $item['name'],
			'key'        => $key,

			'short_title'      => $short_title,
			'offer_url'      => $offer_url,
			'offer_group'=>$offer_group,

			'brand'      => $item['brand'],
			'model'      => $item['model'],
			'color'      => $color,
			'params'     => array(),
			'img'        => '',
			'offer_keys' => array(
				'width',
				'diameter',
				'bolts_count',
				'bolts_spacing',
				'et',
				'dia'
			)
		);
		if ($item['sku']) {
			$meta['article']=$item['sku'];
		}
		if ( $color ) {
			$meta['params']['color'] = $color;
		}
		if ( isset( $item['width'] ) ) {
			$meta['params']['width'] = $item['width'];
		}
		if ( isset( $item['diameter'] ) ) {
			$meta['params']['diameter'] = $item['diameter'];
		}
		if ( isset( $item['bolts_count'] ) ) {
			$meta['params']['bolts_count'] = $item['bolts_count'];
		}
		if ( isset( $item['bolts_spacing'] ) ) {
			$meta['params']['bolts_spacing'] = $item['bolts_spacing'];
		}

		if ( isset( $item['et'] ) ) {
			$meta['params']['et'] = $item['et'];
		}
		if ( isset( $item['dia'] ) ) {
			$meta['params']['dia'] = $item['dia'];
		}

		if ( $type ) {
			$meta['params']['rim_type'] = $type;
		}

		$offer_id = processOffer( $meta,$full );


		$amount=$item['local_stock'];
		$amount_opt=$amount;
		$price=$item['price']*1.15;
		$price_opt=$price;
		$days=$item['delivery1']+1;

		processSkladAll( 3, $offer_id, 'local', $amount,$amount_opt, $price, $price_opt,$days );

		$amount=$item['stock'];
		$amount_opt=$amount;
		$days=7;
		processSkladAll( 3, $offer_id, 'main', $amount,$amount_opt, $price, $price_opt,$days );
	}
}

function processShinserviceTyre($item, $full=false,$ppp=1.12) {
	$item['sale']=$item['sale']*1;

	if ($item['sale']!=1) {
		$season = '';
		if ( $item['season'] == 'S' ) {
			$season = 'Летняя';
		} elseif ( $item['season'] == 'W' ) {
			$season = 'Зимняя';
		} elseif ( $item['season'] == 'M' ) {
			$season = 'Всесезонная';
		}

		$ship = 'Нет';
		if ( $item['ship'] ) {
			$ship = 'С шипами';
		}
		if ( $item['pin'] ) {
			$ship = 'С шипами';
		}

		$runflat = 'Нет';
		if ( $item['runflat'] ) {
			$runflat = 'Да';
		}


		if ($item['width']) {
			$item['width']=$item['width']*1;
		}
		if ($item['profile']) {
			$item['profile']=$item['profile']*1;
		}
		if ($item['diam']) {
			//$item['diameter']=str_replace($item['design'],'',$item['diameter']);
		}
		$key = $item['width'] . $item['profile'] . $item['diam'] . $item['load'] . $item['speed'];

		$short_title = $item['width'];
		if ( $item['profile'] ) {
			$short_title .= '/' . $item['profile'];
		}

		$short_title .= $item['diam'];
		if ( $item['load'] and $item['speed'] ) {
			$short_title .= ' ' . $item['load'] . $item['speed'];
		}

		$offer_url=translit_url_safe($short_title);
		$offer_group=$item['diam'];

		$item['name'] = $item['brand'] . ' ' . $item['model'].' '.$short_title;


		$img='';
		if ($item['photo']) {

		}

		$meta = array(
			'cat_id'     => 1,
			'prefix'     => 'tyre_',
			'article'    => $item['sku'],
			'title'      => $item['name'],

			'short_title'      => $short_title,
			'offer_url'      => $offer_url,
			'offer_group'=>$offer_group,

			'key'        => $key,
			'brand'      => $item['brand'],
			'model'      => $item['model'],
			'params'     => array(),
			'img'        => $img,
			'offer_keys' => array(
				'width',
				'height',
				'diameter',
				'load_index',
				'speed_index'
			)
		);
		if ($item['sku']) {
			$meta['article']=$item['sku'];
		}
		if ( isset( $item['width'] ) ) {
			$meta['params']['width'] = $item['width'];
		}
		if ( isset( $item['profile'] ) ) {
			$meta['params']['height'] = $item['profile'];
		}
		if ( isset( $item['diam'] ) ) {
			$meta['params']['diameter'] = $item['diam'];
		}
		if ( isset( $item['load'] ) ) {
			$meta['params']['load_index'] = $item['load'];
		}
		if ( isset( $item['speed'] ) ) {
			$meta['params']['speed_index'] = $item['speed'];
		}
		if ($season ) {
			$meta['params']['season'] = $season;
		}

		if ( $ship) {
			$meta['params']['thorn'] = $ship;
		}
		else {
			$meta['params']['thorn'] = 'Без шипов';
		}

		if ( $runflat) {
			$meta['params']['runflat'] = $runflat;
		}

		$offer_id = processOffer( $meta,$full );


		$amount=$item['local_stock'];
		$amount_opt=$amount;
		$price=$item['price']*$ppp;
		$price_opt=$price;
		$days=$item['delivery1']+1;

		processSkladAll( 3, $offer_id, 'local', $amount,$amount_opt, $price, $price_opt,$days );

		$amount=$item['stock'];
		$amount_opt=$amount;
		$days=7;
		processSkladAll( 3, $offer_id, 'main', $amount,$amount_opt, $price, $price_opt,$days );
	}

}
