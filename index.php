<?php
session_start();
// require 'check_if_added.php';
// require 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/lifestyleStore.png" type="image/icon type"/>
        <title>Grocery Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Grocery Store</h1>
                       <p>40% OFF on all products.</p>
                       <a href="products.php" class="btn btn-success">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">

                 <?php
     // $sql = "SELECT DISTINCT pro_category FROM items";
     // $result = mysqli_query($con,$sql);
     // $resultCheck = mysqli_num_rows($result);
     // while ($row = mysqli_fetch_array($result)) {
     //   $pro_cat    = $row['pro_category'];
       ?>




                   <div class="col-xs-4">
                     <form action="categories.php" method="post" id="pulses-submit">
                       <div  class="thumbnail">
                          <a href="javascript: $('#pulses-submit').submit();">

                                <input name = 'search' type="hidden" value = 'pulses'>
                                <img src="img/1611302730_masoor_dal.jpg.jpg" alt="Pulses" >
                          </a>
                          <center>
                                <div class="caption">
                                        <p id="autoResize">Pulses</p>
                                        <p>Choose among the best and most fresh</p>
                                </div>
                          </center>
                       </div>
                       </form>
                   </div>
                     <?php //} ?>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="flour-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#flour-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'flour'>
                                  <img src="img/1611303050_wheat_atta.jpg.jpg" alt="flour" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Flour</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="spices-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#spices-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'spices'>
                                  <img src="img/1611303153_chilli_powder.jpg.jpg" alt="spices" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Spices</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="snacks-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#snacks-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'snacks'>
                                  <img src="img/1611303387_chips_2.jpg.jpg" alt="snacks" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Snacks</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="beverages-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#beverages-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'beverages'>
                                  <img src="img/1611303434_coffee.jpg.jpg" alt="beverages" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Beverages</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="packaged-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#packaged-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'packaged'>
                                  <img src="img/1611303631_ketchup.jpg.jpg" alt="packaged" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Packaged</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="dairy-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#dairy-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'dairy'>
                                  <img src="img/1611303850_milk.jpg.jpg" alt="dairy" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Dairy</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="eggs-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#eggs-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'eggs'>
                                  <img src="img/1611307109_eggs.jpg.jpg" alt="eggs" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Eggs</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="oil-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#oil-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'oil'>
                                  <img src="img/1611307141_refined_oil.jpg.jpg" alt="oil" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Oil</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>

                     <div class="col-xs-4">
                       <form action="categories.php" method="post" id="soap-submit">
                         <div  class="thumbnail">
                            <a href="javascript: $('#soap-submit').submit();">

                                  <input name = 'search' type="hidden" value = 'soap'>
                                  <img src="img/1611307254_shampoo.jpg.jpg" alt="soap" >
                            </a>
                            <center>
                                  <div class="caption">
                                          <p id="autoResize">Soap</p>
                                          <p>Choose among the best and most fresh</p>
                                  </div>
                            </center>
                         </div>
                         </form>
                     </div>




               </div>
           </div>
            <br><br> <br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                 <p>&copy This website is developed by Subhayan & Shanthraj</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
