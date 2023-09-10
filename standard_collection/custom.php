

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dragonpay API</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="../img/dp.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style type="text/css">
        .responseProcId {
            display: none; /* Initially hide the response */
            float: right;
            margin-right: 10%;
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
<?php include 'includes/standardCollection.php' ?>
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

  <div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Standard Collection via Pre-selecting Payment Channels</h2>
    <?php date_default_timezone_set('Asia/Manila'); $currentDate = date("l, F jS, Y"); echo $currentDate; ?>



<form action="" method="post" class="form1">
    <center>
            <label style="color: gray; font-size: 20px;">Request Body</label>
    </center>
    
    <label >Version</label>
<select name="version"  id="version-select">
    <option value="v1">v1</option>
    <option value="v2">v2</option>
</select>


<span id="message" style="color: red; "></span>



    <label>Amount:</label>
    <input type="number" id="amount" name="amount" placeholder="Amount" value="1" required><br>

    <label>Description:</label>
    <input type="text"  id="Description"  name="Description" placeholder="Description"  value="Dragonpay Test" ><br>

    <label>Email:</label>
    <input type="text" id="Email" name="Email" placeholder="Email" value="jayvee.rodrigueza@dragonpay.ph" required ><br>

    <label>Param1:</label>
    <input type="text" id="Param1" name="Param1" placeholder="(Optional)" ><br>

    <label>Param2:</label>
    <input type="text" id="Param2" name="Param2"  placeholder="(Optional)"  ><br>

    <input type="text" id="Currency" name="Currency" value="PHP" hidden>



     

</div>
<div class="payment1">
<?php include 'flow.php' ?>
 <br>
</form>

</div>

<div class="parent-container4">
    <div class="centered-div4">
        <form action="" method="post">
            <label class="result">API Response:</label>
    <?php
    if (isset($_POST['submit2'])) {
        $Amount = $_POST['amount'];
        $Currency = $_POST['Currency'];
        $Description = $_POST['Description'];
        $Email = $_POST['Email'];
        $ProcId = $_POST['ProcId'];
        $param1 = $_POST['Param1'];
        $param2 = $_POST['Param2'];
        $version = $_POST['version'];
        $accesstoken = "TESTJAYVEE:HnJhcHWyuzN7AKJ";

        function generateRandomString($length = 25) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $data = array(
            'Amount' => $Amount,
            'Currency' => $Currency,
            'Description' => $Description,
            'Email' => $Email,
            'ProcId' => $ProcId,
            'param1' => $param1,
            'param2' => $param2
        );

        $data_json = json_encode($data);
        $url = 'https://test.dragonpay.ph/api/collect/' . $version . '/' . generateRandomString() . '/post';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $headr = array(
            'Content-type: application/json',
            'Authorization: Basic ' . base64_encode($accesstoken)
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response_array = json_decode($response, true);
        $redirectUrl = $response_array["Url"];
        //$result = "https://test.dragonpay.ph/Pay.aspx?tokenid=" . $response_array["RefNo"] . "&procid=$ProcId";

        echo '<pre>' . json_encode($response_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</pre>';

        echo '<div class="open-url-button">';
        echo '<a class="button-10" href="' . $response_array["Url"] . '" target="_blank">Open Response URL</a>';
        echo '</div>';



    }
    ?>
</form>
</div>
</div>

<script>
  const versionSelect = document.getElementById("version-select");
  const messageSpan = document.getElementById("message");



  versionSelect.addEventListener("change", function () {
    if (versionSelect.value === "v2") {
      messageSpan.textContent = "* Version 2 is selected *";

    } else {
      messageSpan.textContent = "";

    }
  });
</script>

<script>
    // Get all the select elements with class 'custom-dropdown'
    const selectElements = document.querySelectorAll('.custom-dropdown');

    // Get the input field by name
    const inputField = document.querySelector('input[name="ProcId"]');

    // Store the initial selected values of each dropdown
    const initialSelectedValues = {};

    // Loop through each select element
    selectElements.forEach((select) => {
        // Store the initial selected value for each dropdown
        initialSelectedValues[select.id] = select.value;

        // Add change event listener to each select element
        select.addEventListener('change', (event) => {
            // Get the selected option value
            const selectedValue = event.target.value;

            // Update the input field value with the selected option value
            inputField.value = selectedValue;

            // Reset other dropdowns to their initial selected value
            selectElements.forEach((otherSelect) => {
                if (otherSelect.id !== select.id) {
                    otherSelect.value = initialSelectedValues[otherSelect.id];
                }
            });
        });
    });

    // Add an input event listener to the input field
    inputField.addEventListener('input', () => {
        // Check if the input field has a value
        if (inputField.value) {
            // Reset all the select elements to their initial selected values
            selectElements.forEach((select) => {
                select.value = initialSelectedValues[select.id];
            });
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>


<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</body>
</html>
