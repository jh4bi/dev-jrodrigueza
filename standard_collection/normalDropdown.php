<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dragonpay API</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
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
    <h2 class="mb-4">Standard Collection via Dragonpay Dropdown</h2>
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
    <input type="number" id="Amount" name="Amount" placeholder="Amount" value="1" required><br>

    <label>Description:</label>
    <input type="text"  id="Description"  name="Description" placeholder="Description"  value="Dragonpay Test" ><br>

    <label>Email:</label>
    <input type="text" id="Email" name="Email" placeholder="Email" value="jayvee.rodrigueza@dragonpay.ph" required ><br>

    <label>Param1:</label>
    <input type="text" id="Param1" name="Param1" placeholder="(Optional)" ><br>

    <label>Param2:</label>
    <input type="text" id="Param2" name="Param2"  placeholder="(Optional)"  ><br>

    <label>Proc ID:&nbsp; <i class="fa fa-question-circle-o" aria-hidden="true" style="cursor: pointer; display: none; color:red;" title="List of Proc ID's" onclick="showProcIDs()" id="questionMark" ></i>
&nbsp;<i class="fa fa-hand-o-left" aria-hidden="true" style="color: red; display: none" id="finger">&nbsp;Check Proc Id Here!</i>  </label>
    <input type="text" id="ProcId" name="ProcId" placeholder="(Optional)"  ><br>
    <input type="text" id="Currency" name="Currency" value="PHP" hidden>

    <input type="submit" name="submit">
</form>
<div class="parent-container2">
    <div class="centered-div2">
<form class="response">
<script>
  const versionSelect = document.getElementById("version-select");
  const messageSpan = document.getElementById("message");
  const ProcIdInput = document.getElementById("ProcId");
  const questionMark = document.getElementById("questionMark");
  const finger = document.getElementById("finger");

  versionSelect.addEventListener("change", function () {
    if (versionSelect.value === "v2") {
      messageSpan.textContent = "* Version 2 is selected. This will require you to enter the ProcId. *";
      ProcIdInput.setAttribute("required", "required");
      ProcIdInput.setAttribute("placeholder", "Required");
      questionMark.style.display = 'inline'; // Display the element for v2
      finger.style.display = 'inline';
    } else {
      messageSpan.textContent = "";
      ProcIdInput.removeAttribute("required");
      ProcIdInput.setAttribute("placeholder", "(Optional)");
      questionMark.style.display = 'none'; // Hide the element for other options
      finger.style.display = 'none';
    }
  });
</script>


    <div class="responseProcId"> <!-- This div will hold the response content -->
        <?php
            $mid = 'TESTJAYVEE';
            $pwd = 'HnJhcHWyuzN7AKJ';

            // Retrieve the JSON response from the Dragonpay API
            $url = "https://test.dragonpay.ph/api/collect/v1/processors/";
            $curl = curl_init($url);

            $headers = array(
                "Content-Type: application/json",
                "Authorization: Basic " . base64_encode("$mid:$pwd")
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($curl);

            if (curl_errno($curl)) {
                // Handle API request error
                echo "API Request Error: " . curl_error($curl);
                exit;
            }

            curl_close($curl);

            $arr = json_decode($result, true);

            if ($arr === null) {
                // Handle JSON decoding error
                echo "JSON Decoding Error: Failed to decode API response.";
                exit;
            }

            $count = count($arr);

            // Output the "procId" and "longName" fields in a table format
            echo "<table>";
            echo "<tr><th>Proc ID</th><th>Long Name</th></tr>";
            foreach ($arr as $processor) {
                echo "<tr><td>{$processor['procId']}</td><td>{$processor['longName']}</td></tr>";
            }
            echo "</table>";
        ?>
    </div>

    <script>
        function showProcIDs() {
            // Show the response content in a SweetAlert with a table format
            let responseContent = document.querySelector(".responseProcId").innerHTML;

            Swal.fire({
                title: 'Proc IDs',
                html: responseContent,
                icon: 'info',
                customClass: {
                    container: 'response-container'
                },
                
            });
        }
    </script>
    
</dib>
    <label class="result">API Response:</label>

    <?php
    if (isset($_POST['submit'])) {
        $Amount = $_POST['Amount'];
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

<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</body>
</html>
