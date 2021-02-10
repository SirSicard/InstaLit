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
                <div class="post-img <?php echo $post['filter']; ?>">
                    <img src="/images/users/<?php echo $post['user_id']; ?>/posts/<?php echo $post['id']; ?>.jpg" alt="">
                </div>

                <div class="post-caption">
                    <?php echo $post['content']; ?>
                </div>

                <div class="post-reactions">
                    Here be Reactions - (reactions table in database)
                </div>


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
                            <p>
                                <b><?php echo $comment['name']; ?></b>: <?php echo $comment['content']; ?>
                            </p>
                            <hr>
                            <?php

                        }
                    }

                    ?>
                </div>
                <form method="post" action="libraries/engine/userActions.php" >
                    <label>Write Comment</label><br>
                    <textarea name="content">
                                        </textarea><br>
                    <input name="post_id" hidden value="<?php echo $post['id']; ?>">
                    <input  type="submit" name="action" value="Post Comment">

                </form>
            </div>
        </div>
       <?php

    }
    ?>
    </div>
    </div>




<?php include("libraries/includes/footer.php"); ?>