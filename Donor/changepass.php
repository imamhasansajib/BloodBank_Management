<?php
session_start();
if ($_SESSION['donor_login_status'] != "logged in" and isset($_SESSION['email']))
    header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
    $_SESSION['donor_login_status'] = "logged out";
    unset($_SESSION["email"]);
    header("Location:../index.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div>&nbsp</div>
        <h1 class="row">Change Password</h1></br>
        <form action="changepass.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Old Password<span style="color: red">*</span></div>
                    <div>
                        <input type="password" name="oldpass" class="form-control" placeholder="Enter your old pass" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">New Password<span style="color: red">*</span></div>
                    <div>
                        <input type="password" name="newpass" class="form-control" placeholder="Enter you new pass" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">Confirm Password<span style="color: red">*</span></div>
                    <div>
                        <input type="password" name="repass" class="form-control" placeholder="Repeat your new pass" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div>
                        <input type="submit" name="submit" class="btn btn-success" value="submit"
                            style="cursor: pointer" />
                    </div>
                </div>
            </div>

            <?php if (isset($_POST['submit'])) {
                include("../connection.php");
                $email = $_SESSION['email'];
                $oldpass = $_POST['oldpass'];
                $newpass = $_POST['newpass'];
                $repass = $_POST['repass'];
                if ($newpass == $repass) {
                    $sql = "select pass from donor where pass='$oldpass' and email='$email'";
                    $r = mysqli_query($con, $sql);
                    if (mysqli_num_rows($r) > 0) {
                        $sqli = "update donor set pass='$newpass' where email='$email'";
                        if (mysqli_query($con, $sqli)) {
                            echo "Password changed successfully!";
                        }
                    } else {
                        echo "Old password does not match";
                    }
                } else {
                    echo "New password does not match with confirm password";
                }
            } ?>

            <!-- /.row -->
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
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