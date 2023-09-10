<!doctype html>
<html lang="en">
  <head>
  	<title>Dragonpay API</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="create.css">
        <link rel="icon" type="image/x-icon" href="../img/dp.png">
        
        <style>
            #created, #customerId{
    background-color: #f2f2f2; /* Set the background color to gray */
    color: #666; /* Set the text color to a darker shade of gray */
     cursor:no-drop;
}
        </style>
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
        <h2 class="mb-4">Update Lifetime ID User</h2>
<?php date_default_timezone_set('Asia/Manila'); $currentDate = date("l, F jS, Y"); echo $currentDate; ?>
<form action="" method="post">
        <label for="lifetimeId">Lifetime ID:</label>
        <input type="text" id="lifetimeId" name="lifetimeId" placeholder="Enter Lifetime ID">
        <input type="submit" name="submit" value="Retrieve">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $lifetimeId = $_POST['lifetimeId'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://test.dragonpay.ph/api/collect/v1/lifetimeid/' . $lifetimeId,
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
            echo "cURL Error: " . curl_error($curl);
        } else {
            $responseData = json_decode($response, true);

            echo "<div class='api-response'>";
            echo "<h3>API Response:</h3>";

            if (isset($responseData['userId'])) {
    $data = $responseData; 

    echo "<form action='' method='POST'>";

    echo "<label for='customerId'>Lifetime ID:</label>";
    echo "<input type='text' id='customerId' name='customerId' value='" . $data['userId'] . "' readonly><br>";

    echo "<label for='custName'>Name:</label>";
    echo "<input type='text' id='custName' name='custName' value='" . $data['custName'] . "' ><br>";

    echo "<label for='custEmail'>Email:</label>";
    echo "<input type='text' id='custEmail' name='custEmail' value='" . $data['custEmail'] . "' ><br>";

    echo "<label for='remarks'>Remarks:</label>";
    echo "<input type='text' id='remarks' name='remarks' value='" . $data['remarks'] . "' ><br>";

    echo "<label for='status'>Status:</label>";
    echo "<input type='text' id='status' name='status' value='" . $data['status'] . "' ><br>";

    echo "<label for='created'>Created Date:</label>";
    echo "<input type='text' id='created' name='created' value='" . $data['created'] . "' readonly><br>";

    echo "<input type='submit' id='updateButton'  value='Update' style='background-color: green;'></input>"; 

    echo "</form>";
} else {
    echo "No data found for the provided Lifetime ID.";
}

            echo "</div>";
        }

        curl_close($curl);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customerId'])) {
        $merchantId = 'TEST';
        $password = 'ZnVxU5V31A3itdK';
        $lifetimeId = $_POST['customerId'];
        $name = $_POST['custName'];
        $email = $_POST['custEmail'];
        $remarks = $_POST['remarks'];
        $status = $_POST['status'];

        $soapClient = new SoapClient('https://test.dragonpay.ph/DragonpayWebService/MerchantService.asmx?wsdl', [
            'trace' => 1,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE
        ]);

        $request = [
            'merchantId' => $merchantId,
            'password' => $password,
            'lifetimeId' => $lifetimeId,
            'name' => $name,
            'email' => $email,
            'remarks' => $remarks,
            'status' => $status
        ];

        try {
            $response = $soapClient->UpdateLifetimeUser($request);
            $soapResponse = $soapClient->__getLastResponse();
            if (strpos($soapResponse, '<UpdateLifetimeUserResult>0</UpdateLifetimeUserResult>') !== false) {
                echo "<script>
                        Swal.fire({
                            title: 'Success',
                            text: 'Lifetime ID has been updated.',
                            icon: 'success',
                            allowOutsideClick: true
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while updating.',
                            icon: 'error',
                            allowOutsideClick: true
                        });
                      </script>";
            }
        } catch (SoapFault $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

    <script>
        document.getElementById('updateButton').addEventListener('click', function() {
            document.querySelector('form').submit();
        });
    </script>

      </div>
		</div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>