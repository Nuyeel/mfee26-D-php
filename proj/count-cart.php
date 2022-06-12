<?php require __DIR__ . '/parts/connect_db.php' ?>

<?php 

if (isset($_SESSION['cart'])) {
    $output = count($_SESSION['cart'], 0);
} else {
    $output = 0; 
}

echo $output;

?>