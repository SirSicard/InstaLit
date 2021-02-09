<?php //include("includes/header.php");
session_start();

// if no user is logged in
if(!isset($_SESSION['user']))
{
    session_destroy();
    header("Location:login.php");
}

// get user id from session
$user_id = $_SESSION['user'];


//check if the user has profile or not
require_once 'libraries/classes/Database.php';
$connect = new Database();
$userData = $connect->select("select * from user_details where user_id=?",'i', [$user_id]);

// if user doesnt have profile, take him to the page to settings
if(empty($userData)) { header("Location: settings.php"); }
//if he has profile, show the feed page
//print_r($userData);
$getFeeds = $connect->select("select * from posts", "", []);
print_r($getFeeds);


include("libraries/includes/header.php");

?>
<div>
    If you see this, you have logged in
</div>
<?php include("libraries/includes/footer.php"); ?>