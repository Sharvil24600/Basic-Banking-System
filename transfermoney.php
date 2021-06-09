
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Transfer</title>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/sparkfavicon.png" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
<?php
include 'config.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
?>
<?php
  include 'navbar.php';
?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">


                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <h3 style="margin: auto; color: black; font-size: 2rem; margin-top: 30px;" >Transfer Money</h3>
                                
                                <div class="card-body">
                                    
                                    <!-- <p class="card-description"> Add class <code>.table-striped</code></p> -->
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.no</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Account-Balance</th>
                                                    <th>Operation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        
               <?php 
                 while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td ><?php echo $rows['id'] ?></td>
                        <td ><?php echo $rows['name']?></td>
                        <td ><?php echo $rows['email']?></td>
                        <td ><?php echo $rows['balance']?></td>
                        <td><a href="userdetail.php?id= <?php echo $rows['id'] ;?>"> 
                          <button type="button" class="btn btn-inverse-success btn-fw"
                                                  class="btn btn-primary" data-bs-toggle="modal"
                                                  data-bs-target="#staticBackdrop1">
                                                      <i class="mdi mdi-currency-inr"></i>
                                                     Transfer</button></a>
                                                     </td> 
                    </tr>
                <?php
                    }
                ?>                   </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>




                   
                </div>
                
<?php
include 'footer.php';
?>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

</body>

</html>