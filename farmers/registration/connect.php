<?php 

include_once('validation.php');

///check whether variable submit from form is set
if(isset($_POST['submit'])){

    /*
     *$_POST method gets the value of the submitted form fields
     * eg $_POST['email'] gets form input field with name attribute email

    */
  $membershipnumber = $_POST['memno'];
  $fullname = $_POST['fname'];
  $contact  = $_POST['contact'];
  $idno  = $_POST['idno'];
  $location  = $_POST['location'];
  $cowName=$_POST['cow_name'];
  $cowType=$_POST['cow_breed'];
  $cowProduction=$_POST['cow_production'];
  $password  = $_POST['pass'];

  ///validate username
    if (!ctype_alpha( str_replace(' ', '', $fullname))){
        echo "Username must contain letters only!";
        exit();
    }
    //validate contact format +25470164XXXX 0r 070164XXXX
    elseif (!preg_match('/^(\+254|0)[1-9]\d{8}$/', $contact)){
        echo "Please input a correct phone number!";
        exit();
    }
  //password validation
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
   * sql prepared statement to insert the form fields into the database
   * each ? represents each field eg the first ? represents (FarmerReg_No)
   * prepared statements help prevent sql injection attacks
   */
$sql="INSERT INTO farmers (FarmerReg_No, FarmerName, FarmerContact, FarmerId_No, 
FarmerLocation,password)
VALUES(?,?,?,?,?,?)";
$sql1="INSERT INTO cows (FarmerReg_No,name,type,sales) VALUES (?,?,?,?)";
///prepare the insert statements
$query=$db->prepare($sql1);
$stmtinsert = $db -> prepare($sql);

///execute the query to insert the results into the database
$result = $stmtinsert -> execute([$membershipnumber,$fullname,$contact,$idno,$location,md5($password)]);
/*
 * this is a custom function to compute the average production of cows
 * the function requires two parameters,the number of cows and the type of cow
 */
function average($number,$type){
    $production=[];
    /*
     * since the number of cows can be more than one
     * we loop over each to find the average production of each and then push the
     * average production to the production array above
     */
    for($i=0;$i<=$number;$i++){
        if ($type=='freshian'){
            array_push($production,rand(25,70));
        }elseif ($type=='gurnsey'){
            array_push($production,rand(20,60));
        }elseif ($type=='jersey'){
            array_push($production,rand(15,50));
        }elseif ($type=='ayrshire'){
            array_push($production,rand(25,55));
        }
    }
    /*
     * calculate the total average of the production in the productions array
     */
    $average = array_sum($production) / count($production);
    /*
     * return the average after computation
     */
    return $average;
}

//here i have used random function for the sales
    //compute status
    function status($type,$score)
    {
        $score = intval(round($score));
        switch ($type) {
            case 'freshian':
                if (in_array($score, range(55, 70))) {
                    return 'Excellent';
                } elseif (in_array($score, range(25, 40))) {
                    return 'Average ';
                } else if ($score < 25) {
                    return "Poor";
                } else {
                    return 'Average ';
                }
                break;
            /*
             * ayrshire
             */
            case 'ayrshire':
                if (in_array($score, range(35, 55))) {
                    return 'Excellent';
                } elseif (in_array($score, range(20, 35))) {
                    return 'Average ';
                } else if ($score < 20) {
                    return "Poor";
                } else {
                    return 'Average ';
                }
                break;
            /*
             * gurnsey
             */
            case 'gurnsey':
                if (in_array($score, range(40, 60))) {
                    return 'Excellent';
                } elseif (in_array($score, range(20, 40))) {
                    return 'Average ';
                } else if ($score < 20) {
                    return "Poor";
                } else {
                    return 'Average ';
                }
                break;
            /*
             * jersey
             */
            case 'jersey':
                if (in_array($score, range(30, 45))) {
                    return 'Excellent';
                } elseif (in_array($score, range(15, 30))) {
                    return 'Average ';
                } else if ($score < 15) {
                    return "Poor";
                } else {
                    return 'Average ';
                }
                break;
        }
    }
    ///freshian

    foreach( $cowName as $index => $cow ) {
        $type = $cowType[$index];
        $production=$cowProduction[$index];
            $query->execute([$membershipnumber, $cow, $type, $production]);
echo status($type,$production);
        ///notifications
        if (status($type,$production)=='Poor') {
            $msg = "Farmer with Reg no $membershipnumber has a $type with poor status";
            $sql = "INSERT INTO notifications(message, type) VALUES ('$msg','admin')";
            $db->exec($sql);
        }
    }
/*
 * if query was successful redirect to login page
 */
  if($result){
     echo "<script>alert('Registration success');window.location.href='../login.php'</script>";
  } else{
      /*
 * if query was not successful alert the user
 */
    echo 'There were errors while saving the data';
    }
}else{
  echo 'there were errors connecting to database';
}
?>