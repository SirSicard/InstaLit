<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Font Awesome Script -->
  <script src="https://kit.fontawesome.com/1f88de1726.js" crossorigin="anonymous"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="libraries/css/style.css">
  <link rel="stylesheet" href="libraries/css/login.css">

  <title>InstaLIT</title>
</head>

<body>


  <div class="center">
    <div class="container">
      <div class="content-container">
        <div class="card text-center" style="width: 410px;">
          <img src="images/ui/logoXL.png" alt="" class="login-img">
          <div class="card-body">
            <h5 class="card-title">Login</h5>
            <form method="post" action="/libraries/engine/auth.php">
              <div class="data">
                <input name="email" type="text" placeholder="Email or Phone" required>
              </div>
              <div class="data">
                <input name="password" type="password" placeholder="Password" required>
              </div>
              <div class="forgot-pass d-flex justify-content-left">
                <a href="#">Forgot Password?</a>
              </div>
              <div class="data">
                <input type="submit" name="submit" class="lit-button" value="Login">
              </div>
            </form>

          </div>
        </div>
      </div>
      <div class="login-link">
        <div class="card text-center" style="width: 410px;">
          <div class="card-body">
            <p class="card-title signup-link">Not a member? <a class="log-in-button" href="signup.php">Signup now</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>