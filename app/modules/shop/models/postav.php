<?php

class Postav {
	/**
	 * @var MainClass
	 */
	var $registry;
	/**
	 * @var DatabaseClass
	 */
	var $db;

	public function __construct( &$registry ) {
		$this->registry  =& $registry;
		$this->db        =& $this->registry->db;
	}

	function GetPostavList() {
		$result    = $this->GetPostavListDb();
		$new_array = array();
		while ( $a = $this->db->fetch_array( $result ) ) {
			$new_array[ $a['postav_id'] ] = $a;
		}

		return $new_array;
	}

	function GetPostavListDb() {
		return $this->db->query_read( 'SELECT *
        FROM shop_postav' );
	}

	function GetPostav( $postav_id ) {
		$data            = $this->db->query_first( "SELECT * FROM `shop_postav`
         WHERE  `postav_id`=" . $this->db->sql_prepare( $postav_id ) );
		$data['options'] = array();
		if ( $data['price_data'] ) {
			$data['options'] = unserialize( $data['price_data'] );
		}

		return $data;
	}

	function UpdatePostav( $id, $percent_up, $name, $feed ) {
		return $this->db->query_write( "UPDATE `shop_postav`
         SET `postav_up`=" . $this->db->sql_prepare( $percent_up ) . ",
         `postav_name`=" . $this->db->sql_prepare( $name ) . ",
         `postav_feed`=" . $this->db->sql_prepare( $feed ) . "
         WHERE `postav_id`=" . $this->db->sql_prepare( $id ) );
	}
}
