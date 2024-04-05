<!DOCTYPE html>
-->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <style>
        [type="file"] {
            /* Style the color of the message that says 'No file chosen' */
            color: #878787;
        }
        [type="file"]::-webkit-file-upload-button {
            background: #00873d;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            font-size: 12px;
            outline: none;
            padding: 10px 25px;
            text-transform: uppercase;
            transition: all 1s ease;
        }
    </style>
</head>
<body>
<nav>
    <div class="navbar">
        <div class="logo"><img src="images/logo.png"></a></div>
        <ul class="menu">
            <li ><a class="active" href="index.php">Home</a></li>
            <li ><a href="farmers/login.php">Login</a></li>
            <li ><a href="farmers/registration/index.php">Register</a></li>
        </ul>
    </div>
</nav>
<div class="center">
    <h1>Add Product</h1>
    <form  action="" method="POST" enctype="multipart/form-data">
        <?php
        include 'conn.php';
        if (isset($_POST['name'],$_POST['description'],$_POST['price'],$_FILES['image'])){
            $name=$_POST['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $image=$_FILES['image'];
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                $errors="extension not allowed, please choose a JPEG or PNG file.";
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/".$file_name);
                $sql="INSERT INTO `products`(`Brand`, `Message`, `price`,`img_dir`) VALUES(?,?,?,?)";
                $query=$db -> prepare($sql);
                $query->execute([$name,$description,$price,"images/".$file_name]);
                echo "Product Successfully added";
            }else{
                print_r($errors);
            }
        }else{
            echo "Some fields are missing";
        }
        ?>
        <div class="txt_field">
            <input type="text" name="name" required>
            <span></span>
            <label>Name</label>
        </div>

        <div class="txt_field">
            <input type="text" name="description" required>
            <span></span>
            <label>Description</label>
        </div>

        <div class="txt_field">
            <input type="number" name="price" required>
            <span></span>
            <label>Price</label>
        </div>


                    <input type="file" id="file" name="image" style="margin-bottom: 50px" accept="image/*" required>


        <input type="submit" value="Submit" name="submit">

    </form>
</div>

</body>
</html>
