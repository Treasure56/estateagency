<?php 
  require_once('includes/headertwo.php');   
  require_once('includes/connection.php');
?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?=$name?></h1>
              <span class="color-text-a">Agent Immobiliari</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?=$name?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <div class="agent-avatar-box">
                  <img src="includes/dp/<?=$img?>" alt="" class="agent-avatar img-fluid">
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d"><?=$name?>
                      </h3>
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                    <?=$description?>
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"><?=$phone?> </span>
                      </p>
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> <?=$email?></span>
                      </p>
                    </div>
                  </div>
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="<?=$face?>" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="<?=$twit?>" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="<?=$insta?>" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="socials-footer">
                      <a href="settings.php" class="btn btn-success">Click to Edit account</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <?php
            $sql2 = "SELECT * FROM properties WHERE adminid = '$id' AND deleted = 1";
            $res2 = mysqli_query($connect, $sql2);
          ?>
          <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Properties (<?=mysqli_num_rows($res2)?>)</h3>
            </div>
          </div>
          <div class="row property grid">
            <?php
              if(mysqli_num_rows($res2) > 0){ 
                while($rows2 = mysqli_fetch_assoc($res2)){
                  $pid = $rows2['id'];
                  $name = $rows2['name'];
                  $location = $rows2['location'];
                  $price = $rows2['price'];
                  $bed = $rows2['bed'];
                  $bath = $rows2['bath'];
                  $area = $rows2['area'];
                  $garage = $rows2['garage'];
                  $img = $rows2['img'];
            ?>
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="includes/post/<?=$img?>" alt="" class="img-a" height="400">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property-single.php?pid=<?=$pid?>"><?=$name?>
                          <br /> <?=$location?></a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">rent | $ <?=number_format($price)?></span>
                      </div>
                      <a href="property-single.php?pid=<?=$pid?>" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                      <a href="edit.php?pid=<?=$pid?>" class="link-a">Click here to edit
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span><?=$area?>m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title"><?=$bed?></h4>
                          <span>2</span>
                        </li>
                        <li>
                          <h4 class="card-info-title"><?=$bath?></h4>
                          <span>4</span>
                        </li>
                        <li>
                          <h4 class="card-info-title"><?=$garage?></h4>
                          <span>1</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } }else{ ?>

              <div class="col-md-4">
                <h3>No property upload yet...</h3>
              </div>

            <?php } ?>

        </div>
      </div>
    </section><!-- End Agent Single -->

  </main><!-- End #main -->

 

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>