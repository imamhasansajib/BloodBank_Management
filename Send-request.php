<!DOCTYPE html>
<html lang="en">

<head>
    <title>Send Blood Request</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-8 mb-3">Request for blood</h1>

        <!-- Content Row -->
        <form action="Send-request.php" method="post">

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Name<span style="color: red">*</span></div>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required />
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Email<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Gender<span style="color: red">*</span>
                    </div>
                    <div>
                        <select name="gender" class="form-control" required>
                            <option value="select">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Blood Group<span style="color: red">*</span>
                    </div>
                    <div>
                        <select name="bgroup" class="form-control" required>
                            <option value="select">select</option>
                            <?php include("connection.php");
                            $sql = "select bg_name from bloodgroup";
                            $r = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($r)) {
                                $type = $row['bg_name'];
                                echo "<option value='$type'>$type</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Till required date<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="date" name="trd" class="form-control" required />
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Details<span style="color: red">*</span>
                    </div>
                    <div>
                        <textarea rows="4" cols="100" class="form-control" id="message" name="message" required
                            data-validation-required-message="Please enter your message" maxlength="999"
                            style="resize: none"></textarea>
                    </div>
                </div>
            </div>

            <div class="container">&nbsp</div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Units<span style="color: red">*</span></div>
                    <div>
                        <input type="number" name="unit" class="form-control" placeholder="Enter units needed"
                            required />
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div>&nbsp</div>
                    <div>
                        <input type="submit" name="submit" class="btn btn-danger" value="submit"
                            style="cursor: pointer" />
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="container">&nbsp</div>
        </form>
        <!-- /.row -->
    </div>

    <footer class="footer mt-auto py-5 bg-dark">
        <div class="container">
            <span class="text-muted">
                <center>
                    Copyright &copy; BloodBank & Donor Management System 2021
                </center>
            </span>
        </div>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php
include("connection.php");
if (isset($_POST['submit'])) {
    // to receive value from the input fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $trd = $_POST['trd'];
    $message = $_POST['message'];
    $unit = $_POST['unit'];

    // blood group
    $t = $_POST['bgroup'];
    $sql = "select * from bloodgroup where bg_name ='$t'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $b_group = $row[0];


    $query = "insert into request values('$name',  '$gender', '$email', '$b_group', '$trd', '$message', $unit)";
    if (mysqli_query($con, $query)) {
        echo "Successfully inserted!";
    } else {
        echo "error!" . mysqli_error($con);
    }
}
?>