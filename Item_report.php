<?php
include 'config.php'; ?>
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

// Function to retrieve item report data
function getItemReport() {
    global $conn;
    $query = "SELECT item_name, item_category, item_subcategory, MAX(quantity) AS quantity
              FROM item
              GROUP BY item_name, item_category, item_subcategory";

    $result = $conn->query($query);
    if ($result) {
        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>Number</th><th>Item Name</th><th>Item Category</th><th>Item Subcategory</th><th>Item Quantity</th></tr></thead>';
            echo '<tbody>';

            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$counter."</td>";
                echo "<td>".$row['item_name']."</td>";
                echo "<td>".$row['item_category']."</td>";
                echo "<td>".$row['item_subcategory']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "</tr>";
                $counter++;
            }

            echo '</tbody></table>';
        } else {
            echo "No records found.";
        }
    } else {
        echo "Query execution failed: " . $conn->error;
    }
}

// Generate the item report
echo "<h2>Item Report</h2>";
getItemReport();
?>
