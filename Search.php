<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Donor</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Search <small>Donor</small></h1>

        <!-- Content Row -->
        <form action="search.php" name="donar" method="post">
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
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div>
                        <input type="submit" name="submit" class="btn btn-primary" value="submit"
                            style="cursor: pointer" />
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </form>
    </div>

    <div class="container">
        <h1 class="row">
            <center>Donors</center>
        </h1></br>
        <table class="table table-dark table-striped table-hover table-bordered mydatatable" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
            <tbody>
                <?php if (isset($_POST['submit'])) {
                    $q = $_POST['bgroup'];
                    $r = "select * from bloodgroup where bg_name = '$q'";
                    $s = mysqli_query($con, $r);
                    $t = mysqli_fetch_array($s);
                    $bg = $t[0];

                    $result = mysqli_query($con, "select name, email, gender from donor where bg_id='$bg'");
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
                        <?php echo $q; ?>
                    </td>
                </tr>
                <?php
                    }
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