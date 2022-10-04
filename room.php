<?php    include('header.php'); ?>
<?php   $get_rooms  = Getroms();         ?>
        
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
        
        <!-- Room Section Start -->
        <div id="rooms">
            <div class="container">
                <div class="section-header">
                    <h2>Our Rooms</h2>
                    <p>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim at venenatis tincidunt. -->
                    </p>
                </div>
                <div class="row">

         <!-- ---------------- -->
         
         <?php   while($rows = mysqli_fetch_array($get_rooms)){                  ?>
         
         <div class="col-md-12">
              <div class="row">
                  <div class="col-md-3">
                      <div class="room-img">
                          <div class="box12">
                              <img src="admin/mod_room/<?php echo $rows['ROOMIMAGE']; ?>">
                          
                              <div class="box-content">
                                  <h3 class="title">Standard Double</h3>
                                  <ul class="icon">
                                      <li><a href="#" data-toggle="modal" data-target="#modal-id"><i class="fa fa-link"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="room-des">
                          <h3><a href="#" data-toggle="modal" data-target="#modal-id"><?php echo $rows['ACCOMODATION']; ?></a></h3>
                          <p><?php echo $rows['ROOMDESC']; ?>.</p>
                          <ul class="room-size">
                              <li><i class="fa fa-arrow-right"></i><?php echo $rows['ROOM']; ?> </li>
                              <li><i class="fa fa-arrow-right"></i>Person: <?php echo $rows['NUMPERSON']; ?> </li>
                          </ul>
                          <ul class="room-icon">
                              <li class="icon-1"></li>
                              <li class="icon-2"></li>
                              <li class="icon-3"></li>
                              <li class="icon-4"></li>
                              <li class="icon-5"></li>
                              <li class="icon-6"></li>
                              <li class="icon-7"></li>
                              <li class="icon-8"></li>
                              <li class="icon-9"></li>
                              <li class="icon-10"></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="room-rate">
                          <h3>From</h3>
                          <h1><?php echo $rows['PRICE']; ?></h1>
                         
                          <?php   if(isset($_SESSION['user_id'])){       ?>
                                    <a href="booking.php?room_id=<?php echo $rows['ROOMID'];   ?>">Book Now</a>
<?php }else{ ?>
                                 <a href="Login.php">Book Now</a>
<?php  } ?>

                      </div>
                  </div>
              </div>
              <hr>
          </div> 
          <?php } ?>
<!-- ------------------ -->




                </div>
            </div>
        </div>
        <!-- Room Section End -->
        
        <!-- Modal for Room Section Start -->
        <div id="modal-id" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="port-slider">
                                    <div><img src="img/room-slider/room-1.jpg"></div>
                                    <div><img src="img/room-slider/room-2.jpg"></div>
                                    <div><img src="img/room-slider/room-3.jpg"></div>
                                    <div><img src="img/room-slider/room-4.jpg"></div>
                                    <div><img src="img/room-slider/room-5.jpg"></div>
                                    <div><img src="img/room-slider/room-6.jpg"></div>
                                </div>
                                <div class="port-slider-nav">
                                    <div><img src="img/room-slider/room-1.jpg"></div>
                                    <div><img src="img/room-slider/room-2.jpg"></div>
                                    <div><img src="img/room-slider/room-3.jpg"></div>
                                    <div><img src="img/room-slider/room-4.jpg"></div>
                                    <div><img src="img/room-slider/room-5.jpg"></div>
                                    <div><img src="img/room-slider/room-6.jpg"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h2>Lorem ipsum dolor</h2>
                                <p>
                                    Lorem ipsum dolor viverra purus imperdiet rhoncus imperdiet. Suspendisse vulputate condimentum ligula sollicitudin hendrerit. Phasellus luctus, elit et ultrices interdum, neque mi pellentesque massorci. Nam in cursus ex, nec mattis lectus. Curabitur quis elementum nunc. Mauris iaculis, justo eu aliquam sagittis, arcu eros cursus libero, sit amet eleifend dolor odio at lacus. 
                                </p>
                                <div class="modal-link">
                                    <a href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for Room Section End -->
        <?php    include('footer.php'); ?>