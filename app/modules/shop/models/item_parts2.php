<?php

class ShopItemParts2Columns extends DbDataColumns {

	private $id;
	private $part_id;
	private $item_id;

	public function __construct()
	{

		$this->setId();
		$this->getId()->setName('sip2_id');
		$this->getId()->setType(TYPE_UINT);

		$this->setPartId();
		$this->getPartId()->setName('part_id');
		$this->getPartId()->setType(TYPE_UINT);

		$this->setItemId();
		$this->getItemId()->setName('item_id');
		$this->getItemId()->setType(TYPE_UINT);
	}

	/**
	 * @return DbColumn
	 */
	public function getId() {
		return $this->id;
	}

	private function setId(  ) {
		$this->id = new DbColumn();
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
	public function getPartId() {
		return $this->part_id;
	}

	private function setPartId(  ) {
		$this->part_id = new DbColumn();
	}


	private function setSpravId(  ) {
		$this->sprav_id = new DbColumn();
	}

}


class ShopItemParts2Model extends DbDataModel {

	/**
	 * @var  ShopItemParts2Columns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopItemParts2Columns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_items_parts2`');
		$this->setTableItemPrefix('');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('sip2_id'));
		$this->columns_where=new ShopItemParts2Columns();
		$this->columns_update=new ShopItemParts2Columns();
	}
}

class ShopItemParts2 extends  DbData
{

	/**
	 * @var  ShopItemParts2Model $model
	 */
	public $model;

	/**
	 * @var $model ShopItemParts2Model
	 */
	public function CreateModel () {
		$this->model=new ShopItemParts2Model();
	}
    public function GetItemsByPartId($id){
	    $this->CreateModel();
	    $this->model->setSelectField($this->model->getTableName().".*");
        $this->model->columns_where->getPartId()->setValue($id);
	    return $this->GetList();
    }


}
