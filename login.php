<?php
include_once("libraries/includes/header.php");
?>

<section>
  <h2>Login</h2>
  <form method="post" action="/libraries/engine/auth.php">
    <input type="text" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="submit" name="submit" value="Login">
  </form>
</section>

<?php include_once("libraries/includes/footer.php"); ?>