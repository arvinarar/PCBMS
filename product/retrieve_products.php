<?php
require_once '../model/productDAO.php';

$productModel = new ProductDAO();
$result = $productModel->getAllProducts();

// Loop through the result and display in rows
if (!empty($result)) {
    echo "<script>console.log('Ulol!');</script>";
    foreach ($result as $product) { ?>
        <tr>
            <td>
                <?= $product['prod_id'] ?>
            </td>
            <td>
                <?= $product['prod_name'] ?>
            </td>
            <td>
                <?= $product['shelf_life'] ?>
            </td>
            <td>
                <?= $product['unit'] ?>
            </td>
            <td>
                <?= $product['appreciation'] ?>
            </td>
            <td>
                <?= $product['max_quantity'] ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal"
                    data-target="#editModal<?= $product['prod_id'] ?>">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#deleteModal<?= $product['prod_id'] ?>">Delete</button>
            </td>
        </tr>
        <?php include "../product/edit_product.php" ?>
        <?php include "../product/delete_product.php" ?>
    <?php }
} else { ?>
    <tr>
        <td colspan="7">
            <div class="alert alert-info">No products found.</div>
        </td>
    </tr>
<?php } ?>