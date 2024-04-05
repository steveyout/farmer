<?php 
/*
  * import the database connection
  */
require_once('../database/config.php');

/*
 * check if the form fields email and pass are set
 */
if (isset($_POST['regno'],$_POST['pass'])) {
    /*
     * get the form fields email and pass data
     */
  $registration_number= $_POST['regno'];
  /*
   * get the password
   */
  $password =$_POST['pass'];

    //password validation
    if (strlen($password <= '8')) {
        echo "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[\W]+#",$password)) {
        echo "Your Password Must Contain At Least 1 special character!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Lowercase Letter!";
    }


    ////hash the password
    $password=md5($_POST['pass']);
    ///sql statement to select the user(employee) from database
  $sql="SELECT * from farmers where FarmerReg_No='$registration_number'AND password='$password' limit 1";

    ///execute the query and fetch the results
  	$results=$db->query($sql)->fetch();
      ///if query was successful and there are results ,means the user exists and is registered
  	if ($results) {
          //initialize session
        session_start();
        ///get the users ip address
        $ip=$_SERVER['REMOTE_ADDR'];
        //get users browser
        $user_agent=$_SERVER['HTTP_USER_AGENT'];
        ///get users session id
        $session_id=session_id();
        ///save the login users email to the session
  	  $_SESSION['regno'] = $registration_number;
  	  $_SESSION['success'] = "You are now logged in";
        $registration=$results['FarmerReg_No'];
        ///sql query to insert the session details into the database
        $sql="INSERT INTO `sessions`(`id`, `user_id`, `ip_address`, `user_agent`) VALUES(?,?,?,?)";
        ///prepare the statement
        $query=$db -> prepare($sql);
        ///sql statement to check if session already exists in the database
        $is_exists="SELECT * FROM sessions WHERE id='$session_id'";
        ///query the sql statement above and fetch results
        $is_exists=$db->query($is_exists)->fetch();
        ///if the session doesn't exist in the database then save it
        if (!$is_exists){
            ///execute the statement and save the users' session to the database
            $session=$query->execute([$session_id,$registration,$ip,$user_agent]);
        }
        ////redirect to the admin dashboard
  	  header('location: ../farmers/home.php');
  	}else {
          ///if no results the user doesn't exist in the database
  		echo "No Account found,or invalid password";
  	}
  }else{
    ///if the fields email and pass aren't set alert the user
    echo "please fill all the fields";
}

?>