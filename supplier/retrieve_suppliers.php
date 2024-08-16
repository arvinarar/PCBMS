<?php
require_once '../model/supplierDAO.php';

$supplierModel = new SupplierDAO();
$result = $supplierModel->getAllSuppliers();

// Loop through the result and display in rows
if (!empty($result)) {
    echo "<script>console.log('Ulol!');</script>";
    foreach ($result as $supplier) { ?>
        <tr>
            <td>
                <?= $supplier['supp_id'] ?>
            </td>
            <td>
                <?= $supplier['company'] ?>
            </td>
            <td>
                <?= $supplier['contact_person'] ?>
            </td>
            <td>
                <?= $supplier['sex'] ?>
            </td>
            <td>
                <?= $supplier['phone'] ?>
            </td>
            <td>
                <?= $supplier['address'] ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal"
                    data-target="#editModal<?= $supplier['supp_id'] ?>">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#deleteModal<?= $supplier['supp_id'] ?>">Delete</button>
            </td>
        </tr>
        <?php include "../supplier/edit_supplier.php" ?>
        <?php include "../supplier/delete_supplier.php" ?>
    <?php }
} else { ?>
    <tr>
        <td colspan="7">
            <div class="alert alert-info">No suppliers found.</div>
        </td>
    </tr>
<?php } ?>