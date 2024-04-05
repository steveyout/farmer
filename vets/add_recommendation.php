<?php
///import the database connection
include '../conn.php';
//start and initialize the session
session_start();
//if no session with the vet email
if (!isset($_SESSION['vet_email'])){
    //redirect to log in
    header('location: login.php');
    //prevent other code execution
    exit();
}
if (!isset($_GET['id'])){
    echo "please provide an id";
    exit();
}
$id=$_GET['id'];
///get the vets email from the session
$email=$_SESSION['vet_email'];
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" href="home.css">
    <style>
        .container{
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
            position: relative;
            left: 180px;
            top: 150px;
        }
        .container .title{
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }
        .container .title::before{
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        .content form .user-details{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }
        .center h1{
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid silver;
        }
        form .user-details .input-box{
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }
        form .input-box span.details{
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        form select{
            height: 45px;
            width: 5cm;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        .user-details .input-box input{
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        .user-details .input-box input:focus,
        .user-details .input-box input:valid{
            border-color: #9b59b6;
        }
        form .gender-details .gender-title{
            font-size: 20px;
            font-weight: 500;
        }
        form .category{
            display: flex;
            width: 80%;
            margin: 14px 0 ;
            justify-content: space-between;
        }
        form .category label{
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        form .category label .dot{
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three{
            background: #9b59b6;
            border-color: #d9d9d9;
        }
        form input[type="radio"]{
            display: none;
        }
        form .button{
            height: 45px;
            margin: 35px 0
        }
        form .button input{
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        form .button input:hover{
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }
        @media(max-width: 584px){
            .container{
                max-width: 100%;
            }
            form .user-details .input-box{
                margin-bottom: 15px;
                width: 100%;
            }
            form .category{
                width: 100%;
            }
            .content form .user-details{
                max-height: 300px;
                overflow-y: scroll;
            }
            .user-details::-webkit-scrollbar{
                width: 5px;
            }
        }
        @media(max-width: 459px){
            .container .content .category{
                flex-direction: column;
            }
        }

        .btn{
            width: 5cm;
            height: 1.2cm;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            padding: 5px;
        }

        .btn-success{
            color: white;
            background-color: green;
        }

        .form-group {
            display: block;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .form-group label {
            position: relative;
            cursor: pointer;
        }

        .form-group label:before {
            content:'';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid green;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-group input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid green;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

    </style>

</head>
<body>

<nav>
    <div class="navbar">
        <div class="logo"><img src="images/logo.png"></a></div>
        <ul class="menu">
            <li ><a href="#">Farmers</a></li>
            <li ><a href="farmer_status_report.php">Status Reports</a></li>
            <li ><a href="#">Products</a></li>
            <li ><a href="#">Notifications</a></li>
            <li ><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- Side navigation -->
<div class="sidenav">
    <a href="#">Farmers</a>
    <a href="farmer_status_report.php">Status Report</a>
    <a href="#">Products</a>
    <a href="#">Notifications</a>
</div>

<!-- Page content -->
<div class="main">
    <div class="container">
        <div class="content">
            <h1>Add Recommendation</h1>
            <form  action="form_recommendation.php" method="post" style="height:400px;overflow-y: scroll">
                <input type="number" value="<?php echo $id ?>" style="display: none" name="id">
                <div class="user-details">
                <div id="input_row">
                    <div  style="display: flex;flex-direction: row;" id="next">
                        <div class="input-box" style="margin-right: 5px">
                            <input type="text" name="recommendations[]" placeholder="recommendation" >
                        </div>
                        <button class="btn btn-success" type="button" onclick="addInput()">Add</button>
                    </div>
                </div>
                    <div style="width: 100%">
                    <input type="submit" value="Submit" name="submit" class="btn btn-success">
                    </div>

                </div>
        </form>
    </div>
</div>
<br>
<div class="footer">
    <p>FARMERS MANAGEMENT SYSTEM   @ 2022</p>
</div>
    <script>
        function addInput(){
            const element = document.getElementById('input_row');
            const html='<div  style="display: flex;flex-direction: row;" id="next"> <div class="input-box" style="margin-right: 5px"> <input type="text" name="recommendations[]" placeholder="recommendation" > </div> <button class="btn btn-success" type="button" onclick="addInput()">Add</button> </div>'
            element.insertAdjacentHTML('afterEnd',html);
        }
    </script>
</body>
