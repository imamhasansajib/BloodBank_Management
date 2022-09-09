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
    <title>Update Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>
    <?php include("../connection.php");
    $email = $_SESSION['email'];
    $sql = "select name,address,pic,mobile,dob,gender from donor where email='$email'";
    $r = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($r);
    $name = $row['name'];
    $pic = $row['pic'];
    $mobile = $row['mobile'];
    $address = $row['address'];
    $gender = $row['gender'];
    $dob = $row['dob']; ?>

    <div class="container">
        <div>&nbsp</div>
        <h1 class="row">Update Profile</h1>
        <div>&nbsp</div>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="font-italic">Name<span style="color: red">*</span></div>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="<?php echo "$name"; ?>" />
                    </div>
                </div>
                <div class=" col-lg-5 mb-4">
                    <div class="font-italic">
                        Mobile<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="tel" name="mobile" class="form-control" placeholder="<?php echo "$mobile"; ?>" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="font-italic">Date of birth<span style="color: red">*</span></div>
                    <div>
                        <input type="text" name="dob" class="form-control" placeholder="<?php echo "$dob"; ?>" />
                    </div>
                </div>
                <div class="col-lg-5 mb-4">
                    <div class="font-italic">
                        Gender<span style="color: red">*</span>
                    </div>
                    <div>
                        <select name="gender" class="form-control">
                            <option value="$gender"><?php echo "$gender"; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div class="font-italic">Picture<span style="color: red">*</span></div>
                    <div>
                        <?php echo "<div class='img' style='height:280px;'><img src='../image/$pic' height='270px' width='300px'></div>"; ?>
                        <input type="file" name="pic" class="form-control" />
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <div class="font-italic"></span></div>
                    <div>
                    </div>
                </div>
                <div class="col-lg-5 mb-4">
                    <div class="font-italic">
                        Address<span style="color: red">*</span>
                    </div>
                    <div>
                        <input type="text" name="address" class="form-control"
                            placeholder="<?php echo "$address"; ?>" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div>
                        <input type="submit" name="submit" class="btn btn-primary" value="update"
                            style="cursor: pointer" />
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </form>
    </div>

    <footer class="footer mt-auto py-3 bg-dark">
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
if (isset($_POST['submit'])) {
    // to receive value from the input fields
    $nname = $_POST['name'];
    $ndob = $_POST['dob'];
    $ngender = $_POST['gender'];
    $nmobile = $_POST['mobile'];
    $naddress = $_POST['address'];

    // image upload code
    $ext = explode(".", $_FILES['pic']['name']);
    $c = count($ext);
    $ext = $ext[$c - 1];
    $date = date("D:M:Y");
    $time = date("h:i:s");
    $image_name = md5($date . $time . $nmobile);
    $npic = $image_name . "." . $ext;

    $query = "update donor set name='$nname', dob='$ndob', gender='$ngender', mobile='$nmobile', address='$naddress', pic='$npic' where email='$email'";
    if (mysqli_query($con, $query)) {
        echo "Successfully updated!";
        if ($npic != null) {
            move_uploaded_file($_FILES['pic']['tmp_name'], "../Image/$npic");
        }
    } else {
        echo "error!" . mysqli_error($con);
    }
}
?>