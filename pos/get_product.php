<?php
require_once '../model/POSDAO.php';

$search = $_POST['search'];
$qty = $_POST['qty'];
if (!(empty($search) || empty($qty))) {
    $POSModel = new POSDAO();
    $result = $POSModel->ScanBarcode($search);
    if (!empty($result)) {
        foreach ($result as $product) {
            echo json_encode(
                array(
                    "item_id" => $product['item_id'],
                    "prod_name" => $product['prod_name'],
                    "selling_price" => $product['selling_price'],
                    "error" => "false"
                )
            );
        }
    }
}