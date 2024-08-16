<?php
require_once '../model/SupplierDAO.php';
require_once '../model/ProductDAO.php';

$supplierModel = new SupplierDAO();
$productModel = new ProductDAO();
?>

<!-- Add Order Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Order form goes here -->
                <form action="order.php?action=create" method="POST">
                    <div class="form-group">
                        <label for="supp_id">Supplier</label>
                        <select class="form-control" id="supp_id" name="supp_id" required>
                            <?php $suppliers = $supplierModel->getAllSuppliers();
                            if (!empty($suppliers)) {
                                foreach ($suppliers as $supplier) { ?>
                                    <option value=<?= $supplier['supp_id'] ?>>
                                        <?= $supplier['contact_person'] ?>
                                    </option>
                                <?php }
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
                                foreach ($products as $product) { ?>
                                    <option value=<?= $product['prod_id'] ?>>
                                        <?= $product['prod_name'] ?>
                                    </option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <input type="date" class="form-control" id="order_date" name="order_date"
                            value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <input type="hidden" name="status" value="Pending" />
                    <button type="submit" class="btn btn-primary">Add Order</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>