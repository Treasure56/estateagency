<?php require_once('includes/headertwo.php'); ?>

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Account</h3>
                <p>fill the form below to update account.</p>
            </div>
        </div>
        <div class="row mt-3 mb-4">
            <div class="col-md-4">
                <p>Display Photo</p>
                <img src="includes/dp/<?=$img?>" alt="" width="100" height="100">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/settingssub.php" method="POST" enctype="multipart/form-data"
                >
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
                        <input type="text" class="form-control" name="name" value="<?=$name?>" required id="">

                        <input type="hidden" name="adminid" value="<?=$id?>" id="">
                        <input type="hidden" name="adminid" value="<?=$id?>" id="" class="img">

                    </div>
                    <div class="form-group">
                        <label for="">Phone No</label>
                        <input type="text" class="form-control" name="phone" value="<?=$phone?>" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="<?=$email?>" readonly required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Facebook Link</label>
                        <input type="text" class="form-control" name="fac" required value="<?=$face?>" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Link</label>
                        <input type="text" class="form-control" name="twi" required value="<?=$twit?>" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Instagram Link</label>
                        <input type="text" class="form-control" name="inst" value="<?=$insta?>" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" required id="" cols="30" rows="10" class="form-control"><?=$description?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="file" id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
                </form><br><br>
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