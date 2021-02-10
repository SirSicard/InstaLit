<?php
session_start();
// if no user is logged in
if(!isset($_SESSION['user']))
{
    session_destroy();
    header("Location:login.php");
}

//find out what user wants to do
$action = $_POST['action'];
$user_id = $_SESSION['user'];

// prepare post data for create or save profile
if($action == "Save Profile" or $action == "Create Profile")
{

        $name =$_POST['name'];
        $bio =$_POST['bio'];
        $gender = $_POST['gender'];
        $website = $_POST['website'];

}

//if user want to create profile
if($action == "Create Profile"){
    //create profile
    createProfile($name, $bio, $gender, $website);
    //if user uploads profile
    if(!$_FILES["profile"]["error"] == 4) {
        uploads($_FILES['profile'],$user_id, "profile");
    }

    //redirect to feed page
    header("Location:../../index.php");
}


//if user wants to update profile
if($action == "Save Profile"){
    // update profile
    updateProfile($name, $bio, $gender, $website, $user_id);
    //if user uploads profile
    if(!$_FILES["profile"]["error"] == 4) {
        uploads($_FILES['profile'],$user_id, "profile");
    }
    header("Location:../../index.php");
}


if($action == "Save Password"){
    updatePassword($_POST['password'], $user_id);
    header("Location:../../index.php");
}

if($action == "Post new picture"){
    $filter = $_POST['filter'];
    $caption = $_POST['caption'];

    uploadPost($filter, $caption, $user_id);

    header("Location:../../index.php");
}


// functions
function createProfile($name, $bio, $gender, $website){
    require_once '../classes/Database.php';
    $connect = new Database();
    $connect->insert("INSERT INTO `user_details` (`user_id`, `name`, `bio`, `gender`, `website`)  VALUES(?,?,?,?,?)",
        'sssss',
        [$_SESSION['user'],$name, $bio, $gender, $website]

        );

}

function updateProfile($name, $bio, $gender, $website, $user_id){
    require_once '../classes/Database.php';
    $connect = new Database();
    $connect->update("UPDATE `user_details` SET `name` =?, `bio` =?, `gender` =?, `website` =? WHERE `user_id` = ?",
        'sssss',
        [$name, $bio, $gender, $website, $user_id]
    );
}





function updatePassword($password, $user_id)
{
    require_once '../classes/Database.php';
    $connect = new Database();
    $connect->update("UPDATE `users` SET `password` =? WHERE `id` = ?",
                    'ss',
                    [md5($password), $user_id]);
}


function uploadPost($filter, $caption, $user_id){
    require_once '../classes/Database.php';
    $connect = new Database();
    $id = $connect->insert("INSERT INTO `posts` (`user_id`, `content`, `filter`)  VALUES(?,?,?)",
        'sss',
        [ $user_id, $caption, $filter ]
    );
    if(!$_FILES["post"]["error"] == 4) {
        uploads($_FILES['post'], $id , "posts");
    }



}

function uploads($image,$user_id, $type){

    //where to save the image
    $user = $_SESSION['user'];
    $destination = "..\\..\\images\\users\\$user\\$type\\";
    $fileToUpload = $destination.$user_id;
    $imageFileType = strtolower(pathinfo($destination.basename($image["name"]),PATHINFO_EXTENSION));
    var_dump($fileToUpload);

    $file = $destination.basename($image["name"]);
    $verified = 1;


    //check if the uploaded file is image or not
    if(isset($_POST["submit"])) {
        $check = getimagesize(image["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $verified = 1;
        } else {
            echo "File is not an image.";
            $verified = 0;
        }
    }
    // only allow jpg
    if($imageFileType != "jpg" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $verified = 0;
    }

    // Check if varification is still ok or not
    if ($verified == 0) {
        echo "Sorry, your file was not uploaded.";
        // if yes, proceed to upload
    } else {
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        if (move_uploaded_file($image["tmp_name"], $fileToUpload.".".$imageFileType)) {

            echo "The file ". htmlspecialchars( basename( $image["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }



}