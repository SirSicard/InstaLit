<?php
include_once("libraries/includes/header.php");
?>

<div class="body-container">
    <div class="content-container">
        <div class="card text-center" style="width: 18rem;">
            <img src="images/ui/logoXL.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Create an account</h5>
                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-input" id="email" name="email" type="email" placeholder="Email" required>
                        <input class="form-input" id="fullname" name="fullname" type="fullname" placeholder="Fullname" required>
                        <input class="form-input" id="username" name="username" type="username" placeholder="Username" required>
                        <input class="form-input" id="password" name="password" type="password" placeholder="Password" required>
                        <input type="submit" class="lit-button" value="Create account">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="content-container">
    <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Already have an account?</h5>
            <a href="login.php">Log in</a>
        </div>

    </div>
</div>


<?php include_once("libraries/includes/footer.php"); ?>