<!-- <style media="screen">
  .price-tag{
    display: inline-block;
  }
  .original-price{
    text-decoration: line-through;
  }
</style> -->
<?php
    session_start();
    require 'check_if_added.php';
    require 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
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
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our Store!</h1>
                    <p>Always the most fresh and best.</p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                  <?php
      $sql = "CALL `getproducts`()";
      $result = mysqli_query($con,$sql);
      $resultCheck = mysqli_num_rows($result);
      while ($row = mysqli_fetch_array($result)) {
        $pro_id    = $row['pro_id'];
        $pro_name = $row['pro_name'];
        //$pro_title = $row['product_title'];
        $pro_price = $row['pro_price'];
        $pro_original_price = $row['pro_original_price'];
        $pro_image = $row['pro_image'];
        ?>

                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/<?php echo $pro_image; ?>.jpg" alt="Grocery Item">
                            </a>
                            <center>

                                <div class="caption">
                                    <h4><?php echo $pro_name; ?></h4>



                                    <p>Rs.<?php echo "<strike>$pro_original_price </strike>"."$pro_price"; ?></p>

                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-success btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($pro_id)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=<?php echo $pro_id; ?>" class="btn btn-block btn-success" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>

                                </div>
                            </center>
                        </div>
                    </div>

                  <?php } ?>



                </div>
            </div>
            <br><br><br><br><br><br><br><br>
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
