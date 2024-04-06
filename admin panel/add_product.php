<?php

    include '../componets/connect.php';
    if(isset($_COOKIE['seller_id'])){
        $seller_id = $_COOKIE['seller_id'];
    }else{ 
        $seller_id = '';
        header('location:login.php');
    }
    //add products in database
    if (isset($_POST['publish'])) {

        $id = unique_id();
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT);
        
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_STRING);

        $stock = $_POST['stock'];
        $stock = filter_var($stock, FILTER_SANITIZE_NUMBER_FLOAT);
        $status = 'active';

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$image;

        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
        $select_image->execute([$image,$seller_id]);

        if(isset($image)) {
            if($select_image->rowCount() > 0 ){
                $warning_msg[] = 'image name repeated';
            }elseif($image_size > 20000000){
                $warning_msg[] = 'image size too large';
            }else{
                move_uploaded_file($image_tmp_name,$image_folder);
            }
        }else{
            $image = '';
        }
        if($select_image->rowCount() > 0 AND $image != ''){
            $warning_msg[] = 'please rename your image';
        }else{
            $insert_product = $conn->prepare("INSERT INTO `products`(id, seller_id, name, price, image, stock, product_details, status) VALUES(?,?,?,?,?,?,?,?)");
            $insert_product->execute([$id, $seller_id, $name, $price, $image, $stock, $description, $status]);
            $success_msg[] = 'product inserted successfully';
        }
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