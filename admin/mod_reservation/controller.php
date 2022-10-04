<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'modify' :
	dbMODIFY();
	break;
	
	case 'delete' :
	doDelete();
	break;
	
	case 'deleteOne' :
	dbDELETEONE();
	break;
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'checkin' :
	doCheckin();
	break;
	case 'checkout' :
	doCheckout();
	break;
	case 'cancelroom' :
	doCancelRoom();
	break;
	}

function doCheckout(){

		global $mydb;

		 $sql = "UPDATE `tblreservation`r , `tblroom` rm SET  rm.room_status = 0  , r.`STATUS`= 3 WHERE r.`ROOMID`=rm.`ROOMID`  and  `RESERVEID` ='" . $_GET['code'] ."'"; 
		$mydb->setQuery($sql);
		$mydb->executeQuery(); 


					
		message("Reservation Upadated successfully!", "success");
		redirect('index.php');

}

function doCheckin(){
 
 global $mydb;

$sql = "UPDATE `tblreservation` SET `STATUS`= 2 WHERE `RESERVEID` ='" . $_GET['code'] ."'"; 
$mydb->setQuery($sql);
$mydb->executeQuery(); 
 


message("Reservation Upadated successfully!", "success");
redirect('index.php');



}


function doCancel(){
global $mydb;

$sql = "UPDATE `tblreservation` r,tblroom rm SET rm.room_status = 0 WHERE r.`ROOMID`=rm.`ROOMID` AND r.`RESERVEID` ='" . $_GET['code'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery(); 


$sql = "UPDATE `tblreservation` SET `STATUS`= 4 WHERE `RESERVEID` ='" . $_GET['code'] ."'"; 
$mydb->setQuery($sql);
$mydb->executeQuery(); 



				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}

function doCancelRoom(){ 
	global $mydb;

$sql = "UPDATE `tblreservation` SET `STATUS`= 4 WHERE `RESERVEID` ='" . $_GET['id'] ."'";
mysql_query($sql) or die(mysql_error());

				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}



function doConfirm(){
global $mydb; 

 $sql = "UPDATE  `tblreservation` r,tblroom rm SET rm.room_status= 1 , r.STATUS = 1 WHERE r.`ROOMID`=rm.`ROOMID` AND  r.`RESERVEID` ='" . $_GET['code'] ."'";

$mydb->setQuery($sql);
$mydb->executeQuery();

message("Reservation Upadated successfully!", "success");
 redirect('index.php');

}	
 


function doDelete(){

	global $mydb;

	// $sql = "DELETE FROM tblpayment WHERE GUESTID='" . $_GET['code'] ."'"; 
	// $mydb->setQuery($sql);
	// $mydb->executeQuery();
	
	$sql = "DELETE FROM tblreservation WHERE RESERVEID='" . $_GET['code'] ."'"; 
	$mydb->setQuery($sql);
	$res = $mydb->executeQuery();
	if ($res) {
		# code...
	message("Reservation Deleted successfully!", "success");
 	redirect('index.php');
	}else{
	message("Reservation cannot be deleted!", "error");
 	redirect('index.php');
	}
  }
?>