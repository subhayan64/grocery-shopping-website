
    <?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("config.php");
$user_id=$_REQUEST['user_id'];

$result=mysqli_query($link,"select u_name,email,password from users where u_id='$user_id'")or die ("query 1 incorrect.......");

list($user_name,$user_email,$user_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save']))
{

$user_name=$_POST['first_name'];
$user_email=$_POST['email'];
$user_password=$_POST['password'];

mysqli_query($link,"update users set u_name='$user_name', email='$user_email', password='$user_password' where u_id='$user_id'")or die("Query 2 is inncorrect..........");

header("location: manageuser.php");
mysqli_close($link);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit User</h5>
              </div>
              <form action="edituser.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">

                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $u_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="first_name" name="first_name"  class="form-control" value="<?php echo $user_name; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email"  id="email" name="email" class="form-control" value="<?php echo $user_email; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Password</label>
                        <input type="text" name="password" id="password" class="form-control" value="<?php echo $user_password; ?>">
                      </div>
                    </div>




              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>
            </div>
          </div>


        </div>
      </div>
