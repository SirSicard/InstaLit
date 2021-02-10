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
?>

<div>
    If you see this, this is the results page.
</div>

<div class="row">
  <div class="col-12">
    <div class="post-container">
      <div class="card">
        <div class="card-header">
          User Search Results
        </div>
        <div class="card-body text-center">

          <!-- if we are using a foreach loop to make all of the results, this is the template:   -->
          <div class="content-container">
            <div class="post-left">Avatar Image | username</div>
            <div class="spacer"></div>
            <div class="post-right">timestamp</div>
          </div>
        
        </div>
        
       

<?php include("libraries/includes/footer.php"); ?>