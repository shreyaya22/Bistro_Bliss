<?php
session_start();
include('config/config.php');
// include('config/checklogin.php');
// check_login();
// require_once('partials/_head.php');
?>

    <!-- Sidenav -->
    <?php
    // require_once('partials/_sidebar.php');
    $number_of_persons = $_POST["number_of_persons"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $budget = $_POST["budget"];
    $contact_number = $_POST["contact_number"];
    $email_address = $_POST["email_address"];
    $customer_name = $_POST["customer_name"];

    $post_query = "INSERT INTO rpos_table (customer_name, no_of_persons, date, time, budget, table_status) VALUES (?, ?, ?, ?, ?, ?)";
    $post_statement = $mysqli->prepare($post_query);
    $table_status = 1;
    $rc = $post_statement->bind_param('ssssss', $customer_name, $number_of_persons, $date, $time, $budget, $table_status);

    $post_statement->execute();
    if ($post_statement) {
        $success = "Staff Added" && header("refresh:1; url=dashboard.php");
      } else {
        $err = "Please Try Again Or Try Later";
      }

      require_once('partials/_head.php');

    ?>
    
