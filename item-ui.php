<?php include "config.php";?>
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Assignment</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
<div class="container">
  <h2>Register Item</h2>
  <form class="row g-3 needs-validation" action="item.php" method="post"  novalidate>
        
    <div class="form-group">
                <label for="validationItemCode" class="form-label">Item Code:</label>
                <input type="text" class="form-control" id="validationItemCode" name="validationItemCode" required>
                <div class="invalid-feedback">
                Please provide a valid item code.
                </div>
    </div>
        
    <div class="form-group">
      <label for="validationItemName" class="form-label">Item Name:</label>
      <input type="text" class="form-control" id="validationItemName" name="validationItemName" required>
      <div class="invalid-feedback">
      Please provide a valid item Name.
      </div>
    </div>

        <div class="form-group">
        <label for="validationItemCategory">Item Category:</label>
        <select class="form-control" id="validationItemCategory" name="validationItemCategory" required>
            <option value="">Select Category</option>
            <?php
            // Connect to your MySQL database
            // $conn = mysqli_connect("localhost", "username", "password", "database_name");
            
            // // Check connection
            // if (mysqli_connect_errno()) {
            //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
            // }
            
            // Retrieve item categories from the database
            $query = "SELECT * FROM item_category";
            $result = mysqli_query($conn, $query);
            
            // Generate options based on the retrieved data
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
            }
            
            // Close the database connection
            // mysqli_close($conn);
            ?>
        </select>
        <div class="invalid-feedback">
        Please choose a category.
        </div>
        </div>
    <div class="form-group">
      <label for="validationItemSubCategory">Item sub category:</label>
      <select class="form-control" id="validationItemSubCategory" name="validationItemSubCategory" required>
        <option value="">Select Sub Category</option>
        <?php
        //   // Connect to your MySQL database
        //   $conn = mysqli_connect("localhost", "username", "password", "database_name");
          
        //   // Check connection
        //   if (mysqli_connect_errno()) {
        //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
        //   }
          
          // Retrieve item categories from the database
          $query1 = "SELECT * FROM item_subcategory";
          $result1 = mysqli_query($conn, $query1);
          
          // Generate options based on the retrieved data
          while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['id'] . '">' . $row['sub_category'] . '</option>';
          }
          
          // Close the database connection
          mysqli_close($conn);
        ?>
      </select>
      <div class="invalid-feedback">
        Please choose a sub category.
      </div>
    </div>
    <div class="form-group">
      <label for="validationQuantity">Quantity:</label>
      <input type="int" class="form-control" id="validationQuantity" name="validationQuantity" required>
      <div class="invalid-feedback">
      Please provide a quantity.
      </div>
    </div>
    <div class="form-group">
      <label for="validationUnitPrice">Unit Price:</label>
      <input type="text" class="form-control" id="validationUnitPrice" name="validationUnitPrice" required>
      <div class="invalid-feedback">
      Please provide a Unit Price.
      </div>
    </div>
    <div class="form-group">
        <div class="col-12">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
              You must agree before submitting.
              </div>
            </div>
          </div>
        </div>
    <br>
    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="submit">Register</button>
        </div>
  </form>
</div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()
    </script>
</body>
</html>
