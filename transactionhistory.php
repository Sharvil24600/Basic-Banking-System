<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Transaction History</title>
    <!-- base:css -->

    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- CSS only -->

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- endinject -->
    <link rel="shortcut icon" href="images/sparkfavicon.png" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script> 
    
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
			<nav class="navbar top-navbar col-lg-12 col-12 p-0">
				<div class="container-fluid">
					<div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">

						<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.png"
									alt="logo" style="width: 33px;height: 33px;" /></a>
                            <a class="navbar-brand brand-logo" href="index.php"><img src="images/log2.png"
									alt="logo" /></a>
							<a class="navbar-brand brand-logo-mini" href="index.php"><img
									src="images/mini.png" alt="logo" /></a>
						</div>
						<ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-lg-flex d-none">
                        <button class="btn btn-danger " id="downloadpdf"><i class="mdi mdi-file-pdf"></i>Pdf
                        </button>
                        
								<!-- <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm"
									id="nreportDropdown" href="#" data-toggle="dropdown">
									Reports
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
									aria-labelledby="nreportDropdown">
									<a class="dropdown-item">
										<button type="button" id="downloadpdf"></button>
										Pdf
									</a> 

								
								</div> -->
							</li>
							<li class="nav-item nav-profile">
								<a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
									<span class="nav-profile-name">Welcome User</span>
									<img src="images/faces/user.png" alt="profile" />
								</a>

							</li>
						</ul>
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
							data-toggle="horizontal-menu-toggle">
							<span class="mdi mdi-menu"></span>
						</button>
					</div>
				</div>
			</nav>
			<nav class="bottom-navbar">
				<div class="container">
					<ul class="nav page-navigation">
						<li class="nav-item">
							<a class="nav-link" href="index.php">
								<i class="mdi mdi-bank" style="font-size: 35px;"></i>
								<span class="menu-title">Home</span>
                                <i class="menu-arrow"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="transfermoney.php" class="nav-link">
								<i class="mdi mdi-currency-inr" style="font-size: 35px;"></i>
								<span class="menu-title">Make Transaction</span>
								<i class="menu-arrow"></i>
							</a>

						</li>
						<li class="nav-item">
							<a href="transactionhistory.php" class="nav-link">
								<i class="mdi mdi-history" style="font-size: 35px;"></i>
								<span class="menu-title">Transaction History</span>
								<i class="menu-arrow"></i>
							</a>

						</li>





					</ul>
				</div>
			</nav>
		</div>


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">


                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card" id="invoice">
                                <h3 style="margin: auto; color: black; font-size: 2rem; margin-top: 30px;" >Transaction History</h3>
                                    
                                <div class="card-body">
                                    <!-- <p class="card-description"> Add class <code>.table-striped</code></p> -->
                                    <div class="table-responsive" >
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <!-- <th> User</th> -->
                                                    <th>S.no</th>
                                                    <th>Sender Name</th>
                                                    <th>Receiver Name</th>
                                                    <th>Transaction Amount </th>
                                                    <th>Transaction Date and Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php

include 'config.php';

$sql ="select * from transaction";

$query =mysqli_query($conn, $sql);

while($rows = mysqli_fetch_assoc($query))
{
?>
                                                <tr>
                                                  
            <td ><?php echo $rows['sno']; ?></td>
            <td ><?php echo $rows['sender']; ?></td>
            <td ><?php echo $rows['receiver']; ?></td>
            <td ><?php echo $rows['balance']; ?> </td>
            <td ><?php echo $rows['datetime']; ?> </td>
                                                    
<?php
}
?>
                                                </tr>


                                             
                                            </tbody>
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

<script>
      window.onload = function () {
      document.getElementById("downloadpdf")
          .addEventListener("click", () => {
              const invoice = this.document.getElementById("invoice");
              console.log(invoice);
          console.log(window);
          
              var opt = {
                margin:0.01,
                  filename: 'TransactionHistory.pdf',
               
                  html2canvas: { scale:1 },
                
                 jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
           };
           
             html2pdf().from(invoice).set(opt).save();
         })    }

//      function printPDF() { 
//    var element = document.getElementById('invoice');
//    element.style.display = 'block'  
//    html2pdf(element);  
//    conlose.log('printPDF()');
  
//  }
/*
var doc = new jsPDF('p','pt','a4');

     var specialElementHandlers = {
         '#hidediv': function (element, renderer) {
             return true;
         }
     };
  
     $('#downloadpdf').click(function () {
         doc.fromHTML($('#invoice').html(), 15, 15, {
             'width': 200,
                 'elementHandlers': specialElementHandlers
             
               });
     
         doc.save('sample-file.pdf');
     });
     */


     
    
    </script>
</body>

</html>