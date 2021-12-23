<?php

class ShopNotifyDataColumns extends DbDataColumns {

	private $id;
	private $user_id;
	private $list_id;
	private $time;
	private $text;
	private $style;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);


		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);

		$this->setListId();
		$this->getListId()->setName('list_id');
		$this->getListId()->setType(TYPE_UINT);

		$this->setTime();
		$this->getTime()->setName('time');
		$this->getTime()->setType(TYPE_STR);

		$this->setText();
		$this->getText()->setName('text');
		$this->getText()->setType(TYPE_STR);

		$this->setStyle();
		$this->getStyle()->setName('style');
		$this->getStyle()->setType(TYPE_STR);

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
	public function getListId() {
		return $this->list_id;
	}

	private function setListId( ) {
		$this->list_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserId() {
		return $this->user_id;
	}

	private function setUserId() {
		$this->user_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTime() {
		return $this->time;
	}

	private function setTime(  ) {
		$this->time = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getText() {
		return $this->text;
	}

	private function setText(  ) {
		$this->text = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getStyle() {
		return $this->style;
	}


	private function setStyle(  ) {
		$this->style =new DbColumn();
	}

}


class ShopNotifyDataModel extends DbDataModel {

	/**
	 * @var  ShopNotifyDataColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopNotifyDataColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_notify_data`');
		$this->setTableItemPrefix('notify_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopNotifyDataColumns();
		$this->columns_update=new ShopNotifyDataColumns();
	}


	public function innerList() {
		$this->setSelectField('shop_notify_data.*, `shop_notify_list`.notify_list_title');
		$this->setJoin('  INNER JOIN shop_notify_list ON shop_notify_data.notify_list_id=shop_notify_list.notify_list_id
        ');
	}
}

class ShopNotifyData extends  DbData
{

	/**
	 * @var  ShopNotifyDataModel $model
	 */
	public $model;

	/**
	 * @var $model ShopNotifyDataModel
	 */
	public function CreateModel () {
		$this->model=new ShopNotifyDataModel();
	}


	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		return $this->GetItem($full);
	}


	public function PrepareData ($result_item,$full=0) {
		return $result_item;
	}


}
