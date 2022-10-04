<?php    include('header.php'); ?>
        <!-- Header Section End -->
        

<?php
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];


    Login($email,$pass);

}







?>













        <!-- Login Section Start -->
        <div id="login">
            <div class="container">
                <div class="section-header">
                    <h2>Login</h2>
                    <p>
                        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis, enim at venenatis tincidunt. -->
                    </p>
                </div>
                <div class="row">

                    
                    <div class="col-md-6">
                        <div class="login-form">
                            <form action=""   method="POST">
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <label>Your Email</label>
                                        <input type="email" name="email" class="form-control" required="required" />
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <label>Your Password</label>
                                        <input type="password" name="pass" class="form-control" required="required" />
                                    </div>
                                </div>
                                <div class="button"><button name="login" type="submit">Login</button></div>
                                I Dont Have Account <a href="registration.php">Registration</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Section End -->

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <!-- Footer Section Start -->
        <?php    include('footer.php'); ?>