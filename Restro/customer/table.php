<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['make'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["order_code"]) || empty($_POST["customer_name"]) || empty($_GET['prod_price'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $order_id = $_POST['order_id'];
        $order_code  = $_POST['order_code'];
        $customer_id = $_SESSION['customer_id'];
        $customer_name = $_POST['customer_name'];
        $prod_id  = $_GET['prod_id'];
        $prod_name = $_GET['prod_name'];
        $prod_price = $_GET['prod_price'];
        $prod_qty = $_POST['prod_qty'];

        //Insert Captured information to a database table
        $postQuery = "INSERT INTO rpos_orders (prod_qty, order_id, order_code, customer_id, customer_name, prod_id, prod_name, prod_price) VALUES(?,?,?,?,?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('ssssssss', $prod_qty, $order_id, $order_code, $customer_id, $customer_name, $prod_id, $prod_name, $prod_price);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Order Submitted" && header("refresh:1; url=payments.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    }
}
require_once('partials/_head.php');
?>

<body>
    <!-- Sidenav -->
    <?php
    require_once('partials/_sidebar.php');
    ?>




    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('partials/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3>Please Fill All Fields</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="table_reservation.php" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <label>Customer Name</label>
                                        <?php
                                        //Load All Customers
                                        $customer_id = $_SESSION['customer_id'];
                                        $ret = "SELECT * FROM  rpos_customers WHERE customer_id = '$customer_id' ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute();
                                        $res = $stmt->get_result();
                                        while ($cust = $res->fetch_object()) {
                                        ?>
                                            <input class="form-control" readonly name="customer_name" value="<?php echo $cust->customer_name; ?>">
                                        <?php } ?>
                                        <input type="hidden" name="order_id" value="<?php echo $orderid; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. of Persons</label>
                                        <input type="text" name="number_of_persons" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Time</label>
                                        <input type="time" name="time" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Budget</label>
                                        <input type="text" name="budget" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Contact No.</label>
                                        <input type="text" name="contact_number" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email Address</label>
                                        <input type="text" name="email_address" class="form-control" value="">
                                    </div>
                                </div>
                                <hr>
                                
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="submit" name="booked" value="Book Table" class="btn btn-success" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>