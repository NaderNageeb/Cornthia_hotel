<?php    include('header.php'); ?>
<?php   

if(isset($_POST['cancel'])){
    $user_id = $_SESSION['user_id'];
$room_id = $_POST['room_id'];
$res_id = $_POST['res_id'];


Cancel_room($room_id,$res_id);




}










?>
        <!-- Header Slider Start -->
        <div id="headerSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
                <li data-target="#headerSlider" data-slide-to="1"></li>
                <li data-target="#headerSlider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/slider/corn_logo.jpg" alt="Royal Hotel">
                    <div class="carousel-caption">
                        <h1 class="animated fadeInRight">CORINTHIA HOTEL</h1>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="img/corinthia-khartoum-mugran-restaurant.jpg" alt="Royal Hotel">
                    <div class="carousel-caption">
                        <h1 class="animated fadeInLeft">FIVE-STAR HOTEL</h1>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/slider/Corinthia_15.jpg" alt="Royal Hotel">
                    <div class="carousel-caption">
                        <h1 class="animated fadeInRight"> COMFORTABLE ROOMS</h1>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Header Slider End -->

        <div id="search">
            <div class="container">
                <div class="form-row">
                    <div class="control-group col-md-3">
                        <label>Check-In</label>
                        <div class="form-group">
                            <div class="input-group date" id="date-3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#date-3"/>
                                <div class="input-group-append" data-target="#date-3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group col-md-3">
                        <label>Check-Out</label>
                        <div class="form-group">
                            <div class="input-group date" id="date-4" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#date-4"/>
                                <div class="input-group-append" data-target="#date-4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group col-md-3">
                        <div class="form-row">
                            <div class="control-group col-md-6">
                                <label>Adult</label>
                                <select class="custom-select">
                                    <option selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="control-group col-md-6 kid">
                                <label>Kid</label>
                                <select class="custom-select">
                                    <option selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="control-group col-md-3">
                        <button class="btn btn-block">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Section End -->

                <!-- Welcome Section Start -->
                <div id="welcome">
            <div class="container">
                <h3>Welcome to Cornthia Hotel </h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida sollicitudin turpis id posuere. Fusce nec rhoncus nibh. Fusce arcu libero, euismod eget commodo at, venenatis a nisi. Sed faucibus metus sed leo vulputate blandit.</p> -->
                <a href="#">Book Now</a>
            </div>
        </div>
        <!-- Welcome Section End -->
        
        <!-- Amenities Section Start -->
        <div id="amenities" class="home-amenities">
            <div class="container">
                <div class="section-header">
                    <h2>Hotel Services</h2>
                    <p>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim at venenatis tincidunt. -->
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-2"></i>
                        <h3>Air Conditioner</h3>
                        <p></p>
                    </div>
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-3"></i>
                        <h3>Bathtub</h3>
                        <p></p>
                    </div>
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-4"></i>
                        <h3>Shower</h3>
                        <p></p>
                    </div>
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-6"></i>
                        <h3>Television</h3>
                        <p></p>
                    </div>
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-7"></i>
                        <h3>WiFi</h3>
                        <p></p>
                    </div>
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-8"></i>
                        <h3>Telephone</h3>
                        <p></p>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-9"></i>
                        <h3>Mini Bar</h3>
                        <p></p>
                    </div> -->
                    <div class="col-md-3 col-sm-6 icons">
                        <i class="icon icon-10"></i>
                        <h3>Kitchen</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Amenities Section Start -->
        
        <br>
        <br>
        <br>
<br>
<br>
<br>
<br>



       
<!-- <div class="panel panel-primary"> -->
		
<form  method="POST" action="">
	<table id="table" class="table table-striped" id="printMe" cellspacing="0">
<thead>
<tr>

<!-- <td ><strong>Guest</strong></td> -->
<!--<td width="10"><strong>Confirmation</strong></td>-->
<td ><strong>Reservation Date</strong></td>
<td ><strong>Room Type</strong></td>
<td ><strong>Room Name</strong></td>
<td ><strong>Total Price</strong></td>
<td ><strong>Status</strong></td>
<td ><strong>Action</strong></td>
</tr>
</thead>
<tbody>
<?php
 
$user_id = $_SESSION['user_id'];
$get_book = Get_book($user_id);

				  			 
while ($rows = mysqli_fetch_array($get_book)) {

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
    if($rows['STATUS'] == 4 && $rows['USERID'] != 0) echo " By You";  
    
    if($rows['STATUS'] == 1 || $rows['STATUS'] == 2 || $rows['STATUS'] == 3 || $rows['STATUS'] == 4 && isset($_SESSION['user_id']))
    {
        $id = $rows['RESERVEID'];

        $user_id = $_SESSION['user_id'];
        $sqli = "UPDATE `tblreservation` set `USER_VIEW` = 1 where `RESERVEID` = $id and `GUESTID` = $user_id ";
        $query = mysqli_query($conn,$sqli);
        if($query){

        }else{
            echo "No update User View";
        }

    }
    
    ?>
<td> 
<a href="view.php?res_id=<?php echo $rows['RESERVEID']; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">View</a> 


    <?php  if($rows['STATUS'] == 2 || $rows['STATUS'] == 3 || $rows['STATUS'] == 4 ){  ?>

        <?php }else{ ?>

            <input type="hidden" name="room_id" value="<?php echo $rows['ROOMID']; ?>" >
            <input type="hidden" name="res_id"  value="<?php echo $rows['RESERVEID']; ?>" >


<input type="submit" name="cancel" class="btn btn-danger btn-xs" value="Cancel" >
<?php } ?>




</td>


</form>

</tr>
</tbody>
<?php } ?>
</table>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





        
        <?php    include('footer.php'); ?>