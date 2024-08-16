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
                <?= $product['unit'] ?>
            </td>
            <td>
                <?= "P" . $product['selling_price'] ?>
            </td>
            <td>
                <?php $expiry_date = new DateTime($product['expiry_date']);
                $now = new DateTime(date("Y-m-d"));
                $interval = $now->diff($expiry_date);
                if ($interval->invert == 1)
                    echo "Product Expired";
                else
                    echo $interval->days . " day/s" ?>
                </td>
                <td>
                <?= $product['barcode'] ?>
            </td>
            <td>
                <?= $product['quantity'] ?>
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