
<!--main head -->
<?php
include 'partials/main_head.php'
?>
<?php
if (!isset($_SESSION['user_id'])){
    header('Location:login.php');
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
<?php

    if (isset($_POST['offer'])){

        $post_id = $_POST['post_id'];
        $user = $_SESSION['user_id'];

        $cofirm = "insert into offer_confirmed(user_id,post_id)VALUES ('$user','$post_id')";
        $check = "select id from offer_confirmed WHERE user_id = '$user'and post_id='$post_id'";
        if(!($connect->query($check)->num_rows > 0)){

            if ($connect->query($cofirm)){
                ?>
                <p class="text-center"> Offer Send </p>
<?php
            }

        }

    }


?>
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php

                $query = "
                SELECT post.id,post.city,post.area,post.discription,post.member_id,post.price,post.address,post.member_id,
                user.user_name ,user.mobile from post JOIN user ON user.id = post.member_id
                 ";

            if($connect->query($query)) {

                $result = $connect->query($query);


                ?>
                <?php
                while ($result2 = $result->fetch_assoc()) {


                    ?>
                    <?php
                    $post_id_1 = $result2['id'];
                    $query_check = "select id from offer_confirmed WHERE post_id = '$post_id_1' and confirm=1 ";

                    if (!($connect->query($query_check)->num_rows > 0)) {

                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p><?php echo "<h3>" . $result2['user_name'] . "" . " <small>" . $result2['city'] . "," . $result2['area'] . "</small></h3>"; ?></p>
                            </div>
                            <div class="panel-body">
                                <div class="">

                                    <label>Address:</label>
                                    <p><?php echo $result2['address']; ?></p>
                                    <label>Discription:</label>
                                    <p> <?php echo $result2['discription']; ?></p>
                                    <label>Price:</label>
                                    <p>  <?php echo $result2['price']; ?></p>
                                    <label>Price:</label>
                                    <p>  <?php echo $result2['mobile']; ?></p>

                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-2">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <input type="text" name="post_id" style="display: none"
                                                   value="<?php echo $result2['id'] ?>">
                                            <input type="submit" name="offer" class="btn btn-primary "
                                                   value="Send Rent Offer">

                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>

    </div>

</div>


<!--main footer-->
<?php
include 'partials/main_footer.php'
?>


