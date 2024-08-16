<?php
require_once '../model/OrderDAO.php';
require_once '../model/SupplierDAO.php';
require_once '../model/UserDAO.php';
require_once '../model/ProductDAO.php';

$orderModel = new OrderDAO();
$supplierModel = new SupplierDAO();
$personnelModel = new UserDAO();
$productModel = new ProductDAO();
$orders = $orderModel->getAllOrdersFiltered("Pending");

// Loop through the result and display in rows
if (!empty($orders)) {
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
                <?= $order['status'] ?>
            </td>
            <td>
                <?php if ($order['status'] == "Pending") { ?>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#cancelModal<?= $order['or_id'] ?>">Cancel Order</button>
                <?php } ?>
            </td>
        </tr>
        <?php include "../order/cancel_order.php";
    }
} else { ?>
    <tr>
        <td colspan="8">
            <div class="alert alert-info">No
                Pending orders found.
            </div>
        </td>
    </tr>
<?php } ?>