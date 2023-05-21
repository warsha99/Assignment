<?php 
include 'config.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<?php
function getInvoiceReport($startDate, $endDate) { 
global $conn;
    $query = "SELECT i.invoice_no, i.date, i.customer, c.district, i.item_count, i.amount
              FROM invoice i
              INNER JOIN customer c ON i.customer = c.id
              WHERE i.date BETWEEN '$startDate' AND '$endDate'
              GROUP BY i.invoice_no";

    $result = $conn->query($query);
    if ($result) {
        if ($result->num_rows > 0) {

            echo '<table class="table table-striped">';
            echo '<thead><tr><th>Invoice Number</th><th>Date</th><th>Customer</th><th>District</th><th>Item Count</th><th>Invoice Amount</th></tr>";</tr></thead>';
            echo '<tbody>';
        

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['invoice_no']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['customer']."</td>";
                    echo "<td>".$row['district']."</td>";
                    echo "<td>".$row['item_count']."</td>";
                    echo "<td>".$row['amount']."</td>";
                    echo "</tr>";
                }

        echo "</table>";
        } 
        else 
        {
            echo "No records found.";
        }
    }
else {
    echo "Query execution failed: " . $conn->error;
}
}



if (isset($_POST['submit'])) {
    
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Generate the invoice report
    echo "<h2>Invoice Report</h2>";
    getInvoiceReport($startDate, $endDate);
}

?>