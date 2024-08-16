<?php
require_once '../model/POSDAO.php';

$search = $_POST['search'];
$qty = $_POST['qty'];
if (empty($search) || empty($qty)) { ?>
    <h5 class="text-center mt-5 text-danger">Please enter barcode and quantity</h5>
<?php } else {
    $POSModel = new POSDAO();
    $result = $POSModel->ScanBarcode($search);
    if (!empty($result)) {
        foreach ($result as $product) { ?>
            <h5 class="text-center mt-5">
                <?= $product['prod_name'] . " x " . $qty ?>
            </h5>
            <p class="text-center mt-3">
                <?= $product['unit'] ?>
            </p>
            <p class="text-center mt-3">
                <?= "P" . ($product['selling_price'] * $qty) ?>
            </p>
        <?php }
    } else { ?>
    <h5 class="text-center mt-5 text-danger">No Product Found</h5>
<?php }
}