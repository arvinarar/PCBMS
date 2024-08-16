<?php
require_once '../model/SupplierDAO.php';
require_once '../model/ProductDAO.php';

$supplierModel = new SupplierDAO();
$productModel = new ProductDAO();
?>

<!-- Edit Order Modal -->
<div class="modal fade" id="editModal<?= $order['or_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel<?= $order['or_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?= $order['or_id'] ?>">Edit Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <!-- Order form goes here -->
                    <form action="order.php?action=update&id=<?= $order['or_id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="supp_id">Supplier</label>
                            <select class="form-control" id="supp_id" name="supp_id" required>
                                <?php $suppliers = $supplierModel->getAllSuppliers();
                                if (!empty($suppliers)) {
                                    foreach ($suppliers as $supplier) {
                                        $selected = ($supplier['supp_id'] == $order['supp_id']) ? 'selected' : '';
                                        ?>
                                        <option value="<?= $supplier['supp_id'] ?>" <?= $selected ?>>
                                            <?= $supplier['contact_person'] ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <input type="hidden" name="userid" value=<?= $_SESSION['userid'] ?> />
                        <div class="form-group">
                            <label for="prod_id">Product</label>
                            <select class="form-control" id="prod_id" name="prod_id" required>
                                <?php $products = $productModel->getAllProducts();
                                if (!empty($products)) {
                                    foreach ($products as $product) {
                                        $selected = ($product['prod_id'] == $order['prod_id']) ? 'selected' : '';
                                        ?>
                                        <option value="<?= $product['prod_id'] ?>" <?= $selected ?>>
                                            <?= $product['prod_name'] ?>
                                        </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                value="<?= $order['quantity'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="order_date">Order Date</label>
                            <input type="date" class="form-control" id="order_date" name="order_date"
                                value="<?= $order['order_date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Pending" <?= ($order['status'] === 'Pending') ? 'selected' : '' ?>>
                                    Pending</option>
                                <option value="Received" <?= ($order['status'] === 'Received') ? 'selected' : '' ?>>
                                    Received</option>
                                <option value="Cancelled" <?= ($order['status'] === 'Cancelled') ? 'selected' : '' ?>>
                                    Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Order</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>