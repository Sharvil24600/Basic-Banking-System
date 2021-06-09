<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values amount cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Balance is Insufficient , pls check your balance")';  
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value amount cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Congrats!! Your Transaction is Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Transaction</title>
	<!-- base:css -->
	<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="images/sparkfavicon.png" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

  
</head>

<body>
	<div class="container-scroller">


		<!-- partial:partials/_horizontal-navbar.html -->
		

<?php
  include 'navbar.php';
?>





		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
					<div class="col-md-6 grid-margin stretch-card" style="margin: auto;">
                        <div class="card">
							<h2  style="margin: auto; color: black; font-size: 2.5rem; margin-top: 30px;" >Transaction</h2>
							<?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
			<form method="post" name="tcredit" class="tabletext" ><br>
							<div class="card-body">

							<h3  style="margin: auto; color: black; font-size: 1.4rem; margin-top: 30px;" >Sender Details</h3>
				
							<div class="table-responsive pt-3">
							
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Balance
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      
                       
                        <tr class="table-success">
						<td ><?php echo $rows['id'] ?></td>
                    <td ><?php echo $rows['name'] ?></td>
                    <td ><?php echo $rows['email'] ?></td>
                    <td ><?php echo $rows['balance'] ?></td>      
					</tr>
                        
                      </tbody>
                    </table>
                  </div>
				  <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Current Balance = 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
				<button  class="btn btn-inverse-success btn-fw btn-lg"
                                                  class="btn btn-primary" data-bs-toggle="modal"
												  name="submit" type="submit" id="myBtn"   >
                                                    
                                                     Transfer</button></a>
            <!-- <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer</button> -->
            </div>
        
						
						     </div>
						
							 </form>
                    
					

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
	<script src="vendors/chart.js/Chart.min.js"></script>
	<script src="vendors/progressbar.js/progressbar.min.js"></script>
	<script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
	<script src="vendors/justgage/raphael-2.1.4.min.js"></script>
	<script src="vendors/justgage/justgage.js"></script>
	<!-- Custom js for this page-->
	<script src="js/dashboard.js"></script>
	<!-- End custom js for this page-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
	</script>

</body>

</html>