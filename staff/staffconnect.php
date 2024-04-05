<?php 

include_once('validation.php');
$emailErr = "";
///check if the form filed submit is set
if(isset($_POST['submit'])){
    ///get the form details posted
  $staffnumber     = $_POST['staffno'];
  $contact = $_POST['contact'];
  $idno  = $_POST['EmpID'];
  $name  = $_POST['fname'];
  if (empty($_POST["email"])) {
      //if the email is empty eg an empty string
    $emailErr = "Email is required";
  } else {
    $email = ($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  //get the password posted
  $password= $_POST['pass'];

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

    ///email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // invalid email address
        echo "invalid email address";
        ///prevent other code execution if email validation failed
        exit();
    }

  //sql statement to insert employess details to the database
$sql="INSERT INTO employees (Staff_No, EmployeeContact, EmployeeID, EmpName, email,password) VALUES(?,?,?,?,?,?)";
/*
 * prepare and execute the statement
 */
$stmtinsert = $db -> prepare($sql);
$result = $stmtinsert -> execute([$staffnumber,$contact,$idno,$name,$email,md5($password)]);
  if($result){
      /*
       * if query is successful alert the user the employees are saved into database
       */
  echo 'successfully saved';
  }
  else{
    echo 'There were errors while saving the data';
    }
}else{
  echo 'there were errors connecting to database';
}
?>