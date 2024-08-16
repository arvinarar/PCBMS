<!-- Add Product Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Product form goes here -->
                <form action="product.php?action=create" method="POST">
                    <div class="form-group">
                        <label for="prod_name">Product Description</label>
                        <input type="text" class="form-control" id="prod_name" name="prod_name" required>
                    </div>
                    <div class="form-group">
                        <label for="shelf_life">Shelf life (days before expiry):</label>
                        <input type="number" class="form-control" id="shelf_life" name="shelf_life" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control" id="unit" name="unit" required>
                            <option value="piece">piece</option>
                            <option value="pack">pack</option>
                            <option value="bottle">bottle</option>
                            <option value="bag">bag</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="appreciation">Appreciation in Percent:</label>
                        <input type="number" class="form-control" id="appreciation" name="appreciation" required>
                    </div>
                    <div class="form-group">
                        <label for="max_quantity">Maximum level (max. quantity to keep):</label>
                        <input type="number" class="form-control" id="max_quantity" name="max_quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>