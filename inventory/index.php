<?php
include_once "../headers/header.php";

if (!($_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Personnel')) {
    header("location: ../");
}
?>

<div class="container mt-4">
    <h2 class="text-center">Inventory</h2>
    <div class="d-flex mb-3">
        <div class="d-inline ml-auto mr-2 align-self-center">Search :</div>
        <div class="align-self-center">
            <input type="text" id="search" class="form-control">
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Unit</th>
                <th>Selling Price</th>
                <th>Days before expire</th>
                <th>Barcode No.</th>
                <th>Stock Left</th>
            </tr>
        </thead>
        <tbody id="TableBody">
        </tbody>
    </table>
</div>

<?php include "../footers/footer.php"; ?>

<script>
    $(document).ready(function () {
        $.ajax({
            url: '../inventory/retrieve_inventory.php',
            method: 'POST',
            data: { search: "" },
            success: function (response) {
                $('#TableBody').html(response);
            },
            error: function () {
                console.log('Error occurred while retrieving data.');
            }
        });
        var timer;
        $("#search").keyup(function () {
            clearTimeout(timer);
            var ms = 500; // milliseconds
            var search = $(this).val();
            timer = setTimeout(function () {
                $.ajax({
                    url: '../inventory/retrieve_inventory.php',
                    method: 'POST',
                    data: { search: search },
                    success: function (response) {
                        $('#TableBody').html(response);
                    },
                    error: function () {
                        console.log('Error occurred while retrieving data.');
                    }
                });
            }, ms);
        });
    });
</script>