<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>Fobia - Bootstrap5 Admin Template</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h4>Join us today</h4>
                  <p>Enter your email and password to register</p>
                </div>
                <form class="form-body row g-3" method="post">
                  <div class="col-12">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        I agree the Terms and Conditions
                      </label>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="position-relative border-bottom my-3">
                      <div class="position-absolute seperator translate-middle-y">or continue with</div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 text-center">
                    <p class="mb-0">Already have an account? <a href="login.php">Sign in</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none register-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->


</body>

</html>


<?php


$conn = mysqli_connect("localhost", "usman", "1234", "cash");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['email'])){
  $name = $_POST['name'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  // Insert into user table
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "User inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close connection
mysqli_close($conn);

?>