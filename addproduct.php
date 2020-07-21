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
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active">Add New</li>
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
                        <h3 class="card-title">Product detail</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <form  action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Product Name</label>
                                            <input type="text" class="form-control" name="p_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Product Group</label>
                                            <select class="form-control id="p_group" name="p_group">
                                              <option> select</option>
                                              <?php
                                                $group = "SELECT title from product_group";
                                                $result = mysqli_query($con, $group);
                                                $num_results = mysqli_num_rows($result);
                                                for ($i=0;$i<$num_results;$i++) {
                                                  $row = mysqli_fetch_array($result);
                                                  $title = $row['title'];
                                                  echo '<option value="' .$title. '">' .$title. '</option>';
                                                }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Product Type</label>
                                            <select class="form-control id="p_group" name="p_group">
                                              <option> select</option>
                                              <?php
                                                $group = "SELECT title from product_type";
                                                $result = mysqli_query($con, $group);
                                                $num_results = mysqli_num_rows($result);
                                                for ($i=0;$i<$num_results;$i++) {
                                                  $row = mysqli_fetch_array($result);
                                                  $title = $row['title'];
                                                  echo '<option value="' .$title. '">' .$title. '</option>';
                                                }
                                              ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="products.php" class="btn btn-secondary">View Products</a>
                                <button type="submit" class="btn btn-success float-right" name="submit"> Add </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>

                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST['submit'])){
                                $p_name = $_POST['p_name'];
                                $p_group = $_POST['p_group'];
                                $p_type = $_POST['p_type'];
                                $sql = "INSERT INTO products (name,product_group,product_type)
                                VALUES ('$p_name','$p_group','$p_type')";
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
