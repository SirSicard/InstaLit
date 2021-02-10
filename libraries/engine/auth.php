<?php
//require the database class
require_once '../classes/Database.php';



//start session
session_start();

// get what user wants to do,
$action = isset($_POST['submit'])?$_POST['submit']:$_GET['action'];


// if user wants to create an account
if($action === "Create account"){
    $username = $_POST['username'];
    // discuss security and hashing of password
    $password = md5($_POST['password']);
    $email = $_POST['email'];


    signup($username, $email, $password);
}



// if user wants to login
if($action === "Login")
{
    //    catch login details
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    login($email, $password);
}


// if user wants to logout
if($action === "logout") { logout(); }

//function to sign up a user
function signup($username, $email, $password){


    if(!empty($username) and !empty($email) and !empty($password)){
        $connect = new Database();

        // insert($statement, $type, $parameter)
        // statement is the sql with bind data, types is the type of data that will be inserted(s= strings, i = integer), parameter is postdata

            $createUser = $connect->insert("INSERT INTO users(username, email, password) VALUES (?,?,?)",
                'sss',
                [
                    $username, $email, $password
                ]);

            if(is_numeric($createUser)) {
                header("Location: ../../editprofile.php");
            }else{
                header("Location: ../../login.php");
            }
    }else{
        header("Location: ../../login.php");
    }
}


//function to log a user in
function login($email, $password){


//    check if login details are not empty
    if(!empty($email) and !empty($password))
    {
        //    connect to database
        $connect = new Database();
        //    match the records
            // statements, types, parameters
        $auth = $connect->select("select * from users where email = ? and password = ?",
            'ss',
            [
                $email, $password
            ]);
        if(!empty($auth))
            {

                $_SESSION['user'] = $auth[0]['id'];
                header("Location:../../index.php");
//                after session value is set up, send the user to profile page
            }
        else
            {
//                Login data was not correct
            header("Location: ../../login.php");
            }

    }
    else{
//                redirect user to login page again
        header("Location: ../../login.php");
    }


}

//function to log a user out
function logout(){

    session_destroy();
    header("Location: ../../login.php");

}