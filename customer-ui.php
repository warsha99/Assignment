<?php
include 'config.php'; ?>

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
      <h2>Register Customer</h2>
      <form class="row g-3 needs-validation" action="customer.php" method="post"  novalidate>

      <div class="form-group">
          <label for="validationTitle" class="col-sm-2 col-form-label">Title:</label>
          <div class="col-sm-10">
            <select class="form-control" id="validationTitle" name="validationTitle" required>
              <option value="Mr">Mr</option>
              <option value="Mrs">Mrs</option>
              <option value="Miss">Miss</option>
              <option value="Dr">Dr</option>
            </select>
          </div>
          <div class="invalid-feedback">
                Please provide a valid item code.
          </div>
        </div>
        <div class="form-group">
          <label for="validationFirstName" class="col-sm-2 col-form-label">First Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="validationFirstName" name="validationFirstName" required>
          </div>
          <div class="invalid-feedback">
                Please provide a valid first name.
          </div>
        </div>
        <div class="form-group">
          <label for="validationMiddletName" class="col-sm-2 col-form-label">Middle Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="validationMiddletName" name="validationMiddletName" required>
          </div>
          <div class="invalid-feedback">
                Please provide a valid middle name.
          </div>
        </div>
        <div class="form-group">
          <label for="validationLastName" class="col-sm-2 col-form-label">Last Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="validationLastName" name="validationLastName" required>
          </div>
          <div class="invalid-feedback">
                Please provide a valid last name.
            </div>
        </div>
        <div class="form-group">
          <label for="validationContactNumber" class="col-sm-2 col-form-label">Contact Number:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="validationContactNumber" name="validationContactNumber" required>
          </div>
          <div class="invalid-feedback">
                Please provide a valid Contact Number.
          </div>
        </div>
        <div class="form-group">
          <label for="validationDistrict" class="col-sm-2 col-form-label">District:</label>
          <select class="form-control" id="validationDistrict" name="validationDistrict" required>
            <option value="">Select District</option>
            <?php
            // Connect to your MySQL database
            // $conn = mysqli_connect("localhost", "username", "password", "database_name");
            
            // // Check connection
            // if (mysqli_connect_errno()) {
            //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
            // }
            
            // Retrieve item categories from the database
            $query = "SELECT * FROM district WHERE active='yes'";
            $result = mysqli_query($conn, $query);
            
            // Generate options based on the retrieved data
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['district'] . '</option>';
            }
            
            // Close the database connection
            // mysqli_close($conn);
            ?>
          </select>
          <div class="invalid-feedback">
                Please provide a valid District.
          </div>
        </div>
        <div class="form-group">
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="validationInvalidCheck" required>
              <label class="form-check-label" for="validationInvalidCheck">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
              You must agree before submitting.
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
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
