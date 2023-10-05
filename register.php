<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">My Summary</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <div class="mt-5">
        <h3><a href="dashboard.php">Dashboard</a></h3>
        <h3><a href="profile.php">Profile</a></h3>
        <h3><a href="messages.php">Messages</a></h3>
        <h3><a href="">Logout</a></h3>
      </div>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">Estate<span class="color-b">Agency</span></a>


      <!-- <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button> -->

    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Create Account</h3>
                <p>fill the form below to open account.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/registersub.php" method="POST" enctype="multipart/form-data">
                  <?php if(isset($_GET['error'])){ ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button class="btn-close" data-bs-dismiss="alert"></button>
                      <p><?=$_GET['error']; ?></p>
                    </div>
                  <?php } else if(isset($_GET['success'])){ ?>
                    <div class="alert alert-success alert-dismissible">
                      <button class="btn-close" data-bs-dismiss="alert"></button>
                      <p><?=$_GET['success']; ?></p>
                    </div>
                  <?php } ?>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Phone No</label>
                        <input type="phone" class="form-control" name="phone" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Facebook Link</label>
                        <input type="text" class="form-control" name="fac" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Link</label>
                        <input type="text" class="form-control" name="twi" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Instagram Link</label>
                        <input type="text" class="form-control" name="inst" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" required id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="file" required id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
                </form>
                <div>
                    <p>already a member? <a href="login.php" class="text-success">click Here</a> to login</p>
                </div><br><br>
            </div>
        </div>
    </section>
  </main><!-- End #main -->

  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>