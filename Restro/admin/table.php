<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

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
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <label>Customer Name</label>
                                        
                                        <input type="text" name="customer_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. of Persons</label>
                                        <input type="text" name="number_of_persons"  class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Date</label>
                                        <input type="date"name="date" class="form-control" value="">
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
                                        <input type="submit" name="" value="Book Table" class="btn btn-success" value="">
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