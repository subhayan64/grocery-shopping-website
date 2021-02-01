  <?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("config.php");


if(isset($_POST['btn_save']))
{
$product_name=$_REQUEST['product_name'];
$price=$_REQUEST['price'];

$product_type=$_REQUEST['product_type'];



//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
echo $picture_type;
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];


	if($picture_size<=50000000)
{
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../img/".$pic_name.".jpg");

mysqli_query($link,"insert into items (pro_name,pro_original_price,pro_image,pro_category) values ('$product_name','$price','$pic_name','$product_type')") or die ("query incorrect");
}



mysqli_close($link);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">


         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>



              </div>

            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <input type="text" id="product_type" name="product_type" required class="form-control">
                      </div>
                    </div>
                  </div>

              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>

        </div>
         </form>

        </div>
      </div>
