<?php
class ItemDecorationsColumns extends DbDataColumns{
    private $id;
    private $dec_id;
    private $item_id;
    public function __construct()
    {
        $this->setId();
        $this->getId()->setName('id');
        $this->getId()->setType(TYPE_UINT);
        $this->setDecId();
        $this->getDecId()->setName('dec_id');
        $this->getDecId()->setType(TYPE_UINT);
        $this->setItemId();
        $this->getItemId()->setName('item_id');
        $this->getItemId()->setType(TYPE_UINT);

    }

    /**
     * @return DbColumn
     */
    public function setId()
    {
        $this->id = new DbColumn;
    }
    public function getId()
    {
        return $this->id ;
    }
    /**
     * @return DbColumn
     */
    public function setDecId()
    {
        $this->dec_id = new DbColumn;
    }
    public function getDecId()
    {
        return $this->dec_id;
    }
    /**
     * @return DbColumn
     */
    public function setItemId()
    {
        $this->item_id = new DbColumn;
    }
    public function getItemId()
    {
        return $this->item_id;
    }

}
class ItemDecorationsModel extends DbDataModel{
    /**
     * @var  ItemDecorationsColumns $columns_where
     */
    public $columns_where;
    /**
     * @var  ItemDecorationsColumns $columns_update
     */
    public $columns_update;


    public function InitDop () {
        $this->setTableName('`shop_item_decorations`');
        $this->setTableItemPrefix('sid_');
        $this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
        $this->columns_where=new ItemDecorationsColumns();
        $this->columns_update=new ItemDecorationsColumns();
    }

}

class ItemDecorations extends DbData{

    /**
     * @var ItemDecorationsModel $model
     */
    public $model;
    /**
     * @var $model ItemDecorationsModel
     */

    public function CreateModel()
    {
        $this->model = new ItemDecorationsModel();
    }

    public function AddDecor($item_id, $dec_id){
        $check = $this->checkDecor($item_id,$dec_id);
        if (!$check) {
            $this->CreateModel();
            $this->model->columns_update->getItemId()->setValue($item_id);
            $this->model->columns_update->getDecId()->setValue($dec_id);

            return $this->Insert();
        }
    }
    public function checkDecor($item_id, $dec_id){
        $this->CreateModel();
        $this->model->columns_where->getItemId()->setValue($item_id);
        $this->model->columns_where->getDecId()->setValue($dec_id);
        return $this->GetItem();

    }

    public function GetDecorList($id)
    {
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName().".*, shop_offers.*");
        $this->model->setJoin("LEFT JOIN shop_offers ON offer_is_decoration=1 AND sid_dec_id=offer_id");
        $this->model->columns_where->getItemId()->setValue($id);
        return $this->GetList();
    }
    public function GetDecorIdsList($id)
    {
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName().".*, shop_offers.*");
        $this->model->setJoin("LEFT JOIN shop_offers ON offer_is_decoration=1 AND sid_dec_id=offer_id");
        $this->model->SetJoinImage('icon', 'shop_offers.offer_icon');
        $this->model->columns_where->getItemId()->setValue($id);
        return $this->GetList();
    }

    public function PrepareData ($result_item,$full=0) {

        $res=$this->registry->files->FilePrepare($result_item,'icon_');
        $result_item['decoration_icon_url'] = $this->registry->files->GetImageUrl($res,'medium',0,'icon_');
        $result_item['decoration_image_url'] = $this->registry->files->GetImageUrl($res,'normal',0,'icon_');

        return $result_item;
    }


}