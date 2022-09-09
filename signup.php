<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donor Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Donor <small>Registration</small></h1>

        <!-- Content Row -->
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">Name<span style="color: red">*</span></div>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required />
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Email<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="email" name="emailid" class="form-control" placeholder="Enter your email"
                            required />
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Date of Birth<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="date" name="dob" class="form-control" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Password<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="password" name="pwd" class="form-control" placeholder="Enter your password"
                            required />
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Confirm Password<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="password" name="rpwd" class="form-control" placeholder="Repeat your password"
                            required />
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
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
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
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

                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Picture<span style="color: red">*</span>
                    </div>
                    <div><input type="file" name="pic" class="form-control" /></div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Mobile No.<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="tel" name="mobile" class="form-control" placeholder="Enter your mobile no."
                            required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="font-italic">
                        Address<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="text" name="Address" class="form-control" placeholder="Enter your address"
                            required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div>
                        <input type="submit" name="submit" class="btn btn-primary" value="submit"
                            style="cursor: pointer" />
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
        </form>
        <!-- /.row -->
    </div>

    </footer>
    <footer class="footer mt-auto py-5 bg-dark">
        <div class="container">
            <span class="text-muted">
                <center>Copyright &copy; BloodBank & Donor Management System 2021</center>
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
    $email = $_POST['emailid'];
    $pass = $_POST['pwd'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['Address'];

    // blood group
    $t = $_POST['bgroup'];
    $sql = "select * from bloodgroup where bg_name ='$t'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $b_group = $row[0];

    // donor id generation
    $num = rand(1, 100);
    // echo $num;
    $donorID = "d-" . $num;

    // image upload code
    $ext = explode(".", $_FILES['pic']['name']);
    $c = count($ext);
    $ext = $ext[$c - 1];
    $date = date("D:M:Y");
    $time = date("h:i:s");
    $image_name = md5($date . $time . $donorID);
    $pic = $image_name . "." . $ext;

    // password check
    if ($_POST["pwd"] == $_POST["rpwd"]) {
        // success
        $query = "insert into donor values('$donorID', '$name', '$email', '$dob', '$pass', '$gender', '$b_group', '$pic', '$mobile', '$address')";
        if (mysqli_query($con, $query)) {
            echo "Successfully inserted!";
            if ($pic != null) {
                move_uploaded_file($_FILES['pic']['tmp_name'], "Image/$pic");
            }
        } else {
            echo "error!" . mysqli_error($con);
        }
    } else {
        echo "Passwords doesn't match";
    }
}
?>