<?php    include('header.php'); ?>
<?php if(isset($_GET['room_id'])){

$room_id = $_GET['room_id'];

$get_room = Get_room($room_id);


}            ?>


<?php


if(isset($_POST['book'])){

  $check_in = $_POST['check_in'];
 $check_out = $_POST['check_out'];
 $room_id = $_POST['room_id'];
 $trans_date = date("Y-m-d");

 $user_id = $_SESSION['user_id'];
// deffrence Between Deats
  $startDate = new DateTime($check_in);
  $endDate = new DateTime($check_out);
 $difference =  $endDate->diff($startDate);
 $days = $difference->format("%a");
// deffrence Between Deats
 $room_price = $_POST['room_price'];
 $total = $days * $room_price;

 $date_1 = strtotime($check_in);
 $date_2 = strtotime($check_out);




 if(  $date_1 >= $date_2   ||  $check_in <  $trans_date){?>

    <div class="alert alert-danger" role="alert" style="text-align:center">Wrong Reservation Date</div>

    <?php
 }else{

   Booking($check_in, $check_out, $user_id,  $total, $room_id ,$trans_date );

 }





}








?>






        <!-- Search Section Start -->
        <div id="search" style="background: #f2f2f2;">
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
        
        <!-- Booking Section Start -->
        <div id="booking">
            <div class="container">
                <div class="section-header">
                    <h2>Room Booking</h2>
                   
                    <p>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim at venenatis tincidunt. -->
                    </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="booking-form">
                            <div id="success"></div>
                            <form name="sentMessage"  method="POST" id="bookingForm" novalidate="novalidate">
                                <div class="form-row">
                                    <div class="control-group col-md-6">
                                        <label>ROOM TYPE</label>
                                        <input type="text" class="form-control" value="<?php  echo $get_room['ACCOMODATION'] ;   ?>" readonly="readonly" id="fname" />
                                        <p class="help-block text-danger"></p>
                                        <input type="hidden" class="form-control" name="room_price" value="<?php  echo $get_room['PRICE'] ;   ?>" readonly="readonly" id="fname" />
                                        <input type="hidden" name="room_id" class="form-control" value="<?php  echo $get_room['ROOMID'] ;   ?>" readonly="readonly" id="fname" />



                                    </div>
                                    <div class="control-group col-md-6">
                                        <label>Room Price</label>
                                        <input type="text" id="room_price" class="form-control" value="<?php  echo $get_room['PRICE'] ;   ?>" readonly="readonly"/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <?php
 $mindate = date("Y-m-d");
// $mintime = date("h:i");
// $min = $mindate."T".$mintime;
// //$maxdate = date("Y-m-d", strtotime("+360 Days"));
 $maxdate = date("Y-m-d", strtotime("+2 Years"));

?>
                                    
                                <div class="form-row">
                                    <div class="control-group col-md-6">
                                        <label>Check-In</label>
                                        <input type="date" id="check_in" name="check_in"  class="form-control"    min="<?php echo  $mindate;?>" max="<?php echo $maxdate;?>" required="required" data-validation-required-message="Please enter date"/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-md-6">
                                        <label>Check-Out</label>
                                        <input type="date"  id="check_out" name="check_out" onchange="myFunction()" class="form-control datetimepicker-input"  min="<?php echo  $mindate;?>" max="<?php echo $maxdate;?>"  data-toggle="datetimepicker" data-target="#date-2" placeholder="E.g. MM/DD/YYYY" required="required" data-validation-required-message="Please enter date"/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
<br>
                                <h2>  Total Price: <span id="msg"></span></h2>
                                <br>                           
                                <input type="hidden" id="room_price" class="form-control" onchange="myFunction()" value="<?php  echo $get_room['PRICE'] ;   ?>" readonly="readonly"/>

                                <div class="button"><button type="submit" name="book" id="bookingButton">Book Now</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking Section End -->




        <script>
function myFunction() {
    var y,z,x,total,Msg;
   
 y = document.getElementById("check_in").value;
//alert(y);////

 z = document.getElementById("check_out").value;
 //alert(z);
 
 x = document.getElementById("room_price").value;


const date1 = new Date(y);
const date2 = new Date(z);

getDifferenceInDays(date1,date2, x)
}


function getDifferenceInDays(date1, date2,room_price) {

    var diffrent_ ;
    var Msg ;
    var calz = 0 ;

  const diffInMs = Math.abs(date2 - date1);
  diffrent_ =  diffInMs / (1000 * 60 * 60 * 24);

  calz = room_price * diffrent_ ;

  //alert("Total Prince :" + calz +  " .SDG" );

  Msg=document.getElementById("msg").innerHTML = calz + " " + "$ ";
}

</script>












        <!-- <script>
function myFunction() {
  var x = document.getElementById("myDate").max;
  document.getElementById("demo").innerHTML = x;
}
</script> -->














     <?php    include('footer.php'); ?>