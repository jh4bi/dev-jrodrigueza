<!doctype html>
<html lang="en">
  <head>
  	<title>Dragonpay API</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="create.css">
        <link rel="icon" type="image/x-icon" href="../img/dp.png">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="../index.php" class="logo">DEMO</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Lifetime ID</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="create_lid.php">Create Lifetime ID</a>
                </li>
                <li>
                    <a href="retrive_lid.php">Retrieve Lifetime ID</a>
                </li>
                <li>
                    <a href="update_lid.php">Update Lifetime ID</a>
                </li>
	            </ul>
	          </li>

	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MU Virtual Accounts</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="create_muva.php">Create MUVA</a>
                </li>
                <li>
                    <a href="retrive_muva.php">Retrieve MUVA</a>
                </li>
                <li>
                    <a href="#">#</a>
                </li>
              </ul>
	          </li>
             <li>
              <a href="#standardCollection" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Standard Collection</a>
              <ul class="collapse list-unstyled" id="standardCollection">
                <li>
                    <a href="../standard_collection/normalDropdown.php">Dragonpay Dropdown</a>
                </li>
                <li>
                    <a href="../standard_collection/filteredDropdown.php">Filtered Dropdown</a>
                </li>
                <!--<li>-->
                <!--    <a href="../standard_collection/filterCustom.php">Filtering Payment Custom</a>-->
                <!--</li>-->
                  <li>
                    <a href="../standard_collection/custom.php">Custom UI</a>
                </li>
              </ul>
              </li>
	          <li>
              <a href="../mass_payout/">Mass payout</a>
	          </li>
                        <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transactions</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li>
                    <a href="../transactions/standard_collection">Standard Collection</a>
                </li>
                <li>
                    <a href="../transactions/mass_payout">Mass payout</a>
                </li>
                <li>
                    <a href="#">#</a>
                </li>
              </ul>
              </li>
	        </ul>

					<div><br><br><br><br><br><br><br><br><br><br></div>
<?php include '../includes/footer.php' ?>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
<fieldset>
        <h2 class="mb-4">Create Multiple-Use Virtual Accounts</h2>
  <?php date_default_timezone_set('Asia/Manila'); $currentDate = date("l, F jS, Y"); echo $currentDate; ?>
<form action="" method="post">
    <label for="bin">Bin:</label>
    <input type="text" id="bin" name="bin" value="705202"><br>
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="Juan dela Cruz"><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="juan.dela.cruz@gmail.com"><br>
    
    <label for="remarks">Remarks:</label>
    <input type="text" id="remarks" name="remarks" value="Customer 123456"><br>
    
    <label for="preferredId">Preferred ID:</label>
    <input type="text" id="preferredId" name="preferredId" value="" placeholder="e.g. 0000000012" maxlength="10" required><br><br>
    
    <input type="submit" value="Submit">
</form>
</fieldset>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bin = $_POST['bin'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $remarks = $_POST['remarks'];
    $preferredId = $_POST['preferredId'];
    
    $data = array(
        "Bin" => $bin,
        "Name" => $name,
        "Email" => $email,
        "Remarks" => $remarks,
        "PreferredId" => $preferredId
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.dragonpay.ph/api/collect/v1/lifetimeid/create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic VEVTVDpablZ4VTVWMzFBM2l0ZEs='
        ),
    ));
    
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($response === false) {
        echo "cURL Error: " . curl_error($curl);
    } else {
        echo "
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
        <script>
        if ($httpCode === 500) {
            swal({
                title: 'API Response',
                text: '".addslashes($response)."',
                icon: 'error',
                html: true,
                allowOutsideClick: false
            });
        } else if ($httpCode === 200 && $response != '') {
            swal({
                title: 'Virtual Account Created!',
                text: 'VA #: ".addslashes($response)."',
                icon: 'success',
                html: true,
                allowOutsideClick: false
            });
        } else if ($httpCode === 200 && $response == '') {
            swal({
                title: 'Error in creating VA!',
                text: 'Preferred ID already exist or The API response was empty. Allowable digits for preferred id is 10.',
                icon: 'error',
                html: true,
                allowOutsideClick: false
            });
        }
        </script>";
    }
    
    curl_close($curl);
}
?>



      </div>
		</div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>