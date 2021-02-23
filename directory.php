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

//check if the user has profile or not
require_once 'libraries/classes/Database.php';
$connect = new Database();
$userData = $connect->select("select * from user_details where user_id=?",'i', [$user_id]);

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
            <?php foreach($userData as $member)
                {
               ?>
            <div class="content-container">
              <div class="post-left">
                  <a href="profile.php?user_id=<?= $member['user_id']; ?> ">
                    <?= $member['username']; ?>
                  </a>
              </div>
              <div class="spacer"></div>
              <div class="post-right">
                <?= $member['name']; ?>
              </div>
            </div>

            <?php 
          } ?>
        
        </div>
        
       

<?php include("libraries/includes/footer.php"); ?>