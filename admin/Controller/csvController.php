<?php
// Function to convert an array to CSV string
include '../Model/db.php';
function arrayToCsv($array)
{
    $output = fopen('php://temp', 'w');
    foreach ($array as $row) {
        fputcsv($output, $row);
    }
    rewind($output);
    $csv = stream_get_contents($output);
    fclose($output);
    return $csv;
}

if (isset($_GET['subscription_type'])) {
    $subscribe = getSubscribeUser('subscription', 'subscription_type', $_GET['subscription_type']);
} else {
    $subscribe = getAllSubscription('subscription');
}

$data = array();
$total = 0;
while ($row = mysqli_fetch_assoc($subscribe)) {
    $total +=  $row['amount'];
    $users = mysqli_fetch_assoc(getSubscribeUser('user_details', 'user_id', $row['user_id']));
    if ($row['status'] == "Approved") {
        $data[] = array(
            $row['subscription_id'],
            $users['first_name'] . " " . $users['last_name'],
            ($row['subscription_type'] == 1) ? "Standard" : (($row['subscription_type'] == 2) ? "Advanced" : "Premium"),
            date('M d Y h:i:s', strtotime($row['date_created'])),
            number_format($row['amount'], 2)
        );
    }
}

$csvData = array(
    array('Subscription Id', 'User', 'Subscription Type', 'Date Subscribe', 'Amount'),
    ...$data,
    array('', '', '', '', 'Total: ' . number_format($total, 2))
);

$csvContent = arrayToCsv($csvData);

// Set the appropriate headers for file download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="subscription_data.csv"');

// Output the CSV content
echo $csvContent;


?>