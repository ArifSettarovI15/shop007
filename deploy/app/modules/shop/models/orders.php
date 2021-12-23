<?php

class ShopOrdersColumns extends DbDataColumns {

	private $id;
	private $user_id;
	private $user_lastname;
	private $user_name;
	private $user_phone;
	private $user_email;
	private $time;
	private $reserv_time;
	private $status;
	private $group_id;
	private $payment;
	private $delivery;
	private $comment;
	private $note;
	private $delivery_city_id;
	private $delivery_city;
	private $delivery_addr;
	private $delivery_cost;
	private $delivery_time;
	private $delivery_fast;

	private $payment_time;
	private $payment_status;
	private $payment_invoiceId;
	private $payment_date;
	private $payment_type;
	private $items_cost;
	private $total_cost;
	private $ya_comment;
	private $key;
	private $del_id;

	public function __construct()
	{
		$this->setId();
		$this->getId()->setName('id');
		$this->getId()->setType(TYPE_UINT);

		$this->setUserId();
		$this->getUserId()->setName('user_id');
		$this->getUserId()->setType(TYPE_UINT);

		$this->setUserLastname();
		$this->getUserLastname()->setName('user_lastname');
		$this->getUserLastname()->setType(TYPE_STR);

		$this->setUserName();
		$this->getUserName()->setName('user_name');
		$this->getUserName()->setType(TYPE_STR);

		$this->setUserPhone();
		$this->getUserPhone()->setName('user_phone');
		$this->getUserPhone()->setType(TYPE_STR);

		$this->setUserEmail();
		$this->getUserEmail()->setName('user_email');
		$this->getUserEmail()->setType(TYPE_STR);

		$this->setTime();
		$this->getTime()->setName('time');
		$this->getTime()->setType(TYPE_UINT);

		$this->setReservTime();
		$this->getReservTime()->setName('reserv_time');
		$this->getReservTime()->setType(TYPE_UINT);

		$this->setStatus();
		$this->getStatus()->setName('status');
		$this->getStatus()->setType(TYPE_UINT);

		$this->setGroupId();
		$this->getGroupId()->setName('group_id');
		$this->getGroupId()->setType(TYPE_UINT);

		$this->setPayment();
		$this->getPayment()->setName('payment');
		$this->getPayment()->setType(TYPE_STR);

		$this->setDelivery();
		$this->getDelivery()->setName('delivery');
		$this->getDelivery()->setType(TYPE_STR);

		$this->setDeliveryAddr();
		$this->getDeliveryAddr()->setName('delivery_addr');
		$this->getDeliveryAddr()->setType(TYPE_STR);

		$this->setDeliveryCity();
		$this->getDeliveryCity()->setName('delivery_city');
		$this->getDeliveryCity()->setType(TYPE_STR);

		$this->setDeliveryCityId();
		$this->getDeliveryCityId()->setName('delivery_city_id');
		$this->getDeliveryCityId()->setType(TYPE_UINT);

		$this->setDeliveryCost();
		$this->getDeliveryCost()->setName('delivery_cost');
		$this->getDeliveryCost()->setType(TYPE_UINT);

		$this->setDeliveryTime();
		$this->getDeliveryTime()->setName('delivery_time');
		$this->getDeliveryTime()->setType(TYPE_STR);

		$this->setDeliveryFast();
		$this->getDeliveryFast()->setName('delivery_fast');
		$this->getDeliveryFast()->setType(TYPE_BOOL);

		$this->setComment();
		$this->getComment()->setName('comment');
		$this->getComment()->setType(TYPE_STR);

		$this->setNote();
		$this->getNote()->setName('note');
		$this->getNote()->setType(TYPE_STR);

		$this->setPaymentStatus();
		$this->getPaymentStatus()->setName('payment_status');
		$this->getPaymentStatus()->setType(TYPE_BOOL);

		$this->setPaymentInvoiceId();
		$this->getPaymentInvoiceId()->setName('payment_invoiceId');
		$this->getPaymentInvoiceId()->setType(TYPE_STR);

		$this->setPaymentDate();
		$this->getPaymentDate()->setName('payment_date');
		$this->getPaymentDate()->setType(TYPE_STR);

		$this->setPaymentType();
		$this->getPaymentType()->setName('payment_type');
		$this->getPaymentType()->setType(TYPE_STR);

		$this->setItemsCost();
		$this->getItemsCost()->setName('items_cost');
		$this->getItemsCost()->setType(TYPE_UNUM);

		$this->setTotalCost();
		$this->getTotalCost()->setName('total_cost');
		$this->getTotalCost()->setType(TYPE_UNUM);

		$this->setYaComment();
		$this->getYaComment()->setName('ya_comment');
		$this->getYaComment()->setType(TYPE_BOOL);

		$this->setKey();
		$this->getKey()->setName('key');
		$this->getKey()->setType(TYPE_STR);

		$this->setPaymentTime();
		$this->getPaymentTime()->setName('payment_time');
		$this->getPaymentTime()->setType(TYPE_STR);

		$this->setDelId();
		$this->getDelId()->setName('del_id');
		$this->getDelId()->setType(TYPE_UINT);
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

	private function setUserId( ) {
		$this->user_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserLastname() {
		return $this->user_lastname;
	}

	private function setUserLastname( ) {
		$this->user_lastname =  new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserName() {
		return $this->user_name;
	}


	private function setUserName( ) {
		$this->user_name = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserPhone() {
		return $this->user_phone;
	}


	private function setUserPhone( ) {
		$this->user_phone = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getUserEmail() {
		return $this->user_email;
	}


	private function setUserEmail( ) {
		$this->user_email =  new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTime() {
		return $this->time;
	}

	private function setTime( ) {
		$this->time = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getStatus() {
		return $this->status;
	}


	private function setStatus(  ) {
		$this->status = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPayment() {
		return $this->payment;
	}


	private function setPayment(  ) {
		$this->payment = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDelivery() {
		return $this->delivery;
	}


	private function setDelivery() {
		$this->delivery = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getComment() {
		return $this->comment;
	}


	private function setComment(  ) {
		$this->comment =new DbColumn();
	}
	/**
	 * @return DbColumn
	 */
	public function getNote() {
		return $this->note;
	}


	private function setNote(  ) {
		$this->note =new DbColumn();
	}


	/**
	 * @return DbColumn
	 */
	public function getDeliveryCity() {
		return $this->delivery_city;
	}


	private function setDeliveryCity() {
		$this->delivery_city = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDeliveryAddr() {
		return $this->delivery_addr;
	}


	private function setDeliveryAddr() {
		$this->delivery_addr = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPaymentStatus() {
		return $this->payment_status;
	}


	private function setPaymentStatus(  ) {
		$this->payment_status = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPaymentInvoiceId() {
		return $this->payment_invoiceId;
	}


	private function setPaymentInvoiceId( ) {
		$this->payment_invoiceId = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPaymentDate() {
		return $this->payment_date;
	}


	private function setPaymentDate(  ) {
		$this->payment_date = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPaymentType() {
		return $this->payment_type;
	}


	private function setPaymentType( ) {
		$this->payment_type = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getItemsCost() {
		return $this->items_cost;
	}


	private function setItemsCost(  ) {
		$this->items_cost = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getTotalCost() {
		return $this->total_cost;
	}


	private function setTotalCost(  ) {
		$this->total_cost = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getYaComment() {
		return $this->ya_comment;
	}


	private function setYaComment(  ) {
		$this->ya_comment = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDeliveryCost() {
		return $this->delivery_cost;
	}

	private function setDeliveryCost() {
		$this->delivery_cost = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDeliveryTime() {
		return $this->delivery_time;
	}

	private function setDeliveryTime() {
		$this->delivery_time = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDeliveryFast() {
		return $this->delivery_fast;
	}


	private function setDeliveryFast() {
		$this->delivery_fast = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getKey() {
		return $this->key;
	}

	private function setKey() {
		$this->key = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getGroupId() {
		return $this->group_id;
	}

	private function setGroupId() {
		$this->group_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getReservTime() {
		return $this->reserv_time;
	}

	private function setReservTime() {
		$this->reserv_time =  new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getPaymentTime() {
		return $this->payment_time;
	}

	private function setPaymentTime() {
		$this->payment_time = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDeliveryCityId() {
		return $this->delivery_city_id;
	}

	private function setDeliveryCityId() {
		$this->delivery_city_id = new DbColumn();
	}

	/**
	 * @return DbColumn
	 */
	public function getDelId() {
		return $this->del_id;
	}

	private function setDelId() {
		$this->del_id = new DbColumn();
	}
}


class ShopOrdersModel extends DbDataModel {

	/**
	 * @var  ShopOrdersColumns $columns_where
	 */
	public $columns_where;
	/**
	 * @var  ShopOrdersColumns $columns_update
	 */
	public $columns_update;


	public function InitDop () {
		$this->setTableName('`shop_orders`');
		$this->setTableItemPrefix('order_');
		$this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
		$this->columns_where=new ShopOrdersColumns();
		$this->columns_update=new ShopOrdersColumns();
	}

	public function SetJoinItems() {
		$this->setSelectField(' `shop_orders`.*');
		$this->setJoin('   LEFT JOIN shop_item_order ON shop_orders.order_id=shop_item_order.oid_order_id
        LEFT JOIN shop_items ON shop_item_order.oid_item_id=shop_items.item_id
        ');
		$this->SetJoinImage('icon','shop_items.item_icon');
		$this->setGroupBy('`shop_orders`.order_id');
	}
	public function SetJoinManagers() {
		$this->setSelectField(' manager_data.profile_lastname as manager_lastname, 
	manager_data.profile_name as manager_name ');
		$this->setJoin('LEFT JOIN `users` ON `shop_orders`.`order_user_id`=`users`.`user_id`
		LEFT JOIN `users_profile` manager_data ON `users`.`user_manager_id`=manager_data.`profile_user_id`
        ');
	}
}

class ShopOrders extends  DbData
{

	/**
	 * @var  ShopOrdersModel $model
	 */
	public $model;

	/**
	 * @var $model ShopOrdersModel
	 */
	public function CreateModel () {
		$this->model=new ShopOrdersModel();
	}

	public function GetItemById ($id,$full=0){
		$this->CreateModel();
		$this->model->columns_where->getId()->setValue($id);
		if ($full) {
			$this->model->setSelectField(' * ');
			$this->model->SetJoinManagers();
			if ($this->registry->user_info['user_role_id']==3) {
				$this->model->addWhereCustom( 'user_manager_id=' . $this->db->sql_prepare( $this->registry->user_info['user_id'] ) );
			}
		}
		return $this->GetItem($full);
	}
	public function GetLastId (){
		$this->CreateModel();
        $this->model->setSelectField($this->model->getTableName().'.order_id ');
        $this->model->setOrderBy('order_id DESC');
        $this->model->setCount(1);
		return $this->GetItem();
	}

	public function PrepareData ($result_item,$full=0) {
		if ($result_item['order_items_cost']) {
			$result_item['order_items_cost_f']=format_money($result_item['order_items_cost']);
		}
		if ($result_item['order_delivery_cost']) {
			$result_item['order_delivery_cost_f']=format_money($result_item['order_delivery_cost']);
		}
		if ($result_item['order_total_cost']) {
			$result_item['order_total_cost_f']=format_money($result_item['order_total_cost']);
		}

		return $result_item;
	}


	public function getUnpaidSum($user_id) {
		$this->CreateModel();
		$this->model->setSelectField(' SUM(order_total_cost) as sum');
		$this->model->columns_where->getUserId()->setValue($user_id);
		$this->model->columns_where->getPaymentStatus()->setValue(false);
		$this->model->columns_where->getStatus()->inValues($this->registry->shop->getOrderActiveStatus());
		$this->model->setGroupBy('order_user_id');
		$sum=$this->GetItem();
		$sum=intval($sum['sum']);
		if ($sum>0) {
			$sum=-1*$sum;
		}
		return $sum;
	}

	public function getFirstUnpaidTime($user_id) {
		$this->CreateModel();
		$this->model->setSelectField(' order_payment_time');
		$this->model->columns_where->getUserId()->setValue($user_id);
		$this->model->columns_where->getPaymentStatus()->setValue(false);
		$this->model->columns_where->getPaymentTime()->notValue(0);
		$this->model->columns_where->getStatus()->inValues($this->registry->shop->getOrderActiveStatus());
		$this->model->setOrderBy('order_payment_time');
		$first_unpaid=$this->GetItem();
		return intval($first_unpaid['order_payment_time']);
	}

	public function checkOrderTimeLimit($first_unpaid,$delay) {

		$good=true;
		if ($first_unpaid) {
			$max_delay=$delay*24*3600;
			if ((TIMENOW-$first_unpaid)>$max_delay) {
				$good=false;
			}
		}

		return $good;
	}

	public function checkOrderCreditLimit($sum,$credit=0) {
		$good=true;
		if (($sum+$credit)<0) {
			$good=false;
		}

		return $good;
	}

	public function setOrderSum($order_id) {
		$sum=$this->registry->shop->order_items->getOrderSum($order_id);
		$this->CreateModel();
		$this->model->columns_update->getItemsCost()->setValue($sum);
		$this->model->columns_update->getTotalCost()->setValue($sum);
		$this->model->columns_where->getId()->setValue($order_id);
		return $this->Update();
	}
}
