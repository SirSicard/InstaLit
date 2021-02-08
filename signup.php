<?php
include_once("libraries/includes/header.php");
?>

<div class="body-container">
    <div class="content-container">
        <div class="card text-center" style="width: 18rem;">
            <img src="images/ui/logoXL.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Create an account</h5>
                <form method="post" action="/libraries/engine/auth.php">
                    <div class="form-group login-form">
                        <input class="form-input" id="email" name="email" type="email" placeholder="Email" >
<!--                        <input class="form-input" id="fullname" name="fullname" type="fullname" placeholder="Fullname" required>-->
                        <input class="form-input" id="username" name="username" type="username" placeholder="Username" >
                        <input class="form-input" id="password" name="password" type="password" placeholder="Password" >
                        <input name="submit" type="submit" class="lit-button" value="Create account">
                        <p class="policy-text">By registering, you agree to our terms of use, our data policy and our policy for cookies. Read more about how we collect, use and share your information in our data policy and how we use cookies and similar technology in our cookie policy.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="content-container">
    <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <p class="card-title policy-text">Already have an account? <a class="log-in-button" href="login.php">Log in</a></p>
            
        </div>

    </div>
</div>


<?php include_once("libraries/includes/footer.php"); ?>