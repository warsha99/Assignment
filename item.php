<?php
include 'config.php'; 

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data
  $itemcode = $_POST['validationItemCode'];
  $itemName = $_POST['validationItemName'];
  $itemCategory = $_POST['validationItemCategory'];
  $itemSubCategory= $_POST['validationItemSubCategory'];
  $quantity = $_POST['validationQuantity'];
  $unitPrice = $_POST['validationUnitPrice'];

  
    
    $sql1 = "INSERT INTO item(item_code, item_category, item_subcategory, item_name, quantity, unit_price)
            VALUES ('$itemcode', '$itemCategory', '$itemSubCategory','$itemName', '$quantity', '$unitPrice')";
    
    
    
    
    if (mysqli_query($conn, $sql1)) {
        echo "<script>alert('Wow! Item entered successfully.')</script>";
        
        
        
    } 
    
    else {
        echo "Item registered not successfully!";
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        return false;

    }
    include 'item-ui.php';
    $itemcode="";
    $itemName="";
    $itemCategory="";
    $itemSubCategory ="";
    $quantity="";
    $unitPrice="";


}