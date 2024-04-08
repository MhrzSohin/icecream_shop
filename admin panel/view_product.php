<?php

    include '../componets/connect.php';
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
        <section class="dashboard">
            <div class="heading">
                <h1>dashboard</h1>
                <img src="../image/separator-img.png" alt="">
            </div>
                <div class="box-container">
                    <?php
                        $select_products = $conn->prepare("SELECT * FROM `products` WHERE  seller_id = ?");
                        $select_products -> execute([$seller_id]);
                        if($select_products->rowCount() > 0){
                            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <form action="" method="post" class="box">
                        <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                        <?php if($fetch_products ['image'] != ''){ ?>
                            <img src="../uploaded_files/<?= $fetch_products['image']; ?>" >
                        <?php } ?> 
                        <div class="status" style="color: <?php if ($fetch_products['status'] == 'active'){ echo "limegreen";}else{echo "coral";} ?>"><?=$fetch_products['status'];?></div>
                        <div class="price"><?=$fetch_products['price']; ?></div>
                        <div class="content">
                            <img src="../image/shape-19.png" class="shape">
                            <div class="title"><?=$fetch_products['name'];?></div>
                            <div class="flex-btn">
                                <a href="edit_product.php?id=<?= $fetch_products['id']; ?>" class="btn">edit</a>
                                <button type="submit" name="delete" class="btn" onclick="return confirm('delete this product');">delete</button>
                                <a href="read_product.php?post_id=<?= $fetch_products['id']; ?>" class="btn">read product</a>
                            </div>
                        </div>   
                    </form>            
                    <?php           
                            }
                        }else{
                            echo '
                            <div class="empty">
                            <p>no products added yet!! <br> <a href="add_product.php" class="btn" style="margin-top:1.5rem">add products</a></p>
                            </div>
                      

                            ';
                        }
                    ?>    
                </div>
        </section>
    </div>
    <div class="empty">
        <p>no products added yet!! <br> <a href="add_product.php" class="btn" style="margin-top:1.5rem">add products</a></p>
    </div>
  

 
  



    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- custom js link -->
    <script src="../js/admin_script.js"></script>
    <?php include '../componets/alert.php'; ?>  
</body>
</html>