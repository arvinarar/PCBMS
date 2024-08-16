<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal<?= $supplier['supp_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel<?= $supplier['supp_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?= $supplier['supp_id'] ?>">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this supplier?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="supplier.php?action=delete&id=<?= $supplier['supp_id'] ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>