
 <header>
    <div class="logo">
        <img src="../image/logo.png" width="150">
    </div>
    <div class="right">
        <div class="bx bxs-user" id="user-btn"></div>
        <div class="toogle-btn"><i class="bx bx-menu"></i></div>
    </div>
    <div class="profile-detail">
        <?php
            include '../componets/connect.php';
            $select_profile = $conn-> prepare("SELECT * FROM `seller` WHERE id = ?");
            $select_profile->execute([$seller_id]);
            
            if($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            
        ?>
        <div class="profile">
            <img src="../uploaded_files/<?= $fetch_profile['image']; ?> class= "logo-img" width="100">
            <p><?= $fetch_profile['name']; ?></p>
            <div class="flex-btn">
                <a href="profile.php" class="btn">profile</a>
                <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="btn">logout</a>
            </div>
        </div>
        <?php } ?>
    </div>
 </header>
 <div class="sidebar-container">
    <div class="sidebar">
    <?php
            include '../componets/connect.php';
            $select_profile = $conn-> prepare("SELECT * FROM `seller` WHERE id = ?");
            $select_profile->execute([$seller_id]);
            
            if($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            
        ?>
        <div class="profile">
            <img src="../uploaded_files/<?= $fetch_profile['image']; ?> class= "logo-img" width="100">
            <p><?= $fetch_profile['name']; ?></p>
        </div>
        <?php } ?>
        <h5>Menu</h5>
        <div class="navbar">
            <ul>
                <li><a href="dashboard.php"> <i class="bx bxs-home-smile"></i>dashboard</a></li>
                <li><a href="add_product.php"> <i class="bx bxs-shopping-bags"></i>add products</a></li>
                <li><a href="user_accounts.php"> <i class="bx bxs-user-detail"></i>accounts</a></li>
                <li><a href="../componets/admin_logout.php" onclick="return confirm('logout from this website');"><i class="bx bx-log-out"></i>logout</a></li>
                <li><a href="dashboard.php"> <i class="bx bxs-home-smile"></i>dashboard</a></li>
            </ul>
        </div>
        <h3>Find Us</h3>
        <div class="social-links">
            <i class="bx bxl-facebook"></i>
            <i class="bx bxl-instagram"></i>
            <i class="bx bxl-linkedin"></i>
            <i class="bx bxl-twitter"></i>
            <i class="bx bxl-pinterest"></i>
        </div>
    </div>

 </div>