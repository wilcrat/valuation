<!--main head -->
<?php
    include 'partials/main_head.php'
?>
<?php
if (isset($_SESSION['user_id'])){
    header('Location:main.php');
}

?>

<!--  adding title -->

<title>Welcome to Rent house Website</title>


<!--middle footer-->
<?php
    include "partials/main_head_middle.php";

?>

<!--navigation bar-->

<?php

    include 'partials/navigation.php'

?>
<div style="background-image: url(img/rent1.jpeg) ;
background-repeat: no-repeat;
background-position: center;
background-size: 100%;
height: 90vh;
margin-top: -20px;



">


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <h1 style="color: rebeccapurple;opacity: .6;font-size: 350%">Want To Rent A House?</h1>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <h1 style="color: white;opacity: .8;font-size: 350%">Or Rent  Your house</h1>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <h1 style="color: red;opacity: .6;font-size: 350%">@HouseRent.com</h1>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <h1 style="color: red;font-size: 350%">Login Or SignUp Now!!!</h1>

            </div>

        </div>


        <div class="row" style="margin-top: 10%">

            <div class="col-md-3 col-md-offset-3">
                <a href="login.php" class="btn btn-info btn-block  btn-lg" style="opacity: .7">Login</a>

            </div>
            <div class="col-md-3 ">
                <a href="login.php" class="btn btn-success btn-block btn-lg" style="opacity: .7">Register</a>

            </div>

        </div>


    </div>
</div>


<!--main footer-->
<?php
    include 'partials/main_footer.php'
?>


