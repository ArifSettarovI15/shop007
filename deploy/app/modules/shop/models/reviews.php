<?php

class ShopReviewsColumns extends DbDataColumns{
    private $id;
    private $uname;
    private $uemail;
    private $comment;
    private $admin_comment;
    private $item_id;
    private $rating;
    private $photo_id;
    private $status;
    private $time;

    public function __construct()
    {
        $this->setId();
        $this->getId()->setName('id');
        $this->getId()->setType(TYPE_UINT);

        $this->setUName();
        $this->getUName()->setName('uname');
        $this->getUName()->setType(TYPE_STR);

        $this->setUEmail();
        $this->getUEmail()->setName('uemail');
        $this->getUEmail()->setType(TYPE_STR);

        $this->setComment();
        $this->getComment()->setName('comment');
        $this->getComment()->setType(TYPE_STR);

        $this->setAdminComment();
        $this->getAdminComment()->setName('admin_comment');
        $this->getAdminComment()->setType(TYPE_STR);

        $this->setItemId();
        $this->getItemId()->setName('item_id');
        $this->getItemId()->setType(TYPE_UINT);

        $this->setRating();
        $this->getRating()->setName('rating');
        $this->getRating()->setType(TYPE_UINT);

        $this->setPhoto();
        $this->getPhoto()->setName('icon');
        $this->getPhoto()->setType(TYPE_UINT);

        $this->setStatus();
        $this->getStatus()->setName('status');
        $this->getStatus()->setType(TYPE_UINT);
        $this->setTime();
        $this->getTime()->setName('time');
        $this->getTime()->setType(TYPE_STR);
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
    public function getUName() {
        return $this->uname;
    }

    private function setUName( ) {
        $this->uname=new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getUEmail() {
        return $this->uemail;
    }

    private function setUEmail( ) {
        $this->uemail =new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getComment() {
        return $this->comment;
    }

    private function setComment( ) {
        $this->comment = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getAdminComment() {
        return $this->admin_comment;
    }

    private function setAdminComment( ) {
        $this->admin_comment = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getItemId() {
        return $this->item_id;
    }

    private function setItemId( ) {
        $this->item_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getRating()
    {
        return $this->rating;
    }

    private function setRating()
    {
        $this->rating = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getPhoto()
    {
        return $this->photo_id;
    }
    public function setPhoto()
    {
        $this->photo_id = new DbColumn();
    }
    /**
     * @return DbColumn
     */
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus()
    {
        $this->status = new DbColumn();
    }
    /**
     * @return DbColumn
     */
    public function getTime()
    {
        return $this->time;
    }
    public function setTime()
    {
        $this->time = new DbColumn();
    }

}

class ShopReviewsModel extends DbDataModel
{

    /**
     * @var  ShopReviewsColumns $columns_where
     */
    public $columns_where;
    /**
     * @var  ShopReviewsColumns $columns_update
     */
    public $columns_update;


    public function InitDop()
    {
        $this->setTableName('`shop_reviews`');
        $this->setTableItemPrefix('review_');
        $this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
        $this->columns_where = new ShopReviewsColumns();
        $this->columns_update = new ShopReviewsColumns();
    }
}
class ShopReviews extends DbData
{
    /**
     * @var  ShopReviewsModel $model
     */
    public $model;

    /**
     * @var $model ShopReviewsModel
     */
    public function CreateModel()
    {
        $this->model = new ShopReviewsModel();
    }

    public function PrepareData ($result_item,$full=0) {

        $result_item=$this->registry->files->FilePrepare($result_item,'icon_');
        $result_item['review_icon_url'] = $this->registry->files->GetImageUrl($result_item,'medium',0,'icon_');
        return $result_item;
    }

    public function GetItemFromIdAdmin($id){
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName().".*");
        $this->model->SetJoinImage('icon',$this->model->GetTableItemName('icon'));
        $this->model->columns_where->getId()->setValue($id);
        return $this->GetItem();
    }
    public function GetItemById($id){
        $this->CreateModel();
        $this->model->setSelectField($this->model->getTableName().".*");
        $this->model->SetJoinImage('icon',$this->model->GetTableItemName('icon'));
        $this->model->columns_where->getId()->setValue($id);
        $this->model->columns_where->getStatus()->setValue(1);
        return $this->GetItem();
    }
//    public function GetReviewsRate(){
//        $this->model->setSelectField($this->model->getTableName().".review_rating");
//    }
}