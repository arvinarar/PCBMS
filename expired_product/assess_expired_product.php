<?php
require_once '../model/SupplierDAO.php';
require_once '../model/ProductDAO.php';

$supplierModel = new SupplierDAO();
$productModel = new ProductDAO();
?>

<!-- Edit Order Modal -->
<div class="modal fade" id="addModal<?= $expired['item_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="addModal<?= $expired['item_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel<?= $expired['item_id'] ?>">Edit Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <!-- Order form goes here -->
                    <form action="expired_product.php?action=create&id=<?= $expired['item_id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="supp_id">Supplier: </label>
                            <input type="hidden" name="supp_id" value=<?= $expired['supp_id'] ?> />
                            <input type="text" class="form-control" value="<?= $supplier['contact_person'] ?>" readonly>
                        </div>
                        <input type="hidden" name="userid" value=<?= $_SESSION['userid'] ?> />
                        <input type="hidden" name="item_id" value=<?= $expired['item_id'] ?> />
                        <div class="form-group">
                            <label for=" prod_id">Product: </label>
                            <input type="text" class="form-control" value="<?= $product['prod_name'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity: </label>
                            <input type="hidden" name="quantity" value=<?= $expired['quantity'] ?> />
                            <input type="text" class="form-control" value="<?= $expired['quantity'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date_delivered">Expiry Date</label>
                            <input type="date" class="form-control" id="date_delivered" name="date_delivered"
                                value="<?= $expired['expiry_date'] ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">File Expired Product</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>