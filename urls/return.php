<!DOCTYPE html>
<?php include('../config/conn.php'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.in.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Thank you</title>
    <style>img[alt="www.000webhost.com"] {display: none;}</style>
</head>
<body>
<script type="text/javascript">
Swal.fire({ 
  title: '<?php
$MERCHANT_ID = 'TESTJAYVEE';
$MERCHANT_PASSWORD = 'HnJhcHWyuzN7AKJ';
$digest = isset($_GET['digest']) ? trim($_GET['digest']) : '' ;
$txnid = isset($_GET['txnid']) ? trim($_GET['txnid']) : '' ;
$status = isset($_GET['status']) ? trim($_GET['status']) : '' ;
$refno = isset($_GET['refno']) ? trim($_GET['refno']) : '' ;
$message = isset($_GET['message']) ? trim($_GET['message']) : '' ;
$description = isset($_GET['description']) ? trim($_GET['description']) : '' ;
$email = isset($_GET['email']) ? trim($_GET['email']) : '' ;
$RefDate = isset($_GET['RefDate']) ? trim($_GET['RefDate']) : '' ;
$token = base64_encode( $MERCHANT_ID.':'.$MERCHANT_PASSWORD );
function getTransaction($token,$refno){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.dragonpay.ph/api/collect/v1/refno/'.$refno,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic ".$token,
            "Cache-Control: no-cache",
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {$data =  json_decode($err);} else {$data = json_decode($response);}return $data;}
    if(!strlen($refno)){echo 'No Transaction found';exit;}
    $transaction_data = getTransaction($token,$refno);
$status   = "";
if ($transaction_data->Status == "S"){
     $status = "Paid";
} elseif ($transaction_data->Status == "P"){
     $status = "Pending";
} elseif ($transaction_data->Status == "F"){
     $status = "Failed";
}

echo "<h5>Your Payment is ". $status; echo "<br>";
echo "Refno: ". $transaction_data->RefNo;echo "<br>";
echo "Message: ". $transaction_data->ProcMsg; echo "<br>";
?>',

<?php
$icon = "";
if ( $transaction_data->Status == "S"){
    $icon = "success";
}elseif($transaction_data->Status == "P"){
    $icon = "info";
}else {
    $icon = "error";
}
// insert or update
$digest_data = isset($_GET['digest']) ? $_GET['digest'] : '';
$is_success = false;
$query = "SELECT * FROM orders where trans_id = '$transaction_data->TxnId'";
$result = $conn->query($query);
if ($result->num_rows > 0)
{
    // $param1 = mysql_real_escape_string($param1);
    $query = "UPDATE transactions SET status = '$transaction_data->Status', digest = '$digest_data', refno = '$transaction_data->RefNo', amount = '$transaction_data->Amount', message = '$transaction_data->ProcMsg', param1 = '$transaction_data->Param1', param2 = '$transaction_data->Param2', description = '$transaction_data->Description', email = '$transaction_data->Email', refdate = '$transaction_data->RefDate' WHERE trans_id = '$transaction_data->TxnId'";
    if ($conn->query($query))
    {
        $is_success = true;
    }
    else{
        $is_success = false;
    }
}
else {
    $query = "INSERT INTO orders (refno,status,digest,message,trans_id,amount,description,email,param1,param2,refdate) VALUES ('$transaction_data->RefNo', '$transaction_data->Status','$digest_data', '$transaction_data->ProcMsg','$transaction_data->TxnId','$transaction_data->Amount','$transaction_data->Description','$transaction_data->Email','$transaction_data->Param1','$transaction_data->Param2','$transaction_data->RefDate')";
    if($conn->query($query)){
        $is_success = true;
    }
    else{
        $is_success = false;
    }
}
?>
    text: '',
  showConfirmButton: true,
  allowOutsideClick: false,
   confirmButtonText: 'Back to Merchant',
  icon: '<?php echo $icon; ?>'
})
.then((result) => {
  if (result.isConfirmed) {
    window.location.href = "https://dev-jrodrigueza.online/transactions/standard_collection/";
  }
})
</script>
</body>
</html>