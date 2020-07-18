<?php
    include 'includes/head.php';
    $vendor_id;
    //if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['vendor_id'])) {
        $vendor_id = $_REQUEST['vendor_id'];
    }
    /*elseif (isset($_POST['vendor_id'])) {
        $GLOBALS['vendor_id'] = $_POST['vendor_id'];
    }*/
    //$referer = $_SERVER['HTTP_REFERER'];
    //echo $referer."<br>";
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

                        <?php
                        $sql = "SELECT * FROM vendors WHERE id='$vendor_id'";
                        $result = mysqli_query($con,$sql);
                        if (mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_assoc($result);
                        }
                        else{
                            echo "No Data Found !";
                        }
                        ?>
                        <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Vendor Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Id</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person</label>
                                        <input type="text" class="form-control" name="contact_person" value="<?php echo $row['contact_person']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gst_no">GST No.</label>
                                        <input type="text" class="form-control" name="gst_no" value="<?php echo $row['gst_no']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_no">Contact No.</label>
                                        <input type="text" class="form-control" name="contact_no" value="<?php echo $row['contact_no']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" rows="3" name="address" wrap="hard"><?php echo $row['address']; ?></textarea>
                                    </div>
                                    <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="vendors.php" class="btn btn-secondary">View Vendors</a>
                            <button type="submit" class="btn btn-success float-right" name="submit">Add Vendor</button>
                        </div>
                        <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset($_POST['submit'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $contact_person = $_POST['contact_person'];
                                $gst_no = $_POST['gst_no'];
                                $contact_no = $_POST['contact_no'];
                                $address = $_POST['address'];
                                $vendor_id = $_POST['vendor_id'];
                                $sql = "UPDATE vendors SET name='$name',email='$email',contact_no='$contact_no',
                                contact_person='$contact_person',gst_no='$gst_no',address='$address' WHERE id='$vendor_id'";
                                if(mysqli_query($con, $sql)) {
                                    echo "<script>alert('Data Updated');</script>";
                                    echo "<script>window.location='editvendor.php?vendor_id={$vendor_id}';</script>";
                                }
                                else{
                                    echo "<script>alert('Error while updating data');</script>";
                                    echo "<script>window.location='editvendor.php?vendor_id={$vendor_id}';</script>";
                                }
                            }
                        }
                     ?>
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
