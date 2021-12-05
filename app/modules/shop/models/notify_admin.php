<?php

class ShopNotifyAdminColumns extends DbDataColumns {

	private $id;
	private $user_id;
	private $time;
	private $text;
	private $link;
	private $status;
	private $title;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);

		$this->setTime();
		$this->getTime()->setName('time');
		$this->getTime()->setType(TYPE_STR);

		$this->setText();
		$this->getText()->setName('text');
		$this->getText()->setType(TYPE_STR);

		$this->setLink();
		$this->getLink()->setName('link');
		$this->getLink()->setType(TYPE_STR);

		$this->setStatus();
		$this->getStatus()->setName('status');
		$this->getStatus()->setType(TYPE_BOOL);

		$this->setTitle();
		$this->getTitle()->setName('title');
		$this->getTitle()->setType(TYPE_STR);

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

	private function setTime() {
		$this->time = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getText() {
		return $this->text;
	}

	private function setText() {
		$this->text =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getLink() {
		return $this->link;
	}

	private function setLink() {
		$this->link =new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getStatus() {
		return $this->status;
	}

	private function setStatus() {
		$this->status = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTitle() {
		return $this->title;
	}

	private function setTitle() {
		$this->title =new DbColumn();
	}
}


class ShopNotifyAdminModel extends DbDataModel {

	/**
	 * @var  ShopNotifyAdminColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopNotifyAdminColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_notify_admin`');
		$this->setTableItemPrefix('notify_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopNotifyAdminColumns();
		$this->columns_update=new ShopNotifyAdminColumns();
	}
}

class ShopNotifyAdmin extends  DbData
{

	/**
	 * @var  ShopNotifyAdminModel $model
	 */
	public $model;

	/**
	 * @var $model ShopNotifyAdminModel
	 */
	public function CreateModel () {
		$this->model=new ShopNotifyAdminModel();
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
