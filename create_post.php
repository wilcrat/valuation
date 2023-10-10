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

// Check if the form for posting is submitted
if (isset($_POST['rent'])) {
    $member_id = $_SESSION['user_id'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $price = $_POST['price'];

    if (!empty($address) && !empty($description) && !empty($city) && !empty($area) && !empty($price)) {

        // Check if an image was uploaded
        if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['postImage']['name'];
            $file_tmp = $_FILES['postImage']['tmp_name'];

            // Move the uploaded file to a desired location
            $upload_dir = 'uploads/'; // Create this directory if it doesn't exist
            $target_file = $upload_dir . $file_name;

            if (move_uploaded_file($file_tmp, $target_file)) {
                // The file has been successfully uploaded
                $query = "INSERT INTO `post` (`member_id`, `city`, `area`, `description`, `price`, `address`, `postimage`) VALUES ('$member_id', '$city', '$area', '$description', '$price', '$address', '$target_file')";

                if ($connect->query($query)) {
                    echo '<p class="well text-center">Successfully Posted</p>';
                } else {
                    echo '<p class="well text-center">Error: ' . $connect->error . '</p>';
                }
            } else {
                echo '<p class="well text-center">Error uploading the image</p>';
            }
        } else {
            echo '<p class="well text-center">Please select an image to upload</p>';
        }
    } else {
        echo '<p class="well text-center">Please fill in all fields</p>';
    }
}
?>

<div class="container">
    <h1 class="well text-center">Rent House Form</h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Address</label>
                            <input type="text" placeholder="Enter you House Address" class="form-control" name="address">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea placeholder="Enter Your House Description" rows="3" class="form-control" name="description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>City</label>
                            <input type="text" placeholder="Enter City Name Here.." class="form-control" name="city">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Area</label>
                            <input type="text" placeholder="Enter Area name here" class="form-control" name="area">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Price</label>
                            <input type="text" placeholder="Enter your expected price" class="form-control" name="price">
                        </div>
                    </div>

          <div class="row">
            <div class="col-sm-4 form-group">
              <label for="image">Upload Image</label>
              <input type="file" class="form-control" name="postImage">
            </div>
          </div>






                    <input type="submit" name="rent" value="Submit" class="btn btn-lg btn-info btn-block">
                </div>
            </form>
        </div>
    </div>
</div>


<!--main footer-->
<?php
include 'partials/main_footer.php'
?>


