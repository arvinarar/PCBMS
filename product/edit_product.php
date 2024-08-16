<!-- Modal for Edit Product -->
<div class="modal fade" id="editModal<?= $product['prod_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel<?= $product['prod_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?= $product['prod_id'] ?>">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit Product Form -->
                <form action="product.php?action=update&id=<?= $product['prod_id'] ?>" method="POST">
                    <div class="form-group">
                        <label for="prod_name">Product Description:</label>
                        <input type="text" class="form-control" id="prod_name" name="prod_name"
                            value="<?= $product['prod_name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="shelf_life">Shelf Life (days before expiry):</label>
                        <input type="text" class="form-control" id="shelf_life" name="shelf_life"
                            value="<?= $product['shelf_life'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit:</label>
                        <select class="form-control" id="unit" name="unit" required>
                            <option value="piece" <?= ($product['unit'] === 'piece') ? 'selected' : '' ?>>piece</option>
                            <option value="pack" <?= ($product['unit'] === 'pack') ? 'selected' : '' ?>>pack</option>
                            <option value="bottle" <?= ($product['unit'] === 'bottle') ? 'selected' : '' ?>>bottle</option>
                            <option value="bag" <?= ($product['unit'] === 'bag') ? 'selected' : '' ?>>bag</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="appreciation">Appreciation in Percent:</label>
                        <input type="text" class="form-control" id="appreciation" name="appreciation"
                            value="<?= $product['appreciation'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="max_quantity">Maximum level (max. quantity to keep):</label>
                        <input type="text" class="form-control" id="max_quantity" name="max_quantity"
                            value="<?= $product['max_quantity'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>