<?php //include("includes/header.php"); ?>
<!---->
<?php //include("includes/footer.php"); ?>

<?php

require "libraries/classes/Database.php";
$connect = new Database();


//insert
//$insert = $connect->insert("insert into user_details (user_id, name, bio, gender, website) values (8, 'ashish aryal', 'interesting stuff here', 'male', 'google.com')");
////
//echo $insert;

//    select data from a table
 $geteverything = $connect->select("select * from users, user_details where users.id=8 and user_details.user_id=8");
 print_r($geteverything);

// select one specific user from the table with id=4
//    $user = $connect->select("select * from users where id=4");
//    print_r($user);

//    update stuff in the database
//$connect->update("update users set email='ashisharyal@outlook.com', password='newpassword' where id=4");

//    remove stuff from table
//$connect->remove("delete from users");
