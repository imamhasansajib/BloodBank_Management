<?php
session_start();
if ($_SESSION['donor_login_status'] != "logged in" and isset($_SESSION['email']))
    header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
    $_SESSION['donor_login_status'] = "logged out";
    unset($_SESSION["email"]);
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blood Donate</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div>&nbsp</div>
        <h1 class="row">Blood Donate</h1></br>
        <form action="donate.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Units<span style="color: red">*</span></div>
                    <div>
                        <input type="number" name="unit" class="form-control" placeholder="Enter number of units" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Donation date<span style="color: red">*</span></div>
                    <div>
                        <input type="date" name="ddate" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Details<span style="color: red">*</span></div>
                    <div>
                        <textarea rows="5" cols="100" class="form-control" id="message" name="detail"
                            placeholder="Please enter your message" maxlength="444" style="resize: none"></textarea>
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
        </form>
    </div>

    <footer class="footer mt-auto py-5 bg-dark">
        <div class="container-fluid">
            <span class="text-muted">
                <center>
                    Copyright &copy; BloodBank & Donor Management System 2021
                </center>
            </span>
        </div>
    </footer>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>

<?php
include("../connection.php");
if (isset($_POST['submit'])) {
    // to receive value from the input fields
    $email = $_SESSION['email'];
    $unit = $_POST['unit'];
    $ddate = $_POST['ddate'];
    $detail = $_POST['detail'];

    // get d_id from donor
    $q = $email;
    $r = "select * from donor where email = '$q'";
    $s = mysqli_query($con, $r);
    $t = mysqli_fetch_array($s);
    $id = $t[0];
    echo $id;

    $query = "insert into donation values('$id', '$ddate', '$unit', '$detail')";
    if (mysqli_query($con, $query)) {
        echo "Successfully inserted!";
    } else {
        echo "error!" . mysqli_error($con);
    }
}
?>