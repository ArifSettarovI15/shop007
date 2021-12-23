<?php
class ShopCallbacksColumns extends DbDataColumns{
    private $id;
    private $name;
    private $phone;
    private $status;
    private $time;

    public function __construct()
    {
        $this->setId();
        $this->getId()->setName('id');
        $this->getId()->setType(TYPE_UINT);

        $this->setName();
        $this->getName()->setName('name');
        $this->getName()->setType(TYPE_STR);

        $this->setPhone();
        $this->getPhone()->setName('phone');
        $this->getPhone()->setType(TYPE_STR);

        $this->setStatus();
        $this->getStatus()->setName('status');
        $this->getStatus()->setType(TYPE_BOOL);

        $this->setTime();
        $this->getTime()->setName('time');
        $this->getTime()->setType(TYPE_BOOL);
    }

    /**
     * @return DbColumn
     */
    public function getId(){
        return $this->id;
    }
    public function setId(){
        $this->id = new DbColumn();
    }
    /**
     * @return DbColumn
     */
    public function getName(){
        return $this->name;
    }
    public function setName(){
        $this->name = new DbColumn();
    }
    /**
     * @return DbColumn
     */
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone(){
        $this->phone = new DbColumn();
    }
    /**
     * @return DbColumn
     */
    public function getStatus(){
        return $this->status;
    }
    public function setStatus(){
        $this->status = new DbColumn();
    }
    /**
     * @return DbColumn
     */
    public function getTime(){
        return $this->time;
    }
    public function setTime(){
        $this->time = new DbColumn();
    }
}

class ShopCallbacksModel extends DbDataModel{
    /**
     * @var ShopCallbacksColumns $columns_update
     */
    public $columns_update;

    /**
     * @var ShopCallbacksColumns $columns_where
     */
    public $columns_where;

    public function InitDop()
    {
        $this->setTableName('shop_callbacks');
        $this->setTableItemPrefix('callback_');
        $this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
        $this->columns_where=new ShopCallbacksColumns();
        $this->columns_update=new ShopCallbacksColumns();
    }
}

class ShopCallbacks extends DbData
{

    /**
     * @var ShopCallbacksModel $model
     */
    public $model;

    /**
     * @var $model ShopCallbacksModel
     */

    public function CreateModel()
    {
        $this->model = new ShopCallbacksModel;
    }
    public function GetItemById($id)
    {
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName() . ".*");
        $this->model->columns_where->getId()->setValue($id);
        return $this->GetItem();
    }
}