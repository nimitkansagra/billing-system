<?php
include 'includes/head.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Add New Type</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Product Type</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <form  action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputName">Product Type</label>
                                            <input type="text" class="form-control" name="type" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="viewproducttype.php" class="btn btn-secondary">View Products Type</a>
                                <button type="submit" class="btn btn-success float-right" name="submit">Add Type</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST['submit'])){
                                $type = $_POST['type'];
                                $sql = "INSERT INTO product_type (title) VALUES ('$type')";
                                //echo $sql;
                                if(mysqli_query($con, $sql)) {
                                    echo "<script>alert('Data Inserted');</script>";
                                }
                                else{
                                    echo "<script>alert('Error while inserting data');</script>";
                                }
                            }
                        }
                     ?>
                    <!-- /.card -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- main footer -->
        <?php include 'includes/foot.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>
</html>
