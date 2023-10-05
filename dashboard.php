<?php require_once('includes/headertwo.php'); ?>

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Create Property</h3>
                <p>fill the form below to create a post.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/create.php" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="name" id="">
                        <input type="hidden" name="adminid" value="<?=$id?>">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" class="form-control" name="location" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Property Type</label>
                        <input type="text" class="form-control" name="type" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="Sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Area</label>
                        <input type="text" class="form-control" name="area" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Bed</label>
                        <input type="text" class="form-control" name="bed" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Bath</label>
                        <input type="text" class="form-control" name="bath" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Garage</label>
                        <input type="text" class="form-control" name="garage" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="file" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="create">submit</button>
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