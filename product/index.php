<?php
include "../headers/header.php";

if ($_SESSION['role'] != 'Manager') {
    header("location: ../");
}
include "../product/create_product.php";
?>

<div class="container mt-4">
    <h2 class="text-center">Products</h2>
    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#addModal">Add
        Product</button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Shelf Life</th>
                <th>Unit</th>
                <th>Appreciation (%)</th>
                <th>Critical Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include "../product/retrieve_products.php" ?>
        </tbody>
    </table>
</div>

<?php include "../footers/footer.php"; ?>