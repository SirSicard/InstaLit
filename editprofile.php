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
$userData = $connect->select("SELECT `user_details`.*, `users`.`email` from `user_details` INNER JOIN `users` on `user_details`.`user_id` = `users`.`id` WHERE `user_details`.`user_id` = ?",'i', [$user_id]);
?>


<?php include("libraries/includes/header.php"); ?>
<form method="post" action="libraries/engine/userActions.php" enctype="multipart/form-data">
    <div class="profile-container">
        <div class="main-body">
            <div class="row gutters-sm">    

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                    <?php 
                                          //if(!empty($userData))  { echo "/images/users/$user_id/profile/$user_id.jpg" ;} else  { echo "/images/ui/default_user.png"; } 

                                          if( file_exists(__DIR__."/images/users/{$userData[0]['user_id']}/profile") ){
                                            // Get the path to the current users img folder
                                            $img_folder = __DIR__."/images/users/{$userData[0]['user_id']}/profile";
                                            // Then we scan it for all images and remove the other paths
                                            $imgs = array_diff(scandir($img_folder), array('..', '.'));
                                            $img_file = '';
//                                            print_r($imgs);
                                          
                                            // After we've found all images in the folder, we check all of them to see if any of them are the current img we want
//                                            foreach( $imgs as $img_key => $img ){
//                                              // If the ID ends with a . we know it's our image cause strpos() will return 0
//                                              // strpos() returns FALSE if it cannot find any match
//                                              if( strpos($img, "{$userData[0]['id']}.") === 0 ){
//                                                $img_file = $img;
////
//                                              }
//                                            }
                                          ?>
                                            <img class="rounded-circle mt-5" width="150px" src="/images/users/<?php echo $userData[0]['user_id']; ?>/profile/<?php echo $imgs[2]; ?>" alt="">
                                          <?php
                                          } else {
                                            echo 'Error: User\'s image folder does not exist. Please check your System\'s Permissions or contact an Administrator.';
                                          }
                                          ?>

                                <span class="font-weight-bold"><?php if(!empty($userData)){ echo $userData[0]['name']; } ?></span>
                                <span class="text-black-50"><?php if(!empty($userData)){ echo $userData[0]['website']; } ?></span>
                            </div>
                            <div class="d-flex flex-column align-items-center text-center" id="img-section"> <b>Profile Photo</b>
                                <p>Accepted  type .png. Less than 1MB</p>
                                <input class="btn btn-primary profile-button" type="file" name="profile">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 py-1">
                                    <label class="labels">Name</label>
                                    <input type="text"  name="name" class="form-control" placeholder="Full Name" value="<?php if(!empty($userData)){ echo $userData[0]['name']; } ?>">
                                </div>
                                <div class="col-md-12 py-1">
                                    <label class="labels">Bio</label>
                                    <textarea name="bio" type="text" class="form-control"> <?php if(!empty($userData)){ echo $userData[0]['bio']; } ?></textarea>
                                </div>
                            </div>
                            <div class="row mt12">
                                <div class="col-md-12 py-1">
                                    <label class="labels">Website</label>
                                    <input name="website" type="text" class="form-control" placeholder="website" value="<?php if(!empty($userData)){ echo $userData[0]['website']; } ?>">
                                </div>
                                <div class="col-md-12 py-1">
                                    <label class="labels">Gender</label>
                                    <input name="gender" type="text" class="form-control" placeholder="Gender" value="<?php if(!empty($userData)){ echo $userData[0]['gender']; } ?>">
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <input type="submit" name ="action" class="btn btn-primary profile-button" value="<?php if(!empty($userData)){ echo "Save Profile"; } else{ echo "Create Profile";} ?>">
                            </div>
                        </div>
                    </div>             
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <h4 class="text-right">Change Password</h4>
                                    </div>
                                    <div class="row mt12">
                                        <div class="col-md-12">
                                            <label class="labels">Enter your new password here</label>
                                            <input name="password" type="password" class="form-control" placeholder="Password" value="">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <input name="action" class="btn btn-primary profile-button" type="submit" value="Save Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</form>



<?php include_once("libraries/includes/footer.php"); ?>