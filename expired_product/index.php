<?php
include "../headers/header.php";

if (!($_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Personnel')) {
    header("location: ../");
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Expired Products</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Supplier</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include "../expired_product/retrieve_expired_products.php" ?>
        </tbody>
    </table>
</div>

<?php include "../footers/footer.php"; ?>