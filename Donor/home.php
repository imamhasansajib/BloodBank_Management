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
    <title>Home</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <!-- Page Heading/Breadcrumbs -->
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../banner2.jpg" class="d-block w-100" width="400" height="400" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="../banner1.jpg" class="d-block w-100" width="400" height="400" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="../banner3.png" class="d-block w-100" width="400" height="400" alt="..." />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <h1 class="my-4">
                <?php
                include("../connection.php");
                $email = $_SESSION['email'];
                $sql = "select name,address,pic,mobile,dob,gender,bg_id from donor where email='$email'";
                $r = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($r);
                $name = $row['name'];
                $pic = $row['pic'];
                $mobile = $row['mobile'];
                $address = $row['address'];
                $gender = $row['gender'];
                $dob = $row['dob'];
                $bg_id = $row['bg_id'];

                //blood group
                $sql_bg = "select bg_name from bloodgroup where bg_id='$bg_id'";
                $r_bg  = mysqli_query($con, $sql_bg);
                $row_bg = mysqli_fetch_assoc($r_bg);
                $bg_name = $row_bg['bg_name'];
                ?>
                <center><b><i>Welcome,</i> <?php echo "<i>$name</i>" ?></b></center>
            </h1>
        </div>

        <div>&nbsp</div>

        <div class="container">
            <div class="row">
                <p style="text-align: justify; text-justify: inter-word;">
                    <b>
                        Blood is universally recognized as the most precious element that
                        sustains life. It saves innumerable lives across the world in a
                        variety of conditions. The need for blood is great on any given day,
                        approximately 39,000 units of Red Blood Cells are needed. More than
                        29 million units of blood components are transfused every year.
                        Donate Blood Despite the increase in the number of donors, blood
                        remains in short supply during emergencies, mainly attributed to the
                        lack of information and accessibility. We positively believe this
                        tool can overcome most of these challenges by effectively connecting
                        the blood donors with the blood recipients.
                    </b>
                </p>
            </div>
        </div>

        <div>&nbsp</div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2>BLOOD BANK:</h2>
                    <p style="text-align: justify; text-justify: inter-word;">
                        We welcome you to in our WebSite. If you need blood we are happy to
                        serve you. This blood donor list is hosted on
                        behalf of "Life Saver Blood Bank" as a public service without any
                        profit motive.This is a free service. While the Organizers have
                        taken all steps to obtain accurate and up-to-date information of
                        potential blood donors, the Organizers and Computers do not
                        guarantee accuracy of the information contained herein or the
                        suitability of the persons listed as any liability for direct or
                        consequential damage to any person using this blood donor list
                        including loss of life or damage due to infection of any nature
                        arising out of blood transfusion from persons whose names have been
                        listed in this website. We request donors to update contact details
                        regularly.
                        We welcome you to in our WebSite. If you need blood we are happy to
                        serve you. This blood donor list is hosted on
                        behalf of "Life Saver Blood Bank" as a public service without any
                        profit motive.This is a free service. While the Organizers have
                        taken all steps to obtain accurate and up-to-date information of
                        potential blood donors, the Organizers and Computers do not
                        guarantee accuracy of the information contained herein or the
                        suitability of the persons listed as any liability for direct or
                        consequential damage to any person using this blood donor list
                        including loss of life or damage due to infection of any nature
                        arising out of blood transfusion from persons whose names have been
                        listed in this website. We request donors to update contact details
                        regularly.
                        We welcome you to in our WebSite. If you need blood we are happy to
                        serve you. This blood donor list is hosted on
                        behalf of "Life Saver Blood Bank" as a public service without any
                        profit motive.This is a free service. While the Organizers have
                        taken all steps to obtain accurate and up-to-date information of
                        potential blood donors, the Organizers and Computers do not
                        guarantee accuracy of the information contained herein or the
                        suitability of the persons listed as any liability for direct or
                        consequential damage to any person using this blood donor list
                        including loss of life or damage due to infection of any nature
                        arising out of blood transfusion from persons whose names have been
                        listed in this website. We request donors to update contact details
                        regularly.
                    </p>
                </div>
                <div class="col-lg-3">
                    <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ABOUT ME</h2>

                    <div>
                        <?php
                        echo "<div class='img' style='height:280px;'><img src='../image/$pic' height='270px' width='300px'></div>";
                        echo "<p><b>NAME: <i>$name</i></b></br><b>BLOOD GROUP: <i>$bg_name</i></b></br><b>GENDER: <i>$gender</i></b></br><b>DATE OF BIRTH: <i>$dob</i></b></br><b>MOBILE NO.: <i>$mobile</i></b></br><b>ADDRESS: <i>$address</i></b></br></p>";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>

    <div class="container">&nbsp</div>

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