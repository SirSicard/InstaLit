<?php //include("includes/header.php"); ?>
<?php include("libraries/includes/header.php"); ?>
<?php
session_start();

// if no user is logged in
if(!isset($_SESSION['user']))
{
    session_destroy();
    header("Location:login.php");
}

?>
<div>
    If you see this, you have logged in
</div>
<?php include("libraries/includes/footer.php"); ?>