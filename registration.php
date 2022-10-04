<?php    include('header.php'); ?>
        <!-- Header Section End -->
        <?php
        if(isset($_POST['submit'])){
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$add = $_POST['add'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$nationalty = $_POST['nationalty'];


Registration($f_name,$l_name,$add,$phone,$date,$gender,$email,$pass,$nationalty);


        }
        

        
        ?>


        <!-- Login Section Start -->
        <div id="login">
            <div class="container">
                <div class="section-header">
                    <h2>Registration </h2>
                    <p>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim at venenatis tincidunt. -->
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-form">
                            <form action="" method="POST">
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control"  pattern="[a-zA-Z]*" oninvalid="setCustomValidity('Please enter on alphabets only. ')"  name="f_name" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Last Name</label>
                                        <input type="text" name="l_name"  pattern="[a-zA-Z]*" oninvalid="setCustomValidity('Please enter on alphabets only. ')"   class="form-control" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Address</label>
                                        <input type="text" name="add" pattern="[a-zA-Z]*" oninvalid="setCustomValidity('Please enter on alphabets only. ')"  onkeydown="return /[a-z]/i.test(event.key)" class="form-control" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required="required" >
                                            <option value="">-Gender-</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Birth Date</label>
                                        <input type="date" name="date" min="1920-01-01"  max="2002-12-31" class="form-control" required="required" />
                                    </div>
                                      <div class="control-group col-sm-6">
                                        <label>Phone</label>
                                        <input type="number" name="phone" pattern="[0-1-2-3-4-5-6-7-8-9-10]"  class="form-control" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Email</label>
                                        <input type="email" name="email"   class="form-control" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Nationalty</label>
                                        <input type="text" name="nationalty" pattern="[a-A-Za-z]"  onkeydown="return /[a-z]/i.test(event.key)" class="form-control" required="required" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <label>Your Password</label>
                                        <input type="password" name="pass" class="form-control" required="required" />
                                    </div>
                                  
                                </div>
                                <div class="button"><button name="submit" type="submit">Registration</button></div>
                                I Have Account <a href="login.com">Login</a>
                            </form>
                        </div>
                    </div>
                    
                    <!-- <div class="col-md-6">
                        <div class="login-form">
                            <form>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <label>Your Email</label>
                                        <input type="email" class="form-control" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Your Password</label>
                                        <input type="password" class="form-control" required="required" />
                                    </div>
                                </div>
                                <div class="button"><button type="submit">Login</button></div>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Login Section End -->
        
        <!-- Footer Section Start -->
        <?php    include('footer.php'); ?>