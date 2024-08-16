<!-- Modal for Edit Supplier -->
<div class="modal fade" id="editModal<?= $supplier['supp_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel<?= $supplier['supp_id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?= $supplier['supp_id'] ?>">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit Supplier Form -->
                <form action="supplier.php?action=update&id=<?= $supplier['supp_id'] ?>" method="POST">
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" class="form-control" id="company" name="company"
                            value="<?= $supplier['company'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_person">Contact Person:</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person"
                            value="<?= $supplier['contact_person'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex:</label>
                        <select class="form-control" id="sex" name="sex" required>
                            <option value="Male" <?= ($supplier['sex'] === 'Male') ? 'selected' : '' ?>>Male</option>
                            <option value="Female" <?= ($supplier['sex'] === 'Female') ? 'selected' : '' ?>>Female</option>
                            <option value="Non-binary" <?= ($supplier['sex'] === 'Non-binary') ? 'selected' : '' ?>>
                                Non-binary</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="<?= $supplier['phone'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?= $supplier['address'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>