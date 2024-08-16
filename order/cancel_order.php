<!-- cancel_order.php -->
<!-- Cancel Order Modal -->
<div class="modal fade" id="cancelModal<?= $order['or_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="cancelModalLabel<?= $order['or_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel<?= $order['or_id'] ?>">Cancel Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel this order?</p>
            </div>
            <div class="modal-footer">
                <form action="order.php?action=cancel&id=<?= $order['or_id'] ?>" method="POST">
                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>