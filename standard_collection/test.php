
    <style>
        .category {
            margin: 10px;
        }
         .category span{
            cursor: pointer;
            padding: 5px;
         }
          .category span:hover{
           background-color: #AED2FF;
         }
        .category label {
            background-color: #f1f1f1;
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            outline: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }


        .category label:hover {
            background-color: #ddd; 
        }

        .category label.active {
            background-color: #007bff;
            color: #fff; 
        }

        .category-content {
            padding: 0 10px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
        .category label {
            display: block;
            margin: 3px 0;
            width: 100%;
            cursor: pointer;
        }

        .category label input[type="radio"] {
            display: none; 
        }

        .category label img {
            width: 30px;
            height: 30px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .category label span {
            vertical-align: middle;
            cursor: pointer;
        }
        .category label:hover {
            background-color: #AED2FF; 
        }

        .category label input[type="radio"]:checked + span {
            color: #f1f1f1; 
            background-color: #AED2FF;
            display: block;
        }
        input[type="radio"]:checked + span {
            background-color: #AED2FF;
        }
    </style>


<form>
<fieldset style="width: 100%;">
    <legend>Payment Method</legend>
<?php
$url = "https://test.dragonpay.ph/api/collect/v1/processors/";
$curl = curl_init($url);
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
    echo "API Request Error: " . curl_error($curl);
} else {
    $arr = json_decode($result, true);
}

if ($arr === null) {
    echo "JSON Decoding Error: Failed to decode API response.";
} else {
    $typeMap = array(
        1 => "Online Bank",
        2 => "Over the Counter Bank",
        4 => "Over-the-Counter non-Bank",
        128 => "Gcash",
        8 => "E-Wallets (inc. Bitcoins)",
        2048 => "Cash on Delivery (COD)",
        4096 => "Installments",
        64 => "Credit Cards",
    );

    $filteredProcessors = array_filter($arr, function($processor) {
        $excludedTypes = array(32, 1024, 256);
        return !in_array($processor["type"], $excludedTypes);
    });

    $categorizedProcessors = array();
    foreach ($filteredProcessors as $processor) {
        $processorType = $processor["type"];
        if (!isset($categorizedProcessors[$processorType])) {
            $categorizedProcessors[$processorType] = array();
        }
        $categorizedProcessors[$processorType][] = $processor;
    }
    foreach ($categorizedProcessors as $type => $processors) {
        echo '<div class="category">';
        echo '<span>' . $typeMap[$type] . '</span>';
        echo '<div class="category-content">';
        foreach ($processors as $processor) {
            // Display processor details here
            echo '<label>';
            echo '<input type="radio" value="'.$processor["procId"].'" name="processor" >'.
                    '<img src="'.$processor["logo"].'" alt="'.$processor["longName"].'">'.
                    '<span>' . $processor["longName"] . '</span>';
            echo '</label><br>';
        }
        echo '</div>';
        echo '</div>';
    }
}
?>

<input type="text" name="ProcId" id="selectedProcessor" hidden>

</fieldset>
</form >
<script>
    var coll = document.querySelectorAll(".category span");
    var radioButtons = document.querySelectorAll(".category label input[type='radio']");
    var selectedProcessorField = document.getElementById("selectedProcessor");

    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }

    for (var i = 0; i < radioButtons.length; i++) {
        radioButtons[i].addEventListener("change", function() {
            selectedProcessorField.value = this.value;
            for (var j = 0; j < radioButtons.length; j++) {
                radioButtons[j].parentNode.classList.remove("active");
            }
            this.parentNode.classList.add("active");
            // Replace the <span> content with the selected processor's longName
            this.parentNode.querySelector('span').innerText = this.parentNode.querySelector('img').alt;
        });
    }
</script>
