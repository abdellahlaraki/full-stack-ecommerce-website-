<?php include "../config.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php
            // $msgS=$_GET["msgS"];
            if (isset($_GET["msgS"])) {
            ?><div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Message!</strong> <?php echo $_GET["msgS"]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php


            } ?>
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $sql = "SELECT SUM(Total_price) as total_earning
                        FROM Orders;";
                        $sql_run = mysqli_query($con, $sql);
                        $fetch_earning = mysqli_fetch_assoc($sql_run);

                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                All Orders Earnings </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$" . $fetch_earning["total_earning"] . ".00"; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $sqlO = "SELECT *
                        FROM Orders;";
                        $sql_runO = mysqli_query($con, $sqlO);
                        $orders = mysqli_num_rows($sql_runO);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Orders </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $orders; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">10%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="40"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <?php
                        $query_A = "SELECT * FROM `Account` ";
                        $execute_A = mysqli_query($con, $query_A);
                        $fetch_A = mysqli_num_rows($execute_A);

                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Clients Account</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fetch_A;
                                                                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


                    <!-- cards -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="margin-top: 30px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Orders List </h6>
                        </div>
                        <div class="card-body">
                            <div style="width: 100%;">
                                <div class="card shadow mb-7 w-100">

                                    <div class="table-responsive w-100">

                                        <?php
                                                    ?>
                                                    <?php


                                                    $query = "SELECT * FROM `Orders` ORDER BY Order_time DESC";
                                                    $execute = mysqli_query($con, $query);
                                                    $check_P = mysqli_num_rows($execute);

                                                    ?>
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>

                                                            <tr>
                                                                <th>#</th>
                                                                <!-- <th>ID Order</th> -->
                                                                <th>UserName</th>
                                                                <th>Adresse</th>
                                                                <th>PhoneNumber</th>
                                                                <th>Country</th>
                                                                <th>City</th>
                                                                <th>Id Product</th>
                                                                <th>Product_Size</th>
                                                                <th>Product_quantity</th>
                                                                <th>Id Clients</th>
                                                                <th>Order_time</th>
                                                                <th>Payement_methode</th>
                                                                <th>Total_price</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $N = 1;
                                                            if ($check_P > 0) {
                                                                while ($row = mysqli_fetch_assoc($execute)) {
                                                            ?>
                                                                    <tr>

                                                                        <td><?php echo $N++; ?></td>

                                                                        <td><?php echo $row["UserName"]; ?></td>
                                                                        <td><?php echo $row["Adresse"]; ?></td>

                                                                        <td><?php echo $row["PhoneNumber"]; ?></td>
                                                                        <td><?php echo $row["Country"]; ?></td>
                                                                        <td><?php echo $row["City"]; ?></td>
                                                                        <td><?php echo $row["Id_client"]; ?></td>
                                                                        <td><?php echo $row["Product_Size"]; ?></td>
                                                                        <td><?php echo $row["Product_quantity"]; ?></td>
                                                                        <td><?php echo $row["ID_Product"]; ?></td>
                                                                        <td><?php echo $row["Order_time"]; ?></td>
                                                                        <td><span style="border: 1px solid green;padding: 5px 20px;border-radius:20px;background-color:green;color:white;"><?php echo $row["Payement_methode"]; ?></span></td>
                                                                        <td><?php echo $row["Total_price"] . "$"; ?></td>
                                                                        <td><a style="text-align: center;color:red;" href="delete_order.php?delete_order=<?php echo $row["Id_order"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                                                    </tr>
                                                        <?php
                                                                }
                                                            }
                                                        
                                                        ?>



                                                        </tbody>
                                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>