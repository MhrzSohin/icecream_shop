<?php


    if(isset($_COOKIE['seller_id'])){
        $seller_id = $_COOKIE['seller_id'];
    }else{
        $seller_id = '';
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky Summer - Admin Dashboard page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <!-- font awesome cdn link  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body> 
    <div class="main-container">
        <?php include '../componets/admin_header.php'; ?>
        <section class="post-editor">
            <div class="heading">
                <h1>add product</h1>
                <img src="../image/separator-img.png" alt="">
            </div>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data" class="register">
                    <div class="input_field">
                        <p>product name <span>*</span></p>
                        <input type="text" name="name" maxlength="100" placeholder="add product name" required class="box">
                    </div>
                    <div class="input_field">
                        <p>product price <span>*</span></p>
                        <input type="number" name="price" maxlength="100" placeholder="add product price" required class="box">
                    </div>
                    <div class="input_field">
                        <p>product details <span>*</span></p>
                        <textarea name="description" required maxlength="1000" placeholder="add product details" class="box" ></textarea>
                    </div>
                        <div class="input_field">
                        <p>product stock <span>*</span></p>
                        <input type ="number" name="stock" required maxlength="10" min="0" max="9999999999999" placeholder="add product stock" required class="box" ></input>
                    </div>
                    <div class="input_field">
                        <p>product image <span>*</span></p>
                        <input type ="file" name="image"  accept="image/*" required class="box">
                    </div>
                    <div class="flex-btn">
                         <input type="submit" name="publish" value="add product" class="btn">
                         <input type="submit" name="darft" value="save as draft" class="btn">
                    </div>
                </form>
            </div>
          
        </section>
    </div>
  

 
  



    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- custom js link -->
    <script src="../js/admin_script.js"></script>
    <?php include '../componets/alert.php'; ?>  
</body>
</html>