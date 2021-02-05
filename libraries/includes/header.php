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

    <title>InstaLIT</title>
</head>
<body>

<?php
  $links = array(
    'index' => 'Home',
    'login' => 'Login',
    'signup' => 'Sign Up',
  );
?>

<!-- START navigation -->
  <nav>
    <div class="nav-container">
      <div class="nav-left">
        <img src="images/ui/logoXL.png" alt="">
      </div>

      <div class="spacer"></div>

      <div class="searchbar">
        <form action="/action_page.php">
          <input type="text" placeholder="Search" name="search">
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>

      <div class="spacer"></div>

      <div class="nav-links">
        <ul class="nav-right no-bullets">
          <?php foreach($links as $link_key => $link_value){ 
            if( isset($_SESSION["usersID"]) && ( $link_key === 'signup' || $link_key === 'login' ) ){ 
              // do nothing
            } else { ?>
              <li>
                <a href="<?= $link_key; ?>.php">
                  <?= $link_value; ?>
                </a>
              </li>
            <?php } ?>
          <?php } ?>
        
        <div class="avatar">
          <img src="images/ui/default_user.png" alt="">
        </div>
      
      </div>
    </div>
  </nav>
<!-- END nagivation -->