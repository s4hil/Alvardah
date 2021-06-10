<?php

  if (isset($_POST['place'])) {
    
    require_once './admin/phpStuff/db_connection.php';
    require_once './admin/phpStuff/telegramAPI.php';
    require_once './admin/phpStuff/coreFunctions.php';

    // Generate order id
    $oid = str_shuffle($first = rand(100,499) . $second = rand(500,999));


    //  c = customer, p = product

    $pId = mysqli_real_escape_string($conn, $_POST['productid']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $pName = mysqli_real_escape_string($conn, $_POST['pName']);
    $cName = mysqli_real_escape_string($conn, $_POST['cName']);
    $cAddress = mysqli_real_escape_string($conn, $_POST['cAddress']);
    $cSize = mysqli_real_escape_string($conn, $_POST['cSize']);
    $cNumber = mysqli_real_escape_string($conn, $_POST['cNumber']);
    $cEmail = mysqli_real_escape_string($conn, $_POST['cEmail']);
    $status = "Placed";


    $sql = "INSERT INTO `orders` (`orderid`, `productid`, `date`, `product`, `customer`, `size`, `address`, `number`, `email`, `status`) VALUES ('$oid','$pId','$date','$pName','$cName','$cSize','$cAddress','$cNumber','$cEmail','$status')";

    $query = mysqli_query($conn, $sql);

    if ($query) { 

      $msg = "$cName has just placed an order.";
      $message = $msg;

      mailAdmin("New Order", $message);
      sendTelegramMessage($chatid, $msg , $token);

      $confirmationMsg = "Dear $cName, The order has been placed successfully, you can track it from our website. Order Id is: $oid";
      mail($cEmail, "Alvardah Order", $confirmationMsg);


      ?>


      <div class='alert'>Thank You For Shopping With Us,You will receive a mail once the order is placed.<br> 
        Your Order ID is: <?php echo $oid; ?>
        <br><br> <a href='index.php' class='home-btn'>Return Home</a></div>


      <?php
    }

  }

?>
<style type="text/css">
  .alert {
    font: normal larger sans-serif;
    height: 200px;
    width: 400px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f1f1f1;
    box-shadow: 9px 5px 6px grey; 
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .home-btn {
    padding: 8px;
    font-size: larger;
    text-decoration: none;
    color: white;
    background-color: #38c8a8;
    border-radius: 10px;
  }

  @media only screen and (max-width: 768px){
    .alert {
      width: 80%;
    }
  }

</style>