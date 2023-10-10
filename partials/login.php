<?php
if (isset($_SESSION['user_id'])){
    header('Location:main.php');
}

?>
<?php
    if (isset($_POST['login'])){

        $username = trim($_POST['username']);
        $pass = trim($_POST['password']);


        if (!empty($username) && !empty($pass)){
            $query = "select id, is_admin from user where user_name = '$username' and pass = '$pass'";

            if($result = $connect->query($query)){
                $result2 = $result->fetch_assoc();
        
                if ($result2 && $result2['is_admin'] == 1) {
                    // If the user is an admin, redirect to admin.php
                    $_SESSION['user_id'] = $result2['id'];
                    $_SESSION['admin'] = $result2['is_admin'];
                    $_SESSION['login'] = true;
                    header('Location: admin.php');
                } else {
                    // If it's a normal user, redirect to main.php
                    $_SESSION['user_id'] = $result2['id'];
                    $_SESSION['admin'] = $result2['is_admin'];
                    $_SESSION['login'] = true;
                    header('Location: main.php');
                }
            }
        }


    }



?>
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" style=" background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;">
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username"  placeholder="Enter username">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>






                    <div style="margin-top:10px" class="form-group ">
                        <!-- Button -->


                        <input type="submit" name="login" value="Login" class="form-control col-md-12 btn btn-success">
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account!
                                <a href="register.php" >
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>

</div>
