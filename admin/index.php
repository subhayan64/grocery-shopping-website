
  <?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("config.php");

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		<a>
            <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
            }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Contact</th><th>City</th><th>Address</th>
                    </tr></thead>
                    <tbody>
                      <?php
                        $result=mysqli_query($link,"select * from users")or die ("query 1 incorrect.....");

                        while($row=mysqli_fetch_array($result))
                        {
                          $id=$row['u_id'];
                          $name=$row['u_name'];
                          $email=$row['email'];
                          $password=$row['password'];
                          $contact=$row['contact'];
                          $city=$row['city'];
                          $address=$row['address'];
                        echo "<tr><td>$id</td><td>$name</td><td>$email</td><td>$password</td><td>$contact</td><td>$city</td><td>$address</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           <div class="row">

      <?php
?>
