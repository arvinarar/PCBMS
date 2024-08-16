<?php
include_once "../headers/header.php";

if ($_SESSION['role'] != 'Manager') {
    header("location: ../");
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Sales</h2>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th>Customer Name</th>
                <th>Cashier</th>
                <th>Date</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php include "../sales/retrieve_sales.php" ?>
        </tbody>
    </table>
</div>

<?php include "../footers/footer.php"; ?>