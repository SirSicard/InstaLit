<?php //include("includes/header.php");
session_start();
require 'vendor/autoload.php';

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
if(empty($userData)) { header("Location: settings.php"); }
//if he has profile, show the feed page
//print_r($userData);
$posts = $connect->select("SELECT `posts`.*, `user_details`.`name`, `users`.`username` FROM `posts` INNER JOIN `user_details` on `posts`.`user_id`=`user_details`.`user_id` INNER JOIN `users` on `user_details`.`user_id`=`users`.`id` ORDER BY `posts`.`id` DESC ", "", []);



include("libraries/includes/header.php");

?>
    <div class="row">
    <div class="col-12">
    <div class="post-container">

    <?php

    foreach($posts as $post)
    {

       ?>
        <div class="card">
            <div class="card-header">
                <div class="content-container">
                    <div class="post-left">Avatar Image | <?php echo $post['username']; ?></div>
                    <div class="spacer"></div>
                    <div class="post-right"><?php echo Carbon::parse($post['created_at'])->diffForHumans(); ?></div>
                </div>

            </div>
            <div class="card-body text-center">
                <div class="post-img">
                    <a href="https://placeholder.com"><img src="https://via.placeholder.com/500" alt=""></a>
                </div>

                <div class="post-caption">
                    <?php echo $post['content']; ?>
                </div>

                <div class="post-reactions">
                    Here be Reactions - (reactions table in database)
                </div>

                <div class="post-comments">
                    this will be where the comments are displayed (comments table)
                </div>
            </div>

            <div class="card-footer text-muted">
                this will be where users can input a comment
            </div>
        </div>
       <?php

    }
    ?>
    </div>
    </div>




<?php include("libraries/includes/footer.php"); ?>