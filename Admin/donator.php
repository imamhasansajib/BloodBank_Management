<?php
session_start();
if ($_SESSION['admin_login_status'] != "logged in" and isset($_SESSION['email']))
    header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
    $_SESSION['admin_login_status'] = "logged out";
    unset($_SESSION["email"]);
    header("Location:../index.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Donators</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h1 class="row">
            <div>&nbsp</div>
            <center>Blood Donators</center>
        </h1></br>
        <table class="table table-dark table-striped table-hover table-borderless mydatatable" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Units</th>
                    <th>Donation date</t </thead>
            <tbody>
                <?php include("../connection.php");
                $result = mysqli_query($con, "select d_id, ddate, units from donation");
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php $a = $row['d_id'];
                            $b = "select name, bg_id, email, gender from donor where d_id = '$a'";
                            $c = mysqli_query($con, $b);
                            $d = mysqli_fetch_array($c);
                            echo $d['name'];
                            ?>
                    </td>
                    <td>
                        <?php echo $d['email']; ?>
                    </td>
                    <td>
                        <?php echo $d['gender']; ?>
                    </td>

                    <td>
                        <?php $q = $d['bg_id'];
                            $r = "select * from bloodgroup where bg_id = '$q'";
                            $s = mysqli_query($con, $r);
                            $t = mysqli_fetch_array($s);
                            echo $t[1]; ?>
                    </td>
                    <td>
                        <?php echo $row['units']; ?>
                    </td>
                    <td>
                        <?php echo $row['ddate']; ?>
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
    <div>&nbsp</div>
    <div>&nbsp</div>

    <footer class="footer mt-auto py-4 bg-dark">
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