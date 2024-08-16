<?php
include_once "../headers/header.php";
if ($_SESSION['role'] != 'Manager') {
    header("location: ../");
}

include_once "../order/create_order.php";
?>

<div class="container mt-4">
    <h2 class="text-center">Orders</h2>
    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#addModal">Add Order</button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Supplier</th>
                <th>Personnel</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <?php include "../order/retrieve_orders.php" ?>
        </tbody>
    </table>
</div>
<?php include "../footers/footer.php"; ?>