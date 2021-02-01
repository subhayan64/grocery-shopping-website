
    <?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("config.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$id=$_GET['id'];

/*this is delet query*/
mysqli_query($link,"delete from users_items where cart_id='$id'")or die("delete query is incorrect...");
}



include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th>
                    </tr></thead>
                    <tbody>
                      <?php
                        $result=mysqli_query($link,"select u_name,email,contact,city,address,pro_name,pro_price,cart_id,status from users,items,users_items where users_items.user_id=users.u_id and users_items.item_id=items.pro_id and users_items.status='Confirmed'")or die ("query 1 incorrect.....");


                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck<=0) {
                          echo "no result";
                        }
                        while ($row = mysqli_fetch_array($result)) {
                          $orderid    = $row['cart_id'];
                          $or_name = $row['u_name'];
                          $or_email = $row['email'];
                          $or_contact = $row['contact'];
                          $or_city = $row['city'];
                          $or_address = $row['address'];
                          $orpro_name = $row['pro_name'];
                          $orpro_price = $row['pro_price'];


                        echo "<tr><td>$or_name</td><td>$orpro_name</td><td>$or_email<br>$or_contact</td><td>$or_city<br>$or_address<br></td><td>$orpro_price</td>

                        <td>
                        <a class=' btn btn-danger' href='orders.php?id=$orderid&action=delete'>Delete</a>
                        </td></tr>";
                        }
                        ?>
                    </tbody>
                  </table>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>

        </div>
      </div>
