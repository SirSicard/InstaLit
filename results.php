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
$keyword = $_POST['keyword'];

if(empty($keyword)) {
    $_SESSION['flash'] = "You need to type a name to search";
    header("Location: index.php");
}


//check if the user has profile or not
require_once 'libraries/classes/Database.php';
$connect = new Database();
$results = $connect->select("select * from user_details where match `name` AGAINST(? IN NATURAL LANGUAGE MODE)",'s', [$keyword]);

// if user doesnt have profile, take him to the page to settings
if(empty($results)) {
    $_SESSION['flash'] = "Your keyword didnt match to anything";
    header("Location: index.php"); }
//if he has profile, show the feed page
//print_r($userData);

?>

<div class="row">
  <div class="col-12">
    <div class="post-container">
      <div class="card">
        <div class="card-header">
          User Search Results
        </div>
        <div class="card-body text-center">

          <!-- if we are using a foreach loop to make all of the results, this is the template:   -->
            <?php foreach($results as $result)
                {

               ?>
          <div class="content-container">
            <div class="post-left">
                <?php echo $result['name']; ?>
            </div>
            <div class="spacer"></div>
            <div class="post-right">
            <a href="profile.php?user_id=<?php echo $result['user_id']; ?> ">View Profile</a>
            </div>
          </div>

          <?php } ?>
        
        </div>
        
       

<?php include("libraries/includes/footer.php"); ?>