<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));


        $user_products_query="select it.pro_id,it.pro_name,it.pro_price from users_items ut inner join items it on it.pro_id=ut.item_id where ut.user_id='$user_id' and status='Confirmed'";
        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
        $no_of_user_products= mysqli_num_rows($user_products_result);

    }
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
            <br>
            <div class="container">
              <h3>Order summary...</h3>
              <div class="row">
                <div class="col-xs-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Item Number</th><th>Item Name</th><th>Price</th>
                        </tr>
                       <?php
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){

                         ?>
                        <tr>
                            <th><?php echo $counter ?></th><th><?php echo $row['pro_name']?></th><th><?php echo $row['pro_price']?></th>

                        </tr>
                       <?php $counter=$counter+1;}?>

                    </tbody>
                </table>
                </div>
              </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
