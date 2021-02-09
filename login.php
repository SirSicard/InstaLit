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
<body>

<div class="center">
  <div class="container">
    <img src="images/ui/logoXL.png" alt="" class="login-img">
    <div class="text"></div>
    <form method="post" action="/libraries/engine/auth.php">
      <div class="data">
        <label>Email or Phone</label>
        <input name="email" type="text" required>
      </div>
    <div class="data">
      <label>Password</label>
      <input name="password" type="password" required>
    </div>
    <div class="forgot-pass">
      <a href="#">Forgot Password?</a></div>
      <div class="btn">
        <div class="inner"></div>
      <input type="submit" name="submit" value="Login">
      </div>
      <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
    </form>
  </div>
</div>
  
</body>
</html>