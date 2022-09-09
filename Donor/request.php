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
    <title>Blood Requests</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h1 class="row">
            <div>&nbsp</div>
            <center>Request of Blood</center>
        </h1></br>
        <table class="table table-dark table-striped table-hover table-borderless mydatatable" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Units</th>
                    <th>Till Required date</t </thead>
            <tbody>
                <?php include("../connection.php");
                $result = mysqli_query($con, "select name, email, gender, bg_id, req_date, unit from request");
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['gender']; ?>
                    </td>

                    <td>
                        <?php $q = $row['bg_id'];
                            $r = "select * from bloodgroup where bg_id = '$q'";
                            $s = mysqli_query($con, $r);
                            $t = mysqli_fetch_array($s);
                            echo $t[1]; ?>
                    </td>
                    <td>
                        <?php echo $row['unit']; ?>
                    </td>
                    <td>
                        <?php echo $row['req_date']; ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>&nbsp</div>
    <div>&nbsp</div>
    <div>&nbsp</div>
    <div>&nbsp</div>
    <div>&nbsp</div>


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