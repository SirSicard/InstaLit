<?php
include_once("libraries/includes/header.php");
?>
<form method="post" action="">
    <div class="form-group">
        <label class="form-label" for="email">email</label>
        <input class="form-input" id="email" name="email" type="email" required>
        <label class="form-label" for="fullname">Fullname</label>
        <input class="form-input" id="fullname" name="fullname" type="fullname" required>
        <label class="form-label" for="username">Username</label>
        <input class="form-input" id="username" name="username" type="username" required>
        <label class="form-label" for="password">Lösenord</label>
        <input class="form-input" id="password" name="password" type="password" required>
        </label>
        <input type="submit" class="" value="Create account">
    </div>
</form>

<?php include_once("libraries/includes/footer.php"); ?>