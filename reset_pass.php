<?php
///include database connection
include 'config.php';
//if form values submit is set
if (isset($_POST['submit'])){
    ///get contact
    $contact=$_POST['contact'];
    ///get name
    $name=$_POST['name'];
    //get pass value
    $password=$_POST['password'];

    ///validate name
    if (!ctype_alpha($name)){
        echo "Username must contain letters only!";
        exit();
    }
    //validate contact format +25470164XXXX 0r 070164XXXX
    elseif (!preg_match('/^(\+254|0)[1-9]\d{8}$/', $contact)){
        echo "Please input a correct phone number!";
        exit();
    }//password validation
    elseif (strlen($password )< 8) {
        echo "Your Password Must Contain At Least 8 Characters!";
        exit();
    }
    elseif(!preg_match("#[\W]+#",$password)) {
        echo "Your Password Must Contain At Least 1 special character!";
        exit();
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Capital Letter!";
        exit();
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        echo "Your Password Must Contain At Least 1 Lowercase Letter!";
        exit();
    }
    /*
     * check if farmer exists with the details above
     */
    $sql="SELECT * FROM farmers WHERE FarmerName=:name AND FarmerContact=:contact";
    $query = $db -> prepare($sql);
    $query->bindParam('name',$name);
    $query->bindParam('contact',$contact);
    $exe=$query->execute();
    if ($exe){
        $results=$query->fetch(PDO::FETCH_ASSOC);
        if ($results){
            //hash the new password
            $password=md5($password);
            $sql="UPDATE farmers SET password=:pass WHERE FarmerName=:name AND FarmerContact=:contact";
            $query = $db -> prepare($sql);
            $query->bindParam('name',$name);
            $query->bindParam('contact',$contact);
            $query->bindParam('pass',$password);
            $exe=$query->execute();
            if ($exe){
                echo 'Password updated successfully';
            }else{
                //database error
                echo 'An error occurred when updating pass';
            }
        }else{
            echo 'User not found please try again';
        }
    }else{
        echo 'An error occurred when communicating with database';
    }

}
