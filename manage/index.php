<?php
include "../headers/header.php";
if ($_SESSION['role'] != 'Manager') {
    header("location: ../");
}
?>

<div class="container">
    <div class="col-md-12 align-center">
        <p style="font-size:30px;text-align:center"> Store Management</p>
    </div>
</div>

<?php include "../footers/footer.php"; ?>