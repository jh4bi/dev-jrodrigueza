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
        <style>
            .wait-cursor {
    cursor: wait;
}
        </style>
  </head>
  <body >
		
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
        <h2 class="mb-4">Create Lifetime ID</h2>
  <?php date_default_timezone_set('Asia/Manila'); $currentDate = date("l, F jS, Y"); echo $currentDate; ?>
  <form method="post">
        <label for="prefix">Prefix:</label>
        <input type="text" id="prefix" name="prefix" readonly value="TD"><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="Jayvee Rodrigueza" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="jayveerodrigueza@gmail.com" required><br><br>

        <label for="remarks">Remarks:</label>
        <input type="text" id="remarks" name="remarks" value="Lifetime ID Demo" required><br><br>

        <input type="submit" name="submit" value="Create Lifetime ID">
    </form>
</fieldset>

<?php
if (isset($_POST['submit'])) {
    $curl = curl_init();

    $payload = array(
        "Prefix" => $_POST['prefix'],
        "Name" => $_POST['name'],
        "email" => $_POST['email'],
        "Remarks" => $_POST['remarks']
    );

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.dragonpay.ph/api/collect/v1/lifetimeid/create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic VEVTVDpablZ4VTVWMzFBM2l0ZEs='
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    // Add SweetAlert script to trigger the notification
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    Swal.fire({';
    echo '        title: "Lifetime ID Successfully Created",';
    echo '        html: "<pre> LID: " + ' . json_encode($response) . ' + "</pre>",';
    echo '        icon: "success",';
    echo '        confirmButtonText: "OK",';
    echo '        allowOutsideClick: false';
    echo '    });';
    echo '});';
    echo '</script>';
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