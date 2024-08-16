<?php
require_once '../model/ConsignedProductDAO.php';
require_once '../model/SupplierDAO.php';
require_once '../model/UserDAO.php';
require_once '../model/ProductDAO.php';

$orderModel = new ConsignedProductDAO();
$supplierModel = new SupplierDAO();
$personnelModel = new UserDAO();
$productModel = new ProductDAO();
$orders = $orderModel->getPendingOrders();

// Loop through the result and display in rows
if (!empty($orders)) {
    echo "<script>console.log('Ulol!');</script>";
    foreach ($orders as $order) { ?>
        <tr>
            <td>
                <?= $order['or_id'] ?>
            </td>
            <td>
                <?php $suppliers = $supplierModel->getSupplierById($order['supp_id']);
                if (!empty($suppliers)) {
                    foreach ($suppliers as $supplier) { ?>
                        <?= $supplier['contact_person'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?php $personnels = $personnelModel->getPersonnelById($order['userid']);
                if (!empty($personnels)) {
                    foreach ($personnels as $personnel) { ?>
                        <?= $personnel['lname'] . ", " . $personnel['fname'] . " " . $personnel['mname'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?php $products = $productModel->getProductById($order['prod_id']);
                if (!empty($products)) {
                    foreach ($products as $product) { ?>
                        <?= $product['prod_name'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?= $order['quantity'] ?>
            </td>
            <td>
                <?= $order['order_date'] ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal"
                    data-target="#addModal<?= $order['or_id'] ?>">Receive Delivery</button>
            </td>
        </tr>
        <?php include "../consigned_product/create_consigned_product.php" ?>
    <?php }
} else { ?>
    <tr>
        <td colspan="7">
            <div class="alert alert-info">No incoming deliveries found.</div>
        </td>
    </tr>
<?php } ?>