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
                    <h1>Vendors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Vendors</li>
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
                        <h3 class="card-title">Vendor Information</h3>

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
                                            <label for="inputName">Vendor Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Email Id</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Contact Person</label>
                                            <input type="text" class="form-control" name="contact_person" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputClientCompany">GST No.</label>
                                            <input type="text" class="form-control" name="gst_no" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProjectLeader">Contact No.</label>
                                            <input type="text" class="form-control" name="contact_no" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Address</label>
                                            <textarea class="form-control" rows="3" name="address" wrap="hard" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-secondary">View Vendors</a>
                                <button type="submit" class="btn btn-success float-right" name="submit">Add Vendor</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST['submit'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $contact_person = $_POST['contact_person'];
                                $gst_no = $_POST['gst_no'];
                                $contact_no = $_POST['contact_no'];
                                $address = $_POST['address'];
                                $sql = "INSERT INTO vendors (name,email,contact_no,contact_person,gst_no,address)
                                VALUES ('$name','$email','$contact_no','$contact_person','$gst_no','$address')";
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
