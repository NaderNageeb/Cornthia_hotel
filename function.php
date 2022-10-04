<?php
session_start();
///LocalConnectionz//////
$conn = mysqli_connect("localhost","root","","dragonhousedb");
//$conn = mysqli_connect("localhost","rushaid","e&pp54T8","fu_odms");
mysqli_set_charset($conn,'UTF8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');
if($conn){
    "connection done";
}
else
{
	echo "Error,".mysqli_connect_error($conn);
	die;
}

function alerts($type,$message)
{
	switch($type)
	{
		case 1: {$res = '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Green
		case 2: {$res = '<div class="alert alert-info alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Blue
		case 3: {$res = '<div class="alert alert-warning alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Yellow
		case 4: {$res = '<div class="alert alert-danger alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Red	
	}
	return $res;
}



function Login($email, $pass)
{
    global $conn;

     $sql = "SELECT * FROM `tblguest` where `G_EMAIL` = '$email' and `G_PASS` = '$pass'";
    if ($query = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_array($query);

            $_SESSION['user_id'] = $row['GUESTID'];
            $_SESSION['user_name'] = $row['G_FNAME'] .' '. $row['G_LNAME'] ;
			$user_name = $row['G_FNAME'] .' '. $row['G_LNAME'] ;
            echo "<script>
			alert('Welcome $user_name '); window.location = 'index.php';
            </script>";

        } else {
            echo "<script>alert('Wrong User Name Or Password');window.location = 'login.php';</script>";
            }
        }
        
    }


function Registration($f_name,$l_name,$add,$phone,$date,$gender,$email,$pass,$nationalty){
    global $conn;

	$query_check = "SELECT * FROM tblguest where G_EMAIL = '$email' and G_FNAME = '$f_name' and G_LNAME ='$l_name' ";
	if($query_check = mysqli_query($conn,$query_check))
	If(mysqli_num_rows($query_check))
	{
	echo "<script>alert('This User Exists');window.location = 'Registration.php';</script>";
	}else{
	 $query = "insert into tblguest(G_FNAME,G_LNAME,G_CITY,G_ADDRESS,DBIRTH,G_PHONE,G_NATIONALITY,G_EMAIL,G_PASS)
	 values ('$f_name','$l_name','$gender','$add','{$date}','$phone','$nationalty','$email','$pass')";
	 if(mysqli_query($conn,$query)){
		 
		 echo "<script>alert('Registration Successfully');window.location = 'login.php';</script>";
	 }else{
		  echo "<script>alert('Registration Faild');window.location = 'Registration.php';</script>";
	 }
	}
}


function Getroms(){
    global $conn;
    $sql = "SELECT * FROM `tblroom`r,`tblaccomodation`c where r.ACCOMID = c.ACCOMID and r.room_status = 0 ";
    if($query = mysqli_query($conn,$sql))
        {
        return $query;	
        }
    else
        {
        echo $sql;die;
        }

}

function Get_book($user_id){
	global $conn;
    $sql = "SELECT * From  `tblaccomodation`c,`tblreservation`r ,`tblguest`q , `tblroom`o where 
	 o.ACCOMID = c.ACCOMID   and r.ROOMID = o.ROOMID 
	  and r.GUESTID = q.GUESTID and 
	  r.GUESTID = $user_id ";
    if($query = mysqli_query($conn,$sql))
        {
        return $query;	
        }
    else
        {
        echo $sql;die;
        }
	
}


function Get_detils($res_id){

	global $conn;

	$sql = "SELECT * FROM `tblroom`r,`tblaccomodation`c ,`tblreservation`rs where r.ACCOMID = c.ACCOMID and rs.ROOMID = r.ROOMID and rs.RESERVEID = $res_id ";


	if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}



}











function Get_room($room_id){

    global $conn;
   $sql = "SELECT * FROM `tblroom`r,`tblaccomodation`c where r.ACCOMID = c.ACCOMID and r.ROOMID = $room_id ";
    if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}


}


function Booking($check_in, $check_out, $user_id,  $total, $room_id,$trans_date){

    global $conn;

	$query_check = "SELECT * FROM tblreservation where 	GUESTID  = '$user_id' and ROOMID  = '$room_id' and ARRIVAL ='$check_in' and `DEPARTURE` =  '$check_out'";
	if($query_check = mysqli_query($conn,$query_check))
	If(mysqli_num_rows($query_check))
	{
	echo "<script>alert('This Reservation Already Exist');window.location = 'booking.php?room_id=$room_id';</script>";
	}else{
	 $query = "insert into tblreservation(ARRIVAL,DEPARTURE,RPRICE,GUESTID,TRANSDATE,ROOMID,PRORPOSE,CONFIRMATIONCODE )
	 values ('{$check_in}','{$check_out}','$total','$user_id','$trans_date','$room_id','Travel','bvc8wgcd')";
	 if(mysqli_query($conn,$query)){
		 
		 echo "<script>alert('Reservation Successfully');window.location = 'index.php';</script>";
	 }else{
		  echo "<script>alert('Reservation Faild');window.location = 'booking.php?room_id=$room_id';</script>";
	 }
	}


}


function Cancel_room($room_id,$res_id){

	$user_id = $_SESSION['user_id'];
	
	global $conn ; 
	
	$sql = "UPDATE  `tblreservation` r,tblroom rm SET rm.room_status= 0 , r.STATUS = 4  , r.USERID = $user_id WHERE r.`ROOMID`=rm.`ROOMID` AND  r.`RESERVEID` = $res_id  AND rm.`ROOMID` =  $room_id";
	  
	if($query = mysqli_query($conn,$sql)){
	
		echo "<script>alert('Reservation Cancelled Successfully');window.location = 'index.php';</script>";
	
	}else{
	
		echo "<script>alert('Reservation Not Cancelled');window.location = 'my_booking.php';</script>";
	
	
	}

}




function Search($user_id){

	global $conn;
    $sql = "SELECT * From  `tblaccomodation`c,`tblreservation`r ,`tblguest`q , `tblroom`o where 
	 o.ACCOMID = c.ACCOMID   and r.ROOMID = o.ROOMID 
	  and r.GUESTID = q.GUESTID and 
	  r.GUESTID = $user_id  ";
	//   and r.STATUS = $status
    if($query = mysqli_query($conn,$sql))
        {
        return $query;	
        }
    else
        {
        echo $sql;die;
        }


}









?>