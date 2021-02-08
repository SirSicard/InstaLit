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

<div class="body-container">
    <div class="content-container">
        <div class="card text-center" style="width: 18rem;">
            <img src="images/ui/logoXL.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Create an account</h5>
                <form method="post" action="">
                    <div class="form-group login-form">
                        <input class="form-input" id="email" name="email" type="email" placeholder="Email" required>
                        <input class="form-input" id="fullname" name="fullname" type="fullname" placeholder="Fullname" required>
                        <input class="form-input" id="username" name="username" type="username" placeholder="Username" required>
                        <input class="form-input" id="password" name="password" type="password" placeholder="Password" required>
                        <input type="submit" class="lit-button" value="Create account">
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