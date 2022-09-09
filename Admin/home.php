<?php
session_start();
if ($_SESSION['admin_login_status'] != "logged in" and isset($_SESSION['email']))
    header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
    $_SESSION['admin_login_status'] = "logged out";
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

        <!-- /.row -->
    </div>

    <div class="container">
        <h1 class="my-4">
            <center><b>Welcome to Admin panel</b></center>
        </h1>
    </div>

    <div>&nbsp</div>

    <div class="container">
        <div row>
            <p>
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
            <div class="col-lg-6">
                <h2>Blood Bank:</h2>
                <p>
                    We welcome you to in our WebSite. If you are a donor , We appreciate
                    you signing up online as a Donor. If you need blood we are happy to
                    serve you. This blood donor list is hosted by www.lifesaver.com on
                    behalf of "Life Saver Blood Bank" as a public service without any
                    profit motive.This is a free service. While the Organisers have
                    taken all steps to obtain accurate and up-to-date information of
                    potential blood donors, the Organisers and ICM Computers do not
                    guarantee accuracy of the information contained herein or the
                    suitability of the persons listed as any liability for direct or
                    consequential damage to any person using this blood donor list
                    including loss of life or damage due to infection of any nature
                    arising out of blood transfusion from persons whose names have been
                    listed in this website. We request donors to update contact details
                    regularly.
                </p>
            </div>
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
                <p>
                    blood group of any human being will mainly fall in any one of the
                    following groups.
                </p>
                <ul>
                    <li>A positive or A negative</li>
                    <li>B positive or B negative</li>
                    <li>O positive or O negative</li>
                    <li>AB positive or AB negative.</li>
                </ul>
                <p>
                    A healthy diet helps ensure a successful blood donation, and also
                    makes you feel better! Check out the following recommended foods to
                    eat prior to your donation.
                </p>
            </div>
        </div>
    </div>

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