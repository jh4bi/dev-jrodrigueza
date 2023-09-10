<?php
// API endpoint URL
$url = "https://test.dragonpay.ph/api/payout/merchant/v1/processors";
$curl = curl_init($url);

// Headers for the API request
$headers = array(
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode("TESTJAYVEE:HnJhcHWyuzN7AKJ")
);

curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true,
));

$result = curl_exec($curl);

if (curl_errno($curl)) {
    // Handle API request error
    echo "API Request Error: " . curl_error($curl);
} else {
    $arr = json_decode($result, true);

    if ($arr === null) {
        // Handle JSON decoding error
        echo "JSON Decoding Error: Failed to decode API response.";
    } else {
        // Prepare options
        $options = "";
        foreach ($arr as $processor) {
            $logoUrl = isset($processor["logo"]) ? $processor["logo"] : '';
            $shortName = $processor["shortName"];
            $procId = $processor["procId"];
            $isCashPickup = $processor["isCashPickup"]; // Moved this line inside the loop
            $options .= '<option value="' . $procId . '" data-img="' . $logoUrl . '" data-iscashpickup="' . ($isCashPickup ? 'false' : 'true') . '">' . $shortName . '</option>';
        }
    }
}

curl_close($curl);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .custom-dropdown {
            width: 50vh;
            position: relative;
        }

        .custom-dropdown select {
            appearance: none;
            outline: none;
            border: 1px solid #ccc;
            padding: 8px;
            background: white;
            background-image: url('');
            background-repeat: no-repeat;
            background-size: 20px auto;
            background-position: left center;
        }

        .custom-dropdown select option:checked {
            background-image: url('');
            background-repeat: no-repeat;
            background-size: 20px auto;
            background-position: left center;
        }
    </style>
</head>
<body>

<div class="custom-dropdown">
    <select id="ProcIdSelect" name="ProcIdSelect">
        <?php echo $options; ?>
    </select>
    <span id="accountNumberMessage" style="color: red;">* please provide the account number *</span>
</div>
<input type="text" name="ProcId" id="ProcIdInput" hidden>

<script>
    const select = document.querySelector('[name="ProcIdSelect"]');
    const input = document.getElementById('ProcIdInput');
    const accountNumberMessage = document.getElementById("accountNumberMessage");

    select.addEventListener('change', (event) => {
        const selectedOption = event.target.options[event.target.selectedIndex];
        const procId = selectedOption.value;
        input.value = procId;

        // Set the background image for the select element
        const imgSrc = selectedOption.getAttribute('data-img');
        select.style.backgroundImage = `url('${imgSrc}')`;

        // Update the message based on isCashPickup attribute
        const isCashPickup = selectedOption.getAttribute('data-iscashpickup') === 'true';
        accountNumberMessage.textContent = isCashPickup ? '* please provide the account number *' : '* please provide your email address *';
    });
</script>

</body>
</html>
