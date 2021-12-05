<?php
require_once 'models/content.php';
$ContentClass= new ContentClass($Main);

if ($Main->GPC['action']=='ask_page') {
	$Main->input->clean_array_gpc('r', array(
		'value'=>TYPE_BOOL
	));
	$Main->db->query_write( "INSERT INTO `pages_stat`
                (`stat_rate`,`stat_url`)
                VALUES (
                " . $Main->db->sql_prepare( $Main->GPC['value'] ) . ",
                " . $Main->db->sql_prepare( $_SERVER['REQUEST_URI'] ) . "
                )
          " );

	$array=array();
	$array['text']='Спасибо за рекомендацию!';
	$array['status']=true;

	$Main->template->DisplayJson($array);
}
