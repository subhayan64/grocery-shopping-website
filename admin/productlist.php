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
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($link,"select pro_image from items where pro_id='$product_id'")
or die("query is 1 incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../img/$picture.jpg";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($link,"delete from items where pro_id='$product_id'")or die("query is 2 incorrect...");
}

///pagination


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">


         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>

              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Image</th><th>Name</th><th>Original Price</th><th>Discounted Price</th><th>
	<a class=" btn btn-primary" href="addproduct.php">Add New</a></th></tr></thead>
                    <tbody>
                      <?php

                        $result=mysqli_query($link,"select * from items")or die ("query 1 incorrect.....");

                        while ($row = mysqli_fetch_array($result)) {
                          $product_img=$row['pro_image'];
                          $product_name=$row['pro_name'];
                          $product_ori_price=$row['pro_original_price'];
                          $product_price=$row['pro_price'];
                          $product_id=$row['pro_id'];
                        echo "<tr><td><img src='../img/$product_img.jpg' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                        <td>$product_ori_price</td>
                        <td>$product_price</td>
                        <td>

                        <a class=' btn btn-success' href='productlist.php?product_id=$product_id&action=delete'>Delete</a>
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
