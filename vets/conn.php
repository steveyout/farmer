<?php 

////import the database connection
require_once('config.php');

////check if form fields email and password are set
if (isset($_POST['email'],$_POST['pass'])) {
  $email = $_POST['email'];
  $password = md5($_POST['pass']);

  ///sql statement to select the vet based on email
  $sql="SELECT * from vets where email='$email'AND password='$password' limit 1";

  ///execute and fetch the results
  	$results=$db->query($sql)->fetch();
      ///validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // invalid email address
        echo "invalid email address";
        exit();
    }
  	if ($results) {
          //initialize session
        session_start();
  	  $_SESSION['vet_email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
        ///redirect to vethome
  	  header('location: vethome.php');
  	}else {
  		echo "No Account found,or invalid password";
  	}
  }else{
    ///if no email or password alert the user
    echo "please fill all the fields";
}

?>