<?php

class ShopFavColumns extends DbDataColumns {

	private $id;
	private $item_id;
	private $sessionhash;
	private $user_id;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);

		$this->setSessionhash();
		$this->getSessionhash()->setName('sessionhash');
		$this->getSessionhash()->setType(TYPE_STR);

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);


	}
	/**
	 * @return DbColumn
	 */
	public function getId() {
		return $this->id;
	}

	private function setId() {
		$this->id=new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getItemId() {
		return $this->item_id;
	}

	private function setItemId(  ) {
		$this->item_id = new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getSessionhash() {
		return $this->sessionhash;
	}


	private function setSessionhash( ) {
		$this->sessionhash = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserId() {
		return $this->user_id;
	}

	private function setUserId( ) {
		$this->user_id = new DbColumn();
	}


}


class ShopFavModel extends DbDataModel {

	/**
	 * @var  ShopFavColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopFavColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_item_fav`');
		$this->setTableItemPrefix('fav_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopFavColumns();
		$this->columns_update=new ShopFavColumns();
	}
}

class ShopFav extends  DbData
{

	/**
	 * @var  ShopFavModel $model
	 */
	public $model;

	/**
	 * @var $model ShopFavModel
	 */
	public function CreateModel () {
		$this->model=new ShopFavModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}


	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


	public function UpdateUserHash() {
		$this->CreateModel();
		$this->model->columns_where->getUserId()->setValue(0);
		$this->model->columns_where->getSessionhash()->setValue($this->registry->user_info['sessionhash']);
		$list=$this->GetList();
		if ($list) {
			foreach ($list as $item) {
				$this->CreateModel();
				$this->model->columns_where->getUserId()->setValue($this->registry->user_info['user_id']);
				$this->model->columns_where->getItemId()->setValue($item['fav_item_id']);
				$check=$this->GetItem();
				if ($check==false) {
					$this->CreateModel();
					$this->model->columns_update->getUserId()->setValue($this->registry->user_info['user_id']);
					$this->model->columns_where->getId()->setValue($item['fav_id']);
					$this->Update();
				}
				else {
					$this->CreateModel();
					$this->model->columns_where->getId()->setValue($check['fav_id']);
					$this->Delete();
				}
			}
		}

	}


	public function SetGlobalFav () {
		if ( $this->registry->user_info['user_id'] or $this->registry->user_info['sessionhash'] ) {
			$this->CreateModel();
			if ( $this->registry->user_info['user_id'] ) {
				$this->model->columns_where->getUserId()->setValue( $this->registry->user_info['user_id'] );
			} elseif ( $this->registry->user_info['sessionhash'] ) {
				$this->model->columns_where->getSessionhash()->setValue( $this->registry->user_info['sessionhash'] );
			}
			$fav_list = $this->GetList();
			foreach ( $fav_list as $fav ) {
				$this->registry->template->global_vars['fav_list'][] = $fav['fav_item_id'];
			}
		}
	}

}
