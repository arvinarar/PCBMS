<?php
require_once '../model/ConsignedProductDAO.php';
require_once '../model/SupplierDAO.php';
require_once '../model/UserDAO.php';
require_once '../model/ProductDAO.php';

$orderModel = new ConsignedProductDAO();
$supplierModel = new SupplierDAO();
$personnelModel = new UserDAO();
$productModel = new ProductDAO();
?>

<!-- Add Order Modal -->
<div class="modal fade" id="addModal<?= $order['or_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="addModalLabel<?= $order['or_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel<?= $order['or_id'] ?>">Receive Delivery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <!-- Order form goes here -->
                    <form action="consigned_order.php?action=create&id=<?= $order['or_id'] ?>" method="POST">
                        <input type="hidden" name="or_id" value=<?= $order['or_id'] ?> />
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="supp_id">Supplier: </label>
                                <input type="hidden" name="supp_id" value=<?= $order['supp_id'] ?> />
                                <input type="text" class="form-control" value="<?= $supplier['contact_person'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="userid">Personnel: </label>
                                <input type="hidden" name="userid" value=<?= $order['userid'] ?> />
                                <input type="text" class="form-control"
                                    value="<?= $personnel['lname'] . ", " . $personnel['fname'] . " " . $personnel['mname'] ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-9">
                                <label for=" prod_id">Product: </label>
                                <input type="hidden" name="prod_id" value=<?= $order['prod_id'] ?> />
                                <input type="text" class="form-control" value="<?= $product['prod_name'] ?>" readonly>
                            </div>
                            <div class="form-group col-3">
                                <label for="quantity">Quantity: </label>
                                <input type="hidden" name="quantity" value=<?= $order['quantity'] ?> />
                                <input type="text" class="form-control" value="<?= $order['quantity'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="date_delivered">Date Delivered</label>
                                <input type="date" class="form-control" id="date_delivered" name="date_delivered"
                                    value="<?php echo date('Y-m-d'); ?>" required readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="expiry_date">Expiry Date</label>
                                <?php $products = $productModel->getProductById($order['prod_id']);
                                if (!empty($products)) {
                                    foreach ($products as $product) { ?>
                                        <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                            value="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' ' . $product['shelf_life'] . ' days')); ?>"
                                            required readonly>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="particulars">Particulars </label>
                            <textarea class="form-control" id="particulars" name="particulars" rows="3"></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="barcode">Barcode Number </label>
                            <input type="number" class="form-control" id="barcode" name="barcode" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="unit_price">Unit Price </label>
                                <input type="number" class="form-control" id="unit_price" name="unit_price" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="selling_price">Selling Price </label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount </label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Receive Product</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>