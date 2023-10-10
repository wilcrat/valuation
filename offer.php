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

                if (isset($_POST['request'])){
                    $id = $_POST['id'];
                    $query_c  = "update offer_confirmed set confirm = 1 WHERE id = '$id'";
                    if ($connect->query($query_c)){

                        header('Location:post.php');

                    }
                }

            ?>


<?php

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "select user.name,user.mobile,offer_confirmed.id from  offer_confirmed JOIN user on offer_confirmed.user_id = user.id WHERE post_id = '$id'";

        if($connect->query($query)){

            echo "1";
            $result = $connect->query($query);

            while ($result2 = $result->fetch_assoc()){

                ?>

<div class="panel panel-default">

    <div class="panel-body">
        <div class="">

            <label>Name of Request Person:</label>
            <p><?php echo $result2['name']; ?></p>
            <label>Number:</label>
            <p> <?php echo $result2['mobile']; ?></p>



        </div>

    </div>
    <div class="panel-footer">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="id" style="display: none" value="<?php echo $result2['id']; ?>">

            <input type="submit" class="btn btn-primary" name="request" value="Confirm Request">

        </form>


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


