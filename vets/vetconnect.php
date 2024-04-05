<?php 

///import the database connection
include_once('../database/config.php');

///check if form variable submit is set
if(isset($_POST['submit'])) {
    ////get the form data posted
    $fullname = $_POST['vetname'];
    $idno = $_POST['idno'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    //password validation
    if (strlen($password <= '8')) {
        die("Your Password Must Contain At Least 8 Characters!");
    } elseif (!preg_match("#[\W]+#", $password)) {
        die("Your Password Must Contain At Least 1 special character!");
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        die("Your Password Must Contain At Least 1 Capital Letter!");
    } elseif (!preg_match("#[a-z]+#", $password)) {
        die("Your Password Must Contain At Least 1 Lowercase Letter!");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // invalid email address
        die("invalid email address");
    } else {
        ///sql insert statement to insert data posted to the database
        $sql = "INSERT INTO vets (VetName, Vet_ID, VetContact, VetLocation,email,password) VALUES(?,?,?,?,?,?)";
//prepare the statement
        $stmtinsert = $db->prepare($sql);
///execute the insert query
        $result = $stmtinsert->execute([$fullname, $idno, $contact, $location, $email, md5($password)]);
        if ($result) {
            ///if result is saved alert user
            echo 'successfully saved';
        } else {
            ///if errors while inserting the data alert user
            echo 'There were errors while saving the data';
        }
    }
}
        else{
            ///if form field submit is not set
            echo 'error you are missing some data';
    }
?>