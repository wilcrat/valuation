<?php
if (isset($_SESSION['user_id'])){
    header('Location:main.php');
}

?>

<?php

if (isset($_POST['register'])){
    $fname = trim($_POST['first_name']);
    $user_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $copass = trim($_POST['cpassword']);
    $mobile = trim($_POST['mobile']);

    if (!empty($fname)&&!empty($user_name)&&!empty($email)&&!empty($pass)&&!empty($copass)&&!empty($mobile)){

        if ($pass == $copass){

            $query = "insert into user(user_name,pass,email,name,mobile)VALUES ('$user_name','$pass','$email','$fname','$mobile')";
            if ($connect->query($query)){
                ?>

                <p class="well alert alert-success text-center">Your are registered!you can login now</p>

                <?php
            }


        }
    }


}



?>

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Please sign up<small>It's free!</small></h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="user name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="cpassword" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" id="mobile" class="form-control input-sm" placeholder="Mobile number">
                        </div>

                        <input type="submit" value="Register" class="btn btn-info btn-block" name="register">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>