<?php    include('header.php'); ?>
<?php   

// if(isset($_POST['search'])){
//     $user_id = $_SESSION['user_id'];
// $status = $_POST['status'];
// // $res_id = $_POST['res_id'];


//  $search = Search($user_id);




// }

if(isset($_SESSION['user_id'])){
     $user_id = $_SESSION['user_id'];
    // $status = $_POST['status'];
    // // $res_id = $_POST['res_id'];
    
    
      $search = Search($user_id);
    
    
    
    
     }



?>


<center><h3>Reports </h3></center>
<br>
<br>

        <!-- <div id="search">
            <div class="container">
                <div class="form-row">
                    
                    <div class="control-group col-md-3">
                        <div class="form-row">
                            <form action="report.php" method="POST">
                            <div class="control-group col-md-12">
                                <label>Status </label>
                                <select class="custom-select" required name="status" >
                                    <option value="" > Select Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Confirmed</option>
                                    <option value="2">Rejected</option>
                          
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="control-group col-md-3">
                        <input type="submit" name="search" class="btn btn-block" value="Search">
                    </div>
                </div>
            </div>
        </div>
        </form>
         -->
        <!-- Search Section End -->

                <!-- Welcome Section Start -->
                <!-- <div id="welcome">
            <div class="container">
                <h3>Welcome to Cornthia Hotel </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida sollicitudin turpis id posuere. Fusce nec rhoncus nibh. Fusce arcu libero, euismod eget commodo at, venenatis a nisi. Sed faucibus metus sed leo vulputate blandit.</p> -->
                <!-- <a href="#">Book Now</a> -->
            <!-- </div>
        </div> --> 
        <!-- Welcome Section End -->
        
        <!-- Amenities Section Start -->

             
                    <!-- <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-9"></i>
                        <h3>Mini Bar</h3>
                        <p></p>
                    </div> -->
 
        <!-- Amenities Section Start -->
        
        <br>
        <br>
        <br>
<br>
<br>
<br>
<br>



       
<!-- <div class="panel panel-primary"> -->
	<?php  //if(isset($_POST['search'])){     ?>	
<form  method="POST" action="">
	<table id="table" class="table table-striped" cellspacing="0">
<thead>
<tr>

<!-- <td ><strong>Guest</strong></td> -->
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td ><strong>Reservation Date</strong></td>
<td ><strong>Room Type</strong></td>
<td ><strong>Room Name</strong></td>
<td ><strong>Total Price</strong></td>
<td ><strong>Status</strong></td>
<!-- <td ><strong>Action</strong></td> -->
</tr>
</thead>
<tbody>
<?php
 
// $user_id = $_SESSION['user_id'];
// $get_book = Get_book($user_id);

				  			 
while ($rows = mysqli_fetch_array($search)) {

?>
<tr>


<td><?php echo $rows['TRANSDATE']; ?></td>  
<td><?php echo $rows['ACCOMODATION']	; ?></td>
<td><?php echo $rows['ROOM']; ?></td>
<td>$<?php echo $rows['RPRICE']; ?></td>
<!-- <td>&dolar;<?php //echo $rows['RPRICE']; ?></td> -->
<td><?php if($rows['STATUS'] == 0)echo "Pending";
 if($rows['STATUS'] == 1) echo "Confirmed";
  if($rows['STATUS'] == 2) echo "Checkedin";
   if($rows['STATUS'] == 3) echo "Checkedout";
    if($rows['STATUS'] == 4) echo "Cancled"; 
    if($rows['STATUS'] == 4 && $rows['USERID'] != 0) echo " By You";    ?>
<!--     
<td> 
<a href="view.php?res_id=<?php //echo $rows['RESERVEID']; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a> 


    <?php  //if($rows['STATUS'] == 2 || $rows['STATUS'] == 3 || $rows['STATUS'] == 4 ){  ?>

        <?php //}else{ ?>

            <input type="hidden" name="room_id" value="<?php //echo $rows['ROOMID']; ?>" >
            <input type="hidden" name="res_id"  value="<?php //echo $rows['RESERVEID']; ?>" >


<input type="submit" name="cancel" class="btn btn-danger btn-xs" value="Cancel" >
<?php //} ?> -->




</td>


</form>

</tr>
</tbody>
<?php } ?>
</table>
        </div>
<!-- <center><button id="toggleButton" onclick="printDiv('printMe');" class="btn btn-success active">Print Table</button></center> -->
<button onclick="window.print()">Print this page</button>

<?php //} ?>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
  

	</script>



        
        <?php    include('footer.php'); ?>