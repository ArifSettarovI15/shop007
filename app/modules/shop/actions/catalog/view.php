<?php
$Main->user->PagePrivacy();

$Main->input->clean_array_gpc('r', array(
	'filters'=>TYPE_ARRAY,
	'hash'=>TYPE_STR
));
$breadcrumbs=array();
$breadcrumbs[] = array(
	'title' => 'Каталог',
	'link' => '/catalog/'
);

$Main->error->PageNotFound();

$Main->template->Display();