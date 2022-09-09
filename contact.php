<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact us</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
  </head>

  <body>
    <?php include('navbar.php');?>

    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact us</h1>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <form action="contact.php" name="sentMessage" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="fullname"
                  placeholder="Enter your name"
                  required
                  data-validation-required-message="Please enter your name."
                />
                <p class="help-block"></p>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email id"
                  required
                  data-validation-required-message="Please enter your email address."
                />
              </div>
            </div>
            <div class="container">&nbsp</div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea
                  rows="5"
                  cols="100"
                  class="form-control"
                  id="message"
                  name="message"
                  required
                  data-validation-required-message="Please enter your message"
                  maxlength="999"
                  style="resize: none"
                ></textarea>
              </div>
            </div>
            <div class="container">&nbsp</div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" name="send" class="btn btn-primary">
              Send Message
            </button>
          </form>
        </div>

        <div class="container">&nbsp</div>

        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container-fluid">
                <span class="text-muted">
                <center>
                Copyright &copy; BloodBank & Donor Management System 2021
                </center></span
                >
            </div>
        </footer>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
include ("connection.php");
if(isset($_POST['send']))
{
  // to receive value from the input fields
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $message = $_POST['message'];

    $query = "insert into contact values('$name', '$email', '$message')";
    if(mysqli_query($con, $query))
    {
      echo "Successfully inserted!";
    }
    else
    {
      echo "error!".mysqli_error($con);
    }
}
?>


