<?php 
require_once('includes/connection.php');

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM properties WHERE id = '$pid'";
    $res = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_assoc($res);
    $pid = $rows['id'];
    $pname = $rows['name'];
    $pimg = $rows['img'];
    $pprice = $rows['price'];
    $parea = $rows['area'];
    $pbed = $rows['bed'];
    $pbath = $rows['bath'];
    $pgarage = $rows['garage'];
    $ptype = $rows['ptype'];
    $plocation = $rows['location'];
    $pdescription = $rows['description'];
    $pstatus = $rows['status'];
   
  }else{
    header('Location: menu.php');
    return false;
  }

require_once('includes/headertwo.php');


?>

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Property</h3>
                <p>fill the form below to edit a post.</p>
            </div>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-md-4">
                <p>Display Photo</p>
                <img src="includes/post/<?=$pimg?>" alt="" width="100" height="100">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/editsub.php" method="POST" enctype="multipart/form-data">

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
                        <input type="text" class="form-control" name="name" id="" value="<?=$pname?>">

                        <input type="hidden" name="pid" value="<?=$pid?>" id="">
                        <input type="hidden" name="img" value="<?=$img?>" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" class="form-control" name="location" id="" value="<?=$plocation?>">
                    </div>
                    <div class="form-group">
                        <label for="">Property Type</label>
                        <input type="text" class="form-control" name="type" id="" value="<?=$ptype?>">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="" value="<?=$pstatus?>">
                            <option value="<?=$parea?>"><?=$parea?></option>
                            <option value="Sale">Sale</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Area</label>
                        <input type="text" class="form-control" name="area" id="" value="<?=$parea?>">
                    </div>
                    <div class="form-group">
                        <label for="">Bed</label>
                        <input type="text" class="form-control" name="bed" id="" value="<?=$pbed?>">
                    </div>
                    <div class="form-group">
                        <label for="">Bath</label>
                        <input type="text" class="form-control" name="bath" id="" value="<?=$pbath?>">
                    </div>
                    <div class="form-group">
                        <label for="">Garage</label>
                        <input type="text" class="form-control" name="garage" id="" value="<?=$pgarage?>">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" class="form-control"><?=$pdescription?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="file" id="" value="<?=$pimg?>">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="" value="<?=$pprice?>">
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