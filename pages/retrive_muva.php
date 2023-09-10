<!doctype html>
<html lang="en">
  <head>
  	<title>Dragonpay API</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <h2 class="mb-4">Retrieve Multiple-Use Virtual Accounts</h2>
<?php date_default_timezone_set('Asia/Manila'); $currentDate = date("l, F jS, Y"); echo $currentDate; ?>
     <form method="post">
        <label for="muva">Virtual Account #:</label>
        <input type="text" id="muva" name="muva" required maxlength="16">
        <input type="submit" name="submit" value="Retrieve"></input>
    </form>
</fieldset>
    <?php
    if (isset($_POST['submit'])) {
        $muva = $_POST['muva'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.dragonpay.ph/api/collect/v1/lifetimeid/$muva",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic VEVTVDpablZ4VTVWMzFBM2l0ZEs='
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'cURL Error: ' . curl_error($curl);
        } else {
            echo '<h2>API Response:</h2>';
            $formatted_response = json_encode(json_decode($response), JSON_PRETTY_PRINT);
            echo '<pre>' . htmlspecialchars($formatted_response) . '</pre>';
            
            // Display the Deactivate and Activate buttons
            echo '<form method="post">';
            echo '<input type="hidden" name="muva" value="' . $muva . '">';
            echo '<input type="submit" name="deactivate" value="Deactivate" style="background-color:red;"></input> &nbsp; &nbsp; ';
            echo '<input type="submit" name="activate" value="Activate"></input>';
            echo '</form>';
        }

        curl_close($curl);
    }

  if (isset($_POST['deactivate'])) {
        $muva = $_POST['muva'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.dragonpay.ph/api/collect/v1/lifetimeid/deactivate/$muva",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic VEVTVDpablZ4VTVWMzFBM2l0ZEs='
            ),
        ));

        $deactivate_response = curl_exec($curl);

        if ($deactivate_response === false) {
            echo 'cURL Error: ' . curl_error($curl);
        } else {
           
            echo '<pre>' . htmlspecialchars($deactivate_response) . '</pre>';

            // Display SweetAlert for successful deactivation
            echo '<script>';
            echo 'Swal.fire({';
            echo '    icon: "success",';
            echo '    title: "Deactivation Successful",';
            echo '    text: "Virtual Account # ' . $muva . ' has been deactivated.",';
            echo '    allowOutsideClick: false';
            echo '});';
            echo '</script>';
        }

        curl_close($curl);
    }
    if (isset($_POST['activate'])) {
     $muva = $_POST['muva'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.dragonpay.ph/api/collect/v1/lifetimeid/activate/$muva",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic VEVTVDpablZ4VTVWMzFBM2l0ZEs='
            ),
        ));

        $activate_response = curl_exec($curl);

        if ($activate_response === false) {
            echo 'cURL Error: ' . curl_error($curl);
        } else {
        
            echo '<pre>' . htmlspecialchars($activate_response) . '</pre>';
            
            // Display SweetAlert for successful activation
            echo '<script>';
            echo 'Swal.fire({';
            echo '    icon: "success",';
            echo '    title: "Activation Successful",';
            echo '    text: "Virtual Account # ' . $muva . ' has been activated.",';
            echo '    allowOutsideClick: false';
            echo '});';
            echo '</script>';
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