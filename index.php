<?php //include("includes/header.php");
session_start();
require 'vendor/autoload.php';

// displays potential errors (not something for live hosted sites, but okay for this project.)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Carbon\Carbon;

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
if(empty($userData)) { header("Location: editprofile.php"); }
//if he has profile, show the feed page
//print_r($userData);
$posts = $connect->select("SELECT `posts`.*, `user_details`.`name`, `users`.`username` FROM `posts` INNER JOIN `user_details` on `posts`.`user_id`=`user_details`.`user_id` INNER JOIN `users` on `user_details`.`user_id`=`users`.`id` ORDER BY `posts`.`id` DESC ", "", []);

function getComments($post_id){
    $connect = new Database();
    $commentData = $connect->Select("SELECT `comments`.*, `user_details`.`name` FROM `comments` INNER JOIN `user_details` on `comments`.`user_id`=`user_details`.`user_id` where `comments`.`post_id`=?",
        's',
        [$post_id]
    );
    return $commentData;
}


include("libraries/includes/header.php");

?>
<div class="col-12">
  

<div class="post-container">
  <div class="card">
    <div class="card-header gray-accent-light">
        <div class="content-container">
          <?php 
            $feedbar = array(
              'posteditor' => [
                'name'    => 'Create New Post',
                'classes' => 'fas fa-toilet-paper',
              ]
            );
          ?>

          <div>
            Welcome, <?= $userData[0]['name'] ?? 'Friend'; ?>!
          </div>

          <div class="spacer"></div>

          <?php
          foreach($feedbar as $link_key => $link_value){ 
            if( isset($_SESSION["user"]) && ( $link_key === 'signup' || $link_key === 'login' ) ){ 
              // do nothing
            } else { ?>
              
                <a class="profile-links" href="<?= $link_key; ?>.php">
                  <i class="<?= $link_value['classes']; ?>"></i> <?= $link_value['name']; ?>
                </a>
            <?php } ?>
          <?php } ?>
        
        </div>
    </div>   
</div>

<?php

foreach($posts as $post)
{

    ?>
    <div class="card">
        <div class="card-header gray-accent-light">
            <div class="content-container">
                <div class="post-left"><?php echo $post['username']; ?></div>
                <div class="spacer"></div>
                <div class="post-right secondary-text"><?php echo Carbon::parse($post['created_at'])->diffForHumans(); ?></div>
            </div>

        </div>
        <div class="text-center">
            <div class="<?php echo $post['filter']; ?>">
                <?php
                  if( file_exists(__DIR__."/images/users/{$post['user_id']}/posts") ){
                    // Get the path to the current users img folder
                    $img_folder = __DIR__."/images/users/{$post['user_id']}/posts";
                    // Then we scan it for all images and remove the other paths
                    $imgs = array_diff(scandir($img_folder), array('..', '.'));
                    $img_file = '';
                  
                    // After we've found all images in the folder, we check all of them to see if any of them are the current img we want
                    foreach( $imgs as $img_key => $img ){ 
                      // If the ID ends with a . we know it's our image cause strpos() will return 0
                      // strpos() returns FALSE if it cannot find any match
                      if( strpos($img, "{$post['id']}.") === 0 ){
                        $img_file = $img;
                      }
                    }
                  ?>
                    <img src="/images/users/<?php echo $post['user_id']; ?>/posts/<?php echo $img_file; ?>" alt="">
                  <?php
                  } else {
                    echo 'User has no img folder';
                  }

                ?>

            </div>

            <div class="card-body post-caption">
              <div>
                <span class="secondary-text"><?php echo $post['username']; ?> says:</span> <?php echo $post['content']; ?>
              </div>
            </div>

            <!-- <div class="card-body post-reactions">
                Here be Reactions - (reactions table in database)
            </div> -->


        </div>

        <div class="card-footer text-muted">
            <div class="post-comments">
                <?php
                $comments = getComments($post['id']);
                if(sizeof($comments) >= 1)
                {
                    foreach( $comments as $comment)
                    {
                        ?>
                        <div class="content-container">
                          <b><?php echo $comment['name']; ?></b>: <?php echo $comment['content']; ?>
                          <div class="spacer"></div>
                          <div class="post-right tertiary-text"><?php echo Carbon::parse($comment['created_at'])->diffForHumans(); ?></div>
                        </div>
                        <hr>

                        
                        <?php

                    }
                }

                ?>
            </div>
            <form method="post" action="libraries/engine/userActions.php" >
                <label>Write Comment</label><br>
                  <textarea class="form-control" name="content"></textarea><br>
                
                <input name="post_id" hidden value="<?php echo $post['id']; ?>">
                <div class="text-center">
                  <input class="gray-accent-light post-submit" type="submit" name="action" value="Post Comment">
                </div>
            </form>
        </div>
    </div>
    <?php

}
?>
</div>
</div>




<?php include("libraries/includes/footer.php"); ?>