<?php
//require the database class
require_once '../classes/Database.php';



//start session
session_start();

$action = $_POST['submit'];

if($action === "Create account"){
    $username = $_POST['username'];
    // discuss security and hashing of password
    $password = md5($_POST['password']);
    $email = $_POST['email'];


    signup($username, $email, $password);
}

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
                echo "you have registered one user";
            }else{
                echo "something went wrong.";
            }
    }else{
        echo "items cannot be empty";
    }
}


//function to log a user in
function login(){

}

//function to log a user out
function logout(){

}