<?php
include('login.php'); // Includes Login Script
//checks if login user is set
if(isset($_SESSION['login_user'])){
header("location: profile.php");

}else {

header("location: loginpage.php");
}

?>
