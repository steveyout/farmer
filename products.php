<?php
//database connection
require_once "database/config.php";

//start the session
session_start();
$reg_no = $_SESSION['regno'];
//if farmer isnt logged in
if (!isset($reg_no)) {
    header("location: login.php");
}
///sql statement to select all products from the database
$sql = "SELECT * FROM products";
///execute and fetch the results from the database
$results=$db->query($sql)->fetchAll();
?>
<!DOCTYPE html>
-->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Products </title>
    <link rel="stylesheet" href="products.css">
    <style>
        .btn{
            width: 5cm;
            height: 1.2cm;
            border: 1px solid transparent;
            cursor: pointer!important;
            border-radius: 5px;
            text-decoration: none;
            padding: 5px;
        }

        .btn-success{
            border: 1px solid green;
            color: white;
            background-color: green;
        }
        .btn-success:hover{
            color: green;
            background-color: transparent;
        }

        .btn-error{
            color: white;
            border: 1px solid red;
            width: 3cm!important;
            background-color: red;
        }
        .btn-error:hover{
            color: red;
            background-color: transparent;
        }

        .container {
            display: flex;
            align-items:center;
            justify-content: center;
            position: fixed;
            bottom: 10px;
            right: 50px;
        }

        .button {
            position: relative;
            border-radius: 4px;
            border: 2px solid green;
            padding: 15px 30px;
            color: white;
            background-color: green;
            box-shadow: 0 2px 10px rgba(0,0,0,.15);
            cursor: pointer;
            text-decoration: none;
            user-select: none;
            transition: all .3s;

        &:hover {
             transform: scale(1.03);
             background: rgba(0,0,0,.13);
             box-shadow: 0 2px 20px rgba(0,0,0,.15);
         }

        &:active {
             transform: scale(.96);

        .badge {
            transform: scale(1.2);
        }
        }
        }

        .badge {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: block;
            position: absolute;
            background: white;
            color: green;
            border: 2px solid green;
            display: flex;
            align-items: center;
            justify-content: center;
            top: -15px;
            right: -15px;
            transition: all .3s;
        }

        .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
            margin-top: 100px;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .modal__content {
            border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
            height: 400px;
            overflow: scroll;
        }

        .modal__footer {
            text-align: right;
        a {
            color: #585858;
        }
        i {
            color: #d02d2c;
        }
        }
        .modal__close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
        }
        input{
            width: 5cm;
            border-radius: 5px;
            border-color: green;
            height: 0.8cm;
            margin-top: 20px;
        }

    </style>
</head>
<body>
<nav>
    <div class="navbar">
        <div class="logo"><img src="images/logo.png"></a></div>
        <ul class="menu">
            <li ><a class="active" href="farmers/home.php">Home</a></li>
            <li ><a href="farmer_status_report.php">Status Report</a></li>
            <li ><a href="staff/notifications.php">Notifications</a></li>
            <li ><a href="farmers/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<!--products-->
<div class="layout">
    <section class="inner">
        <ul class="grid">
            <div class="container">
                <a class="button" href="#cart-modal">
                    <span class="content">Checkout</span>
                    <span class="badge" id="badge">0</span>
                </a>
            </div>
<?php
//loop over the products and display the each product with its details
foreach ($results as $row){
    $brand=$row['Brand'];
    $price=$row['price'];
    $description=$row['Message'];
    $src=$row['img_dir'];
    
    echo "<li class='grid-tile'>
                <div class='item'>
                    <div class='item-img'>
                    <img src='$src' alt='img' width='200' height='200' style=' display: block;
  margin-left: auto;
  margin-right: auto;'>
  </div>
                    <div class='item-pnl'>
                        <div class='pnl-wrapper'>
                            <div class='pnl-description'>
                                <span class='pnl-label'>$brand</span>
                                <span class='pnl-price'>KES $price</span>
                                <span>$description</span>
                            </div>
                         
                            <div class='pnl-tocart'>
                              <button class='btn btn-success' onclick='addToCart(\"$brand\",\"$price\",\"$src\")' style='margin-right:20px'>
                                         Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>";
            }
?>
        </ul>
    </section>
    <!--cart-->
    <div id="cart-modal" class="modal">
        <div class="modal__content">
            <h5>Cart Checkout</h5>

            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="list">

                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                     <td id="total"></td>
                </tr>



                </tfoot>
            </table>
            <div class="content">
            <div class="modal__footer">
                <button class='btn btn-success' style="margin-top: 20px" onclick="checkout()">
                    Checkout</button>
            </div>

            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
</div>

<script>
    function addToCart(brand,price,src){
        let badge=document.getElementById('badge')
        let value=parseFloat(badge.textContent)
        let totalElement=document.getElementById('total')
        let total=0

        //save cart session in local storage
        let items=localStorage.getItem('items')===null?[]:JSON.parse(localStorage.getItem('items'))
        for(let [index,product] of items.entries()) {
          total+=parseFloat(product.price)
        }

        let length=items.push({
            brand:brand,
            price:price,
            src:src
        })
        localStorage.setItem('items',JSON.stringify(items))
        value++
        badge.innerText=value
        const element = document.getElementById('list');
            const html = `<tr>
                   <td>
                   <img alt="img" src="${src}" width="20" height="20">
</td>
                   <td>${brand}</td>
                   <td class="price">Kes ${price}</td>
                    <td><button class="btn btn-error" onclick="removeItem(this,length-1)">Remove</button></td>
               </tr>`
            element.insertAdjacentHTML('afterEnd', html);
            totalElement.innerText=total
    }

    function setCart() {
        //get saved items in local storage
       let items=localStorage.getItem('items')
        //get the button badge
        let badge=document.getElementById('badge')
        //parse the list object and update the badge
        let value=JSON.parse(items).length
        ///update badge value
        badge.innerText=value
          let totalElement=document.getElementById('total')

          let total=0
        const element = document.getElementById('list');
       for(let [index,product] of JSON.parse(items).entries()) {
           total+=parseFloat(product.price)
           const html = `<tr>
                   <td>
                   <img alt="img" src="${product.src}" width="20" height="20">
</td>
                   <td>${product.brand}</td>
                   <td class="price">Kes ${product.price}</td>
                  <td><button class="btn btn-error" onclick="removeItem(this,${index})">Remove</button></td>
               </tr>`
           element.insertAdjacentHTML('afterEnd', html);
       }
       totalElement.innerText=total 

    }

    //remove item
    function removeItem(element,index){
        ///get the items
        let items=localStorage.getItem('items')===null?[]:JSON.parse(localStorage.getItem('items'))
        //remove the item from array
        items.splice(index, 1);
        localStorage.setItem('items',JSON.stringify(items))
        let total=0
        let totalElement=document.getElementById('total')
        for(let [index,product] of items.entries()) {
            total+=parseFloat(product.price)
        }

        ///store back
        element.parentElement.parentElement.remove()
        totalElement.innerText=total

        //update badges count
        let badge=document.getElementById('badge')
        let value=parseFloat(badge.textContent)
        value--
        badge.innerText=value
    }

    //checkout items
    function checkout(){
        let items=localStorage.getItem('items')===null?[]:localStorage.getItem('items')
        let total=0
        for(let [index,product] of JSON.parse(items).entries()) {
            total+=parseFloat(product.price)
        }

        //submit values programmatically
        window.location.href=`create_order.php?items=${items}&total=${total}`
    }
    window.onload = setCart;
</script>
</body>
</html>
