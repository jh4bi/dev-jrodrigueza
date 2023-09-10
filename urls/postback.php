<?php
define('MERCHANT_ID', 'TESTJAYVEE');
define('MERCHANT_PASSWORD', 'HnJhcHWyuzN7AKJ');
include('../config/conn.php');

// Response
$digest = $_POST['digest'] ?? '';
$txnid = $_POST['txnid'] ?? '';
$status = $_POST['status'] ?? '';
$refno = $_POST['refno'] ?? '';
$message = $_POST['message'] ?? '';

$result = 'unknown';
$is_okay = false;

// Translate to your transaction status.
$merchant_statuses = [
    'P' => 'Pending',
    'U' => 'Unpaid',
    'F' => 'Payment_Failed',
    'S' => 'Paid',
    'V' => 'Cancelled', // Merchant cancelled or the user requested for a refund directly through Dragonpay.
    'R' => 'Reversed', // Only for credit cards and other payment methods that can be reversed.
];

if (empty($digest) || empty($txnid) || empty($status) || empty($refno) || empty($message)) {
    $result = 'missing_parameters';
} else if (!in_array($status, array_keys($merchant_statuses))) {
    $result = 'invalid_status_' . $status;
} else {
    // Use prepared statements to protect against SQL injection
    $query = "SELECT * FROM orders WHERE trans_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $txnid);
    $stmt->execute();
    $result_set = $stmt->get_result();

    if ($result_set->num_rows > 0) {
        $merchant_status = $merchant_statuses[$status];
        $query = "UPDATE orders SET status = ?, refno = ?, message = ? WHERE trans_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $merchant_status, $refno, $message, $txnid);

        if ($stmt->execute()) {
            $result = 'ok';
            $is_okay = true;
        } else {
            $result = 'db_error';
        }
    } else {
        $result = 'txn_not_found';
    }
}

if (!$is_okay) {
    http_response_code(500);
}

header('Content-Type: text/plain');
echo "result=$result";
?>
