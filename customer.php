<?php
include 'config.php'; 

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data
  $title = $_POST['validationTitle'];
  $firstName = $_POST['validationFirstName'];
  $middleName = $_POST['validationMiddletName'];
  $lastName = $_POST['validationLastName'];
  $contactNumber = $_POST['validationContactNumber'];
  $district = $_POST['validationDistrict'];

  
  



   
    
    
    $sql = "INSERT INTO customer(title, first_name,middle_name, last_name, contact_no, district)
            VALUES ('$title', '$firstName','$middleName', '$lastName', '$contactNumber', '$district')";
    
    
    
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Wow! User Registration Completed.')</script>";
        
        
        
    } 
    
    else {
        echo "Customer registered not successfully!";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;

    }
    include 'customer-ui.php';
    $title="";
    $firstName="";
    $middleName="";
    $lastName ="";
    $contactNumber="";
    $district="";


}







  




  

// Function to search for customers based on a keyword
function searchCustomers($keyword) {
    global $conn;
    
    $sql = "SELECT * FROM customers WHERE first_name LIKE '%$keyword%' OR last_name LIKE '%$keyword%'";
    
    $result = mysqli_query($conn, $sql);
    $customers = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
    }
    
    return $customers;
}

// Function to retrieve a list of all customers from the database
function getAllCustomers() {
    global $conn;
    
    $sql = "SELECT * FROM customers";
    
    $result = mysqli_query($conn, $sql);
    $customers = array();
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
    }
    
    return $customers;
}
?>
