<?php
include "../headers/header.php";
if ($_SESSION['role'] != 'Manager') {
    header("location: ../");
}

require_once '../model/ConsignedProductDAO.php';
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Incoming Delivery</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Supplier</th>
                <th>Personnel</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include "../consigned_product/retrieve_pending_orders.php" ?>
        </tbody>
    </table>
</div>

<?php include "../footers/footer.php"; ?>