<style media="screen">
  h2{
    padding-left: 500px;
  }
</style>
 <?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("config.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$name=$_REQUEST['first_name'];
$email=$_REQUEST['email'];
$password=md5(md5(mysqli_real_escape_string($link,$_POST['password'])));
$contact=$_REQUEST['phone'];
$city=$_REQUEST['city'];
$address=$_REQUEST['country'];

mysqli_query($link,"insert into users(u_name,email,password,contact,city,address) values ('$name','$email','$password','$contact','$city','$address')")
			or die ("Query 1 is inncorrect........");
echo "<h2>User Added Successfully!</h2>";
mysqli_close($link);
}


?>

      <!-- End Navbar -->
      <div class="content">

        <div class="container-fluid">

          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Users</h4>
                  <p class="card-category">Complete User profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" id="city"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="country" id="country" class="form-control" required>
                        </div>
                      </div>

                    </div>

                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
