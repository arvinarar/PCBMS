<?php
require_once '../model/InventoryDAO.php';

$search = $_POST['search'];

$inventoryModel = new InventoryDAO();
$inventory = $inventoryModel->getInventory($search);

if (!empty($inventory)) {
    foreach ($inventory as $product) { ?>
        <tr>
            <td>
                <?= $product['prod_name'] ?>
            </td>
            <td>
                <?= "P" . $product['selling_price'] ?>
            </td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan="6">
            <div class="alert alert-info">No Products Found.
            </div>
        </td>
    </tr>
<?php } ?>