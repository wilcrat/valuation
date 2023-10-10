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

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php

                $user_id = $_SESSION['user_id'];
                $query = "select * from post WHERE member_id = '$user_id'";
            if($connect->query($query)->num_rows > 0){



                $result = $connect->query($query);


                while ($result2 = $result->fetch_assoc()) {


                    ?>
                    <div class="panel panel-default">

                        <div class="panel-header">
                          <img width=100% src='<?php echo $result2['postimage'] ?>' alt="Image Description">
                        </div>

                        <div class="panel-body">
                            <div class="">

                                <label>Address:</label>
                                <p><?php echo $result2['address']; ?></p>
                                <label>Discription:</label>
                                <p> <?php echo $result2['description']; ?></p>
                                <label>Price:</label>
                                <p>  <?php echo $result2['price']; ?></p>


                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">

                                <div class="col-md-8">
                                    <?php
                                    $post_id = $result2['id'];
                                    $query_confirm = "select id from offer_confirmed WHERE post_id = '$post_id' AND confirm = 1";
                                    if($connect->query($query_confirm)->num_rows > 0){

                                        ?>
                                        <h3>Already rented</h3>

                                        <?php

                                    }else{
                                        ?>
                                        <h3>No one Rented yet</h3>
                                        <a class="btn btn-primary" href="offer.php?id=<?php echo $result2['id']; ?>">See offers</a>
                                        <?php
                                    }

                                    ?>


                                </div>

                            </div>
                        </div>

                    </div>
                    <?php
                }
            }
            else{
                ?>
                <h2 class="text-center alert">No post Yet</h2>
            <?php
            }


            ?>

        </div>

    </div>

</div>


<!--main footer-->
<?php
include 'partials/main_footer.php'
?>


