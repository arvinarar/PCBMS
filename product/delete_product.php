<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal<?= $product['prod_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel<?= $product['prod_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?= $product['prod_id'] ?>">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="product.php?action=delete&id=<?= $product['prod_id'] ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>