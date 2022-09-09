<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <div class="container">&nbsp</div>
    <div class="container">&nbsp</div>
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Login&nbsp/&nbsp<a href="signup.php">signup</a>&nbsp/&nbsp<a href="index.php">Home</a>
        </h1>


        <!-- Content Row -->
        <form action="login.php" method="post">
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Email<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="email" name="emailid" class="form-control" placeholder="Enter your email"
                            required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="font-italic">
                        Password<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="password" name="pwd" class="form-control" placeholder="Enter your password"
                            required />
                    </div>
                </div>
            </div>

            <div class="container">&nbsp</div>

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
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
            <div class="container">&nbsp</div>
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
    $emailid = $_POST['emailid'];
    $pwd = $_POST['pwd'];

    $sql = "select email, pass from donor where email='$emailid' and pass='$pwd'";
    $sqll = "select email, pass from admin where email='$emailid' and pass='$pwd'";

    $r = mysqli_query($con, $sql);
    $rl = mysqli_query($con, $sqll);

    if (mysqli_num_rows($r) > 0) {
        $_SESSION['email'] = $emailid;
        $_SESSION['donor_login_status'] = "logged in";
        header("Location:donor/home.php");
    } else if (mysqli_num_rows($rl) > 0) {
        $_SESSION['email'] = $emailid;
        $_SESSION['admin_login_status'] = "logged in";
        header("Location:admin/home.php");
    } else {
        echo "<p style='color:red;'> Incorrect Email or Password</p>";
    }
}
?>