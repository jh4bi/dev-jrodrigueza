<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dragonpay API</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../spages/create.css">
  <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="icon" type="image/x-icon" href="../img/dp.png">
</head>
<body onload="generateAndFill();">
  <!-- ... (your navigation and form) ... -->
<div class="wrapper d-flex align-items-stretch">
  <nav id="sidebar">
            <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4 pt-5">
          <h1><a href="../index.html" class="logo">DEMO</a></h1>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Lifetime ID</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="../pages/create_lid.php">Create Lifetime ID</a>
                </li>
                <li>
                    <a href="../pages/retrive_lid.php">Retrieve Lifetime ID</a>
                </li>
                <li>
                    <a href="../pages/update_lid.php">Update Lifetime ID</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MU Virtual Accounts</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="../pages/create_muva.php">Create MUVA</a>
                </li>
                <li>
                    <a href="../pages/retrive_muva.php">Retrieve MUVA</a>
                </li>
                <li>
                    <a href="#">#</a>
                </li>
              </ul>
            </li>
        <li>
              <a href="../standard_collection/">Standard Collection</a>
            </li>
            <li>
              <a href="index.php">Mass payout</a>
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
          <div class="footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">jayvee</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>

        </div>
  </nav>

  <div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Mass Payout</h2>
<fieldset>
  <legend>Sample Request</legend>
<?php
date_default_timezone_set('Asia/Manila');
$currentDate = date("Y-m-d"); // Format: YYYY-MM-DD
echo $currentDate;
?>
    <form method="post" action="#">
      <div class="form-container">
      <div class="form-column">
        <label for="TxnId">TxnId:</label>
        <input type="text" name="TxnId" id="TxnId" value=""><br><br>
      </div>
      <div class="form-column">
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" id="FirstName" value="Jayvee"><br><br>
      </div>
      <div class="form-column">
        <label for="MiddleName">Middle Name:</label>
        <input type="text" name="MiddleName" id="MiddleName" value="Maramba"><br><br>
      </div>
        <div class="form-column">
        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" id="LastName" value="Rodrigueza"><br><br>
      </div>
      <div class="form-column">
        <label for="Amount">Amount:</label>
        <input type="text" name="Amount" id="Amount" value="1000"><br><br>
      </div>
      <div class="form-column">
        <label for="Currency">Currency:</label>
        <input type="text" name="Currency" id="Currency" value="PHP"><br><br>
      </div>


      <div class="form-column">
        <label for="Description">Description:</label>
        <input type="text" name="Description" id="Description" value="Testing JSON payout"><br><br>
      </div>
      <div class="form-column">
        <label for="ProcId">ProcId:</label>
        <input type="text" name="ProcId" id="ProcId" value="CEBL"><br><br>
      </div>
      <div class="form-column">
        <label for="ProcDetail">ProcDetail:</label>
        <input type="text" name="ProcDetail" id="ProcDetail" value="jayvee.rodrigueza@dragonpay.ph"><br><br>
      </div>
      <div class="form-column">
        <label for="RunDate">RunDate:</label>
        <input type="date" name="RunDate" id="RunDate" value='<?php echo $currentDate; ?>'><br><br>
      </div>
      <div class="form-column">
        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email" value="jayvee.rodrigueza@dragonpay.ph"><br><br>
      </div>
      <div class="form-column">
        <label for="MobileNo">MobileNo:</label>
        <input type="text" name="MobileNo" id="MobileNo" value="09175281679"><br><br>
      </div>

      <div class="form-column">
        <label for="BirthDate">BirthDate:</label>
        <input type="text" name="BirthDate" id="BirthDate" value="1993-02-19"><br><br>
      </div>
      <div class="form-column">
        <label for="Nationality">Nationality:</label>
        <input type="text" name="Nationality" id="Nationality" value="Philippines"><br><br>
      </div>
      <div class="form-column">
        <label for="Street1">Street1:</label>
        <input type="text" name="Street1" id="Street1" value="4 Ruby Street"><br><br>
      </div>
      <div class="form-column">
        <label for="Street2">Street2:</label>
        <input type="text" name="Street2" id="Street2" value="Emerald Village"><br><br> 
      </div>
      <div class="form-column">
        <label for="Barangay">Barangay:</label>
        <input type="text" name="Barangay" id="Barangay" value="Malanday"><br><br>
      </div>
      <div class="form-column">
        <label for="City">City:</label>
        <input type="text" name="City" id="City" value="Marikina"><br><br>
      </div>
      <div class="form-column">
        <label for="Province">Province:</label>
        <input type="text" name="Province" id="Province" value="Metro Manila"><br><br>
      </div>
      <div class="form-column">
        <label for="Country">Country:</label>
        <input type="text" name="Country" id="Country" value="PH"><br><br>
      </div>
      <div style="clear: both;"></div>
        <input type="submit" value="Submit">

</div>
</form>
</fieldset>

<script type="text/javascript">
  function generateRandomString(length) {
  const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  let result = '';
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    result += charset.charAt(randomIndex);
  }
  return result;
}

function generateAndFill() {
  const randomString = generateRandomString(40); // Change the length as needed
  const txnidInput = document.getElementById("TxnId");
  txnidInput.value = randomString;
}
</script>
<div class="parent-container2">
  <div class="centered-div2">
<form class="response">
    <h5 class="result">API Response:</h5>


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = array(
          "TxnId" => $_POST["TxnId"],
          "FirstName" => $_POST["FirstName"],
          "MiddleName" => $_POST["MiddleName"],
          "LastName" => $_POST["LastName"],
          "Amount" => $_POST["Amount"],
          "Currency" => $_POST["Currency"],
          "Description" => $_POST["Description"],
          "ProcId" => $_POST["ProcId"],
          "ProcDetail" => $_POST["ProcDetail"],
          "RunDate" => $_POST["RunDate"],
          "Email" => $_POST["Email"],
          "MobileNo" => $_POST["MobileNo"],
          "BirthDate" => $_POST["BirthDate"],
          "Nationality" => $_POST["Nationality"],
          "Address" => array(
              "Street1" => $_POST["Street1"],
              "Street2" => $_POST["Street2"],
              "Barangay" => $_POST["Barangay"],
              "City" => $_POST["City"],
              "Province" => $_POST["Province"],
              "Country" => $_POST["Country"]
          )
      );

      $jsonPayload = json_encode($data);

      $curl = curl_init();

      curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://test.dragonpay.ph/api/payout/merchant/v1/TESTJAYVEE/post',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $jsonPayload,
          CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Bearer c36b0e7731fc3425901398c3ea860a91fa25a55e'
          ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      $responseData = json_decode($response, true);

      $success = $responseData['Message'];
      if (isset($responseData['Code'])) {
          $responseCode = $responseData['Code'];

          // Define the error messages based on response codes
          $errorMessages = array(
              '-1' => 'General Error',
              '-2' => '(reserved)',
              '-3' => '(reserved)',
              '-4' => 'Unable to create a payout transaction',
              '-5' => 'Invalid Payout account details',
              '-6' => 'Cannot accept a pre-dated run date',
              '-7' => 'Amount limit exceeded',
              '-8' => 'Similar transaction ID already exists',
              '-9' => 'Server IP access is not allowed',
              '-10' => 'Payout account is blacklisted',
              '-11' => 'Payout account is not enrolled for the bank',
              '-12' => 'Invalid API Key'
          );

          // Check if the response code exists in the error messages array
          if (array_key_exists($responseCode, $errorMessages)) {
              $errorMessage = $errorMessages[$responseCode];

              echo "<script>
                  Swal.fire({
                      icon: 'error',
                      title: '$errorMessage',
                      text: 'Response Code: $responseCode'
                  });
              </script>";
          } elseif ($responseCode == '0' && isset($responseData['refno']) && $success == $responseData['refno']) {
              // Insert the data into the database when response code is 0 and refno matches
              $dbConnection = mysqli_connect("localhost", "root", "", "transactions");

              if ($dbConnection) {
                  $insertQuery = "INSERT INTO `disbursement`(`TxnId`, `FirstName`, `MiddleName`, `LastName`, `amount`, `description`, `procId`, `procDetail`, `runDate`, `email`, `mobileNo`, `birthDate`, `nationality`, `street1`, `street2`, `barangay`, `city`, `province`, `country`, `date_update`, `currency`, `status`, `refno`) VALUES (
                      '{$data["TxnId"]}', '{$data["FirstName"]}', '{$data["MiddleName"]}', '{$data["LastName"]}', '{$data["Amount"]}', '{$data["Description"]}', '{$data["ProcId"]}', '{$data["ProcDetail"]}', '{$data["RunDate"]}', '{$data["Email"]}', '{$data["MobileNo"]}', '{$data["BirthDate"]}', '{$data["Nationality"]}', '{$data["Address"]["Street1"]}', '{$data["Address"]["Street2"]}', '{$data["Address"]["Barangay"]}', '{$data["Address"]["City"]}', '{$data["Address"]["Province"]}', '{$data["Address"]["Country"]}', NOW(), '{$data["Currency"]}', '{$responseData['refno']}'
                  )";

                  if (mysqli_query($dbConnection, $insertQuery)) {
                      echo "<script>
                          Swal.fire({
                              icon: 'success',
                              title: 'Payout Successfully Created',
                              text: 'Refno: {$responseData['refno']}',
                              allowOutsideClick: false
                          });
                      </script>";
                  } else {
                      echo "<script>
                          Swal.fire({
                              icon: 'error',
                              title: 'Database Error',
                              text: 'Unable to insert data into the database'
                          });
                      </script>";
                  }

                  mysqli_close($dbConnection);
              } else {
                  echo "<script>
                      Swal.fire({
                          icon: 'error',
                          title: 'Database Connection Error',
                          text: 'Unable to connect to the database'
                      });
                  </script>";
              }
          }
      }
  }
  ?>

 </form>

</div>
  </div>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="./script.js"></script>
</body>
</html>
