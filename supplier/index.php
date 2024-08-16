<?php
include "../headers/header.php";
require_once '../model/supplierDAO.php';
include "../supplier/create_supplier.php";
?>

<div class="container mt-4">
    <h2 class="text-center">Suppliers</h2>
    <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#addModal">Add Supplier</button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Contact Person</th>
                <th>Sex</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include "../supplier/retrieve_suppliers.php" ?>
        </tbody>
    </table>
</div>

<?php include "../footers/footer.php"; ?>