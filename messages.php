<?php 
    require_once('includes/headertwo.php');
    require_once('includes/connection.php');
?>

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Client Enquiries</h3>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-borderd table-hover">
                    <tr>
                        <th>S/N</th>
                        <th>Property</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM messages WHERE adminid = '$id'";
                        $res = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($res) > 0){
                            $num = 1; 
                            while($rows = mysqli_fetch_assoc($res)){ 
                    ?>
                    <tr>
                        <td><?=$num++?></td>
                        <td><?=$rows['pname']?></td>
                        <td><?=$rows['name']?></td>
                        <td><?=$rows['email']?></td>
                        <td><?=$rows['phone']?></td>
                        <td><?=$rows['comment']?></td>
                        <td><?=$rows['createddate']?></td>
                        <td><a href="includes/deletemsg.php?mid=<?=$rows['id']?>" class="btn btn-danger">delete</a></td>
                    </tr>
                        <?php } ?>
                    <?php }else{ ?>
                        <tr><td>no messages yet...</td></tr>
                    <?php } ?>
                </table>
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