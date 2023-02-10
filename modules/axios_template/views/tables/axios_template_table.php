<?php
defined('BASEPATH') or exit('No direct script access allowed');
$aColumns = [
	'id',
	'email',
	'phone',
	'city',
	'address',
];

$sIndexColumn = 'id';
$sTable 	  =  db_prefix().'axios_template';

$additionalColumns = ['firstname' , 'lastname'];
$result  = data_tables_init($aColumns, $sIndexColumn , $sTable, [],[],$additionalColumns);
$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
	$row = [];
	$row[] = $aRow['id'];

	$username = '';
	$username .= '<a href="#" class="view" data-id="'.$aRow['id'].'"><span class="name">'.$aRow['firstname'].' '.$aRow['lastname'].'</span></a>';
	$username .= '</div>';
	$username .= '<div class="row-options">';
	$username .= '<a href="#" id="edit" data-id="'.$aRow['id'].'">'._l('edit').'</a>';
	$username .= ' | <a href="#" onclick="removeTemplate('.$aRow['id'].')" class="text-danger _delete">'._l('delete').'</a>';
	$username .= '</div>';
	$row[] = $username;

	$row[] = $aRow['email'];

	$row[] = $aRow['phone'];

	$row[] = $aRow['city'];
	
	$row[] = $aRow['address'];

	$output['aaData'][] = $row;
}
?>