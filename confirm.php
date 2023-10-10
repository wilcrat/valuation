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
    if (isset($_POST['cancel'])){
        $id_c = $_POST['id_c'];

        $query_d = "delete from offer_confirmed WHERE id='$id_c'";
        if ($connect->query($query_d)){
            ?>
            <p class="well text-center">Offer Deleted</p>
<?php
        }
    }

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php
            $id = $_SESSION['user_id'];

                $query = "
            select post.address,post.price,post.discription,post.member_id,user.mobile,offer_confirmed.confirm,offer_confirmed.id from offer_confirmed 
            JOIN post on post.id = offer_confirmed.post_id JOIN user on user.id = post.member_id WHERE offer_confirmed.user_id = '$id'";

            if($connect->query($query)){

                $result = $connect->query($query);

                while ($result2 = $result->fetch_assoc()) {


                    ?>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>
                                <label>Address :</label>
                                <p><?php echo $result2['address'];?></p>
                                <label>Price:</label>
                                <p><?php echo $result2['price'];?></p>
                                <label>Description:</label>
                                <p><?php echo $result2['discription'];?></p>
                                <label>Mobile:</label>
                                <p><?php echo $result2['mobile'];?></p>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <?php
                                if ($result2['confirm']){
                                    ?>
                                    <h4 class="text-center">Offer Confirmed</h4>
                                    <?php

                                }
                                else{
                                    ?>
                                    <h4 class="text-center">Offer Pending</h4>
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                        <input type="text" name="id_c" value="<?php echo $result2['id'];?>" style="display:none">
                                        <input type="submit" class="btn btn-danger" name="cancel" value="Cancel offer">


                                    </form>
                                    <?php
                                }

                            ?>

                        </div>

                    </div>
                    <?php

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


