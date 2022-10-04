<?php  

if (isset($_SESSION['user_id'])) {
	$user_id =$_SESSION['user_id'];
    $conn = mysqli_connect("localhost", "root", "", "dragonhousedb");
  $sql = "SELECT COUNT(RESERVEID) As c from `tblreservation` where `GUESTID` = $user_id and `STATUS` !=0  and `USER_VIEW` = 0 ";
    $query = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($query);
    $num_rows = $values['c'];

     
     if($num_rows==0)echo ""; else echo "$num_rows <script>alert('You Have $num_rows Notification');   </script>  "  ;

}
	?>
