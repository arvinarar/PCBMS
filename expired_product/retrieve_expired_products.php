<?php
require_once '../model/ExpiredProductDAO.php';
require_once '../model/SupplierDAO.php';
require_once '../model/ProductDAO.php';

$expiredModel = new ExpiredProductDAO();
$supplierModel = new SupplierDAO();
$productModel = new ProductDAO();
$result = $expiredModel->getAllExpiredProducts();
if (!empty($result)) {
    echo "<script>console.log('Ulol!');</script>";
    foreach ($result as $expired) { ?>
        <tr>
            <td>
                <?= $expired['item_id'] ?>
            </td>
            <td>
                <?php $suppliers = $supplierModel->getSupplierById($expired['supp_id']);
                if (!empty($suppliers)) {
                    foreach ($suppliers as $supplier) { ?>
                        <?= $supplier['contact_person'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?php $products = $productModel->getProductById($expired['prod_id']);
                if (!empty($products)) {
                    foreach ($products as $product) { ?>
                        <?= $product['prod_name'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?= $expired['quantity'] ?>
            </td>
            <td>
                <?= $expired['expiry_date'] ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal"
                    data-target="#addModal<?= $expired['item_id'] ?>">Assess Expired Item</button>
            </td>
        </tr>
        <?php include "../expired_product/assess_expired_product.php" ?>
    <?php }
} else { ?>
    <tr>
        <td colspan="6">
            <div class="alert alert-info">No expired products found.</div>
        </td>
    </tr>
<?php } ?>