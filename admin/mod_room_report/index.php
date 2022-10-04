<?php
require_once("../../includes/initialize.php");
 if (!isset($_SESSION['ADMIN_ID'])){
 	redirect(WEB_ROOT ."admin/login.php");
 }
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title ="Report";
switch ($view) {
	case 'list' :
		$content    = 'room_report.php';		
		break;
		
			
	default :
		$content    = 'room_report.php';		
}
  include '../modal.php';
require_once '../themes/backendTemplate.php';
?>


  
