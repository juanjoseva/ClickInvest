<?php
/**
 * Created by PhpStorm.
 * User: Juan Jose Vazquez
 * Date: 5/17/2017
 * Time: 10:09 PM
 */

      //Email information
      $admin_email = "rre@rreassets.com";
      $firstName = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $company = $_POST['company'];
      $email = $_POST['email'];
      $phone = $_POST['phoneNumber'];
      $interested = $_POST['interested'];
      $comment = $_REQUEST['message'];

      //send email
    $mensaje = "First Name: " . $firstName . '<br />' .
                "Last Name: " . $lastname . '<br />' .
                "Company: " . $company . '<br />' .
                "Email: " . $email . '<br />' .
                "Phone: " . $phone . '<br />' .
                "interested: " . $interested . '<br />' .
                "Question/Comment: " . $comment;


        //headers
$headers = "From: website@clickinvest.com";
//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "CC: juanjoseva@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


      mail($admin_email, "New Message from website", $mensaje, $headers);

header("Location: ../index.html");