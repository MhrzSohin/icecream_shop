<?php
    $db_name = 'mysql:host=localhost;dbname=icecream_db'; // Remove the space after dbname
    $user_name = 'root';
    $user_password = '';

    try {
        $conn = new PDO($db_name, $user_name, $user_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; // You might want to remove this line, as it will break JSON responses
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if(!function_exists('unique_id')){
    function unique_id() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($chars);
        $randomString = '';
        for ($i=0; $i < 20; $i++) { 
            $randomString.=$chars[mt_rand(0, $charlength - 1)];
        }
        return $randomString;
    }
} 
?>
